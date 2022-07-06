<?php

namespace App\Models;

use CodeIgniter\Model;

class targetprodModel extends Model
{
    protected $table = 'target_produksi';

    public function getAll(){
        return $this->findAll();
    }

    //untuk memasukkan data target
    public function insertData(){
   
        $nama_produk = $_POST['nama_produk'];
        $target_produksi = $_POST['target_produksi'];
        $periode_target = $_POST['periode_target'];
       
        $hasil = $this->db->query("INSERT INTO target_produksi SET nama_produk = ?, target_produksi = ?, periode_target = ?", //metodepenggunaan
        array($nama_produk, $target_produksi, $periode_target));
        return $hasil;
    }

    //untuk mendapatkan data karyawan harian sesuai dengan id target untuk diedit
    public function editData($id_target){
        $dbResult = $this->db->query("SELECT * FROM target_produksi WHERE id_target = ?", array($id_target));
        return $dbResult->getResult();
    }

    //untuk mendapatkan data karyawan sesuai dengan id target untuk diedit
    public function updateData(){
        $id_target= $_POST['id_target'];
        $nama_produk = $_POST['nama_produk'];
        $target_produksi = $_POST['target_produksi'];
        $periode_target = $_POST['periode_target'];


        $hasil = $this->db->query("UPDATE target_produksi SET  nama_produk = ?,target_produksi = ?,periode_target = ?
        WHERE id_target =? ", array($nama_produk ,$target_produksi ,$periode_target,$id_target));
        return $hasil;
    }

    //untuk menghapus data karyawan sesuai id_target yang dipilih
    public function deleteData($id_target){
        $hasil = $this->db->query("DELETE FROM target_produksi WHERE id_target =? ", array($id_target));
        return $hasil;

        // foreach ($hasil as $row)
        // {
        //     $nama_file_gambar = $row->ktp;
        // }
        // if(is_file(FCPATH.'dokumen/upload/'.$nama_file_gambar)){
        //     unlink(FCPATH.'dokumen/upload/'.$nama_file_gambar); //delete file ktp
        // }
    


    }
}