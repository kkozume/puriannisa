<?php

namespace App\Controllers;
use App\Models\LoginModel;

class Login extends BaseController
{
	public function __construct()
    {
		//  session_start();
        //load kelas LoginModel
        $this->LoginModel = new LoginModel();
        $this->db = db_connect();
        helper('form');
    }

	public function register()
    {
        //cek dulu apakah kondisi form sudah diisi atau belum, kalau belum berarti tidak perlu memanggil fungsi validasi
        if(isset($_POST['nama_pelanggan']) and 
            isset($_POST['jenis_kelamin']) and 
            isset($_POST['alamat']) and 
            isset($_POST['no_telp']) and
            isset($_POST['username']) and
            isset($_POST['pwd'])
            ){    
            $validation =  \Config\Services::validation();
                $id_pelanggan = $this->kode();
                $_SESSION['id_pelanggan'] = $id_pelanggan;
                //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
                if (!$this->validate([
                        'nama_pelanggan' => 'required|alpha_space|max_length[100]',
                        'jenis_kelamin' => 'required',
                        // 'alamat' => 'required',
                        'no_telp' => 'required',
                        'username' => 'required',
                        'pwd' => 'required'

                ],
                        [   // Errors
                            
                            'nama_pelanggan' => [
                                'required' => 'Nama tidak boleh kosong',
                                'alpha_space' =>'Nama harus alfabet',
                                'max_length' => 'Panjang karakter tidak lebih besar dari 100'
                            ],

                            'jenis_kelamin' => [
                                'required' => 'Jenis kelamin tidak boleh kosong', 
                            ],

                            // 'alamat' => [
                            //     'required' => 'Alamat tidak boleh kosong',    
                            // ],

                            'no_telp' => [
                                'required' => 'No telp tidak boleh kosong',
                                // 'numeric' => 'Nomor telp harus angka',
                                // 'is_natural' => 'Nomor telp harus dalam angka natural bukan minus (0 s/d 9)'
                            ],

                            'username' => [
                                'required' => 'Username tidak boleh kosong', 
                            ],

                            'pwd' => [
                                'required' => 'Password tidak boleh kosong', 
                            ]
                           
                        ]
                ))
                {                
                    //kirim data error ke views, karena ada isian yang tidak sesuai rules
                    echo view('purishop/login/register',[
                        'validation' => $this->validator,
                    ]);

                }else{

                    //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                    //panggil metod dari kategori model untuk diinputkan datanya
                    $hasil = $this->LoginModel->insertData();
                    if($hasil->connID->affected_rows>0){
                         return redirect()->to(base_url('Login'))->with('success', 'Data Register Anda berhasil disimpan');
                    }
                    // $data['pelanggan'] = $this->PelangganModel->getAll();
                    // echo view('pelanggan/daftarpelanggan', $data);
                }    
        }else{
        //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
        $id_pelanggan = $this->kode();
        $_SESSION['id_pelanggan'] = $id_pelanggan;
        echo view('purishop/login/register'); 
        }
    }

    public function kode()
    {
        $builder = $this->db->table('pelanggan')
        ->select('MAX(RIGHT(pelanggan.id_pelanggan,3)) as id_pelanggan')
        ->limit(1)
        ->get();
        if ($builder->getNumRows() <> 0 ) {
            # code... 
            $data = $builder->getRow();
            $id_pelanggan = intval($data->id_pelanggan) + 1;
        } else {
            $id_pelanggan = '001';
        }
        $kodemax = str_pad($id_pelanggan, 3, "0", STR_PAD_LEFT);
        $kd = "PL".$kodemax;
        // print_r($kd);exit;
        return $kd;
    }

	public function index()
    {
        $LoginModel = new \App\Models\LoginModel();
		$login = $this->request->getPost('login');
		if($login){
			$username = $this->request->getPost('username');
			$pwd = $this->request->getPost('pwd');
			if($username == '' or $pwd == ''){
				$err = "Silahkan masukan username dan password";
			}
			if(empty($err)){
				$datalogin = $LoginModel->where('username', $username)->first();
				if($datalogin['pwd']!= md5($pwd)){
					$err = "Password tidak sesuai";
				}
			}
			// if(empty($err)){
			// 	$datalogin = $AkunModel->where('pwd', $pwd)->first();
			// 	if($datalogin['username']!= $username){
			// 		$err = "Username tidak sesuai";
			// 	}
			// }
		if(empty($err)){
			$dataSesi = [
			'id_pelanggan' => $datalogin['id_pelanggan'],
			'nama_pelanggan' => $datalogin['nama_pelanggan'],
			'jenis_kelamin' => $datalogin['jenis_kelamin'],
			'alamat' => $datalogin['alamat'],
			'no_telp' => $datalogin['no_telp'],
			'username' => $datalogin['username'],
			'pwd' => $datalogin['pwd'],
			];
			session()->set($dataSesi);
			return redirect()->to('web')->with('success', 'Selamat, login berhasil!');
		}
			if($err){
				session()->setFlashdata('username', $username);
				session()->setFlashdata('error', $err);
				return redirect()->to('Login');
			}
		}
			// echo view('home');
            return view('purishop/login/login');
    }

    public function logout(){
		// session_destroy();
		session()->destroy();
		return redirect()->to(base_url('Login'));
	}

}