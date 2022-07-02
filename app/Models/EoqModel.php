<?php

namespace App\Models;

use CodeIgniter\Model;

class EoqModel extends Model
{
    protected $table = 'eoq';

    public function getAll(){
        return $this->findAll();
    }

    //untuk memasukkan data akun
    public function insertData(){
        $kode_eoq = $_POST['kode_eoq'];
        $nama_bahanbaku = $_POST['nama_bahanbaku'];
        $target_produksi = $_POST['target_produksi'];
        $satuan_bb = $_POST['satuan_bb'];
        $safety_stock = $_POST['safety_stock'];
        $reorder_point = $_POST['reorder_point'];
        $eoq = $_POST['eoq'];
        $biaya_optimal = $_POST['biaya_optimal'];

        $hasil = $this->db->query("INSERT INTO eoq SET kode_eoq = ?, nama_bahanbaku =?, target_produksi = ?, satuan_bb = ?, safety_stock=?, reorder_point=?, eoq=?, biaya_optimal=?", 
        array($kode_eoq, $nama_bahanbaku, $target_produksi, $satuan_bb, $safety_stock, $reorder_point, $eoq, $biaya_optimal));
        return $hasil;
    }

    public function getDataEoq1(){
    
   $sql=" SELECT a.*, b.nama_bahanbaku, b.satuan_bb,b.biaya_simpan, b.biaya_pesan, d.target_produksi, e.safety_stock, f.reorder_point
    FROM `eoq` a 
    INNER JOIN bahan_baku b ON (a.kode_eoq=b.id_bahanbaku)
    INNER JOIN target_produksi d ON (a.kode_eoq=d.id_target)
    INNER JOIN safety_stock e ON (a.kode_eoq=e.id_safety)
    INNER JOIN reorder_point f ON (a.kode_eoq=f.id_reorder)";
        $dbResult = $this->db->query($sql, array());
        return $dbResult->getResult('array');
    }

        // public function getDataEoq1(){

        // $sql = "SELECT bahan_baku.nama_bahanbaku, bahan_baku.satuan_bb, target_produksi.target_produksi
        // FROM bahan_baku
        // INNER JOIN target_produksi
        // ON bahan_baku.id_bahanbaku=target_produksi.id_target";

        //     $dbResult = $this->db->query($sql, array());
        //     return $dbResult->getResult('array');
            
        // }

        // public function getDataEoq2(){
        //     $sql = "SELECT safety_stock.safety_stock, reorder_point.reorder_point
        //     FROM safety_stock
        //     INNER JOIN reorder_point
        //     ON safety_stock.id_safety=reorder_point.id_reorder";

        //     $dbResult = $this->db->query($sql, array());
        //     return $dbResult->getResult('array');

        // }



    

}