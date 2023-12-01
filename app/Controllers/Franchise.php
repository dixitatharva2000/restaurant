<?php

namespace App\Controllers;

use App\Models\FranchiseModel;

class Franchise extends BaseController
{
    function __construct()
    {
        $this->FranchiseModel = new FranchiseModel();
        $this->session        = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        if ($this->request->getPost()) {
            $dataArray = $this->request->getPost();
            if ($this->FranchiseModel->insertData('tbl_franchise', $dataArray)) {
                $this->session->setFlashdata('create', '<div id="sessionAlert" class="alert alert-success">Franchise Successfully Created</div>');
            } else {
                echo "Error";
            }
        }
        $data['franchise']  = $this->FranchiseModel->getData('tbl_franchise');
        $data['restaurent'] = $this->FranchiseModel->getData('tbl_restaurent');
        return view('Admin/franchise', $data);


    }

    public function edit($id)
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        if ($this->request->getPost()) {
            $dataArray = $this->request->getPost();
            if ($this->FranchiseModel->updateData('tbl_franchise', 'franchise_id', $id, $dataArray)) {
                $this->session->setFlashdata('update', '<div id="sessionAlert" class="alert alert-primary">Franchise Successfully Updated</div>');
                return redirect()->to('franchise');
            }
        }

    }

    public function edit_franchise($id)
    {
        $data['restaurent'] = $this->FranchiseModel->getData('tbl_restaurent');
        $data['values']     = $this->FranchiseModel->getWhere('tbl_franchise', 'franchise_id', $id);
        return view('Admin/edit_franchise', $data);
    }

    public function delete($id)
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        if ($this->FranchiseModel->deleteData('tbl_franchise', 'franchise_id', $id)) {
            $this->session->setFlashdata('delete', '<div id="sessionAlert" class="alert alert-danger">Franchise Successfully Deleted</div>');
            return redirect()->to('franchise');
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
