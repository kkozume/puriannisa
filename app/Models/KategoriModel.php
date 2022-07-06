<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori_produk';
    protected $returnType     = 'array';
    protected $validationMessages = ["error"];

    public function getAll(){
        return $this->findAll();
    }

    // public function getkode(){
    //      //generate nomer kuitansi dengan format KWI-20190520-3-001
    //     //KWI-THN_BLN_TGL-IDKOSAN-NOMOR_URUT
    //     $sql= "SELECT MAX(RIGHT(kode_kategori,3)) as kode_kategori FROM kategori";
    //     $dbResult = $this->db->query($sql);
    //     $hasil = $dbResult->getResult();
    //      foreach ($hasil as $row)
	// 	{
	// 		$urutan = $row->$kode_kategori;
	// 	} 
    //     $urutan = $urutan+1;
    //     //   format nomor kuitansi
    //     $kode_kategori = "KK".str_pad(($urutan),3,"0",STR_PAD_LEFT); //-001;
    //     return $kode_kategori;
    // }

    //untuk memasukkan data kategori
    public function insertData(){
        $kode_kategori = $_POST['kode_kategori']; 
        $nama_kategori = $_POST['nama_kategori']; 
        $gambar = $_POST['gambar'];
        $hasil = $this->db->query("INSERT INTO kategori SET kode_kategori = ?,  nama_kategori = ?, gambar= ?", array($kode_kategori, $nama_kategori, $gambar));
        return $hasil;
    }

    //untuk mendapatkan data kategori sesuai dengan kode_kategori untuk diedit
    public function editData($kode_kategori){
        $dbResult = $this->db->query("SELECT * FROM kategori WHERE kode_kategori = ?", array($kode_kategori));
        return $dbResult->getResult();
    }

    //untuk mendapatkan data kategori sesuai dengan kode_kategori untuk diedit
    public function updateData(){
        $kode_kategori = $_POST['kode_kategori'];
        $nama_kategori = $_POST['nama_kategori'];
        $gambar = $_POST['gambar'];
        $hasil = $this->db->query("UPDATE kategori SET nama_kategori = ?, gambar= ? WHERE kode_kategori = ? ", array($nama_kategori, $gambar, $kode_kategori));
        return $hasil;
    }

}