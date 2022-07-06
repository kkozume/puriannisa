<?php

namespace App\Models;

use CodeIgniter\Model;

class safetymodel extends Model
{
    protected $table = 'safety_stock';

    public function getAll(){
        return $this->findAll();
    }
//untuk memasukkan data safety
public function insertData(){
    $id_safety = $_POST['id_safety'];
    $tgl_safety = $_POST['tgl_safety'];
    $id_bahanbaku = $_POST['id_bahanbaku'];
    $pemakaian_max = $_POST['pemakaian_max'];
    $pemakaian_min = $_POST['pemakaian_min'];
    $lead_time = $_POST['lead_time'];
    $safety_stock = $_POST['safety_stock'];
    $hasil = $this->db->query("INSERT INTO safety_stock SET id_safety = ?, id_bahanbaku = ?, tgl_safety = ?, pemakaian_max = ?, pemakaian_min =?, lead_time=?, safety_stock=?", array($id_safety, $id_bahanbaku, $tgl_safety, $pemakaian_max, $pemakaian_min,$lead_time, $safety_stock));
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