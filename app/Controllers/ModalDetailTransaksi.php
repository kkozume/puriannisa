<?php
    namespace App\Controllers;
    use CodeIgniter\RESTful\ResourceController;
    use App\Models\PenjualanModel;
    use App\Models\produkModel;
    use App\Models\PelangganModel;
    use CodeIgniter\API\ResponseTrait;
    
    class ModalDetailTransaksi extends ResourceController
    {
        public function index()
        {   
            $id_penjualan = $_GET['id_penjualan'];
            $penjualan = new PenjualanModel();
            $pelanggan = new PelangganModel();
            $produk = new produkModel();

            $dataPenjualan = $penjualan->getPenjualan($id_penjualan)[0];            
            $pelanggan = $pelanggan->getPelanggan($dataPenjualan->nama_pelanggan)[0];
            
            $listPenjualan = $penjualan->allDetailPenjualan($id_penjualan);
            
            $data = [
                'nama_pelanggan' => $pelanggan->nama_pelanggan, 
                'tanggal' => $dataPenjualan->tanggal,
                'total' => $dataPenjualan->total
            ];
            
            $i = 1;
            foreach($listPenjualan as $row){
                $data['listPenjualan'][] = [
                    'nama_produk' => $produk->getProduk($row->kode_produk)[0]->nama_produk,
                    'harga' => $row->harga,
                    'jumlah' => $row->jumlah,
                ]; 
                $i++;
            }

            return $this->respondCreated($data);
        }
    }

?>  