<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\FranchiseModel;
use App\Models\TablesModel;

class Tables extends BaseController
{
    function __construct()
    {
        $this->CommonModel    = new CommonModel();
        $this->FranchiseModel = new FranchiseModel();
        $this->TablesModel    = new TablesModel();
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

            $photo    = [];
            $targetfile = count($_FILES['photo']['name']);
            for ($i = 0; $i < $targetfile; $i++) {
                move_uploaded_file($_FILES['photo']['tmp_name'][$i], 'uploads/' . $_FILES['photo']['name'][$i]);
                $photo[] = $_FILES['photo']['name'][$i];
                $photos     = implode(',', $photo);
                $dataArray += ['photo' => $photos];
            }

            if ($this->TablesModel->insertData('tbl_tables', $dataArray,)) {
                $this->session->setFlashdata('create', '<div id="sessionAlert" class="alert alert-success">Table Successfully Created</div>');
            } else {
                echo "Error";
            }
        }
        $data['tables']     = $this->TablesModel->getData('tbl_tables');
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
            if ($this->TablesModel->updateData('tbl_tables', 'table_id', $id, $dataArray)) {
                $this->session->setFlashdata('update', '<div id="sessionAlert" class="alert alert-primary">Tables Successfully Updated</div>');
                return redirect()->to('tables');
            }
        }


    }

    public function edit_tables($id)
    {
        $data['restaurent'] = $this->TablesModel->getData('tbl_restaurent');
        $data['franchise']  = $this->TablesModel->getData('tbl_franchise');
        $data['values']     = $this->TablesModel->getWhere('tbl_tables', 'table_id', $id);

        return view('Admin/edit_tables', $data);
    }

    public function delete($id)
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        if ($this->TablesModel->deleteData('tbl_tables', 'table_id', $id)) {
            $this->session->setFlashdata('delete', '<div id="sessionAlert" class="alert alert-danger">Table Successfully Deleted</div>');
            return redirect()->to('tables');
        }

    }

    function getfranchise($id)
    {
        $franchise = $this->TablesModel->getWhere('tbl_franchise', 'restaurent_id', $id);
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
