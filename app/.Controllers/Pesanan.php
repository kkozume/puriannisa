<?php

namespace App\Controllers;
use App\Models\KategoriModel;
use App\Models\produkModel;

class pesanan extends BaseController
{
	public function __construct()
    {
        // session_start();
        //load kelas KategoriModel
        $this->KategoriModel = new KategoriModel();
		$this->produkModel = new produkModel();
        $this->db = db_connect();
        helper('form');
    }

    public function cek(){
        $cart = \Config\Services::cart();
        $response = $cart->contents();
        // $data = json_encode($response);
        echo '<pre>';
        print_r($response);exit;
        echo '<pre>';
        // echo var_dump($data);
    }

     public function add(){
        // Insert an array of values
        $cart = \Config\Services::cart();
        //  $cart->destroy();
        $cart->insert(array(
            'id'      => $this->request->getPost('id'),
            'qty'     => 1,
            'price'   => $this->request->getPost('price'),
            'name'    => $this->request->getPost('name'),
            'options' => array(
                            'gambar' => $this->request->getPost('gambar'),
                            'berat' => $this->request->getPost('berat'),
                            )
            ));
            session()->setflashdata('success', 'Barang berhasil dimasukan keranjang');
            return redirect()->to(base_url('home/web')); 
    }
    
    public function clear(){
           // hapus an array of values
       $cart = \Config\Services::cart();
       $cart->destroy();
       session()->setflashdata('success', 'Semua data berhasil dihapus');
       return redirect()->to(base_url('pesanan/viewcart'));  
   }

    public function viewcart(){
        $data['kategori'] = $this->KategoriModel->getAll();
		// $data['produk'] = $this->produkModel->getAll2();
           // lihat
        $data['cart'] = \Config\Services::cart();
        echo view('purishop/pesanan/keranjang', $data);
   }

   public function update(){
        $cart = \Config\Services::cart();
        $i = 1;
        foreach ($cart->contents() as $key => $value) {
           $cart->update(array(
            'rowid'   => $value['rowid'],
            'qty'     => $this->request->getPost('qty'.$i++),
            ));
        } 
        session()->setflashdata('success', 'Data keranjang berhasil diupdate');
        return redirect()->to(base_url('pesanan/viewcart')); 
    }

    public function delete($rowid){
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        session()->setflashdata('success', 'Data keranjang berhasil dihapus');
        return redirect()->to(base_url('pesanan/viewcart')); 
    }
}


