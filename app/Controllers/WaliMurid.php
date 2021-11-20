<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WaliMuridModel; 
class WaliMurid extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->wali_murid_model = new WaliMuridModel();
        helper('form','auth','file');
    }

    public function index()
    {
        //
    }

    public function create_ayah(){
        $d =[
            'judul'=>'Isi Data Ayah',
            'action'=> base_url('santri/create-wali-murid-action'),
            'posisi'=>'Ayah',
        ];
       return view('wali-murid/form-wali-murid',$d);
    }

    public function create_ibu(){
        $d =[
            'judul'=>'Isi Data Ibu',
            'action'=> base_url('santri/create-wali-murid-action'),
            'posisi'=>'Ibu',
        ];
       return view('wali-murid/form-wali-murid',$d);
    }

    public function create_wali_murid(){
        $d =[
            'judul'=>'Isi Data Wali Murid',
            'action'=> base_url('santri/create-wali-murid-action'),
            'posisi'=>'Wali Murid',
        ];
       return view('wali-murid/form-wali-murid',$d);
    }

    public function create_action(){
        $data=[
            'nama' => $this->request->getVar('nama'),
            'tempat_lahir'     => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir'     => $this->request->getVar('tanggal_lahir'),
            'pekerjaan'     => $this->request->getVar('pekerjaan'),
            'penghasilan'     => $this->request->getVar('penghasilan'),
            'pendidikan_terakhir'     => $this->request->getVar('pendidikan_terakhir'),
            'jurusan'     => $this->request->getVar('jurusan'),
            'no_hp'     => $this->request->getVar('no_hp'),
            'email'     => $this->request->getVar('email'),
            'status'     => $this->request->getVar('status'),
            'posisi'     => $this->request->getVar('posisi'),
            'nik'     => $this->request->getVar('nik'),
            'user_id'=>user_id(),   
            //================
            'alamat'     => $this->request->getVar('alamat'),
            'desa_kelurahan'     => $this->request->getVar('desa_kelurahan'),
            'kecamatan'     => $this->request->getVar('kecamatan'),
            'kabupaten_kota'     => $this->request->getVar('kabupaten_kota'),
            'provinsi'     => $this->request->getVar('provinsi'),
            'negara'     => $this->request->getVar('negara'),
            'kode_pos'     => $this->request->getVar('kode_pos'),
        ];
        $this->wali_murid_model->insert($data);
        $get_id = $this->db->insertID();
        session()->setFlashdata('message', 'Data telah di input');
        return  redirect()->to('santri/dashboard');
    }

    public function edit($id){
        $model = $this->wali_murid_model->where('id',$id)->first();
        $posisi = $model['posisi'];
        $d =[
            'judul'=>'Edit Data '.$posisi,
            'action'=> base_url('santri/edit-wali-murid-action/'.$id),
            'data_wali_murid'=>$model,
            'posisi'=> $posisi,
            'required'=>'',

        ];
        return view('wali-murid/form-wali-murid',$d);
    }

    public function edit_action($id){
        $data =  [
            'nama' => $this->request->getVar('nama'),
            'tempat_lahir'     => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir'     => $this->request->getVar('tanggal_lahir'),
            'pekerjaan'     => $this->request->getVar('pekerjaan'),
            'penghasilan'     => $this->request->getVar('penghasilan'),
            'pendidikan_terakhir'     => $this->request->getVar('pendidikan_terakhir'),
            'jurusan'     => $this->request->getVar('jurusan'),
            'no_hp'     => $this->request->getVar('no_hp'),
            'email'     => $this->request->getVar('email'),
            'status'     => $this->request->getVar('status'),
            'posisi'     => $this->request->getVar('posisi'),
            'nik'     => $this->request->getVar('nik'),
            'user_id'=>user_id(),   
            //================
            'alamat'     => $this->request->getVar('alamat'),
            'desa_kelurahan'     => $this->request->getVar('desa_kelurahan'),
            'kecamatan'     => $this->request->getVar('kecamatan'),
            'kabupaten_kota'     => $this->request->getVar('kabupaten_kota'),
            'provinsi'     => $this->request->getVar('provinsi'),
            'negara'     => $this->request->getVar('negara'),
            'kode_pos'     => $this->request->getVar('kode_pos'),
        ];
         $this->wali_murid_model->update($id,$data);
         $posisi = $this->wali_murid_model->where('posisi',$data['posisi'])->get()->getRowObject();
        session()->setFlashdata('message','Data '.$posisi->posisi.' telah di input');
        return  redirect()->to('santri/dashboard');
    }
}
