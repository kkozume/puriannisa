<?php

namespace App\Models;

use CodeIgniter\Model;

class belimodel extends Model
{
    protected $table = 'pembeli';

    //untuk menginputkan pembelian dan penjurnalan
    public function inputBeli(){
        $kodeBeli = $_POST['kodeBeli'];
        $id_permintaan = $_POST['id_permintaan'];
        $harga_bb = $_POST['harga_bb']; 
        $tanggal = $_POST['tanggal'];
        
        //jangan lupa jika memakai masking maka dihilangkan dulu nilai maskingnya agar yang masuk ke db adalah murni numeriknya
        $harga_bb = preg_replace( '/[^0-9 ]/i', '', $harga_bb);

        //dapatkan id transaksi untuk pembelian
        $dbResult = $this->db->query("SELECT IFNULL(MAX(id_pembelian),0) as id_pembelian from pembeli");

        $hasil = $dbResult->getResult();
        //cacah hasilnya
        foreach ($hasil as $row)
        {
            $id_pembelian = $row->id_pembelian;
        }
            $id_pembelian = $id_pembelian+1; //naikkan 1 untuk id baru modal yang dimasukkan


        //  //pencatatan jurnal pada saat pembayaran beban menggunakan metode hard code
        //  $sql = "    INSERT INTO jurnal(`id_transaksi`, `kode_akun`, `tgl_jurnal`, `posisi_d_c`, `nominal`, `kelompok`, `transaksi`)
        //              VALUES(?, '412', ?,'d', ?, 1, 'pembeli')
        //         ";
        //  $hasil = $this->db->query($sql, array($id_transaksi, $kodebeban, $waktu, $biaya));

        //  $sql = "    INSERT INTO jurnal(`id_transaksi`, `kode_akun`, `tgl_jurnal`, `posisi_d_c`, `nominal`, `kelompok`, `transaksi`)
        //              VALUES(?,'111', ?,'c', ?, 1,'pembeli')
        //         ";
        //  $hasil = $this->db->query($sql, array($id_transaksi, $waktu, $biaya));


                
        // //masukkan ke jurnal contoh lihat di controller pembelian
        // $sql = "    INSERT INTO jurnal(`id_pembelian`, `kode_akun`, `tgl_jurnal`, `posisi_d_c`, `nominal`, `kelompok`, `transaksi`)
        //             SELECT a.id_pembelian, b.kode_akun,a.tanggal,b.posisi,a.total,b.kelompok,b.transaksi
        //             FROM pembeli a
        //             CROSS JOIN transaksi_coa b
        //             WHERE a.id_pembelian = ? AND b.transaksi = 'pembeli' AND b.kelompok = 1
        //     ";
        // $hasil = $this->db->query($sql, array($id_pembelian));



        return $hasil;
    }
    
 
   //untuk mendapatkan data kode Beli
   public function cek_jurnal(){
    $dbResult = $this->db->query("SELECT IFNULL(MAX(id_pembelian),0) as id_pembelian from pembeli");
    return $dbResult->getResult();
}

    
   //untuk mendapatkan data kode Beli
   public function getBeliData(){
    $dbResult = $this->db->query("SELECT * FROM bahan_baku WHERE id_bahanbaku LIKE 'Bb%' AND length(id_bahanbaku)>1");
    return $dbResult->getResult();
}

 //untuk mendapatkan data list Beli
 public function getListBeli(){
    $dbResult = $this->db->query("SELECT * FROM pembeli");
    return $dbResult->getResult();
}

 //untuk mendapatkan data list Beli
 public function getPermintaan(){
    // $dbResult = $this->db->query("SELECT * FROM detail_permintaan WHERE id_permintaan LIKE 'P%' AND length(id_permintaan)>1");
    $dbResult = $this->db->query("SELECT * FROM c_permintaan WHERE status = 'selesai'");
    return $dbResult->getResult();
}

    // public function inputJurnal(){
    //      $sql = "    INSERT INTO jurnal(`id_transaksi`, `kode_akun`, `tgl_jurnal`, `posisi_d_c`, `nominal`, `kelompok`, `transaksi`)
    //                  VALUES(?, '111', ?, 'd', ?, 1,'pembeli')
    //             ";
    //      $hasil = $this->db->query($sql, array($id_transaksi, $kodebeban, $waktu, $biaya));

    //      $sql = "    INSERT INTO jurnal(`id_transaksi`, `kode_akun`, `tgl_jurnal`, `posisi_d_c`, `nominal`, `kelompok`, `transaksi`)
    //                  VALUES(?, '411', ?, 'c', ?, 1,'pembeli')
    //             ";
    //      $hasil = $this->db->query($sql, array($id_transaksi, $waktu, $biaya));

    //     return $hasil;
    // }

}