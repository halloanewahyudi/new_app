<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;
class Pembayaran extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->pembayaran_model = new PembayaranModel();

        helper('form','auth','file');
    }

    public function index()
    {
        //
    }

    public function view($id){

    }

    public function create(){
           $pembayaran_model = $this->pembayaran_model->where('user_id',user_id())->first();
           $user_id =  user_id();
           if($pembayaran_model['user_id'] == $user_id){
            $action = base_url('santri/create-pembayaran-action');
           }else{
            $pembayaran_id = $pembayaran_model['id'];
            $action = base_url('santri/edit-pembayaran-action/'.$pembayaran_id);
           }
            $d = [
                'judul' => 'Pembayaran Pendaftaran',
                'form_id'=>'createPembayaran',
                'action' => $action,
                'nama_pembayaran'=>'Uang Pendaftaran',
                'kode_pembayaran'=>'BP',
                'data_pembayaran'=>$pembayaran_model,
                'required'=> 'required',
                'data_response'=> $pembayaran_model,
            ];

       return view('pembayaran/form-pembayaran',$d);
    }
    public function create_action(){

        $dataBerkas = $this->request->getFile('bukti');
         $fileName = $dataBerkas->getRandomName();
        $data = [
            'code' => $this->request->getVar('code'),
           // 'kode_unik' => $this->request->getVar('kode_unik'),
            'nama_pembayaran' => $this->request->getVar('nama_pembayaran'),
            'no_kwitansi'     => $this->request->getVar('no_kwitansi'),
            'tanggal'     => $this->request->getVar('tanggal'),
            'jenis_pembayaran'     => $this->request->getVar('jenis_pembayaran'),
            'catatan'     => $this->request->getVar('catatan'),
            'bukti' => $fileName,
            'user_id'=>user_id(),   
        ];
        $this->pembayaran_model->insert($data); 
        if ($dataBerkas->isValid() && ! $dataBerkas->hasMoved()) {
            $dataBerkas->move('bukti_pembayaran/', $fileName);
        }
        session()->setFlashdata('message', 'Terimakasih atas pembayarannya');
        return redirect()->to('santri/create-pembayaran');
        
    }
    public function edit($id){
        $pembayaran_model = $this->pembayaran_model->where('user_id',user_id())->first();
        $d = [
            'judul' => 'Pembayaran Pendaftaran',
            'form_id'=>'createPembayaran',
            'action' => base_url('santri/edit-pembayaran-action/'.$id),
            'nama_pembayaran'=>'Uang Pendaftaran',
            'kode_pembayaran'=>'BP',
            'data_pembayaran'=>$pembayaran_model,
            'required'=> '',
            'data_response'=> $pembayaran_model,
        ];

       return view('pembayaran/form-pembayaran',$d);
    }
    public function edit_action($id){
        $pembayaran_model = $this->pembayaran_model->where('user_id',user_id())->first();
        $dataBerkas = $this->request->getFile('bukti');
        $fileName = $dataBerkas->getRandomName();
         if( $dataBerkas == ''){
             $bukti =  $pembayaran_model['bukti'];
         }else{
            $bukti =  $fileName ; 
         }
       $data = [
           'code' => $this->request->getVar('code'),
          // 'kode_unik' => $this->request->getVar('kode_unik'),
           'nama_pembayaran' => $this->request->getVar('nama_pembayaran'),
           'no_kwitansi'     => $this->request->getVar('no_kwitansi'),
           'tanggal'     => $this->request->getVar('tanggal'),
           'jenis_pembayaran'     => $this->request->getVar('jenis_pembayaran'),
           'catatan'     => $this->request->getVar('catatan'),
           'bukti' => $bukti,
           'user_id'=>user_id(),   
       ];
       $this->pembayaran_model->update($id, $data); 
       if ( $dataBerkas->isValid() && ! $dataBerkas->hasMoved()) {
           $dataBerkas->move('bukti_pembayaran/', $fileName);
       }
       session()->setFlashdata('message', 'Terimakasih atas pembayarannya');
       return redirect()->to('santri/edit-pembayaran/'.$id);

    }
}
