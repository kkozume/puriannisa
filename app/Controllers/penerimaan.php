<?php
namespace App\Controllers;

use App\Models\penerimaanmodel;
use App\Models\supplierModel;

class penerimaan extends BaseController
{
	public function __construct()
    {
        //load kelas ModelAkun
        $this->penerimaanmodel = new penerimaanmodel();
        $this->supplierModel = new supplierModel();

    }

    public function index()
	{
        //cek dulu apakah kondisi form sudah diisi atau belum, kalau belum berarti tidak perlu memanggil fungsi validasi
        if(isset($_POST['id_supplier'])){
            
            $validation =  \Config\Services::validation();
                //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
                if (! $this->validate([
                    'id_supplier' => 'required'
                ],
                        [   // Errors
                            'id_supplier' => [
                                'required' => 'id supplier tidak boleh kosong'
                            
                            ]
                        ]
                ))
                {                
                    //kirim data error ke views, karena ada isian yang tidak sesuai rules
                    // echo view('home');
                    // echo view('layout/menu');
                    echo view('penerimaan/inputpenerimaan',[
                        'validation' => $this->validator,
                        'penerimaan' => $this->penerimaanmodel->getAll(),
                        'supplierModel' => $this->supplierModel->getAll(),
                    ]);

                }
                else
                {
                    //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                    //panggil metod dari model akun untuk diinputkan datanya
                    $hasil = $this->penerimaanmodel->insertData();
                    if($hasil->connID->affected_rows>0){
                        ?>
                        <script type="text/javascript">
                            alert("Sukses ditambahkan");
                        </script>
                        <?php	
                    }
                    $data['penerimaan'] = $this->penerimaanmodel->getAll2();
                    $data['supplier'] = $this->supplierModel->getAll();
                    echo view('penerimaan/daftarpenerimaan', $data);
                }    
        }else{
        //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
        // echo view('home');
        // echo view('layout/menu');
        echo view('penerimaan/inputpenerimaan'); 
	}
}

    // public function daftarakun(){
    //     $data['akun'] = $this->ModelAkun->getAll();
    //     // echo view('home');
    //     // echo view('layout/menu');
    //     echo view('akun/daftarakun', $data);
    // }

    
}