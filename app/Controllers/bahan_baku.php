<?php
namespace App\Controllers;

use App\Models\bahanbakuModel;


class bahan_baku extends BaseController
{
    public function __construct()
    {
        //load kelas form input model
        $this->bahanbakuModel = new bahanbakuModel();
        // $this->KaryawanModel = new KaryawanModel();
       
        
    }
    public function index(){
        //cek apakah sudah diisi semua, jika kosong semua maka tidak perlu panggil validasi
        if( isset($_POST['nama_bahanbaku']) and 
            isset($_POST['satuan_bb']) and
            isset($_POST['qty_bb']) and 
            isset($_POST['harga_bb']) and
            isset($_POST['jenis_bb']) and
            isset($_POST['biaya_pesan']) and
            isset($_POST['biaya_simpan'])

        ){
            //jika sudah ada yang diisi berarti sudah diakses dan user memasukkan input, maka perlu memanggil validasi
            $validation =  \Config\Services::validation();
            //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
            if (! $this->validate(
                            [
                                'nama_bahanbaku'   => 'required|alpha_space',
                                'satuan_bb'  => 'required',
                                'qty_bb'  => 'required|is_natural',
                                'harga_bb'  => 'required',
                                'jenis_bb'   => 'required',
                                'biaya_pesan'   => 'required',
                                'biaya_simpan'   => 'required'

                            ],
                                    [   // Errors
                                        'nama_bahanbaku' => [
                                            'required' => 'nama bahan tidak boleh kosong',
                                            'alpha_space' => 'nama tidak boleh selain alphabet'
                                        ],
                                        'satuan_bb' => [
                                            'required' => 'satuan tidak boleh kosong'
                                        ],
                                        'qty_bb' => [
                                            'required' => 'qty tidak boleh kosong',
                                            'is_natural' => 'qty harus dalam angka'
                                        ],
                                        'harga_bb' => [
                                            'required' => 'harga tidak boleh kosong',                                            
                                        ],
                                        'jenis_bb' => [
                                            'required' => 'jenis bb  tidak boleh kosong'
                                        ],
                                        'biaya_pesan' => [
                                            'required' => 'biaya pesan tidak boleh kosong',
                                            
                                        ],
                                        'biaya_simpan' => [
                                            'required' => 'biaya simpan  tidak boleh kosong',
                                            
                                        ]

                                    ]
                   )
            ){
                //kembalikan list error ke views
                // echo view('HeaderBootstrap');
                // echo view('SidebarBootstrap');
                echo view('bahan_baku/inputbahan',[
                    'validation' => $this->validator,
                    // 'bahan_baku' => $this->bahanbakuModel->getAll(),
                    // 'karyawan' => $this->KaryawanModel->getAll(),
                ]);
            }else{
           
                $hasil = $this->bahanbakuModel->insertData();
                if($hasil->connID->affected_rows>0){
                    ?>
                    <script type="text/javascript">
                        alert("Sukses ditambahkan");
                    </script>
                    <?php   
                }
                $data['bahan_baku'] = $this->bahanbakuModel->getAll();
                // $data['karyawan'] = $this->KaryawanModel->getAll();
                    // echo view('HeaderBootstrap');
                    // echo view('SidebarBootstrap');
                    echo view('bahan_baku/daftarbahan', $data);
                }    
            }else{
            //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
        $data['bahan_baku'] = $this->bahanbakuModel->getAll();
        // echo view('HeaderBootstrap');
        // echo view('SidebarBootstrap');
        echo view('bahan_baku/inputbahan');
        }
    }


    public function daftarbahan(){
        $data['bahan_baku'] = $this->bahanbakuModel->getAll();
        // echo view('HeaderBootstrap');
        // echo view('SidebarBootstrap');
        echo view('bahan_baku/daftarbahan', $data);
    }
    
    public function editbahan($id_bahanbaku){
        $data['bahan_baku'] = $this->bahanbakuModel->editData($id_bahanbaku);
        // echo view('HeaderBootstrap');
        // echo view('SidebarBootstrap');
        echo view('bahan_baku/editbahan', $data);
    }
    public function editbahanproses(){
        $id_bahanbaku     = $_POST['id_bahanbaku'];
        $nama_bahanbaku  = $_POST['nama_bahanbaku'];
        $satuan_bb       = $_POST['satuan_bb'];
        $qty_bb       = $_POST['qty_bb'];
        $harga_bb     = $_POST['harga_bb'];
        $jenis_bb     = $_POST['jenis_bb'];
        $biaya_pesan   = $_POST['biaya_pesan'];
        $biaya_simpan   = $_POST['biaya_simpan'];
       
        $validation =  \Config\Services::validation();

        //jika input  diisi oleh user
        if( ! $this -> validate([
                    'nama_bahanbaku'   => 'required|alpha_space',
                    'satuan_bb'  => 'required',
                    'qty_bb'  => 'required|is_natural',
                    'harga_bb'  => 'required',
                    'jenis_bb'  => 'required',
                    'biaya_pesan'   => 'required',
                    'biaya_simpan'   => 'required'

                ],
                        [   // Errors
                            'nama_bahanbaku'  => [
                                'required' => 'nama bahan tidak boleh kosong',
                                'alpha_space' => 'nama bahan tidak boleh selain alphabet'
                            ],
                            'satuan_bb'  => [
                                'required' => 'satuan tidak boleh kosong'
                            ],
                            'qty_bb' => [
                                'required' => 'qty tidak boleh kosong',
                                'is_natural' => 'qty harus dalam angka'
                            ],
                            'harga_bb' => [
                                'required' => 'harga bb tidak boleh kosong',
                
                            ],
                            'jenis_bb' => [
                                'required' => 'jenis bb produk tidak boleh kosong'
                            ],
                            
                            'biaya_pesan'  => [
                                'required' => 'biaya pesan kelamin tidak boleh kosong',
        
                            ],
                            'biaya_simpan'  => [
                                'required' => 'biaya simpan kelamin tidak boleh kosong',
                
                            ]
                        ]
            ))
            {
          
        
            //kembalikan list error ke views
            // echo view('HeaderBootstrap');
            // echo view('SidebarBootstrap');
            echo view('bahan_baku/editbahan',[
                'validation' => $this->validator,
                'bahan_baku' => $this->bahanbakuModel->editData($id_bahanbaku),
                // $data['bahan_baku'] = $this->bahanbakuModel->getAll(),
            // $data['karyawan'] = $this->KaryawanModel->getAll(),
            ]);
        }else{
         
            //validasi tidak menemukan error sehingga bisa langsung di submit ke database
            //blok ini adalah blok jika sukses, yaitu panggil method insertData()
            $hasil = $this->bahanbakuModel->updateData();
            if($hasil->connID->affected_rows>0){
                ?>
                <script type="text/javascript">
                    alert("Sukses diupdate");
                </script>
                <?php   
            }
            $data['bahan_baku'] = $this->bahanbakuModel->getAll();
            // $data['karyawan'] = $this->KaryawanModel->getAll();
            // echo view('HeaderBootstrap');
            // echo view('SidebarBootstrap');
            echo view('bahan_baku/daftarbahan', $data); 
        }
    }
 

    public function deletebahan($id_bahanbaku){
        $this->bahanbakuModel->deleteData($id_bahanbaku);

        return redirect()->to(base_url('bahan_baku/daftarbahan')); 
    }
}