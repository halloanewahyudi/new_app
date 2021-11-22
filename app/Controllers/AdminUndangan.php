<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UndanganModel;
use App\Models\SantriMetaModel;



class AdminUndangan extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->undangan_model = new UndanganModel();
        $this->santri_meta_model = new SantriMetaModel();
        helper('form','auth','file');
    }

    public function index()
    {  
      
        $d =[
            'judul'=>'Undangan',
            'data_undangan'=>$this->undangan_model->findAll()
        ];
        return view('admin/list-undangan',$d);
    }


    public function view($id){
        $user = $this->db->table('users')
        ->select('*')
        ->select('users.id as uid')
        ->join('pembayaran','pembayaran.user_id = users.id')
        ->where('users.status',null)->get()->getResultArray();
        $d =[
            'judul'=>'Undangan',
            'data_user'=>$user,
            'data_santri_meta'=>$this->db,
            'data_undangan'=>$this->undangan_model->where('id',$id)->first(),
        ];
        return view('admin/detail-undangan',$d);
    }

    public function create(){
        $d =[
            'judul'=>'Create Undangan',
            'action'=> base_url('admin/create-undangan-action'),
        ];
        return view('admin/form-undangan',$d);
    }
    public function create_action(){
        $this->undangan_model->insert([
            'no_surat'     => $this->request->getVar('no_surat'),
            'hari_tanggal'   => $this->request->getVar('hari_tanggal'),
            'jam'   => $this->request->getVar('jam'),
            'tempat'   => $this->request->getVar('tempat'),
            'jenis_undangan'   => $this->request->getVar('jenis_undangan'),
            'keterangan'   => $this->request->getVar('keterangan'),
        ]);
        session()->setFlashdata('message','Undangan telah di input');
         return  redirect()->to('admin/undangan');

    }

    public function edit($id){
        $model = $this->undangan_model->where('id',$id)->first();
        $d =[
            'judul'=>'Edit Undangan',
            'action'=> base_url('admin/edit-undangan-action/'.$id),
            'data_undangan'=>$model,
        ];
       return view('admin/form-undangan',$d);
    }
    public function edit_action($id){
        $this->undangan_model->update($id,[
            'no_surat'     => $this->request->getVar('no_surat'),
            'hari_tanggal'   => $this->request->getVar('hari_tanggal'),
            'jam'   => $this->request->getVar('jam'),
            'tempat'   => $this->request->getVar('tempat'),
            'jenis_undangan'   => $this->request->getVar('jenis_undangan'),
            'keterangan'   => $this->request->getVar('keterangan'),
        ]);
          session()->setFlashdata('message','Undangan telah di update');
         return  redirect()->to('admin/undangan');
    }

    public function delete($id){
        $this->undangan_model->delete($id);
        return  redirect()->to('admin/undangan');
    }

    public function undang_santri(){
        $this->santri_meta_model->insert([
            'user_id'   => $this->request->getVar('user_id'),
            'undangan_id'   => $this->request->getVar('undangan_id'),
        ]);
    }

    public function batal_ngundang($id){
        $this->santri_meta_model->delete($id);
    }
}
