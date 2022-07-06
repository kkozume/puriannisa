<?php
namespace App\Controllers;

use App\Models\KaryawanModel;

class karyawan extends BaseController
{
	public function __construct()
    {
        //load kelas KaryawanModel
        $this->KaryawanModel = new KaryawanModel();
        //load helper
    }

    public function index()
	{

        //cek dulu apakah kondisi form sudah diisi atau belum, kalau belum berarti tidak perlu memanggil fungsi validasi
        if( isset($_POST['nama_karyawan'])and 
            isset($_POST['tgl_lahir']) and 
            isset($_POST['jenis_kelamin']) and 
            isset($_POST['no_telp'])and 
            isset($_POST['alamat']) and 
            isset($_POST['jabatan']) and 
            !isset($_POST['gambar'])){
            
            $validation =  \Config\Services::validation();
                //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
                if (! $this->validate([
                        'nama_karyawan' => 'required',
                        'tgl_lahir' => 'required',
                        'jenis_kelamin' => 'required',
                        'no_telp' => 'required',
                        'alamat' => 'required',
                        'jabatan' => 'required',
                        'gambar' => [
                            'uploaded[gambar]',
                            'mime_in[gambar,image/jpg,image/jpeg,image/png]', //dibatasi hanya jpg, jpeg, png
                            'max_size[gambar,10024]' //maksimal 1 M
                        ]
                ],
                        [   // Errors
                            'nama_karyawan' => [
                                'required' => 'Nama karyawan tidak boleh kosong'
                            ],
                            'tgl_lahir' => [
                                'required' => 'Tanggal lahir tidak boleh kosong' 
                            ],
                            'jenis_kelamin' => [
                                'required' => 'Jenis kelamin tidak boleh kosong'  
                            ],
                            'no_telp' => [
                                'required' => 'Nomor telepon tidak boleh kosong',
                                // 'numeric' => 'Nomor telepon harus angka',
                                // 'max_length' => 'Panjang karakter tidak lebih besar dari 17'   
                            ],
                            'alamat' => [
                                'required' => 'Alamat tidak boleh kosong'  
                            ],
                            'jabatan' => [
                                'required' => 'Jabatan tidak boleh kosong'
                            ]
                        ]
                ))
                {                
                    //kirim data error ke views, karena ada isian yang tidak sesuai rules
                   // echo view('HeaderBootstrap');
                    //echo view('SidebarBootstrap');
                    echo view('karyawan/Inputkaryawan',[
                        'validation' => $this->validator,
                    ]);

                }
                else
                {
                     //proses upload file ke server dulu
                    //memberi nama file dengan nama random, agar tidak terjadi duplikasi data atau data terreplace karena sudah ada
                     $fileName = uniqid();

                    //mendapatkan nama file asli untuk gambar
                    $namafileasli = $_FILES['gambar']['name'];
                    $pos = explode(".",$namafileasli ); //mencacah nama file menjadi array dengan pemisah .
                    $ekstensi_file_gbr_asli = $pos[count($pos)-1]; //mendapatkan hasil array yang paling akhir
                    $gambar = $fileName.'.'.$ekstensi_file_gbr_asli;

                    //mengupload ke server ke lokasi public/images/upload
                    $avatar = $this->request->getFile('gambar');
                    $avatar->move(ROOTPATH.'public/images/upload', $gambar); //namafile u12adsasds + . + jpg

                    //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                    //panggil metod dari kategori model untuk diinputkan datanya
                    $hasil = $this->KaryawanModel->insertData($gambar);
                    if($hasil->connID->affected_rows>0){
                        ?>
                        <script type="text/javascript">
                            alert("Sukses ditambahkan");
                        </script>
                        <?php	
                    }
                    $data['karyawan'] = $this->KaryawanModel->getAll();
                  //  echo view('HeaderBootstrap');
                  //  echo view('SidebarBootstrap');
                    echo view('karyawan/daftarkaryawan', $data);
                }    
        }else{
        //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
		$data['karyawan'] = $this->KaryawanModel->getAll();
        //echo view('HeaderBootstrap');
        //echo view('SidebarBootstrap');
        echo view('karyawan/Inputkaryawan'); 
	}
}

    public function editkaryawan($id_karyawan){
        $data['karyawan'] = $this->KaryawanModel->editData($id_karyawan);
		//$data['bahan_baku'] = $this->bahanbakuModel->editData($id_bahanbaku);
      // echo view('HeaderBootstrap');
      //  echo view('SidebarBootstrap');
        echo view('karyawan/editkaryawan', $data);
    }

