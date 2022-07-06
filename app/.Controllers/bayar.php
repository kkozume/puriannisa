<?php
namespace App\Controllers;

use App\Models\bayarmodel;
use App\Models\belimodel;


class bayar extends BaseController
{
    public function __construct()
    {
        // session_start();
        $this->bayarmodel = new bayarmodel();
        $this->belimodel = new belimodel();
        // $        helper('rupiah');
        $this->db = db_connect();
    }

	public function inputBayar()
	{
        // //tambahkan pengecekan login
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('home')); 
        // }

        if(!isset($_POST['harga_bb']) and !isset($_POST['waktu'])) {
            //tidak perlu divalidasi
            $kode = $this->kode();
            $dtl = $this->db->query('SELECT a.*, nama_bahanbaku, c.status
            FROM detail_pembayaran a 
            join bahan_baku b on a.id_bahanbaku = b.id_bahanbaku 
            join bayar c on c.id_pembayaran = a.id_pembayaran
            -- join permintaan d on d.id_permintaan = c.id_permintaan
            where c.status = "proses"
            ')->getResult();
            $cek_detil = $this->db->query("SELECT * from detail_pembayaran where id_pembayaran = '$kode' ");
            $total = $this->db->query("SELECT SUM(total) AS total FROM detail_pembayaran WHERE id_pembayaran = '$kode'")->getRow()->total;
            $supplier = $this->db->table('supplier')->get()->getResult();

            $data['bayar'] = $this->belimodel->getBeliData();
            $data['detail_pembelian'] = $this->belimodel->getPermintaan();
            $data['kode'] = $kode;
            $data['bahan_baku'] = $this->db->table('bahan_baku')->get()->getResult();
            $data['list_detail'] = $dtl;
            $data['detil'] = $cek_detil;
            $data['total1'] = $total;
            $data['supplier'] = $supplier;
            // print_r($data['kode']);exit;
            // echo view('HeaderBootstrap');
            // echo view('SidebarBootstrap');
            echo view('bayar/inputbayar', $data);
        }else{
            $validation =  \Config\Services::validation();
            if (! $this->validate(
                    [
                        'harga_bb' => 'required',
                        'waktu' => 'required'
                    ],
                    [   // Errors
                        'harga_bb' => [
                            'required' => 'Harga bahanbaku tidak boleh kosong'
                        ],
                        'waktu' => [
                            'required' => 'Tanggal tidak boleh kosong'
                        ]
                    ]
                )
            ){
                //maka kembalikan ke awal
                // echo view('HeaderBootstrap');
                // echo view('SidebarBootstrap');
                echo view('bayar/inputbayar',[
                    'validation' => $this->validator,
                    'bayar' => $this->bayarmodel->getBeliData(),
                    'detail_pembelian'=> $this->belimodel->getPermintaan(),
                ]);
            }else{
                //maka input database
                $hasil = $this->bayarmodel->inputbayar();
                if($hasil->connID->affected_rows>0){
                    ?>
                    <script type="text/javascript">
                        alert("Sukses menambahkan Pembayaran");
                    </script>
                    <?php	
                }
                $data['bayar'] = $this->bayarmodel->getListBeli();
                $data['detail_pembelian'] = $this->bayarmodel->getPermintaan();
                // $data['permintaan'] = $this->permintaanmodel->getListBeli2();
                //maka kembalikan ke awal
                // echo view('HeaderBootstrap');
                // echo view('SidebarBootstrap');
                echo view('bayar/listbayar', $data);
            }
        }

	}

