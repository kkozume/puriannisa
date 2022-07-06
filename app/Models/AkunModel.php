<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun_login';

    // public function cekUsernamePwd(){
    //     //bind variabel untuk mencegah sql injection
    //     $nama = $_POST['inputUsername'];
    //     $sandi = $_POST['inputPassword'];
    //     $dbResult = $this->db->query("SELECT COUNT(*) as jml FROM akun_login WHERE username = ? AND pwd = ?", array($nama, md5($sandi)));
    //     return $dbResult->getResult();
    // }

    //  // untuk mendapatkan kelompok user
    //  public function getGroupUser(){
    //     $nama = $_POST['inputUsername'];
    //     $dbResult = $this->db->query("SELECT user_group FROM akun_login WHERE username = ?", array($nama));
    //     return $dbResult->getResult();
    // }

    //  //untuk update last login ketika berhasil login
    //  public function updatelastlogin(){
    //     $nama = $_POST['inputUsername'];
    //     $hasil = $this->db->query("UPDATE akun_login SET last_login = now() WHERE username = ?", array($nama));
    //     return $hasil;
    // }

    // //untuk mendapatkan last login
    // public function getlastlogin($nama){
    //     $dbResult = $this->db->query("SELECT last_login FROM akun_login WHERE username = ? ", array($nama));
    //     return $dbResult->getResult();
        
    // }

    public function adminlogin(){
        $sql = "SELECT * FROM akun_login";
        $dbResult = $this->db->query($sql, array());
        return $dbResult->getResult('array');
    }

    public function users(){
        $sql = "SELECT COUNT(nama_pelanggan) AS user
                FROM pelanggan
                WHERE pwd IS NOT NULL";
        $dbResult = $this->db->query($sql, array());
        return $dbResult->getResult('array');
    }

    public function terjual(){
        $sql = "SELECT SUM(jumlah) AS jumlah
                FROM detail_penjualan;";
        $dbResult = $this->db->query($sql, array());
        return $dbResult->getResult('array');
    }

    public function tersedia(){
        $sql = "SELECT SUM(stok) AS stok
                FROM produk;";
        $dbResult = $this->db->query($sql, array());
        return $dbResult->getResult('array');
    }

    public function totalpenjualan(){
        $sql = "SELECT SUM(total_bayar) AS total 
                FROM penjualan;";
        $dbResult = $this->db->query($sql, array());
        return $dbResult->getResult('array');
    }
}

