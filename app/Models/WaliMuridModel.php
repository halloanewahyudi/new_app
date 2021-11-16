<?php

namespace App\Models;

use CodeIgniter\Model;

class WaliMuridModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'wali_murid';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nama', 'tempat_lahir', 'tanggal_lahir', 'pekerjaan', 'penghasilan', 'pendidikan_terakhir', 'jurusan', 'no_hp', 'email', 'status', 'nik', 'posisi', 'alamat', 'desa_kelurahan', 'kecamatan', 'kabupaten_kota', 'provinsi', 'negara', 'kode_pos', 'user_id'];

    // Dates
    protected $useTimestamps        = false;
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


    public function get_ortu($user_id,$posisi){
        $data = $this->where(['user_id'=>$user_id,'posisi'=>$posisi])->first();
        return $data;
    }
}
