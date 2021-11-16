<?php
 namespace App\Libraries;

 class Lokasi {

    public $provinces;
    public $regencies;
    public $districts;
    public $villages;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
       // $provinces = $this->db->table('provinces');
        $this->provinces = $this->db->table('provinces');
        $this->regencies = $this->db->table('regencies');
        $this->districts = $this->db->table('districts');
        $this->villages = $this->db->table('villages');
        helper(['form']);
       
    }

    public function kelurahan()
    {
        $model = $this->villages;
        $data = $model->limit(10)->get();
      return  json_encode($data);
    }


 }