<?php

namespace App\Controllers;
use App\Models\AkunModel;

class Auth extends BaseController
{
	public function __construct()
    {
		//  session_start();
        //load kelas AkunModel
        $this->AkunModel = new AkunModel();
    }

	public function cek(){
		// $adminlogin = $this->AkunModel->adminlogin();
		$nama = $this->request->getPost('nama');
		$pass = $this->request->getPost('pass');
		echo '<pre>';
		print_r($nama);exit;
		
		echo '<pre>';
	}

    public function index()
	{
		$AkunModel = new \App\Models\AkunModel();
		$login = $this->request->getPost('login');
		if($login){
			$username = $this->request->getPost('username');
			$pwd = $this->request->getPost('pwd');
			if($username == '' or $pwd == ''){
				$err = "Silahkan masukan username dan password";
			}
			// elseif($username!= $data['username']){
			// 	$err = "Username tidak sesuai";
			// }
			if(empty($err)){
				$datalogin = $AkunModel->where('username', $username)->first();
				if($datalogin['pwd']!= md5($pwd)){
					$err = "Password tidak sesuai";
				}
			}
		
		if(empty($err)){
			$dataSesi = [
			'id' => $datalogin['id'],
			'username' => $datalogin['username'],
			'pwd' => $datalogin['pwd'],
			'last_login' => $datalogin['last_login'],
			'user_group' => $datalogin['user_group'],
			];
			session()->set($dataSesi);
			return redirect()->to('home')->with('success', 'Selamat, login berhasil!');
		}
			if($err){
				session()->setFlashdata('username', $username);
				session()->setFlashdata('error', $err);
				return redirect()->to("auth");
			}
		}
			// echo view('home');
			return view('auth/login_app');
	}
	
}



















