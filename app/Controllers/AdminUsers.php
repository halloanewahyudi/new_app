<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class AdminUsers extends BaseController
{
    protected $helpers = ['auth','url'];

    function __construct()
    {
        $this->db = \Config\Database::connect();
 
    }

    public function index(){
        if (logged_in() && in_groups(1, true) || logged_in() && in_groups(3, true)) {
            $user_model = $this->db->table('users')
            ->select('*')
            ->select('
             santri.nisn as nisn, 
             santri.nik as nik, 
             santri.user_id as san_user_id, 
             users.id as uid,
             pembayaran.id as pid, 
             pembayaran.user_id as pem_user_id,
             pembayaran.status as p_status')
            ->where('users.status',null)
            ->join('santri','santri.user_id = users.id','left')
            ->join('pembayaran','pembayaran.user_id = santri.user_id','left')
            ->orderBy('users.id','DESC')
            ->groupBy('users.email')  
           ->get() 
           ->getResultArray();
            
            $d = [
                'judul'=>'Calon santri yang daftar',
                'data_user'=> $user_model,
            ];
            return view('admin/daftar-user',$d);
        }else{
            return redirect()->to('/');
        }
    }
}
