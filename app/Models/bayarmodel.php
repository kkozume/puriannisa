<?php

namespace App\Models;

use CodeIgniter\Model;

class bayarmodel extends Model
{
    protected $table = 'bayar';

    //untuk menginputkan pembelian dan penjurnalan
    public function inputBeli(){
        $kodeBeli = $_POST['kodeBeli'];
        $id_pembelian = $_POST['id_pembelian'];
        $harga_bb = $_POST['harga_bb']; 
        $tanggal = $_POST['tanggal'];
        
        //jangan lupa jika memakai masking maka dihilangkan dulu nilai maskingnya agar yang masuk ke db adalah murni numeriknya
        $harga_bb = preg_replace( '/[^0-9 ]/i', '', $harga_bb);

        //dapatkan id transaksi untuk pembelian
        $dbResult = $this->db->query("SELECT IFNULL(MAX(id_pembayaran),0) as id_pembayaran from bayar");

        $hasil = $dbResult->getResult();
        //cacah hasilnya
        foreach ($hasil as $row)
        {
            $id_pembayaran = $row->id_pembayaran;
        }
            $id_pembayaran = $id_pembayaran+1; //naikkan 1 untuk id baru modal yang dimasukkan


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
   public function getBeliData(){
    $dbResult = $this->db->query("SELECT * FROM bahan_baku WHERE id_bahanbaku LIKE 'Bb%' AND length(id_bahanbaku)>1");
    return $dbResult->getResult();
}

 //untuk mendapatkan data list Beli
 public function getListBeli(){
    $dbResult = $this->db->query("SELECT * FROM bayar");
    return $dbResult->getResult();
}

 //untuk mendapatkan data list Beli
 public function getPermintaan(){
    // $dbResult = $this->db->query("SELECT * FROM detail_permintaan WHERE id_permintaan LIKE 'P%' AND length(id_permintaan)>1");
    $dbResult = $this->db->query("SELECT * FROM pembeli WHERE status = 'selesai'");
    return $dbResult->getResult();
}

    

}