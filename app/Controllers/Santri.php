<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SantriModel;

class Santri extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->santri_model = new SantriModel();
        helper('form','auth','file');
    }

    public function index()
    {
        //
    }

    public function view ($id){

    }

    public function create(){
        $d =[
            'judul'=>'Isi Profil Santri',
            'action'=> base_url('steping/santri-action'),
        ];
       return view('santri/form-santri',$d);
    }

    public function create_action(){

        $this->santri_model->insert([
            'nisn'     => $this->request->getVar('nisn'),
            'nik'   => $this->request->getVar('nik'),
            'kontak'   => $this->request->getVar('kontak'),
            'golongan_darah'   => $this->request->getVar('golongan_darah'),
            'anak_ke'   => $this->request->getVar('anak_ke'),
            'status_anak'   => $this->request->getVar('status_anak'),
            'tinggi_badan'   => $this->request->getVar('tinggi_badan'),
            'berat_badan'   => $this->request->getVar('berat_badan'),
            'status_tinggal'   => $this->request->getVar('status_tinggal'),
            'pembiayaan'   => $this->request->getVar('pembiayaan'),
            'alamat'   => $this->request->getVar('alamat'),
            'desa_kelurahan'   => $this->request->getVar('desa_kelurahan'),
            'kecamatan'   => $this->request->getVar('kecamatan'),
            'kabupaten_kota'   => $this->request->getVar('kabupaten_kota'),
            'provinsi'   => $this->request->getVar('provinsi'),
            'kode_pos'   => $this->request->getVar('kode_pos'),
            'negara'   => $this->request->getVar('negara'),
            'hobi'   => $this->request->getVar('hobi'),
            'cita_cita'   => $this->request->getVar('cita_cita'),
            'jumlah_hafalan'   => $this->request->getVar('jumlah_hafalan'),
            'user_id'   => user_id(),
        ]);
        session()->setFlashdata('message', 'Data Santri telah di input');
        return  redirect()->to('santri/dashboard');

    }

    public function edit($id){

        $model = $this->santri_model->where('id',$id)->first();
        $d =[
            'judul'=>'Edit Profil Santri',
            'action'=> base_url('santri/edit-santri-action/'.$id),
            'data_santri'=>$model,
        ];
       return view('santri/form-santri',$d);

    }

    public function edit_action($id){

        $this->santri_model->update($id, [
            'nisn'     => $this->request->getVar('nisn'),
            'nik'   => $this->request->getVar('nik'),
            'kontak'   => $this->request->getVar('kontak'),
            'golongan_darah'   => $this->request->getVar('golongan_darah'),
            'anak_ke'   => $this->request->getVar('anak_ke'),
            'status_anak'   => $this->request->getVar('status_anak'),
            'tinggi_badan'   => $this->request->getVar('tinggi_badan'),
            'berat_badan'   => $this->request->getVar('berat_badan'),
            'status_tinggal'   => $this->request->getVar('status_tinggal'),
            'pembiayaan'   => $this->request->getVar('pembiayaan'),
            'alamat'   => $this->request->getVar('alamat'),
            'desa_kelurahan'   => $this->request->getVar('desa_kelurahan'),
            'kecamatan'   => $this->request->getVar('kecamatan'),
            'kabupaten_kota'   => $this->request->getVar('kabupaten_kota'),
            'provinsi'   => $this->request->getVar('provinsi'),
            'kode_pos'   => $this->request->getVar('kode_pos'),
            'negara'   => $this->request->getVar('negara'),
            'hobi'   => $this->request->getVar('hobi'),
            'cita_cita'   => $this->request->getVar('cita_cita'),
            'jumlah_hafalan'   => $this->request->getVar('jumlah_hafalan'),
            'user_id'   => user_id(),
        ]);

        session()->setFlashdata('message','Data Santri Berhasil di Update');
        return  redirect()->to('santri/dashboard');

    }
}
