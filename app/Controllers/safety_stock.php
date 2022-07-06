<?php
namespace App\Controllers;

use App\Models\safetymodel;

class safety_stock extends BaseController
{
	public function __construct()
    {
        //load kelas Model
        $this->safetymodel = new safetymodel();
    }

    public function index()
	{
        //cek dulu apakah kondisi form sudah diisi atau belum, kalau belum berarti tidak perlu memanggil fungsi validasi
        if(isset($_POST['id_safety']) and 
        isset($_POST['tgl_safety'])and 
        isset($_POST['id_bahanbaku']) and
        isset($_POST['pemakaian_max'])and
        isset($_POST['pemakaian_min'])and
        isset($_POST['lead_time'])and
        isset($_POST['safety_stock'])


        ){
            
            $validation =  \Config\Services::validation();
                //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
                if (! $this->validate([
                    'id_safety' => 'required|is_unique[safety_stock.id_safety]',    
                    'tgl_safety' => 'required',
                    'id_bahanbaku' => 'required',
                    'pemakaian_max' => 'required|is_natural',
                    'pemakaian_min' => 'required|is_natural',
                    'lead_time' => 'required|is_natural',
                    'safety_stock' => 'required'
                    
                ],
                        [   // Errors
                            'id_safety' => [
                                'required' => 'id safety tidak boleh kosong',
                                'is_unique'=> 'id safety tidak boleh sama'

                            ],
                            'tgl_safety' => [
                                'required' => 'tgl safety tidak boleh kosong'
                            ],
                            'id_bahanbaku' => [
                                'required' => 'id bahanbaku tidak boleh kosong'
                            ],
                            'pemakaian_max' => [
                                'required' => 'pemakaian max tidak boleh kosong',
                                'is_natural' => 'pemakaian max harus dalam angka  (0 s/d 9)'
                            ],
                            'pemakaian_min' => [
                                'required' => 'pemakaian min tidak boleh kosong',
                                'is_natural' => 'pemakaian min harus dalam angka  (0 s/d 9)'
                            ],
                            'lead_time' => [
                                'required' => 'lead time tidak boleh kosong',
                                'is_natural' => 'lead time harus dalam angka  (0 s/d 9)'
                            ],
                            'safety_stock' => [
                                'required' => 'safety stock tidak boleh kosong'  
                            ]

                        ]
                ))
                {                
                    //kirim data error ke views, karena ada isian yang tidak sesuai rules
                    // echo view('home');
                    // echo view('layout/menu');
                    echo view('safety/inputsafety',[
                        'validation' => $this->validator,
                        'safety_stock'=>$this->safetymodel->getAll()
                    ]);

                }
                else
                {
                    //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                    //panggil metod dari model safety untuk diinputkan datanya
                    $hasil = $this->safetymodel->insertData();
                    if($hasil->connID->affected_rows>0){
                        ?>
                        <script type="text/javascript">
                            alert("Sukses ditambahkan");
                        </script>
                        <?php	
                    }
                    $data['safety_stock'] = $this->safetymodel->getAll();
                 
                    echo view('safety/inputsafety', $data);
                    // echo view('safety/listsafety', $data);
                }    
        }else{
        //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
        // echo view('home');
        // echo view('layout/menu');
        $data['safety_stock'] = $this->safetymodel->getAll();
        echo view('safety/inputsafety', $data);
	}
}



// public function inputsafety(){
//         $data['safety_stock'] = $this->safetymodel->getAll();
//         // echo view('home');
//         // echo view('layout/menu');
//         echo view('safety/listsafety', $data);
//     }
    
}