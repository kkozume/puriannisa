<?php
namespace App\Controllers;

use App\Models\permintaanmodel;
use App\Models\bahanbakuModel;

class permintaan extends BaseController
{
	public function __construct()
    {
        //load kelas Model
        $this->permintaanmodel = new permintaanmodel();
        $this->bahanbakuModel = new bahanbakuModel();
    }

    public function index()
	{
        //cek dulu apakah kondisi form sudah diisi atau belum, kalau belum berarti tidak perlu memanggil fungsi validasi
        if(isset($_POST['id_permintaan']) and 
        isset($_POST['tgl_permintaan'])and
        isset($_POST['id_bahanbaku']) and
        isset($_POST['harga_permintaan'])and
        isset($_POST['qty_bb'])


        ){
            
            $validation =  \Config\Services::validation();
                //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
                if (! $this->validate([
                    'id_permintaan' => 'required',    
                    'tgl_permintaan' => 'required',
                    'id_bahanbaku' => 'required',
                    'harga_permintaan' => 'required',
                    'qty_bb' => 'required'
                    
                ],
                        [   // Errors
                            'id_permintaan' => [
                                'required' => 'no request tidak boleh kosong'  
                            ],
                            'tgl_permintaan' => [
                                'required' => 'tgl request tidak boleh kosong'
                            ],
                            'id_bahanbaku' => [
                                'required' => 'id bahanbaku tidak boleh kosong'
                            ],
                            'harga_permintaan' => [
                                'required' => 'harga permintaan tidak boleh kosong'
                            ],
                            'qty_bb' => [
                                'required' => 'qty bb tidak boleh kosong'
                            ]

                        ]
                ))
                {                
                    //kirim data error ke views, karena ada isian yang tidak sesuai rules
                    // echo view('home');
                    // echo view('layout/menu');
                    echo view('permintaan/inputpermintaan',[
                        'validation' => $this->validator,
                        'permintaan'=>$this->permintaanmodel->getAll(),
                        'bahan_baku' => $this->bahanbakuModel->getAll(),
                    ]);

                }
                else
                {
                    //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                    //panggil metod dari model safety untuk diinputkan datanya
                    $hasil = $this->permintaanmodel->insertData();
                    if($hasil->connID->affected_rows>0){
                        ?>
                        <script type="text/javascript">
                            alert("Sukses ditambahkan");
                        </script>
                        <?php	
                    }
                    $data['permintaan'] = $this->permintaanmodel->getAll2();
                    $data['bahan_baku'] = $this->bahanbakuModel->getAll();
                    echo view('permintaan/inputpermintaan', $data);
                    // echo view('safety/listsafety', $data);
                }    
        }else{
        //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
        // echo view('home');
        // echo view('layout/menu');
        $data['permintaan'] = $this->permintaanmodel->getAll();
        $data['bahan_baku'] = $this->bahanbakuModel->getAll();
        echo view('permintaan/inputpermintaan', $data);
	}
}



// public function inputsafety(){
//         $data['safety_stock'] = $this->safetymodel->getAll();
//         // echo view('home');
//         // echo view('layout/menu');
//         echo view('safety/listsafety', $data);
//     }
    
}