<?php

namespace App\Models;

use CodeIgniter\Model;

class reordermodel extends Model
{
    protected $table = 'reorder_point';

    public function getAll(){
        return $this->findAll();
    }
//untuk memasukkan data safety
public function insertData(){
    $id_reorder = $_POST['id_reorder'];
    $tgl_reorder = $_POST['tgl_reorder'];
    $id_bahanbaku = $_POST['id_bahanbaku'];
    $pemakaian_rata = $_POST['pemakaian_rata'];
    $lead_time = $_POST['lead_time'];
    $safety_stock = $_POST['safety_stock'];
    $reorder_point = $_POST['reorder_point'];

    $hasil = $this->db->query("INSERT INTO reorder_point SET id_reorder = ?,tgl_reorder = ?,id_bahanbaku = ?, pemakaian_rata = ?, lead_time=?, safety_stock=?, reorder_point=?", array($id_reorder,$tgl_reorder, $id_bahanbaku, $pemakaian_rata,$lead_time, $safety_stock,$reorder_point));
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