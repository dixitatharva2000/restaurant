<?php

namespace App\Controllers;

use App\Models\CommonModel;

class Restaurent extends BaseController
{
    function __construct()
    {
        $this->CommonModel = new CommonModel();
        $this->session     = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        if ($this->request->getPost()) {
            $dataArray = $this->request->getPost();
            if ($this->CommonModel->insertData('tbl_restaurent', $dataArray)) {
                $this->session->setFlashdata('create', '<div id="sessionAlert" class="alert alert-success">Restaurent Successfully Created</div>');
            } else {
                echo "Error";
            }
        }
        $data['restaurent'] = $this->CommonModel->getData('tbl_restaurent');
        return view('Admin/restaurent', $data);


    }

    public function edit($id)
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        if ($this->request->getPost()) {
            $dataArray = $this->request->getPost();
            if ($this->CommonModel->updateData('tbl_restaurent', 'restaurent_id', $id, $dataArray)) {
                $this->session->setFlashdata('update', '<div id="sessionAlert" class="alert alert-primary">Restaurent Successfully Created</div>');
                return redirect()->to('restaurent');
            }
        }

    }

    public function edit_restaurent($id)
    {
        $data['values'] = $this->CommonModel->getWhere('tbl_restaurent', 'restaurent_id', $id);
        return view('Admin/edit_restaurent', $data);
    }

    public function delete($id)
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        if ($this->CommonModel->deleteData('tbl_restaurent', 'restaurent_id', $id)) {
            $this->session->setFlashdata('delete', '<div id="sessionAlert" class="alert alert-danger">Restaurent Successfully Deleted</div>');
            return redirect()->to('restaurent');
        }

    }




    public function logout()
    {
        $session = session();
        if (!$session->has('logged_in') || $session->get('logged_in') !== true) {
            if ($this->session->get('user_id') != '') {
                $this->session->destroy();
                return redirect()->to('login');
            }
        }
    }
}
