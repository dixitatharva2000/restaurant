<?php
namespace App\Controllers;

use App\Models\SubCategoryModel;
use App\Models\CategoryModel;


class SubCategory extends BaseController
 
{
    
    function __construct()
    {
        $this->SubCategoryModel =new SubCategoryModel();

        $this->session = \Config\Services::session();

        $this->session->start();

        $this->CategoryModel =new CategoryModel();
    }

    function index(){

        if($this->session->get('user_id')==''){

            return redirect()->to('login');
        }

        if( $this->request->getPost()){

            $dataArray=$this->request->getPost();

            //photo insert 
            $img = $this->request->getFile('photo');
            if ($img->isValid() && !$img->hasMoved()) {
                $photo = $img->getRandomName();
                $img->move(ROOTPATH . 'uploads', $photo);
            }
            $dataArray += ['photo' => $photo];


            if($this->SubCategoryModel->insertData('tbl_subcategory',$dataArray)){

                $this->session->setFlashdata('create','<div id="SessionAlert" class="alert alert-success">Successfully Added SubCategory</div>');

            }else{

                echo "Error";
            }
        }

        $data['subcategory']=$this->SubCategoryModel->getData('tbl_subcategory');
        $data['category'] = $this->SubCategoryModel->getData('tbl_category');

        return view('Admin/subcategory',$data);

    }

    function edit($id){

        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }

        if($this->request->getPost()){

            $dataArray=$this->request->getPost();

                //photo1
                $img=$this->request->getFile('photo');

                if($img->isValid() && ! $img->hasMoved()){

                    $photo= $img->getRandomName();

                    $img->move(ROOTPATH . 'uploads',$photo);

                }
                else{
                    $photo=$this->request->getPost('oldphoto');
                }
                $dataArray += ['photo' => $photo];

                
                unset($dataArray['oldphoto']);

                 if($this->SubCategoryModel->updateData('tbl_subcategory','subcategory_id',$id,$dataArray)){

                $this->session->setFlashdata('update', '<div id="sessionAlert" class="alert alert-primary">SubCategory Successfully Edited</div>');
                
                return redirect()->to('subcategory');
            }
        }


    }

    function edit_subcategory($id){

        $data['values']=$this->SubCategoryModel->getwhere('tbl_subcategory','subcategory_id',$id);
        $data['category']=$this->SubCategoryModel->getData('tbl_category');
        return view('Admin/edit_subcategory',$data);
    }

    public function delete($id)
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        if ($this->SubCategoryModel->deleteData('tbl_subcategory', 'subcategory_id', $id)) {
            $this->session->setFlashdata('delete', '<div id="sessionAlert" class="alert alert-danger">SubCategory Successfully Deleted</div>');
            return redirect()->to('subcategory');
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