<?php
namespace App\Controllers;

use App\Models\belimodel;
use App\Models\m_permintaanmodel;
use App\Models\jurnal_model;
// use App\Models\LaporanModel;

class beli extends BaseController
{
    public function __construct()
    {
        // session_start();
        $this->belimodel = new belimodel();
        $this->m_permintaanmodel = new m_permintaanmodel();
        $this->jurnal_model = new jurnal_model();
        // $this->laporan = new belimodel();
        helper('rupiah');
        $this->db = db_connect();
    }

	public function inputBeli()
	{
        // //tambahkan pengecekan login
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('home')); 
        // }

        if(!isset($_POST['harga_bb']) and !isset($_POST['waktu'])) {
            //tidak perlu divalidasi
            $kode = $this->kode();
            $dtl = $this->db->query('SELECT a.*, nama_bahanbaku, c.status
            FROM detail_pembelian a 
            join bahan_baku b on a.id_bahanbaku = b.id_bahanbaku 
            join pembeli c on c.id_pembelian = a.id_pembelian
            -- join permintaan d on d.id_permintaan = c.id_permintaan
            where c.status = "proses"
            ')->getResult();
            $cek_detil = $this->db->query("SELECT * from detail_pembelian where id_pembelian = '$kode' ");
            $total = $this->db->query("SELECT SUM(total) AS total FROM detail_pembelian WHERE id_pembelian = '$kode'")->getRow()->total;
            $supplier = $this->db->table('supplier')->get()->getResult();

            $data['pembeli'] = $this->belimodel->getBeliData();
            $data['detail_permintaan'] = $this->belimodel->getPermintaan();
            $data['kode'] = $kode;
            $data['bahan_baku'] = $this->db->table('bahan_baku')->get()->getResult();
            $data['list_detail'] = $dtl;
            $data['detil'] = $cek_detil;
            $data['total1'] = $total;
            $data['supplier'] = $supplier;
            // print_r($data['kode']);exit;
            // echo view('HeaderBootstrap');
            // echo view('SidebarBootstrap');
            echo view('pembeli/inputbeli', $data);
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
                echo view('pembeli/inputbeli',[
                    'validation' => $this->validator,
                    'pembeli' => $this->belimodel->getBeliData(),
                    'detail_permintaan'=> $this->m_permintaanmodel->getPermintaan(),
                ]);
            }else{
                //maka input database
                $hasil = $this->belimodel->inputbeli();
                if($hasil->connID->affected_rows>0){
                    ?>
                    <script type="text/javascript">
                        alert("Sukses menambahkan Pembelian");
                    </script>
                    <?php	
                }
                $data['pembeli'] = $this->belimodel->getListBeli();
                $data['detail_permintaan'] = $this->m_permintaanmodel->getPermintaan();
                // $data['permintaan'] = $this->permintaanmodel->getListBeli2();
                //maka kembalikan ke awal
                // echo view('HeaderBootstrap');
                // echo view('SidebarBootstrap');
                echo view('pembeli/listbelii', $data);
            }
        }

	}

    public function ListBeli()
    {
        // $data['Pembelian'] = $this->PembelianModel->getListBeli();
        $list = $this->db->query("SELECT a.*, nama_suplier
        FROM pembeli a
        JOIN supplier b ON a.id_supplier = b.id_supplier
        ")->getResult();
        $data['pembeli'] = $list;
        // echo view('HeaderBootstrap');
        // echo view('SidebarBootstrap');
        echo view('pembeli/listbelii', $data);
    }
    

    public function detail_pmb()
	{
        $kode = $this->kode();
        $id_pmb = $this->request->getPost('id_pmb');
        $id_permintaan = $this->request->getPost('id_permintaan');
        $kode_produk = $this->request->getPost('produk');


        $cek_pmb = $this->db->query("SELECT * FROM pembeli WHERE status = 'proses' AND id_pembelian = '$id_pmb'");

        $id_permintaan = $this->db->query("SELECT * FROM detail_permintaan WHERE id_permintaan = 'id_permintaan'")->getRow();

        $produk = $this->db->query("SELECT * FROM bahan_baku WHERE id_bahanbaku = '$kode_produk'")->getRow();
        $subtotal = $produk->harga_bb * $this->request->getPost('qty');
        
        $cek_detil = $this->db->query("SELECT * from detail_pembelian where id_bahanbaku ='$kode_produk' AND id_pembelian = '$id_pmb' ")->getRow();
        // print_r($cek_detil);exit;
        if ($cek_pmb->getNumRows() == 0) {
			$pmb = [
                'id_pembelian' => $id_pmb,
				'id_permintaan' => $this->request->getPost('id_permintaan'),
                'tanggal' => $this->request->getPost('tanggal'),
                'status' => 'proses',
			];
			$this->db->table('pembeli')->insert($pmb);

			$detil = [
				'id_pembelian' => $id_pmb,
                'id_permintaan' => $this->request->getPost('id_permintaan'),
                'id_bahanbaku' => $kode_produk,
                'qty' => $this->request->getPost('qty'),
                'harga_bb' => $produk->harga_bb,
                'total' => $subtotal,
			];
			$this->db->table('detail_pembelian')->insert($detil);
        } 
        else {
            if (empty($cek_detil->id_bahanbaku)) {
                $detil = [
                    'id_pembelian' => $id_pmb,
                    'id_permintaan' => $this->request->getPost('id_permintaan'),
                    'id_bahanbaku' => $kode_produk,
                    'qty' => $this->request->getPost('qty'),
                    'harga_bb' => $produk->harga_bb,
                    'total' => $subtotal,
                ];
				$this->db->table('detail_pembelian')->insert($detil);
            } 
            else {
                # code...
                $hasil = $cek_detil->qty + $this->request->getPost('qty');
                $update_harga = $hasil * $cek_detil->harga_bb;

                $this->db->query("UPDATE detail_Pembelian SET qty = '$hasil', total = '$update_harga' WHERE id_pembelian = '$id_pmb' AND id_bahanbaku = '$kode_produk'");
            }
        }
        return redirect()->to(base_url('pembelian/inputBeli'));
	}

    public function tambah_pembelian()
    {
        $id_permintaan = $this->request->getPost('id_permintaan');
        $id_pmb = $this->request->getPost('id_pmb');
        $tanggal = $this->request->getPost('tanggal');
        $kode = $this->kode();
        $detail = $this->db->query("SELECT * 
        FROM detail_permintaan a 
        JOIN bahan_baku b on a.id_bahanbaku = b.id_bahanbaku
        WHERE a.id_permintaan = '$id_permintaan'")->getResult();
        $total_trans = $this->db->query("SELECT SUM(total) as total_trans
        FROM detail_permintaan a 
        JOIN bahan_baku b on a.id_bahanbaku = b.id_bahanbaku
        WHERE a.id_permintaan = '$id_permintaan'")->getRow()->total_trans;
        $supplier = $this->db->table('supplier')->get()->getResult();
        $data = [
            'id_permintaan' => $id_permintaan,
            'id_pmb' => $id_pmb,
            'tanggal' => $tanggal,
            'kode' => $kode,
            'detail' => $detail,
            'total_trans' => $total_trans,
            'supplier' => $supplier,
        ];
        $this->detail_pembelian($data);
    }

    public function detail_pembelian($data = array())
    {
        echo view('pembeli/detail_beli', $data);
    }

    public function simpan_pembelian()
    {
        $id_permintaan = $this->request->getPost('id_permintaan');
        $id_pmb = $this->request->getPost('id_pmb');
        $tanggal = $this->request->getPost('tanggal');
        $supplier = $this->request->getPost('supplier');
        $total_trans = $this->request->getPost('total_trans');

        $id_barang = $this->request->getPost('id_barang');
        $qty1 = $this->request->getPost('qty1');
        $harga_bb1 = $this->request->getPost('harga_bb1');
        $subtot = $this->request->getPost('subtot');
        $res = [];
        for ($i=0; $i < count($id_barang) ; $i++) { 
            $res[] = [
                'id_pembelian' => $id_pmb, 
                'id_bahanbaku' => $id_barang[$i],
                'qty' => $qty1[$i],
                'harga_bb' => $harga_bb1[$i],
                'total' => $subtot[$i],
                'id_permintaan' => $id_permintaan,
            ];
        }
        $this->db->table('detail_pembelian')->insertBatch($res);

        $data = [
            'id_pembelian' => $id_pmb,
            'id_supplier' => $supplier,
            'tanggal' => $tanggal,
            'total' => $total_trans,
            'status' => 'selesai',
            'id_permintaan' => $id_permintaan,
        ];
        $this->db->table('pembeli')->insert($data);

        // update status
        $this->db->query("UPDATE c_permintaan SET status = 'selesai pembelian' WHERE id_permintaan = '$id_permintaan'");

        return redirect()->to(base_url('beli/ListBeli'));
    }
    
    public function save_pembelian()
    {
        $id = $this->request->getPost('id');
        $supplier = $this->request->getPost('supplier');
        $total = $this->request->getPost('total');
        $id_pmb = $this->request->getPost('id_pmb');
        $tanggal = $this->request->getPost('tanggal');
		$data = [
			'id_supplier' => $supplier,
            'total' => $total,
            'status' => 'selesai',
		];
		// $this->db->where('id_Pembelian', $id);
		$update = $this->db->table('pembeli')
		->where('id_pembelian', $id)
		->update($data);


		if ($update) {
			# code...
			return redirect()->to(base_url('pembelian/listbelii'));
		}

		// return redirect(base_url('Pembelian'));
    }

    // public function id_pembelian(){
    //     return $this->query('SELECT max(id_pembelian) as id_pembelian FROM `pembeli`')->getResultArray();
    // }

    //  public function cek_jurnal(){
    //     // $id_pembelian = $this->belimodel->id_pmb();
    //     // $id_pembelian = $id_pembelian[0]['id_pembelian'];
    //     // // $id_pembelian = (int)$id_pembelian;
    //     // $id_pmb = $this->request->getPost('id_pmb');
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
        $builder = $this->db->table('pembeli')
        ->select('MAX(RIGHT(pembeli.id_pembelian,3)) as kode')
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
        $kd = "PMB-".$kodemax;
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