<?php
namespace App\Controllers;

use App\Models\PenjualanModel;
use App\Models\produkModel;

class Penjualan extends BaseController{
    public function __construct(){
		//session_start();
        $this->PenjualanModel = new PenjualanModel();
        $this->produkModel = new produkModel();
        helper('rupiah');
        $this->db = db_connect();
    }

    public function ListPenjualan(){
        helper('rupiah');
        //tambahkan pengecekan login
        /*if(!isset($_SESSION['nama'])){
            return redirect()->to(base_url('home')); 
        }*/

        $data['penjualan'] = $this->PenjualanModel->getAll();
        // echo view('HeaderBootstrap');
        // echo view('SidebarBootstrap');
        echo view('penjualan/ListPenjualan', $data);
    }

     public function daftarpenjualan(){
        helper('rupiah');
        //tambahkan pengecekan login
        /*if(!isset($_SESSION['nama'])){
            return redirect()->to(base_url('home')); 
        }*/

        $data['penjualan'] = $this->PenjualanModel->getAll();
        // echo view('HeaderBootstrap');
        // echo view('SidebarBootstrap');
        echo view('penjualan/daftarpenjualan', $data);
    }

    public function inputJual()
	{
        // //tambahkan pengecekan login
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('home')); 
        // }

        if(!isset($_POST['harga']) and !isset($_POST['tanggal'])) {
            //tidak perlu divalidasi
            $kode = $this->kode();
            $dtl = $this->db->query('SELECT a.*, nama_produk, c.status 
            FROM detail_penjualan1 a 
            join produk b on a.kode_produk = b.kode_produk 
            join penjualan c on c.id_penjualan = a.id_penjualan
            where c.status = "proses"
            ')->getResult();
            $cek_detil = $this->db->query("SELECT * from detail_penjualan1 where id_penjualan = '$kode' ");
            $total = $this->db->query("SELECT SUM(total) AS total FROM detail_penjualan1 WHERE id_penjualan = '$kode'")->getRow()->total;
            $pelanggan = $this->db->table('pelanggan')->get()->getResult();

            $data['penjualan'] = $this->PenjualanModel->getJualData();
            $data['kode'] = $kode;
            $data['produk'] = $this->db->table('produk')->get()->getResult();
            $data['list_detail'] = $dtl;
            $data['detil'] = $cek_detil;
            $data['total1'] = $total;
            $data['pelanggan'] = $pelanggan;
            // print_r($data['kode']);exit;
            // echo view('HeaderBootstrap');
            // echo view('SidebarBootstrap');
            echo view('Penjualan/inputJual', $data);
        }else{
            $validation =  \Config\Services::validation();
            if (! $this->validate(
                    [
                        'harga' => 'required',
                        'tanggal' => 'required'
                    ],
                    [   // Errors
                        'harga' => [
                            'required' => 'Harga produk tidak boleh kosong'
                        ],
                        'tanggal' => [
                            'required' => 'Tanggal tidak boleh kosong'
                        ]
                    ]
                )
            ){
                //maka kembalikan ke awal
                // echo view('HeaderBootstrap');
                // echo view('SidebarBootstrap');
                echo view('Penjualan/inputJual',[
                    'validation' => $this->validator,
                    'penjualan' => $this->PenjualanModel->getJualData()
                ]);
            }else{
                //maka input database
                $hasil = $this->PenjualanModel->inputJual();
                if($hasil->connID->affected_rows>0){
                    ?>
                    <script type="text/javascript">
                        alert("Sukses menambahkan Penjualan");
                    </script>
                    <?php	
                }
                $data['penjualan'] = $this->PenjualanModel->getListJual();
                //maka kembalikan ke awal
                // echo view('HeaderBootstrap');
                // echo view('SidebarBootstrap');
                echo view('Penjualan/ListJual', $data);
            }
        }

	}


