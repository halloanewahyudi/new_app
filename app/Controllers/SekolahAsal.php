<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SantriModel;
use App\Models\SekolahAsalModel;

class SekolahAsal extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->santri_model = new SantriModel();
        $this->sekolah_asal_model = new SekolahAsalModel();
        helper('form','auth','file');
    }
    
    public function index()
    {
        //
    }

    public function create(){
        $d =[
            'judul'=>'Isi Sekolah Asal',
            'action'=> base_url('santri/sekolah-asal-action'),
        ];
       return view('sekolah-asal/form-sekolah-asal',$d);
    }

    public function create_action(){
        $this->sekolah_asal_model->insert([
            'sekolah_asal'     => $this->request->getVar('sekolah_asal'),
            'npsn'   => $this->request->getVar('npsn'),
            'tahun_lulus'   => $this->request->getVar('tahun_lulus'),
            'alamat'   => $this->request->getVar('alamat'),
            'desa_kelurahan'   => $this->request->getVar('desa_kelurahan'),
            'kecamatan'   => $this->request->getVar('kecamatan'),
            'kabupaten_kota'   => $this->request->getVar('kabupaten_kota'),
            'provinsi'   => $this->request->getVar('provinsi'),
            'kode_pos'   => $this->request->getVar('kode_pos'),
            'user_id'   => user_id(),
        ]);
          session()->setFlashdata('message','Sekolah asal telah di input');
         return  redirect()->to('santri/create-sekolah-asal');
    }

    public function edit($id){
        $model = $this->sekolah_asal_model->where('id',$id)->first();
        $d =[
            'judul'=>'Edit Sekolah Asal',
            'action'=> base_url('santri/edit-sekolah-asal-action/'.$id),
            'data_sekolah_asal'=>$model,
        ];
       return view('sekolah-asal/form-sekolah-asal',$d);
    }

    public function edit_action($id){
        $this->sekolah_asal_model->update($id, [
            'sekolah_asal'     => $this->request->getVar('sekolah_asal'),
            'npsn'   => $this->request->getVar('npsn'),
            'tahun_lulus'   => $this->request->getVar('tahun_lulus'),
            'alamat'   => $this->request->getVar('alamat'),
            'desa_kelurahan'   => $this->request->getVar('desa_kelurahan'),
            'kecamatan'   => $this->request->getVar('kecamatan'),
            'kabupaten_kota'   => $this->request->getVar('kabupaten_kota'),
            'provinsi'   => $this->request->getVar('provinsi'),
            'kode_pos'   => $this->request->getVar('kode_pos'),
            'user_id'   => user_id(),
        ]);
          session()->setFlashdata('message','Sekolah asal telah update');
        return  redirect()->to('santri/edit-sekolah-asal/'.$id);
    }
}
