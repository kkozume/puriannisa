<?php
namespace App\Models;

use CodeIgniter\Model;

class jurnal_model extends Model {
    protected $table = 'jurnal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_pembelian','id','kode_akun','tgl_jurnal','posisi_d_c','nominal'];


   
}

