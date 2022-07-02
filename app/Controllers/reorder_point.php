<?php
namespace App\Controllers;

use App\Models\reordermodel;

class reorder_point extends BaseController
{
	public function __construct()
    {
        //load kelas Model
        $this->reordermodel = new reordermodel();
    }

    public function index()
	{
        //cek dulu apakah kondisi form sudah diisi atau belum, kalau belum berarti tidak perlu memanggil fungsi validasi
        if(isset($_POST['id_reorder']) and 
        isset($_POST['tgl_reorder'])and 
        isset($_POST['id_bahanbaku']) and
        isset($_POST['pemakaian_rata'])and
        isset($_POST['lead_time'])and
        isset($_POST['safety_stock']) and
        isset($_POST['reorder_point']) 


        ){
            
            $validation =  \Config\Services::validation();
                //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
                if (! $this->validate([
                    'id_reorder' => 'required|is_unique[reorder_point.id_reorder]',    
                    'tgl_reorder' => 'required',
                    'id_bahanbaku' => 'required',
                    'pemakaian_rata' => 'required|is_natural',
                    'lead_time' => 'required|is_natural',
                    'safety_stock' => 'required|is_natural',
                    'reorder_point' => 'required'
                    
                ],
                        [   // Errors
                            'id_reorder' => [
                                'required' => 'id reorder tidak boleh kosong',
                                'is_unique'=> 'id reorder tidak boleh sama' 
                            ],
                            'tgl_reorder' => [
                                'required' => 'tgl reorder tidak boleh kosong'
                            ],
                            'id_bahanbaku' => [
                                'required' => 'id bahanbaku tidak boleh kosong'
                            ],
                            'pemakaian_rata' => [
                                'required' => 'pemakaian rata tidak boleh kosong',
                                'is_natural' => 'pemakaian rata harus dalam angka  (0 s/d 9)'
                            ],
                            'lead_time' => [
                                'required' => 'lead time tidak boleh kosong',
                                'is_natural' => 'lead time harus dalam angka  (0 s/d 9)'
                            ],
                            'safety_stock' => [
                                'required' => 'safety stock tidak boleh kosong' ,
                                'is_natural' => 'safety stock harus dalam angka  (0 s/d 9)' 
                            ],
                            'reorder_point'=> [
                                'required' => 'reorder point tidak boleh kosong'
                            ]
                        
                        ]
                ))
                {                
                    //kirim data error ke views, karena ada isian yang tidak sesuai rules
                    // echo view('home');
                    // echo view('layout/menu');
                    echo view('reorder/inputreorder',[
                        'validation' => $this->validator,
                        'reorder_point'=>$this->reordermodel->getAll()
                    ]);

                }
                else
                {
                    //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                    //panggil metod dari model safety untuk diinputkan datanya
                    $hasil = $this->reordermodel->insertData();
                    if($hasil->connID->affected_rows>0){
                        ?>
                        <script type="text/javascript">
                            alert("Sukses ditambahkan");
                        </script>
                        <?php	
                    }
                    $data['reorder_point'] = $this->reordermodel->getAll();
                 
                    echo view('reorder/inputreorder', $data);
                    // echo view('reorder/listreorder', $data);
                }    
        }else{
        //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
        // echo view('home');
        // echo view('layout/menu');
        $data['reorder_point']=$this->reordermodel->getAll();
        echo view('reorder/inputreorder',$data);

	}
}

// public function inputreorder(){
//         $data['reorder_point'] = $this->reordermodel->getAll();
//         // echo view('home');
//         // echo view('layout/menu');
//         echo view('reorder/listreorder', $data);
//     }
    
}