<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\TablesModel;
use App\Models\FranchiseModel;

class Tables extends BaseController
{
    function __construct()
    {
        $this->TablesModel    = new TablesModel();
        $this->CommonModel    = new CommonModel();
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
            if ($this->TablesModel->insertData('tbl_franchise', $dataArray)) {
                $this->session->setFlashdata('create', '<div id="sessionAlert" class="alert alert-success">Franchise Successfully Created</div>');
            } else {
                echo "Error";
            }
        }
        $data['franchise']  = $this->TablesModel->getData('tbl_franchise');
        $data['restaurent'] = $this->TablesModel->getData('tbl_restaurent');
        return view('Admin/tables', $data);


    }

    public function edit($id)
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        if ($this->request->getPost()) {
            $dataArray = $this->request->getPost();
            if ($this->TablesModel->updateData('tbl_franchise', 'franchise_id', $id, $dataArray)) {
                $this->session->setFlashdata('update', '<div id="sessionAlert" class="alert alert-primary">Franchise Successfully Updated</div>');
                return redirect()->to('franchise');
            }
        }

    }

    public function edit_franchise($id)
    {
        $data['restaurent'] = $this->TablesModel->getData('tbl_restaurent');
        $data['values']     = $this->TablesModel->getWhere('tbl_franchise', 'franchise_id', $id);
        return view('Admin/edit_franchise', $data);
    }

    public function delete($id)
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        if ($this->TablesModel->deleteData('tbl_franchise', 'franchise_id', $id)) {
            $this->session->setFlashdata('delete', '<div id="sessionAlert" class="alert alert-danger">Franchise Successfully Deleted</div>');
            return redirect()->to('franchise');
        }

    }


    function getfranchise($id)
    {

        $franchise = $this->TablesModel->getWhere('tbl_franchise', 'franchise_id', $id);
        foreach ($franchise as $value) {
            echo '<option value="' . $value->franchise_id . '"}>' . $value->franchise_name . '</option>';
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