     public function ListJual()
    {
        // $data['penjualan'] = $this->PenjualanModel->getListJual();
        $list = $this->db->query("SELECT a.*, id_pelanggan
        FROM penjualan a
        JOIN pelanggan b ON a.nama_pelanggan = b.id_pelanggan
        ")->getResult();
        $data['penjualan'] = $list;
        //echo view('HeaderBootstrap');
        // echo view('SidebarBootstrap');
        echo view('Penjualan/ListJual', $data);
    }

    public function detail_pnj()
	{
        $kode = $this->kode();
        $id_pnj = $this->request->getPost('id_pnj');
        $kode_produk = $this->request->getPost('produk');

        $cek_pnj = $this->db->query("SELECT * FROM penjualan WHERE status = 'proses' AND id_penjualan = '$id_pnj'");

        $produk = $this->db->query("SELECT * FROM produk WHERE kode_produk = '$kode_produk'")->getRow();
        $subtotal = $produk->harga * $this->request->getPost('jumlah');
        
        $cek_detil = $this->db->query("SELECT * from detail_penjualan1 where kode_produk ='$kode_produk' AND id_penjualan = '$id_pnj' ")->getRow();
        // print_r($cek_detil);exit;
        if ($cek_pnj->getNumRows() == 0) {
			$pnj = [
				'id_penjualan' => $id_pnj,
                'tanggal' => $this->request->getPost('tanggal'),
                'status' => 'proses',
			];
			$this->db->table('penjualan')->insert($pnj);

			$detil = [
				'id_penjualan' => $id_pnj,
                'kode_produk' => $kode_produk,
                'jumlah' => $this->request->getPost('jumlah'),
                'harga' => $produk->harga,
                'total' => $subtotal,
			];
			$this->db->table('detail_penjualan1')->insert($detil);
        } 
        else {
            if (empty($cek_detil->kode_produk)) {
                $detil = [
                    'id_penjualan' => $id_pnj,
                    'kode_produk' => $kode_produk,
                    'jumlah' => $this->request->getPost('jumlah'),
                    'harga' => $produk->harga,
                    'total' => $subtotal,
                ];
				$this->db->table('detail_penjualan1')->insert($detil);
            } 
            else {
                # code...
                $hasil = $cek_detil->jumlah + $this->request->getPost('jumlah');
                $update_harga = $hasil * $cek_detil->harga;

                $this->db->query("UPDATE detail_penjualan1 SET jumlah = '$hasil', total = '$update_harga' WHERE id_penjualan = '$id_pnj' AND kode_produk = '$kode_produk'");
            }
        }
        return redirect()->to(base_url('penjualan/inputJual'));
	}

    public function save_penjualan()
    {
        $id = $this->request->getPost('id');
        $pelanggan = $this->request->getPost('pelanggan');
        $total = $this->request->getPost('total');
		$data = [
			'nama_pelanggan' => $pelanggan,
            'total' => $total,
            'status' => 'selesai',
		];
		// $this->db->where('id_penjualan', $id);
		$update = $this->db->table('penjualan')
		->where('id_penjualan', $id)
		->update($data);

		if ($update) {
			# code...
			return redirect()->to(base_url('penjualan/ListJual'));
		}

		// return redirect(base_url('penjualan'));
    }

    public function kode()
    {
        $builder = $this->db->table('penjualan')
        ->select('MAX(RIGHT(penjualan.id_penjualan,3)) as kode')
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
        $kd = "PNJ-".$kodemax;
        // print_r($kd);exit;
        return $kd;
    }

    //menghapus data
    public function deletePenjualan($id_transaksi){
        //tambahkan pengecekan login
        /*if(!isset($_SESSION['nama'])){
            return redirect()->to(base_url('home'));
        }*/
        
		$this->PenjualanModel->deletePenjualan($id_transaksi);
		return redirect()->to(base_url('penjualan/ListPenjualan')); 
	}
}

/*public function index(){
        

        //cek dulu apakah kondisi form sudah diisi atau belum, kalau belum berarti tidak perlu memanggil fungsi validasi
        if(isset($_POST['nama_produk']) and
           isset($_POST['tanggal']) and
           isset($_POST['nama_pembeli']) and
           isset($_POST['jumlah']) and 
           isset($_POST['harga']) and
           isset($_POST['hpp']) and 
           isset($_POST['total']) 
           ){
                //
                $validation =  \Config\Services::validation();

                if (! $this->validate(
                        [
                            'nama_produk'   => 'required',
                            'tanggal'         => 'required',
                            'nama_pembeli'  => 'required',
                            'jumlah'        => 'required',
                            'harga'         => 'required',
                            'hpp'           => 'required',
                            'total'         => 'required'
                        ],
                        [   // Errors
                            'nama_produk' => [
                                'required' => 'Produk tidak boleh kosong'
                            ],
                            'tanggal' => [
                                'required' => 'Tanggal penjualan tidak boleh kosong'
                            ],
                            'nama_pembeli' => [
                                'required' => 'Nama pembeli tidak boleh kosong'
                            ],
                            'jumlah' => [
                                'required' => 'Jumlah produk yang dijual tidak boleh kosong'
                            ],
                            'harga' => [
                                'required' => 'Harga produk tidak boleh kosong'
                            ],
                            'hpp' => [
                                'required' => 'Harga Pokok Penjualan tidak boleh kosong'
                            ],
                            'total' => [
                                'required' => 'Laba tidak boleh kosong'
                            ]
                        ]
                ))
                {                
                    
                    // echo view('HeaderBootstrap');
                    // echo view('SidebarBootstrap');
                    echo view('penjualan/InputPenjualan',[
                        'validation' => $this->validator,
                        'produk'     => $this->produkModel->getAll()
                    ]);

                }
                else{
                    //panggil metod dari penjualan model untuk diinputkan datanya
                    $hasil = $this->PenjualanModel->catatPenjualan();
                    if($hasil->connID->affected_rows>0){
                        ?>
                        <script type="text/javascript">
                            alert("Sukses ditambahkan");
                        </script>
                        <?php	
                    }

                    $data['penjualan'] = $this->PenjualanModel->getAll();
                    $data['produk']    = $this->produkModel->getAll();

                    // echo view('HeaderBootstrap');
                    // echo view('SidebarBootstrap');
                    echo view('penjualan/ListPenjualan', $data);
                }    
                //
        }else{
                    //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
                    $data['produk'] = $this->produkModel->getAll();
                    // echo view('HeaderBootstrap');
                    // echo view('SidebarBootstrap');
                    echo view('penjualan/InputPenjualan', $data);
        }
	}
    */