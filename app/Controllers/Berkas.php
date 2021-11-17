<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BerkasModel;

class Berkas extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->berkas_model = new BerkasModel();
        helper('form', 'auth', 'file');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $berkas_model = $this->berkas_model->where('user_id', user_id())->first();
        $user_id =  user_id();
        if ($berkas_model['user_id'] == $user_id) {
            $action = base_url('santri/create-berkas-action');
        } else {
            $berkas_id = $berkas_model['id'];
            $action = base_url('santri/edit-berkas-action/' . $berkas_id);
        }
        $d = [
            'judul' => ' Berkas',
            'action' => $action,
            'nama_berkas' => 'Uang Pendaftaran',
            'kode_berkas' => 'BP',
            'data_berkas' => $berkas_model,
            'required' => 'required',
        ];

        return view('berkas/form-berkas', $d);
    }

    public function create_action()
    {
        $dataBerkas = $this->request->getFile('file');
        $fileName = $dataBerkas->getRandomName();

        $data = [
            'judul_berkas' => $this->request->getVar('judul_berkas'),
            'deskripsi'     => $this->request->getVar('deskripsi'),
            'status' =>  $this->request->getVar('status'),
            'file' => $fileName,
            'user_id' => user_id(),
        ];
        $this->model->insert($data);
        if ($dataBerkas->isValid() && !$dataBerkas->hasMoved()) {
            $dataBerkas->move('berkas/', $fileName);
        }
    }

    public function edit($id)
    {
        //
    }

    public function edit_action($id)
    {
        $berkas_model = $this->berkas_model->where('user_id', user_id())->first();
        $dataBerkas = $this->request->getFile('bukti');
        $fileName = $dataBerkas->getRandomName();
        if ($dataBerkas == '') {
            $bukti =  $berkas_model['bukti'];
        } else {
            $bukti =  $fileName;
        }
        $data = [
            'judul_berkas' => $this->request->getVar('judul_berkas'),
            'deskripsi'     => $this->request->getVar('deskripsi'),
            'status' =>  $this->request->getVar('status'),
            'file' => $bukti,
            'user_id' => user_id(),
        ];
        $this->berkas_model->update($id, $data);
        if ($dataBerkas->isValid() && !$dataBerkas->hasMoved()) {
            $dataBerkas->move('bukti_berkas/', $fileName);
        }
    }
}
