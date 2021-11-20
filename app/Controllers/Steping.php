<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SantriModel;
use App\Models\SekolahAsalModel;
use App\Models\WaliMuridModel; 

class Steping extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->santri_model = new SantriModel();
        $this->sekolah_asal_model = new SekolahAsalModel();
        $this->wali_murid_model = new WaliMuridModel();
        helper('form','auth','file');
    }
    public function index()
    {
        //
    }

    // santri
    public function santri(){
         
            $d =[
                'judul'=>'Isi Profil Santri',
                'action'=> base_url('steping/santri-action'),
            ];
           return view('steping/form-santri',$d);
        
      
    }
    public function santri_action(){
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
        $get_id = $this->db->insertID();
        $res = '<h4>Data Santri  telah di input! </h4> <a href="'.base_url('steping/back-santri/'.$get_id).'" class="btn btn-info btn-sm">Kembali</a> <a href="'.base_url('steping/sekolah-asal').'" class="btn btn-primary btn-sm">Selanjutnya</a>';
        session()->setFlashdata('message', $res);
        return  redirect()->to('response');
    }
    public function back_santri($id){
      $model = $this->santri_model->where('id',$id)->first();
        $d =[
            'judul'=>'Edit Profil Santri',
            'action'=> base_url('steping/back-santri-action/'.$id),
            'data_santri'=>$model,
        ];
       return view('steping/form-santri',$d);
    }

    public function back_santri_action($id){
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
        $res = '<h4>Data Santri  telah di update! </h4> <a href="'.base_url('steping/back-santri/'.$id).'" class="btn btn-info btn-sm">Kembali</a> <a href="'.base_url('steping/sekolah-asal').'" class="btn btn-primary btn-sm">Selanjutnya</a>';
        session()->setFlashdata('message',$res);
        return  redirect()->to('response');
    }

     // sekolah asal
    public function sekolah_asal(){
        $d =[
            'judul'=>'Isi Sekolah Asal',
            'action'=> base_url('steping/sekolah-asal-action'),
        ];
       return view('steping/form-sekolah-asal',$d);
    }
    public function sekolah_asal_action(){

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
        $get_id = $this->db->insertID();
        $res = '<h4>Data Sekolah Asal  telah di input! </h4> <a href="'.base_url('steping/back-sekolah-asal/'.$get_id).'" class="btn btn-info btn-sm">Kembali</a> <a href="'.base_url('steping/ayah').'" class="btn btn-primary btn-sm">Selanjutnya</a>';
        session()->setFlashdata('message',$res);
        return  redirect()->to('response');
    }
    public function back_sekolah_asal($id){
        $model = $this->sekolah_asal_model->where('id',$id)->first();
        $d =[
            'judul'=>'Edit Sekolah Asal',
            'action'=> base_url('steping/back-sekolah-asal-action/'.$id),
            'data_sekolah_asal'=>$model,
        ];
       return view('steping/form-sekolah-asal',$d);
         
    }
    public function back_sekolah_asal_action($id){
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
        $res = '<h4>Data Sekolah Asal  telah di update! </h4> <a href="'.base_url('steping/back-sekolah-asal/'.$id).'" class="btn btn-info btn-sm">Kembali</a> <a href="'.base_url('steping/ayah').'" class="btn btn-primary btn-sm">Selanjutnya</a>';
        session()->setFlashdata('message', $res);
        return  redirect()->to('step-ayah');
    }

    /*================================
    *wali Murid
    =====================================*/
    
    public function ayah(){
        $d =[
            'judul'=>'Isi Data Ayah',
            'action'=> base_url('steping/ayah-action'),
            'posisi'=>'Ayah',
            'required'=>'required',
        ];
       return view('steping/form-wali-murid',$d);
    }

    public function ayah_action(){
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
        $res = '<h4>Data Ayah telah di input! </h4> <a href="'.base_url('steping/back-ayah/'.$get_id).'" class="btn btn-info btn-sm">Kembali</a> <a href="'.base_url('steping/ibu').'" class="btn btn-primary btn-sm">Selanjutnya</a>';
        session()->setFlashdata('message', $res);
        return  redirect()->to('response');
    }
    
    public function back_ayah($id){
        $model = $this->wali_murid_model->where('id',$id)->first();
        $d =[
            'judul'=>'Edit Data Ayah',
            'action'=> base_url('steping/back-ayah-action/'.$id),
            'data_wali_murid'=>$model,
            'posisi'=>'Ayah',
            'required'=>'',

        ];
       return view('steping/form-wali-murid',$d);
    }
    public function back_ayah_action($id){
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
        $res = '<h4>Data Ayah telah di update! </h4> <a href="'.base_url('steping/back-ayah/'.$id).'" class="btn btn-info btn-sm">Kembali</a> <a href="'.base_url('steping/ibu').'" class="btn btn-primary btn-sm">Selanjutnya</a>';
        $this->wali_murid_model->update($id,$data);
        session()->setFlashdata('message', $res);
        return  redirect()->to('response');
    }

  // ibu============================
    public function ibu(){
        $d =[
            'judul'=>'Isi Data Ibu',
            'action'=> base_url('steping/ibu-action'),
            'posisi'=>'Ibu',
            'required'=>'required',
        ];
       return view('steping/form-wali-murid',$d);
    }

    public function ibu_action(){
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
        $res = '<h4>Data Ibu telah di input! </h4> 
        <a href="'.base_url('steping/back-ibu/'.$get_id).'" class="btn btn-info btn-sm">Kembali</a> <a href="'.base_url('santri/dashboard ').'" class="btn btn-success btn-sm">Selesai</a> <br>Atau jika ada wali murid <br><a href="'.base_url('steping/wali-murid').'" class="btn btn-primary btn-sm">Selanjutnya</a> ';
        session()->setFlashdata('message', $res);
        return  redirect()->to('response');
    }
    
    public function back_ibu($id){
        $model = $this->wali_murid_model->where('id',$id)->first();
        $d =[
            'judul'=>'Edit Data Ayah',
            'action'=> base_url('steping/back-ibu-action/'.$id),
            'data_wali_murid'=>$model,
            'posisi'=>'Ibu',
            'required'=>'',

        ];
       return view('steping/form-wali-murid',$d);
    }
    public function back_ibu_action($id){
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
        $res = '<h4>Data Ibu telah di update! </h4> <a href="'.base_url('steping/back-ibu'.$id).'" class="btn btn-info btn-sm">Kembali</a> <a href="'.base_url('santri/dashboard ').'" class="btn btn-success btn-sm">Selesai</a><br> Atau jika ada wali murid<br> <a href="'.base_url('steping/wali-murid').'" class="btn btn-primary btn-sm">Selanjutnya</a>';
        $this->wali_murid_model->update($id,$data);
        session()->setFlashdata('message', $res);
        return  redirect()->to('response');
    }

    // wali murid
    public function wali_murid(){
        $d =[
            'judul'=>'Isi Data Wali Murid',
            'action'=> base_url('steping/wali-murid-action'),
            'posisi'=>'Wali Murid',
            'required'=>'required',
        ];
       return view('steping/form-wali-murid',$d);
    }

    public function wali_murid_action(){
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
        $res = '<h4>Data Wali Murid telah di input </h4> <a href="'.base_url('steping/back-ibu/'.$get_id).'" class="btn btn-info btn-sm">Kembali</a> <a href="'.base_url('steping/wali-murid').'" class="btn btn-primary btn-sm">Selanjutnya</a>';
        session()->setFlashdata('message', $res);
        return  redirect()->to('response');
    }
    
    public function back_wali_murid_action($id){
        $model = $this->wali_murid_model->where('id',$id)->first();
        $d =[
            'judul'=>'Edit Data Wali Murid',
            'action'=> base_url('steping/back-wali-murid-action/'.$id),
            'data_wali_murid'=>$model,
            'posisi'=>'WaliMurid',
            'required'=>'',

        ];
       return view('steping/form-wali-murid',$d);
    }

    public function back_wm_action($id){
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
     
        $res = '<h4>Data Wali Murid telah di input </h4> <a href="'.base_url('steping/back-wali-murid/'.$id).'" class="btn btn-info btn-sm">Kembali</a> <a href="'.base_url('steping/wali-murid').'" class="btn btn-primary btn-sm">Selanjutnya</a>';
        $this->wali_murid_model->update($id,$data);
        session()->setFlashdata('message', $res);
        return  redirect()->to('response');
    }


}
