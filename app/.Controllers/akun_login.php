<?php

namespace App\Controllers;

class akun_login extends BaseController

{
    public function index()
    {
        return view('akunlogin_view');

    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

}

//ini member
//viewnya akunlogin_view