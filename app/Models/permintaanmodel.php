<?php

namespace App\Models;

use CodeIgniter\Model;

class permintaanmodel extends Model
{
    protected $table = 'permintaan';

    public function getAll(){
        return $this->findAll();
    }

    public function getAll2(){
        $sql = "SELECT a.*,b.nama_bahanbaku
FROM `permintaan` a 
LEFT OUTER JOIN bahan_baku b ON (a.id_bahanbaku=b.id_bahanbaku)";
        $dbResult = $this->db->query($sql, array());
        return $dbResult->getResult('array');
    }

//untuk memasukkan data safety
public function insertData(){
    $id_permintaan = $_POST['id_permintaan'];
    $tgl_permintaan = $_POST['tgl_permintaan'];
    $id_bahanbaku = $_POST['id_bahanbaku'];
    $harga_permintaan = $_POST['harga_permintaan'];
    $qty_bb = $_POST['qty_bb'];
    $hasil = $this->db->query("INSERT INTO permintaan SET id_permintaan = ?, tgl_permintaan = ?, id_bahanbaku=?,harga_permintaan=?, qty_bb=?", array($id_permintaan, $tgl_permintaan, $id_bahanbaku,$harga_permintaan, $qty_bb));
    return $hasil;
}

    // //untuk mendapatkan data akun sesuai dengan kode_akun untuk diedit
    // public function editData($id){
    //     $dbResult = $this->db->query("SELECT * FROM akun WHERE id = ?", array($id));
    //     return $dbResult->getResult();
    // }

    // //untuk mendapatkan data akun sesuai dengan kode_akun untuk diedit
    // public function updateData(){
    //     $id = $_POST['id'];
    //     $kode_akun = $_POST['kode_akun'];
    //     $nama_akun = $_POST['nama_akun'];
    //     $header_akun = $_POST['header_akun'];
    //     $posisi_d_c = $_POST['posisi_d_c'];
    //     $hasil = $this->db->query("UPDATE akun SET  kode_akun =?, nama_akun = ?, header_akun = ?, posisi_d_c = ? WHERE id =? ", array($kode_akun, $nama_akun, $header_akun, $posisi_d_c, $id ));
    //     return $hasil;
    // }

    // //untuk menghapus data akun sesuai id yang dipilih
    // public function deleteData($id){
    //     $hasil = $this->db->query("DELETE FROM akun WHERE id =? ", array($id));
    //     return $hasil;
    // }

     



    
    
}