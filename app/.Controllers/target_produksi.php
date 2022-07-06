<?php
namespace App\Controllers;

use App\Models\targetprodModel;

class target_produksi extends BaseController
{
	public function __construct()
    {
        //load kelas supplierModel
        $this->targetprodModel = new targetprodModel();
        //load helper
        $this->db = db_connect();
    }

    public function index()
	{

        //cek dulu apakah kondisi form sudah diisi atau belum, kalau belum berarti tidak perlu memanggil fungsi validasi
        if( 
        isset($_POST['id_target']) and 
        isset($_POST['nama_produk']) and 
        isset($_POST['target_produksi']) and 
        isset($_POST['periode_target'])
         ){
            
            $validation =  \Config\Services::validation();
            $id_target = $this->kode();
            $_SESSION['id_target']=$id_target;
                //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
                if (! $this->validate([
                        'id_target' => 'required',
                        'nama_produk' => 'required|alpha_space',
                        'target_produksi' => 'required|is_natural',
                        'periode_target' => 'required',
                ],
                        [   //erors
                            'id_target' => [
                                'required' => 'id_target tidak boleh kosong'
                              
                            ],
                            'nama_produk' => [
                                'required' => 'Nama produk tidak boleh kosong',
                                'alpha_space' => 'Nama produk tidak boleh selain alphabet'
                            ],
                            'target_produksi' => [
                                'required' => 'target tidak boleh kosong', 
                                'is_natural' => 'target harus dalam angka  (0 s/d 9)'
                            ],
                            'periode_target' => [
                                'required' => 'periode tidak boleh kosong',    
                            ]
                           
                        ]
                ))
                {                
                    // //kirim data error ke views, karena ada isian yang tidak sesuai rules
                    // echo view('HeaderBootstrap');
                    // echo view('SidebarBootstrap');
                    echo view('target_produksi/inputtargetprod',[
                        'validation' => $this->validator,
                    ]);

                }
                else
                {
                    $hasil = $this->targetprodModel->insertData();
                    if($hasil->connID->affected_rows>0){
                        ?>
                        <script type="text/javascript">
                            alert("Sukses ditambahkan");
                        </script>
                        <?php	
                    }
                    $data['target_produksi'] = $this->targetprodModel->getAll();
                    // echo view('HeaderBootstrap');
                    // echo view('SidebarBootstrap');
                    echo view('target_produksi/daftartargetprod', $data);
                }    
        }else{
        //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
        // echo view('HeaderBootstrap');
        // echo view('SidebarBootstrap');
        echo view('target_produksi/inputtargetprod'); 
	}
}
    public function edittargetprod($id_target){
        $data['target_produksi'] = $this->targetprodModel->editData($id_target);
        // echo view('HeaderBootstrap');
        // echo view('SidebarBootstrap');
        echo view('target_produksi/edittargetprod', $data);
    }

    public function edittargetproses(){
        $id_target= $_POST['id_target'];
        $nama_produk = $_POST['nama_produk'];
        $target_produksi = $_POST['target_produksi'];
        $periode_target = $_POST['periode_target'];
        
        $validation =  \Config\Services::validation();

        //jika input gambar diisi oleh user
        if( !$this->validate( [
                    'id_target' => 'required',
                    'nama_produk' => 'required|alpha_space',
                    'target_produksi' => 'required|is_natural',
                    'periode_target' => 'required'
                  
                ],
                        [   // Errors
                            'id_target' => [
                                'required' => 'id_target tidak boleh kosong'
                              
                            ],
                            'nama_produk' => [
                                'required' => 'Nama produk tidak boleh kosong',
                                'alpha_space' => 'Nama produk tidak boleh selain alphabet'
                               
                            ],
                            'target_produksi' => [
                                'required' => 'target produksi tidak boleh kosong',
                                'is_natural' => 'target harus dalam angka  (0 s/d 9)'
                               
                            ],
                            'periode_target' => [
                                'required' => 'periode target tidak boleh kosong', 
                            ]
                        ]
            ))
             {
         
            // echo view('HeaderBootstrap');
            // echo view('SidebarBootstrap');
            echo view('target_produksi/edittargetprod',[
                'validation' => $this->validator,
                'target_produksi' => $this->targetprodModel->editData($id_target)
            ]);

        } else{

            //validasi tidak menemukan error sehingga bisa langsung di submit ke database
            //blok ini adalah blok jika sukses, yaitu panggil method insertData()
            $hasil = $this->targetprodModel->updateData();
            if($hasil->connID->affected_rows>0){
                ?>
                <script type="text/javascript">
                    alert("Sukses diupdate");
                </script>
                <?php	
            }
            $data['target_produksi'] = $this->targetprodModel->getAll();
            // echo view('HeaderBootstrap');
            // echo view('SidebarBootstrap');
            echo view('target_produksi/daftartargetprod', $data); 
        }   
    }
    public function daftartargetprod(){
        $data['target_produksi'] = $this->targetprodModel->getAll();
        // echo view('HeaderBootstrap');
        // echo view('SidebarBootstrap');
        echo view('target_produksi/daftartargetprod', $data);
    }

    public function deletetargetprod($id_target){
		$this->targetprodModel->deleteData($id_target);

		return redirect()->to(base_url('target_prduksi/daftartargetprod')); 
	}

    public function kode()
    {
        $builder = $this->db->table('target_produksi')
        ->select('MAX(RIGHT(target_produksi.id_target,3)) as kode')
        ->where('status !=', 'proses')
        ->limit(1)
        ->get();
        if ($builder->getNumRows() <> 0 ) {
            # code... 
            $data = $builder->getRow();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = '001';
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kd = "TRG-".$kodemax;
        // print_r($kd);exit;
        return $kd;
    }


}