<?php
namespace App\Controllers;

use App\Models\m_permintaanmodel;
use App\Models\bahanbakuModel;
// use App\Models\LaporanModel;

class c_permintaan extends BaseController
{
    public function __construct()
    {
        // session_start();
        $this->m_permintaanmodel = new m_permintaanmodel();
        $this->bahanbakuModel = new bahanbakuModel();
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

        if(!isset($_POST['harga_bb']) and !isset($_POST['tgl_permintaan'])) {
            //tidak perlu divalidasi
            $kode = $this->kode();
            $dtl = $this->db->query('SELECT a.*, nama_bahanbaku, c.status
            FROM detail_permintaan a 
            join bahan_baku b on a.id_bahanbaku = b.id_bahanbaku 
            join c_permintaan c on c.id_permintaan = a.id_permintaan
            -- join permintaan d on d.id_permintaan = c.id_permintaan
            where c.status = "proses"
            ')->getResult();
            $cek_detil = $this->db->query("SELECT * from detail_permintaan where id_permintaan = '$kode' ");
            $total = $this->db->query("SELECT SUM(total) AS total FROM detail_permintaan WHERE id_permintaan = '$kode'")->getRow()->total;
            // $supplier = $this->db->table('supplier')->get()->getResult();

            $data['c_permintaan'] = $this->m_permintaanmodel->getBeliData();
            // $data['bahan_baku'] = $this->bahanbakuModel->getPermintaan();
            $data['kode'] = $kode;
            $data['bahan_baku'] = $this->db->table('bahan_baku')->get()->getResult();
            $data['list_detail'] = $dtl;
            $data['detil'] = $cek_detil;
            $data['total1'] = $total;
            // $data['supplier'] = $supplier;
            // print_r($data['kode']);exit;
            // echo view('HeaderBootstrap');
            // echo view('SidebarBootstrap');
            echo view('permintaan/inputpermint', $data);
        }else{
            $validation =  \Config\Services::validation();
            if (! $this->validate(
                    [
                        'nama_bahanbaku' => 'required',
                        'harga_bb' => 'required',
                        'tgl_permintaan' => 'required'
                    ],
                    [   // Errors
                        'nama_bahanbaku' => [
                            'required' => 'Nama bahan baku tidak boleh kosong'
                        ],
                        'harga_bb' => [
                            'required' => 'Harga bahanbaku tidak boleh kosong'
                        ],
                        'tgl_permintaan' => [
                            'required' => 'Tanggal tidak boleh kosong'
                        ]
                    ]
                )
            ){
                //maka kembalikan ke awal
                // echo view('HeaderBootstrap');
                // echo view('SidebarBootstrap');
                echo view('permintaan/inputpermint',[
                    'validation' => $this->validator,
                    'c_permintaan' => $this->m_permintaanmodel->getBeliData(),
                    'bahan_baku'=> $this->bahanbakuModel->getPermintaan(),
                ]);
            }else{
                //maka input database
                $hasil = $this->m_permintaanmodel->inputpermint();
                if($hasil->connID->affected_rows>0){
                    ?>
                    <script type="text/javascript">
                        alert("Sukses menambahkan Pembelian");
                    </script>
                    <?php	
                }
                $data['c_permintaan'] = $this->m_permintaanmodel->getListBeli();
                // $data['bahan_baku'] = $this->bahanbakuModel->getPermintaan();
                // $data['permintaan'] = $this->permintaanmodel->getListBeli2();
                //maka kembalikan ke awal
                // echo view('HeaderBootstrap');
                // echo view('SidebarBootstrap');
                echo view('permintaan/listpermintaan', $data);
            }
        }

	}

    public function ListBeli()
    {
        // $data['Pembelian'] = $this->PembelianModel->getListBeli();
        $list = $this->db->query("select a.*, c.tgl_permintaan
        from detail_permintaan a 
        join bahan_baku b on b.id_bahanbaku = a.id_bahanbaku
        join c_permintaan c on c.id_permintaan = a.id_permintaan
        WHERE c.status = 'selesai'
        ")->getResult();
        $data['c_permintaan'] = $list;
        // echo view('HeaderBootstrap');
        // echo view('SidebarBootstrap');
        echo view('permintaan/listpermintaan', $data);
    }
    

    public function detail_pmb()
	{
        $kode = $this->kode();
        $id_prm = $this->request->getPost('id_prm');
        // $id_permintaan = $this->request->getPost('id_permintaan');
        $kode_produk = $this->request->getPost('produk');


        $cek_prm = $this->db->query("SELECT * FROM c_permintaan WHERE status = 'proses' AND id_permintaan = '$id_prm'");

        // $id_permintaan = $this->db->query("SELECT * FROM c_permintaan WHERE id_permintaan = 'id_permintaan'")->getRow();

        $produk = $this->db->query("SELECT * FROM bahan_baku WHERE id_bahanbaku = '$kode_produk'")->getRow();
        $subtotal = $produk->harga_bb * $this->request->getPost('qty');
        
        $cek_detil = $this->db->query("SELECT * from detail_permintaan where id_bahanbaku ='$kode_produk' AND id_permintaan = '$id_prm' ")->getRow();
        // print_r($cek_detil);exit;
        if ($cek_prm->getNumRows() == 0) {
			$prm = [
                'id_permintaan' => $id_prm,
				// 'id_permintaan' => $this->request->getPost('id_permintaan'),
                'tgl_permintaan' => $this->request->getPost('tgl_permintaan'),
                'status' => 'proses',
			];
			$this->db->table('c_permintaan')->insert($prm);

			$detil = [
				'id_permintaan' => $id_prm,
                // 'id_permintaan' => $this->request->getPost('id_permintaan'),
                'id_bahanbaku' => $kode_produk,
                'qty' => $this->request->getPost('qty'),
                'harga_bb' => $produk->harga_bb,
                'total' => $subtotal,
			];
			$this->db->table('detail_permintaan')->insert($detil);
        } 
        else {
            if (empty($cek_detil->id_bahanbaku)) {
                $detil = [
                    'id_permintaan' => $id_prm,
                    // 'id_permintaan' => $this->request->getPost('id_permintaan'),
                    'id_bahanbaku' => $kode_produk,
                    'qty' => $this->request->getPost('qty'),
                    'harga_bb' => $produk->harga_bb,
                    'total' => $subtotal,
                ];
				$this->db->table('detail_permintaan')->insert($detil);
            } 
            else {
                # code...
                $hasil = $cek_detil->qty + $this->request->getPost('qty');
                $update_harga = $hasil * $cek_detil->harga_bb;

                $this->db->query("UPDATE detail_permintaan SET qty = '$hasil', total = '$update_harga' WHERE id_permintaan = '$id_prm' AND id_bahanbaku = '$kode_produk'");
            }
        }
        return redirect()->to(base_url('c_permintaan/inputBeli'));
	}

    public function save_pembelian()
    {
        $id = $this->request->getPost('id');
        // $supplier = $this->request->getPost('supplier');
        $total = $this->request->getPost('total');
		$data = [
			// 'id_supplier' => $supplier,
            'total' => $total,
            'status' => 'selesai',
		];
		// $this->db->where('id_Pembelian', $id);
		$update = $this->db->table('c_permintaan')
		->where('id_permintaan', $id)
		->update($data);

		if ($update) {
			# code...
			return redirect()->to(base_url('c_permintaan/ListBeli'));
		}

		// return redirect(base_url('Pembelian'));
    }

    public function kode()
    {
        $builder = $this->db->table('c_permintaan')
        ->select('MAX(RIGHT(c_permintaan.id_permintaan,3)) as kode')
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
        // $kd = "PRM-".$kodemax;
        $kd = "PRM-".$kodemax;
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