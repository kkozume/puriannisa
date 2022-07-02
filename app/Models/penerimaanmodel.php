<?php

namespace App\Models;

use CodeIgniter\Model;

class penerimaanmodel extends Model
{
    protected $table = 'penerimaan';

    public function getAll(){
        return $this->findAll();
    }
    public function getAll2(){
        $sql = "SELECT a.*,b.nama_suplier
FROM `penerimaan` a 
LEFT OUTER JOIN supplier b ON (a.id_supplier=b.id_supplier)";
        $dbResult = $this->db->query($sql, array());
        return $dbResult->getResult('array');
    }

    
    //untuk memasukkan data akun
    public function insertData(){
        $id_supplier = $_POST['id_supplier'];
        $hasil = $this->db->query("INSERT INTO supplier SET id_supplier = ?", array($id_supplier));
        return $hasil;
    }


}