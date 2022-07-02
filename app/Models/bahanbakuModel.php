<?php

namespace App\Models;

use CodeIgniter\Model;

class bahanbakuModel extends Model
{
    protected $table = 'bahan_baku';

    public function getAll(){
        return $this->findAll();
    }

    //untuk memasukkan data karyawan harian
    public function insertData(){
   
        $nama_bahanbaku = $_POST['nama_bahanbaku'];
        $satuan_bb = $_POST['satuan_bb'];
        $qty_bb = $_POST['qty_bb'];
        $harga_bb = preg_replace('/[^0-9]/i','',$_POST['harga_bb']);
        $jenis_bb = $_POST['jenis_bb'];
        $biaya_pesan = preg_replace('/[^0-9]/i','',$_POST['biaya_pesan']);
        $biaya_simpan = preg_replace('/[^0-9]/i','',$_POST['biaya_simpan']);
        // $metode_penggunaan = $_POST['metode_penggunaan'];
        // //jangan lupa jika memakai masking maka dihilangkan dulu nilai maskingnya agar yang masuk ke db adalah murni numeriknya
        // $no_telp_supplier = preg_replace( '/[^0-9 ]/i', '', $no_telp_supplier);
        // // $ktp = $_POST['ktp'];
        $hasil = $this->db->query("INSERT INTO bahan_baku SET nama_bahanbaku = ?, satuan_bb = ?, qty_bb = ?, harga_bb = ?, jenis_bb = ?, biaya_pesan =? , biaya_simpan=?", //metodepenggunaan
        array($nama_bahanbaku, $satuan_bb, $qty_bb, $harga_bb, $jenis_bb, $biaya_pesan, $biaya_simpan));//metode_penggunaan));
        return $hasil;
    }

    //untuk mendapatkan data karyawan harian sesuai dengan id_karyawan untuk diedit
    public function editData($id_bahanbaku){
        $dbResult = $this->db->query("SELECT * FROM bahan_baku WHERE id_bahanbaku = ?", array($id_bahanbaku));
        return $dbResult->getResult();
    }

    //untuk mendapatkan data karyawan sesuai dengan id_karyawan untuk diedit
    public function updateData(){
        $id_bahanbaku= $_POST['id_bahanbaku'];
        $nama_bahanbaku = $_POST['nama_bahanbaku'];
        $satuan_bb = $_POST['satuan_bb'];
        $qty_bb = $_POST['qty_bb'];
        $harga_bb = preg_replace('/[^0-9]/i','',$_POST['harga_bb']);
        $jenis_bb = $_POST['jenis_bb'];
        $biaya_pesan = preg_replace('/[^0-9]/i','',$_POST['biaya_pesan']);
        $biaya_simpan = preg_replace('/[^0-9]/i','',$_POST['biaya_simpan']);

        // $metode_penggunaan = $_POST['metode_penggunaan'];
        // $ktp = $_POST['ktp'];
        $hasil = $this->db->query("UPDATE bahan_baku SET  nama_bahanbaku = ?,satuan_bb = ?,qty_bb = ?,harga_bb = ?,jenis_bb = ?, biaya_pesan =?, biaya_simpan=?
        WHERE id_bahanbaku =? ", array($nama_bahanbaku,$satuan_bb,$qty_bb,$harga_bb,$jenis_bb, $biaya_pesan, $biaya_simpan, $id_bahanbaku));
        return $hasil;
    }

    //untuk menghapus data karyawan sesuai id_karyawan yang dipilih
    public function deleteData($id_bahanbaku){
        $hasil = $this->db->query("DELETE FROM bahan_baku WHERE id_bahanbaku =? ", array($id_bahanbaku));
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