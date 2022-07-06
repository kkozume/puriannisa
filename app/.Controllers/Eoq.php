<?php
namespace App\Controllers;

use App\Models\EoqModel;
use App\Models\targetprodModel;
use App\Models\bahanbakuModel;

class Eoq extends BaseController
{
	public function __construct()
    {
        //load kelas ModelAkun
        $this->EoqModel = new EoqModel();
        $this->targetprodModel = new targetprodModel();
        $this->bahanbakuModel = new bahanbakuModel();

    }

    public function index()
	{
        //cek dulu apakah kondisi form sudah diisi atau belum, kalau belum berarti tidak perlu memanggil fungsi validasi
        if(isset($_POST['kode_eoq']) and 
        isset($_POST['nama_bahanbaku']) and 
        isset($_POST['target_produksi'])and 
        isset($_POST['satuan_bb']) and
        isset($_POST['safety_stock']) and
        isset($_POST['reorder_point']) and
        isset($_POST['eoq']) and
        isset($_POST['biaya_optimal']) 
        ){
            
            $validation =  \Config\Services::validation();
                //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
                if (! $this->validate([
                    'kode_eoq' => 'required',    
                    'nama_bahanbaku' => 'required',
                    'target_produksi' => 'required',
                    'satuan_bb' => 'required',
                    'safety_stock' => 'required',
                    'reorder_point' => 'required',
                    'eoq' => 'required',
                    'biaya_optimal' => 'required',
                ],
                        [   // Errors
                            'kode_eoq' => [
                                'required' => 'Kode eoq tidak boleh kosong'
                            ],
                            'nama_bahanbaku' => [
                                'required' => 'Nama bahanbaku tidak boleh kosong' 
                            ],
                            'target_produksi' => [
                                'required' => 'Target Produksi tidak boleh kosong' 
                            ],
                            'satuan_bb' => [
                                'required' => 'Satuan tidak boleh kosong' 
                            ],
                            'safety_stock' => [
                                'required' => 'Safety stock tidak boleh kosong' 
                            ],
                            'reorder_point' => [
                                'required' => 'Reorder Point tidak boleh kosong' 
                            ],
                            'eoq' => [
                                'required' => 'EOQ tidak boleh kosong' 
                            ],
                            'biaya_optimal' => [
                                'required' => 'Biaya Optimal tidak boleh kosong' 
                            ]
                        ]
                ))
                {                
                    //kirim data error ke views, karena ada isian yang tidak sesuai rules
                    // echo view('home');
                    // echo view('layout/menu');
                    echo view('Eoq/DaftarEoq',[
                        'validation' => $this->validator,
                    ]);

                }
                else
                {
                    //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                    //panggil metod dari model akun untuk diinputkan datanya
                    $hasil = $this->EoqModel->insertData();
                    if($hasil->connID->affected_rows>0){
                        ?>
                        <script type="text/javascript">
                            alert("Sukses ditambahkan");
                        </script>
                        <?php	
                    }
                    $data['eoq'] = $this->EoqModel->getAll();
                 
                    echo view('Eoq/DaftarEoq', $data);
                }    
        }else{
        //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
        // echo view('home');
        // echo view('layout/menu');
        echo view('Eoq/DaftarEoq'); 
	}
}

    public function daftareoq(){
        $data['Eoq'] = $this->EoqModel->getAll();
        $data['AmbilEoq'] = $this->EoqModel->getDataEoq1();

        // print_r($data);exit;
        // echo view('home');
        // echo view('layout/menu');
        echo view('Eoq/DaftarEoq', $data);
    }


}