    public function ListBayar()
    {
        // $data['Pembelian'] = $this->PembelianModel->getListBeli();
        $list = $this->db->query("SELECT a.*, nama_suplier
        FROM bayar a
        JOIN supplier b ON a.id_supplier = b.id_supplier
        ")->getResult();
        $data['bayar'] = $list;
        // echo view('HeaderBootstrap');
        // echo view('SidebarBootstrap');
        echo view('bayar/listbayar', $data);
    }
    

    public function detail_byr()
	{
        $kode = $this->kode();
        $id_byr = $this->request->getPost('id_byr');
        $id_pembelian = $this->request->getPost('id_pembelian');
        $kode_produk = $this->request->getPost('produk');


        $cek_byr = $this->db->query("SELECT * FROM pembeli WHERE status = 'proses' AND id_pembelian = '$id_byr'");

        $id_pembelian = $this->db->query("SELECT * FROM detail_pembelian WHERE id_pembelian = 'id_pembelian'")->getRow();

        $produk = $this->db->query("SELECT * FROM bahan_baku WHERE id_bahanbaku = '$kode_produk'")->getRow();
        $subtotal = $produk->harga_bb * $this->request->getPost('jumlah');
        
        $cek_detil = $this->db->query("SELECT * from detail_pembayaran where id_bahanbaku ='$kode_produk' AND id_pembayaran = '$id_byr' ")->getRow();
        // print_r($cek_detil);exit;
        if ($cek_byr->getNumRows() == 0) {
			$byr = [
                'id_pembayaran' => $id_byr,
				'id_pembelian' => $this->request->getPost('id_pembelian'),
                'tanggal' => $this->request->getPost('tanggal'),
                'status' => 'proses',
			];
			$this->db->table('bayar')->insert($byr);

			$detil = [
				'id_pembayaran' => $id_byr,
                'id_pembelian' => $this->request->getPost('id_pembelian'),
                'id_bahanbaku' => $kode_produk,
                'jumlah' => $this->request->getPost('jumlah'),
                'harga_bb' => $produk->harga_bb,
                'total' => $subtotal,
			];
			$this->db->table('detail_pembayaran')->insert($detil);
        } 
        else {
            if (empty($cek_detil->id_bahanbaku)) {
                $detil = [
                    'id_pembayaran' => $id_byr,
                    'id_pembelian' => $this->request->getPost('id_pembelian'),
                    'id_bahanbaku' => $kode_produk,
                    'jumlah' => $this->request->getPost('jumlah'),
                    'harga_bb' => $produk->harga_bb,
                    'total' => $subtotal,
                ];
				$this->db->table('detail_pembayaran')->insert($detil);
            } 
            else {
                # code...
                $hasil = $cek_detil->jumlah + $this->request->getPost('jumlah');
                $update_harga = $hasil * $cek_detil->harga_bb;

                $this->db->query("UPDATE detail_Pembayaran SET jumlah = '$hasil', total = '$update_harga' WHERE id_pembayaran = '$id_byr' AND id_bahanbaku = '$kode_produk'");
            }
        }
        return redirect()->to(base_url('pembelian/inputBeli'));
	}

    public function tambah_pembelian()
    {
        $id_pembelian = $this->request->getPost('id_pembelian');
        $id_byr = $this->request->getPost('id_byr');
        $tanggal = $this->request->getPost('tanggal');
        $kode = $this->kode();
        $detail = $this->db->query("SELECT * 
        FROM detail_pembelian a 
        JOIN bahan_baku b on a.id_bahanbaku = b.id_bahanbaku
        WHERE a.id_pembelian = '$id_pembelian'")->getResult();
        $total_trans = $this->db->query("SELECT SUM(total) as total_trans
        FROM detail_pembelian a 
        JOIN bahan_baku b on a.id_bahanbaku = b.id_bahanbaku
        WHERE a.id_pembelian = '$id_permintaan'")->getRow()->total_trans;
        $supplier = $this->db->table('supplier')->get()->getResult();
        $data = [
            'id_pembelian' => $id_pembelian,
            'id_byr' => $id_byr,
            'tanggal' => $tanggal,
            'kode' => $kode,
            'detail' => $detail,
            'total_trans' => $total_trans,
            'supplier' => $supplier,
        ];
        $this->detail_pembayaran($data);
    }

    public function detail_pembayaran($data = array())
    {
        echo view('bayar/detail_bayar', $data);
    }

    public function simpan_pembayaran()
    {
        $id_pembelian = $this->request->getPost('id_pembelian');
        $id_byr = $this->request->getPost('id_byr');
        $tanggal = $this->request->getPost('tanggal');
        $supplier = $this->request->getPost('supplier');
        $total_trans = $this->request->getPost('total_trans');

        $id_barang = $this->request->getPost('id_barang');
        $jumlah1 = $this->request->getPost('jumlah1');
        $harga_bb1 = $this->request->getPost('harga_bb1');
        $subtot = $this->request->getPost('subtot');
        $res = [];
        for ($i=0; $i < count($id_barang) ; $i++) { 
            $res[] = [
                'id_pembayaran' => $id_byr, 
                'id_bahanbaku' => $id_barang[$i],
                'jumlah' => $jumlah1[$i],
                'harga_bb' => $harga_bb1[$i],
                'total' => $subtot[$i],
                'id_pembelian' => $id_pembelian,
            ];
        }
        $this->db->table('detail_pembayaran')->insertBatch($res);

        $data = [
            'id_pembayaran' => $id_byr,
            'id_supplier' => $supplier,
            'tanggal' => $tanggal,
            'total' => $total_trans,
            'status' => 'selesai',
            'id_pembelian' => $id_pembelian,
        ];
        $this->db->table('bayar')->insert($data);

        // update status
        $this->db->query("UPDATE pembelian SET status = 'selesai pembelian' WHERE id_pembelian = '$id_pembelian'");

        return redirect()->to(base_url('beli/ListBayar'));
    }
    
    public function save_pembelian()
    {
        $id = $this->request->getPost('id');
        $supplier = $this->request->getPost('supplier');
        $total = $this->request->getPost('total');
        $id_byr = $this->request->getPost('id_byr');
        $tanggal = $this->request->getPost('tanggal');
		$data = [
			'id_supplier' => $supplier,
            'total' => $total,
            'status' => 'selesai',
		];
		// $this->db->where('id_Pembelian', $id);
		$update = $this->db->table('bayar')
		->where('id_pembayaran', $id)
		->update($data);


		if ($update) {
			# code...
			return redirect()->to(base_url('bayar/listbayar'));
		}

		// return redirect(base_url('Pembelian'));
    }

    // public function id_pembelian(){
    //     return $this->query('SELECT max(id_pembelian) as id_pembelian FROM `pembeli`')->getResultArray();
    // }

    //  public function cek_jurnal(){
    //     // $id_pembelian = $this->belimodel->id_byr();
    //     // $id_pembelian = $id_pembelian[0]['id_pembelian'];
    //     // // $id_pembelian = (int)$id_pembelian;
    //     // $id_byr = $this->request->getPost('id_byr');
    //     // $data['pembeli'] = $this->belimodel->cek_jurnal();
    
    
    //     $jurnal_debit = [
    //         'id' => "",
    //         'id_pembelian' => $id_pembelian,
    //         'tgl_jurnal' => $this->request->getVar('tanggal'),
    //         'kode_akun' => '115',
    //         'posisi_d_c' => 'debit',
    //         'nominal' => $this->request->getVar('total')
    //     ];

    //     $jurnal_kredit = [
    //         'id' => "",
    //         'id_pembelian' => $id_pembelian,
    //         'tgl_jurnal' => $this->request->getVar('tanggal'),
    //         'kode_akun' => '111',
    //         'posisi_d_c' => 'kredit',
    //         'nominal' => $this->request->getVar('total')
    //     ];
 
    //     $this->jurnal_model->insert($jurnal_debit);
    //     $this->jurnal_model->insert($jurnal_kredit);
    //     print_r($jurnal_debit);exit;
    //     print_r($jurnal_kredit);exit;
        
    // }

    public function kode()
    {
        $builder = $this->db->table('bayar')
        ->select('MAX(RIGHT(bayar.id_pembayaran,3)) as kode')
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
        $kd = "BYR-".$kodemax;
        // print_r($kd);exit;
        return $kd;
    }

    // public function LapBeli()
    // {
    //     // $data['Pembelian'] = $this->PembelianModel->getListBeli();
    //     $list = $this->db->query("SELECT a.*, nama_supplier
    //     FROM pembeli a
    //     JOIN supplier b ON a.id_supplier = b.id_supplier
    //     ")->getResult();
    //     $data['pembeli'] = $list;
    //     // echo view('HeaderBootstrap');
    //     // echo view('SidebarBootstrap');
    //     echo view('pembeli/LapBeli', $data);
    // }
}