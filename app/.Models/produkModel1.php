<?php

namespace App\Models;

use CodeIgniter\Model;

class produkModel extends Model
{
    protected $table = 'produk';

    // public function getAll(){
    //     return $this->db->table('produk')
    //     ->join('kategori_produk', 'produk.kode_produk=kategori_produk.kode_kategori')
    //     ->get()->getResultArray();
    // }
     public function getAll(){
        return $this->findAll();
    }
    
    public function getAll2(){
        $sql = "SELECT a.*,b.nama_kategori 
        FROM `produk` a 
        LEFT OUTER JOIN kategori_produk b ON (a.kode_kategori=b.kode_kategori)";
        $dbResult = $this->db->query($sql, array());
        return $dbResult->getResult('array');
    }

    public function getNamaproduk(){
        $sql = "SELECT id, id_produksi, tanggal, produk, SUM(q_bp) AS stok, total, status
                FROM produksi
                GROUP BY produk ORDER BY id;";
        $dbResult = $this->db->query($sql, array());
        return $dbResult->getResult('array');
    }

    public function getNamaprodukedit(){
        $sql = "SELECT a.id, a.produk, SUM(a.q_bp) AS stok, b.nama_produk, b.stok AS stokk
                FROM produksi a
                JOIN produk b
                ON a.produk=b.nama_produk
                GROUP BY a.produk ORDER BY a.id;";
        $dbResult = $this->db->query($sql, array());
        return $dbResult->getResult('array');
    }

    //method untuk input data
    //dokumen dan gambar menjadi paramter inputan karena namanya sudah diganti
    public function insertData($gbr){
        $kode_produk    = $_POST['kode_produk'];
        $nama_produk    = $_POST['nama_produk'];
        $stok           = $_POST['stok'];
        //$harga_produk   = $_POST['harga_produk'];
        $harga_jual_produk = preg_replace( '/[^0-9 ]/i', '', $_POST['harga_jual_produk']);
        $berat  = $_POST['berat'];
        $kode_kategori  = $_POST['kode_kategori'];

        // //jangan lupa jika memakai masking maka dihilangkan dulu nilai maskingnya agar yang masuk ke db adalah murni numeriknya
        // $harga_produk = preg_replace( '/[^0-9 ]/i', '', $harga_produk);

        $hasil = $this->db->query("INSERT INTO produk SET kode_produk= ?, nama_produk= ?, stok= ?, harga_jual_produk= ?, berat= ?, gambar= ?, kode_kategori= ?", 
                            array($kode_produk, $nama_produk, $stok, $harga_jual_produk, $berat, $gbr, $kode_kategori));
        return $hasil;
    }
    //untuk mendapatkan data produk harian sesuai dengan id untuk diedit
    public function editData($kode_produk){
        $dbResult = $this->db->query("SELECT * FROM produk WHERE kode_produk = ?", array($kode_produk));
        return $dbResult->getResult();
    }
    //untuk mendapatkan data produk sesuai dengan id untuk diedit
    public function updateData($gbr){
        $kode_produk    = $_POST['kode_produk'];
        $nama_produk    = $_POST['nama_produk'];
        $stok           = $_POST['stok'];
        $harga_jual_produk   = $_POST['harga_jual_produk'];
        $harga_jual_produk = preg_replace( '/[^0-9 ]/i', '', $_POST['harga_jual_produk']);
        $berat  = $_POST['berat'];
        $kode_kategori  = $_POST['kode_kategori'];
        $hasil = $this->db->query("UPDATE produk SET nama_produk= ?, stok= ?, harga_jual_produk= ?, berat= ?, gambar= ?, kode_kategori= ? 
                                   WHERE kode_produk =? ", array($nama_produk, $stok, $harga_jual_produk, $berat, $gbr, $kode_kategori, $kode_produk));
        return $hasil;
    }
}