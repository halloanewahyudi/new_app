<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SantriUserModel;

class SantriUser extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->model = new SantriUserModel();
        helper('form','auth','file');
    }

    public function index()
    {
        //
    }

    public function edit($id){
        $model = $this->model->where('id',$id)->first();
        $d =[
            'judul'=>'Edit User',
            'action'=> base_url('santri/edit-santri-user-action/'.$id),
            'data_user'=>$model,
        ];
       return view('santri/form-user',$d);
    }

    public function edit_action($id){
    
        $data = [
            'email'     => $this->request->getVar('email'),
            'full_name'   => $this->request->getVar('full_name'),
            'date_of_birth'   => $this->request->getVar('date_of_birth'),
            'gender'   => $this->request->getVar('gender'),
            'educational_level' => $this->request->getVar('educational_level'),
        ];
        $this->model->update($id,$data);
        session()->setFlashdata('message','User telah di Edit');
        return  redirect()->to('santri/dashboard');
    }

}