    public function editkaryawanproses(){
		$id_karyawan= $_POST['id_karyawan'];
        $data['karyawan'] = $this->KaryawanModel->editData($id_karyawan);

        foreach($data['karyawan'] as $row):
            $gambar = $row->gambar;
        endforeach;
		
        
        $nama_karyawan = $_POST['nama_karyawan'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        $jabatan = $_POST['jabatan'];
        $gambar_lama = !isset($_POST['old_gambar'])? $gambar :$_POST['old_gambar']; //menyimpan nilai lama gambar
		//$ktp_lama    = !isset( $_POST['old_ktp']))? $ktp :$_POST['old_ktp'];
		//$gambar_lama = !isset($_POST['old_gambar']); //menyimpan nilai lama gambar
        
        $validation =  \Config\Services::validation();

        //jika input gambar diisi oleh user
        if( !empty($_FILES["gambar"]["name"])){
            $input = $this->validate(
                [
                    'nama_karyawan' => 'required',
                    'tgl_lahir' => 'required',
                    'jenis_kelamin' => 'required',
                    'no_telp' => 'required',
                    'alamat' => 'required',
                    'jabatan' => 'required',
                    'gambar' => [
                        'uploaded[gambar]',
                        'mime_in[gambar,image/jpg,image/jpeg,image/png]', //dibatasi hanya jpg, jpeg, png
                        'max_size[gambar,10024]' //maksimal 1 M
                    ]
                ],
                        [   // Errors
                            'nama_karyawan' => [
                                'required' => 'Nama karyawan tidak boleh kosong'
                            ],
                            'tgl_lahir' => [
                                'required' => 'Tanggal lahir tidak boleh kosong' 
                            ],
                            'jenis_kelamin' => [
                                'required' => 'Jenis kelamin tidak boleh kosong'  
                            ],
                            'no_telp' => [
                                'required' => 'Nomor telepon tidak boleh kosong',
                                // 'numeric' => 'Nomor telepon harus angka',
                                // 'max_length' => 'Panjang karakter tidak lebih besar dari 17'   
                            ],
                            'alamat' => [
                                'required' => 'Alamat tidak boleh kosong'  
                            ],
                            'jabatan' => [
                                'required' => 'Jabatan tidak boleh kosong'
                            ]
                        ]
            );
        }else{
            $input = $this->validate(
                [
                    'nama_karyawan' => 'required',
                    'tgl_lahir' => 'required',
                    'jenis_kelamin' => 'required',
                    'no_telp' => 'required',
                    'alamat' => 'required',
                    'jabatan' => 'required'
                ],
                        [   // Errors
                            'nama_karyawan' => [
                                'required' => 'Nama karyawan tidak boleh kosong'
                            ],
                            'tgl_lahir' => [
                                'required' => 'Tanggal lahir tidak boleh kosong' 
                            ],
                            'jenis_kelamin' => [
                                'required' => 'Jenis kelamin tidak boleh kosong'  
                            ],
                            'no_telp' => [
                                'required' => 'Nomor telepon tidak boleh kosong'
                                // 'numeric' => 'Nomor telepon harus angka' 
                            ],
                            'alamat' => [
                                'required' => 'Alamat tidak boleh kosong'  
                            ],
                            'jabatan' => [
                                'required' => 'Jabatan tidak boleh kosong'
                            ]
                        ]
            );
        }
        
         ///////////////
         if (! $input)
         {                
            
         //   echo view('HeaderBootstrap');
         //   echo view('SidebarBootstrap');
            echo view('karyawan/editkaryawan',[
                'validation' => $this->validator,
                'karyawan' => $this->KaryawanModel->editData($id_karyawan)
            ]);

        }
        else{
            //proses upload file ke server dulu
            //memberi nama file dengan nama random, agar tidak terjadi duplikasi data atau data terreplace karena sudah ada
            $fileName = uniqid();

            //cek apakah file dokumen diupdate
            if(!empty($_FILES["gambar"]["name"])){
                //mendapatkan nama file asli untuk gambar
                $namafileasli = $_FILES['gambar']['name'];
                $pos = explode(".",$namafileasli ); //mencacah nama file menjadi array dengan pemisah .
                $ekstensi_file_gbr_asli = $pos[count($pos)-1]; //mendapatkan hasil array yang paling akhir
                $gbr = $fileName.'.'.$ekstensi_file_gbr_asli;

                //mengupload ke server ke lokasi public/images/upload
                $avatar = $this->request->getFile('gambar');
                $avatar->move(ROOTPATH.'public/images/upload', $gbr); //namafile u12adsasds + . + jpg
            }else{
                $gbr = $gambar_lama;
            }
            }

            //validasi tidak menemukan error sehingga bisa langsung di submit ke database
            //blok ini adalah blok jika sukses, yaitu panggil method insertData()
            $hasil = $this->KaryawanModel->updateData($gbr);
            if($hasil->connID->affected_rows>0){
                ?>
                <script type="text/javascript">
                    alert("Sukses diupdate");
                </script>
                <?php	
            }
            $data['karyawan'] = $this->KaryawanModel->getAll();
         //   echo view('HeaderBootstrap');
         //   echo view('SidebarBootstrap');
            echo view('karyawan/daftarkaryawan', $data); 
        }   

    public function daftarkaryawan(){
        $data['karyawan'] = $this->KaryawanModel->getAll();
        //echo view('HeaderBootstrap');
        //echo view('SidebarBootstrap');
        echo view('karyawan/daftarkaryawan', $data);
    }

    public function deletekaryawan($id_karyawan){
		$this->KaryawanModel->deleteData($id_karyawan);

		return redirect()->to(base_url('karyawan/daftarkaryawan')); 
	}
}
