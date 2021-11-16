<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SantriModel;
use App\Models\WaliMuridModel;

class Download extends BaseController
{
    public function __construct()
    {
        $this->santri_model = new SantriModel();
        $this->wali_murid_model = new WaliMuridModel();
    }
    public function index()
    {
        //
    }

    /*==================================*/
    /* surat pernyataan orang tua
    ====================================*/
    public function pernyataan_orang_tua_view(){
        $model = $this->santri_model->where('user_id',user_id())->first();
        $d=[
          'tahun_ajaran'=>'2021/2022',
          'data_santri'=>$model,
        ];
        return view('download/pernyataan-orang-tua',$d);
    }
    public function pernyataan_orang_tua(){
        $model = $this->santri_model->where('user_id',user_id())->first();
        $d=[
          'tahun_ajaran'=>'2021/2022',
          'data_santri'=>$model,
        ];
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('download/pernyataan-orang-tua',$d));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('surat-pernyataan.pdf');
    }

    /*==================================*/
    /* sata profil santri
    ====================================*/
    public function data_santri_view(){
        $model = $this->santri_model
        ->select('*')
        ->select('santri.alamat as san_alamat, santri.desa_kelurahan as san_desa_kel, santri.kecamatan as san_kecamatan, santri.kabupaten_kota as san_kab, santri.provinsi as san_provinsi, santri.negara as san_negara, santri.kode_pos as san_kode_pos')
        ->where('santri.user_id',user_id())
        ->join('sekolah_asal ', 'sekolah_asal.user_id = santri.user_id')
        ->join('wali_murid', 'wali_murid.id = santri.user_id')
        ->first();
        $d=[
          'tahun_ajaran'=>'2021/2022',
          'data_santri'=>$model,
          'data_ayah'=> $this->wali_murid('Ayah'),
          'data_ibu'=> $this->wali_murid('Ibu'),
          'data_wali_murid'=> $this->wali_murid('WaliMurid'),
        ];
        return view('download/data-santri',$d);
    }
    public function data_santri(){
        $model = $this->santri_model->where('user_id',user_id())->first();
        $d=[
          'tahun_ajaran'=>'2021/2022',
          'data_santri'=>$model,
        ];
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('download/data-santri',$d));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('data-santri.pdf');
    }

    function wali_murid($posisi){
      $wali_murid = $this->wali_murid_model->where('posisi',$posisi)->first();
      return $wali_murid;
    }
}
