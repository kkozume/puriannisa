<?php

namespace App\Models;

use CodeIgniter\Model;

class produkModel extends Model
{
    protected $table = 'produk';

    public function getAll(){
        return $this->findAll();
    }

    //method untuk input data
    //dokumen dan gambar menjadi paramter inputan karena namanya sudah diganti
    public function insertData($gbr){
        $kode_produk          = $_POST['kode_produk'];
        $nama_produk          = $_POST['nama_produk'];
        $stok                 = $_POST['stok'];
        $harga    = $_POST['harga'];
        $kode_kategori  = $_POST['kode_kategori'];

        // //jangan lupa jika memakai masking maka dihilangkan dulu nilai maskingnya agar yang masuk ke db adalah murni numeriknya
        // $harga = preg_replace( '/[^0-9 ]/i', '', $harga);

        $hasil = $this->db->query("INSERT INTO produk SET kode_produk= ?, nama_produk= ?, stok= ?, harga= ?, gambar= ?, kode_kategori= ?", 
                            array($kode_produk, $nama_produk, $stok, $harga, $gbr, $kode_kategori));
        return $hasil;
    }
    //untuk mendapatkan data produk harian sesuai dengan kode_produk untuk diedit
    public function editData($kode_produk){
        $dbResult = $this->db->query("SELECT * FROM produk WHERE kode_produk = ?", array($kode_produk));
        return $dbResult->getResult();
    }
    //untuk mendapatkan data produk sesuai dengan kode_produk untuk diedit
    public function updateData($gbr){
        $kode_produk    = $_POST['kode_produk'];
        $nama_produk    = $_POST['nama_produk'];
        $stok           = $_POST['stok'];
        $harga   = $_POST['harga'];
        $kode_kategori  = $_POST['kode_kategori'];
        $hasil = $this->db->query("UPDATE produk SET kode_produk= ?, nama_produk= ?, stok= ?, harga= ?, gambar= ?, kode_kategori= ? 
                                   WHERE kode_produk =? ", array($kode_produk, $nama_produk, $stok, $harga, $gbr, $kode_kategori, $kode_produk));
        return $hasil;
    }
    //untuk menghapus data produk sesuai kode_produk yang dipilih
    public function deleteData($kode_produk){
        $hasil = $this->db->query("DELETE FROM produk WHERE kode_produk =? ", array($kode_produk));
        return $hasil;
         foreach ($hasil as $row)
        {
            $nama_file_gambar = $row->gambar;
        }
        if(is_file(FCPATH.'dokumen/upload/'.$nama_file_gambar)){
            unlink(FCPATH.'dokumen/upload/'.$nama_file_gambar); //delete file gambar
        }
    }

    public function getProduk($kode_produk){
        $dbResult = $this->db->query("SELECT * FROM produk WHERE kode_produk = ?", array($kode_produk));
        return $dbResult->getResult();
    }
}