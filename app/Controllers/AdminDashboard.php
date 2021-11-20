<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use App\Models\SantriModel;
use App\Models\SekolahAsalModel;
use App\Models\BerkasModel;
use App\Models\PembayaranModel;
use App\Models\WaliMuridModel;
use App\Models\UndanganModel;

class AdminDashboard extends BaseController
{
    
    public function __construct()
    {
        $this->user_model = new UserModel();
        $this->santri_model = new SantriModel();
        $this->sekolah_asal_model = new SekolahAsalModel();
        $this->wali_murid_model = new WaliMuridModel();
        $this->berkas_model = new BerkasModel();
        $this->pembayaran_model = new PembayaranModel();
        $this->undangan_model = new UndanganModel();
        helper(['form', 'url','auth']);

         $this->db = \Config\Database::connect();
    }

    public function index(){
    
        $d=[
        'judul'=>'',
        'total_pendaftar'=> $this->total_user(),
        'total_santri'=>$this->total_santri(),

        'total_ra'=>$this->total_jenjang('SDIT'),
        'total_mi'=>$this->total_jenjang('SMPIT Putra'),
        'total_mts_putra'=>$this->total_jenjang('SMPIT Putri'),
        'total_mts_putri'=>$this->total_jenjang('SMAIT Putra'),
        'total_ma_putra'=>$this->total_jenjang('SMAIT Putri'),
        'total_ma_putri'=>$this->total_jenjang('TAKHOSUS'),

        'total_pembayaran'=>$this->total_pembayaran(),
        'total_verifikasi_pembayaran'=>$this->total_verifikasi_pembayaran(),

        'total_pembayaran_ra'=>$this->total_pembayaran_by_jenjang('SDIT'),
        'total_pembayaran_mi'=>$this->total_pembayaran_by_jenjang('SMPIT Putra'),
        'total_pembayaran_mts_putra'=>$this->total_pembayaran_by_jenjang('SMPIT Putri'),
        'total_pembayaran_mts_putri'=>$this->total_pembayaran_by_jenjang('SMAIT Putra'),
        'total_pembayaran_ma_putra'=>$this->total_pembayaran_by_jenjang('SMAIT Putri'),
        'total_pembayaran_ma_putri'=>$this->total_pembayaran_by_jenjang('TAKHOSUS'),

        'total_verifikasi_ra'=> $this->total_verifikasi_pembayaran_by_jenjang('SDIT'),
        'total_verifikasi_mi'=> $this->total_verifikasi_pembayaran_by_jenjang('SMPIT Putra'),
        'total_verifikasi_mts_putra'=> $this->total_verifikasi_pembayaran_by_jenjang('SMPIT Putri'),
        'total_verifikasi_mts_putri'=> $this->total_verifikasi_pembayaran_by_jenjang('SMAIT Putra'),
        'total_verifikasi_ma_putra'=> $this->total_verifikasi_pembayaran_by_jenjang('SMAIT Putri'),
        'total_verifikasi_ma_putri'=> $this->total_verifikasi_pembayaran_by_jenjang('TAKHOSUS'),
        'last_login'=>$this->last_login(),
        'total_berkas'=> $this->total_berkas(),
    ];

     return view('admin/dashboard',$d);
    
     
    }

    function total_user(){
     $data_user = $this->user_model->countAllResults();
     return  $data_user;
    }

    function total_santri(){
     $data_santri = $this->santri_model
     ->select('user_id')
     ->groupBy('user_id')
     ->countAllResults();
     return $data_santri;
    }

    function total_jenjang($jenjang ){
    	$data_santri = $this->santri_model
        ->select('user_id')
        ->join('users','users.id = santri.user_id','right')
        ->groupBy('user_id')
        ->where('users.educational_level',$jenjang)
        ->countAllResults();
        return $data_santri;
    }

    function total_pembayaran(){
     $data_pembayaran = $this->pembayaran_model
     ->groupBy('user_id')
     ->countAllResults();
     return $data_pembayaran;
    }

    function total_verifikasi_pembayaran(){
     $verifikasi_pembayaran = $this->pembayaran_model
     ->where('status',1)->countAllResults();
     return $verifikasi_pembayaran;
    }

    function total_pembayaran_by_jenjang($jenjang){
     $data_pembayaran = $this->pembayaran_model
     ->select('user_id')
     ->join('users','users.id = pembayaran.user_id')
     ->groupBy('user_id')
     ->where('users.educational_level',$jenjang)
     ->countAllResults();
     return $data_pembayaran;
    }

    function total_verifikasi_pembayaran_by_jenjang($jenjang){
     $verifikasi_pembayaran = $this->pembayaran_model
     ->select('user_id')
     ->join('users','users.id = pembayaran.user_id')
     ->where('users.educational_level',$jenjang)
     ->where('pembayaran.status',1)->countAllResults();
     return $verifikasi_pembayaran;
    }

    function last_login(){
        $model = $this->db->table('auth_logins')
        ->orderBy('id','DESC')
        ->get()->getFirstRow();
        $ip = $model->ip_address; 
        $email = $model->email;
        $time = $model->date;
        return 'IP :'. $ip .'<br> Email:'. $email .'<br> waktu: '.$time;
    }

    function total_berkas(){
      $model = $this->berkas_model
      ->select('berkas.user_id')
      ->join('users','users.id = berkas.user_id')
      ->groupBy('berkas.user_id')
      ->orderBy('users.id','DESC')
      ->countAllResults();
       return $model;
    }

}