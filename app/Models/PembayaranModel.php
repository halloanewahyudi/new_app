<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\This;

class PembayaranModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'pembayaran';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields = ['code','kode_unik','nama_pembayaran', 'tanggal', 'no_kwitansi', 'jenis_pembayaran', 'status', 'catatan', 'bukti', 'user_id'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];


    public function yang_sudah_bayar(){
 
       $data = $this->db->table($this->table)
       ->select(
           'pembayaran.id as pid, 
            users.id as uid,
            users.full_name,
            users.registration_number,
            pembayaran.tanggal,
            pembayaran.no_kwitansi,
            pembayaran.jenis_pembayaran,
            pembayaran.bukti
           ')
        ->join('users','pembayaran.user_id = users.id','right')
        ->where(['pembayaran.code'=>'BP'])
        ->orderBy('pembayaran.id')
        ->get()->getResultArray();  
       return $data;

    }

}


