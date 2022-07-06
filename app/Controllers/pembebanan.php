<?php
namespace App\Controllers;

use App\Models\PembebananModel;

class Pembebanan extends BaseController
{
    public function __construct()
    {
        //session_start();
        $this->PembebananModel = new PembebananModel();
        helper('rupiah');
    }

	public function inputBeban()
	{
        // //tambahkan pengecekan login
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('home')); 
        // }

        if( !isset($_POST['nama']) and !isset($_POST['biaya']) and !isset($_POST['waktu']) ) {
            //tidak perlu divalidasi
            $data['pembebanan'] = $this->PembebananModel->getBebanData();
            // echo view('HeaderBootstrap');
            // echo view('SidebarBootstrap');
            echo view('pembebanan/inputBeban', $data);
        }else{
            $validation =  \Config\Services::validation();
            if (! $this->validate(
                    [
                        'nama' => 'required',
                        'biaya' => 'required',
                        'waktu' => 'required'
                    ],
                    [   // Errors
                        'namakosan' => [
                            'required' => 'Nama beban tidak boleh kosong'
                        ],
                        'biaya' => [
                            'required' => 'Besar biaya beban tidak boleh kosong'
                        ],
                        'waktu' => [
                            'required' => 'Tanggal beban tidak boleh kosong'
                        ]
                    ]
                )
            ){
                //maka kembalikan ke awal
                // echo view('HeaderBootstrap');
                // echo view('SidebarBootstrap');
                echo view('Pembebanan/inputBeban',[
                    'validation' => $this->validator,
                    'pembebanan' => $this->PembebananModel->getBebanData()
                ]);
            }else{
                //maka input database
                $hasil = $this->PembebananModel->inputBeban();
                if($hasil->connID->affected_rows>0){
                    ?>
                    <script type="text/javascript">
                        alert("Sukses menambahkan beban");
                    </script>
                    <?php	
                }
                $data['pembebanan'] = $this->PembebananModel->getListBeban();
                //maka kembalikan ke awal
                // echo view('HeaderBootstrap');
                // echo view('SidebarBootstrap');
                echo view('pembebanan/ListBeban', $data);
            }
        }

	}

    public function ListBeban()
    {
        $data['pembebanan'] = $this->PembebananModel->getListBeban();
        // echo view('HeaderBootstrap');
        // echo view('SidebarBootstrap');
        echo view('pembebanan/ListBeban', $data);
    }

    //menghapus data
    public function deletepembebanan($id_transaksi){
        // //tambahkan pengecekan login
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('home')); 
        // }

		$this->PembebananModel->deletepembebanan($id_transaksi);

		return redirect()->to(base_url('pembebanan/ListBeban')); 
	}
}