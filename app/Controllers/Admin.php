<?php

namespace App\Controllers;

use App\Models\CommonModel;

class Admin extends BaseController
{
    function __construct()
    {
        $this->CommonModel = new CommonModel();
        $this->session     = \Config\Services::session();
        $this->session->start();
    }

    public function login()
    {
        if ($this->session->get('user_id') != '') {
            return redirect()->to('dashboard');
        }
        if ($this->request->getPost()) {
            $dataArray = $this->request->getPost();
            $result    = $this->CommonModel->getDataWhere('tbl_user', $dataArray);
            if (count($result) > 0) {
                $sessionArray = ['user_id' => $result[0]->user_id, 'fullname' => $result[0]->fullname];
                $this->session->set($sessionArray);
                return redirect()->to('dashboard');
            } else {
                $this->session->setFlashdata('Error', '<div class="alert alert-danger">Invalid User</div>');
            }
        }
        return view('Admin/login');
    }

    public function dashboard()
    {
        if ($this->session->get('user_id') == '') {
            return redirect()->to('login');
        }
        return view('Admin/dashboard');

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
