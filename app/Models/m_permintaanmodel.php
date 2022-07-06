<?php

namespace App\Models;

use CodeIgniter\Model;

class m_permintaanmodel extends Model
{
    protected $table = 'c_permintaan';

    //untuk menginputkan pembelian dan penjurnalan
    public function inputBeli(){
        $kode = $_POST['kode'];
        // $id_permintaan = $_POST['id_permintaan'];
        $harga_bb = $_POST['harga_bb']; 
        $tgl_permintaan = $_POST['tgl_permintaan'];
        
        
        //jangan lupa jika memakai masking maka dihilangkan dulu nilai maskingnya agar yang masuk ke db adalah murni numeriknya
        $harga_bb = preg_replace( '/[^0-9 ]/i', '', $harga_bb);

        //dapatkan id transaksi untuk pembelian
        $dbResult = $this->db->query("SELECT IFNULL(MAX(id_transaksi),0) as id_transaksi from view_transaksi");

        $hasil = $dbResult->getResult();
        //cacah hasilnya
        foreach ($hasil as $row)
        {
            $id_transaksi = $row->id_transaksi;
        }
            $id_transaksi = $id_transaksi+1; //naikkan 1 untuk id baru modal yang dimasukkan


         //pencatatan jurnal pada saat pembayaran beban menggunakan metode hard code
         $sql = "    INSERT INTO jurnal(`id_transaksi`, `kode_akun`, `tgl_jurnal`, `posisi_d_c`, `nominal`, `kelompok`, `transaksi`)
                     VALUES(?, '412', ?,'d', ?, 1, 'pembeli')
                ";
         $hasil = $this->db->query($sql, array($id_transaksi, $kodebeban, $waktu, $biaya));

         $sql = "    INSERT INTO jurnal(`id_transaksi`, `kode_akun`, `tgl_jurnal`, `posisi_d_c`, `nominal`, `kelompok`, `transaksi`)
                     VALUES(?,'111', ?,'c', ?, 1,'pembeli')
                ";
         $hasil = $this->db->query($sql, array($id_transaksi, $waktu, $biaya));

        return $hasil;
    }
    
   //untuk mendapatkan data kode Beli
   public function getBeliData(){
    $dbResult = $this->db->query("SELECT * FROM bahan_baku WHERE id_bahanbaku LIKE 'Bb%' AND length(id_bahanbaku)>1");
    return $dbResult->getResult();
}

 //untuk mendapatkan data list Beli
 public function getListBeli(){
    $dbResult = $this->db->query("SELECT * FROM c_permintaan");
    return $dbResult->getResult();
}

//  //untuk mendapatkan data list Beli
//  public function getPermintaan(){
//     $dbResult = $this->db->query("SELECT * FROM c_permintaan WHERE id_permintaan LIKE 'R%' AND length(id_permintaan)>1");
//     return $dbResult->getResult();
// }

    public function inputJurnal(){
         $sql = "    INSERT INTO jurnal(`id_transaksi`, `kode_akun`, `tgl_jurnal`, `posisi_d_c`, `nominal`, `kelompok`, `transaksi`)
                     VALUES(?, '111', ?, 'd', ?, 1,'pembeli')
                ";
         $hasil = $this->db->query($sql, array($id_transaksi, $kodebeban, $waktu, $biaya));

         $sql = "    INSERT INTO jurnal(`id_transaksi`, `kode_akun`, `tgl_jurnal`, `posisi_d_c`, `nominal`, `kelompok`, `transaksi`)
                     VALUES(?, '411', ?, 'c', ?, 1,'pembeli')
                ";
         $hasil = $this->db->query($sql, array($id_transaksi, $waktu, $biaya));

        return $hasil;
    }

}