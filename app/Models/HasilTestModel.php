<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilTestModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'hasil_test';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nisn', 'nama_lengkap', 'nilai_alquran', 'nilai_kepribadian','kemampuan_dasar','jumlah', 'nilai_rata_rata', 'rangking', 'test_kesehatan','keterangan'];

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


    public function cek_data($nisn){
        return $this->db->table($this->table)
        ->where('nisn',$nisn)
        ->get()
        ->getRowArray();
    }
    public function add_data($data){
        return $this->db->table($this->table)->insert($data);
    }

    public function showAll(){
        $data = $this->db->table($this->table)
        ->orderBy('id','DESC')
        ->get()
        ->getResultArray();

        return $data;
    }


}
