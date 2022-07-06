<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'karyawan';

    public function getAll(){
        return $this->findAll();
    }

    //untuk memasukkan data karyawan harian
    public function insertData($gbr){
        $nama_karyawan = $_POST['nama_karyawan'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        $jabatan = $_POST['jabatan'];
        
        //jangan lupa jika memakai masking maka dihilangkan dulu nilai maskingnya agar yang masuk ke db adalah murni numeriknya
        $no_telp = preg_replace( '/[^0-9 ]/i', '', $no_telp);
        
        $hasil = $this->db->query("INSERT INTO karyawan SET nama_karyawan = ?, tgl_lahir =?, 
        jenis_kelamin =?, no_telp =?, alamat =?, jabatan =?, gambar =?", 
        array($nama_karyawan, $tgl_lahir, $jenis_kelamin, $no_telp, $alamat, $jabatan, $gbr));
        return $hasil;
    }

    //untuk mendapatkan data karyawan harian sesuai dengan id_karyawan untuk diedit
    public function editData($id_karyawan){
        $dbResult = $this->db->query("SELECT * FROM karyawan WHERE id_karyawan = ?", array($id_karyawan));
        return $dbResult->getResult();
    }

    //untuk mendapatkan data karyawan sesuai dengan id_karyawan untuk diedit
    public function updateData($gbr){
        $id_karyawan = $_POST['id_karyawan'];
        $nama_karyawan = $_POST['nama_karyawan'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        $jabatan = $_POST['jabatan'];
        $hasil = $this->db->query("UPDATE karyawan SET  nama_karyawan = ?, tgl_lahir =?, jenis_kelamin =?, no_telp =?, alamat =?, jabatan =?, gambar =? WHERE id_karyawan =? ", array($nama_karyawan, $tgl_lahir, $jenis_kelamin, $no_telp, $alamat, $jabatan,$gbr, $id_karyawan));
        return $hasil;
    }

    //untuk menghapus data karyawan sesuai id_karyawan yang dipilih
    public function deleteData($id_karyawan){
        $hasil = $this->db->query("DELETE FROM karyawan WHERE id_karyawan =? ", array($id_karyawan));
        return $hasil;
        foreach ($hasil as $row)
        {
            $nama_file_gambar = $row->gambar;
        }
        if(is_file(FCPATH.'dokumen/upload/'.$nama_file_gambar)){
            unlink(FCPATH.'dokumen/upload/'.$nama_file_gambar); //delete file gambar
        }

    }
}