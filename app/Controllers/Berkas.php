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
        helper('form', 'auth', 'file','url');
    }
    public function index()
    {
        //
    }
    public function create()
    {
        $berkas_model = $this->berkas_model->where('user_id', user_id())->first();
        $d = [
            'judul' => ' Berkas',
            'action' => base_url('santri/create-berkas-action'),
            'db' => $this->db,
            'data_berkas' => $berkas_model,
            'required' => 'required',
            'data_photo'=> $this->status_berkas(1),
            'data_kesanggupan'=> $this->status_berkas(2),
            'data_rapor_1'=> $this->status_berkas(3),
            'data_rapor_2'=> $this->status_berkas(4),
            'data_akte'=> $this->status_berkas(5),
            'data_kk'=> $this->status_berkas(6),
            'data_hafalan'=> $this->status_berkas(7),
            'data_kesehatan'=> $this->status_berkas(8),
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
        $this->berkas_model->insert($data);
        if ($dataBerkas->isValid() && !$dataBerkas->hasMoved()) {
            $dataBerkas->move('berkas/', $fileName);
        }
        return redirect()->to('santri/create-berkas');
    }
    public function edit($id)
    {
        //
    }
    public function edit_action($id)
    {
        $berkas_model = $this->berkas_model->where('user_id', user_id())->first();
        $dataBerkas = $this->request->getFile('file');
        $dataDescription = $this->request->getVar('deskripsi');
        $fileName = $dataBerkas->getRandomName();
         if ($dataBerkas == '') {
            $bukti =  $berkas_model['file'];
        } else {
            $bukti =  $fileName;
        } 
        if($dataDescription == ''){
            $caption =  $berkas_model['deskripsi'];
        }else{
            $caption = $dataDescription;
        }
        $data = [
            'judul_berkas' => $this->request->getVar('judul_berkas'),
            'deskripsi'     => $caption,
            'status' =>  $this->request->getVar('status'),
            'file' => $bukti,
            'user_id' => user_id(),
        ];
        $this->berkas_model->update($id, $data);
        if ( $dataBerkas->isValid() && ! $dataBerkas->hasMoved()) {
            $dataBerkas->move('berkas/', $fileName);
        }
        return redirect()->to('santri/create-berkas');
    }

    public function delete($id){
      $image =  $this->berkas_model->where('id',$id)->get()->getRowObject();
     $this->berkas_model->delete($id);
     if(isset($image)){
        $file = $image->file;
        $path = base_url('/berkas/'.$file);
        delete_files($path, true);
        chmod($path, 0777);
        unlink($path);
     }
    
  
     return redirect()->to('santri/create-berkas');  
    }

    function status_berkas($status){
        $berkas_model = $this->berkas_model->where(['user_id'=> user_id(),'status'=> $status])->get()->getRowObject();
        return $berkas_model;
    }
    
}
