<?php

namespace App\Controllers;

use App\Models\CommonModel;

class Home extends BaseController
{
    function __construct()
    {
        $this->CommonModel = new CommonModel();
        $this->session     = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        return view('Home/index');
    }

    public function menus()
    {
        return view('Home/menus');
    }


}
