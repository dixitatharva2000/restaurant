<?php
namespace App\Controllers;

use App\Models\CategoryModel;

class Category extends BaseController
 
{
    
    function __construct()
    {
        $this->CategoryModel =new CategoryModel();

        $this->session = \Config\Services::session();

        $this->session->start();
    }

    function index(){

        if($this->session->get('user_id')==''){

            return redirect()->to('login');
        }

        if( $this->request->getPost()){

            $dataArray=$this->request->getPost();

            if($this->CategoryModel->insertData('tbl_category',$dataArray)){

                $this->session->setFlashdata('create','<div id="SessionAlert" class="alert alert-success">Successfully Added Category</div>');

            }else{

                echo "Error";
            }
        }

       $data['category']=$this->CategoryModel->getData('tbl_category');
        return view('Admin/category',$data);

    }

    function edit($id){

        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }

        if($this->request->getPost()){

            $dataArray=$this->request->getPost();
            if($this->CategoryModel->updateData('tbl_category','category_id',$id,$dataArray)){

                $this->session->setFlashdata('update', '<div id="sessionAlert" class="alert alert-primary">Restaurent Successfully Edited</div>');
                return redirect()->to('category');
            }
        }


    }

    function edit_category($id){

        $data['values']=$this->CategoryModel->getwhere('tbl_category','category_id',$id);
        return view('Admin/edit_category',$data);
    }

    public function delete($id)
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        if ($this->CategoryModel->deleteData('tbl_category', 'category_id', $id)) {
            $this->session->setFlashdata('delete', '<div id="sessionAlert" class="alert alert-danger">Category Successfully Deleted</div>');
            return redirect()->to('category');
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





?>