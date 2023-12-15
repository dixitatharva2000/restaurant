<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;

class Menu extends BaseController
{
    function __construct()
    {
        $this->MenuModel        = new MenuModel();
        $this->CategoryModel    = new CategoryModel();
        $this->SubCategoryModel = new SubCategoryModel();
        $this->session          = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        if ($this->request->getPost()) {
            $dataArray = $this->request->getPost();

            $photo      = [];
            $targetfile = count($_FILES['photo']['name']);
            for ($i = 0; $i < $targetfile; $i++) {
                move_uploaded_file($_FILES['photo']['tmp_name'][$i], 'uploads/' . $_FILES['photo']['name'][$i]);
                $photo[]   = $_FILES['photo']['name'][$i];
                $photos1   = implode(',', $photo);
                $dataArray += ['photo' => $photos1];
            }


            if ($this->MenuModel->insertData('tbl_menu', $dataArray)) {
                $this->session->setFlashdata('create', '<div id="sessionAlert" class="alert alert-success">Menu Successfully Created</div>');
            } else {
                echo "Error";
            }
        }
        $data['menu']        = $this->MenuModel->getData('tbl_menu');
        $data['category']    = $this->MenuModel->getData('tbl_category');
        $data['subcategory'] = $this->MenuModel->getData('tbl_subcategory');

        return view('Admin/menu', $data);


    }

    public function edit($id)
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        if ($this->request->getPost()) {
            $dataArray = $this->request->getPost();
            if ($this->MenuModel->updateData('tbl_menu', 'menu_id', $id, $dataArray)) {
                $this->session->setFlashdata('update', '<div id="sessionAlert" class="alert alert-primary">Menu Successfully Updated</div>');
                return redirect()->to('menu');
            }
        }


    }

    public function edit_menu($id)
    {
        $data['category']    = $this->MenuModel->getData('tbl_category');
        $data['subcategory'] = $this->MenuModel->getData('tbl_subcategory');
        $data['values']      = $this->MenuModel->getWhere('tbl_menu', 'menu_id', $id);

        return view('Admin/edit_menu', $data);
    }

    public function delete($id)
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        if ($this->MenuModel->deleteData('tbl_menu', 'menu_id', $id)) {
            $this->session->setFlashdata('delete', '<div id="sessionAlert" class="alert alert-danger">Menu Successfully Deleted</div>');
            return redirect()->to('menu');
        }

    }

    function getsubcategory($id)
    {
        $subcatory = $this->MenuModel->getWhere('tbl_subcategory', 'category_id', $id);
        foreach ($subcatory as $value) {
            echo '<option value="' . $value->subcategory_id . '"}>' . $value->subcategory_name . '</option>';
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
