<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminSantri extends BaseController
{
    protected $helpers = ['auth','url'];
    protected $config;

    function __construct()
    {
        $this->db = \Config\Database::connect();

    }

    public function index()
    {

        if (logged_in() && in_groups(1, true) || logged_in() && in_groups(4, true)) {

            $santri_model = $this->db->table('santri')
                ->select('*')
                ->select('users.id as uid')
                ->where('users.status', NULL)
                ->join('users', 'santri.user_id = users.id')
                ->groupBy('santri.user_id')
                ->orderBy('full_name', 'DESC')
                ->get()->getResultArray();

            $d = [
                'judul' => 'Calon Santri',
                'data_santri' => $santri_model,
                 'data_db' =>$this->db,
            ];
            return view('admin/sudah-daftar', $d);
        } else {
            return redirect()->to('/');
        }
    }

    public function detail_santri($id)
    {
        if (logged_in() && in_groups(1, true) || logged_in() && in_groups(4, true)) {
            $santri_model = $this->db->table('santri')
                ->select('*')
                ->select(
                    'users.full_name as nama_lengkap,
             sekolah_asal.alamat as alamat_sekolah_asal,
             sekolah_asal.desa_kelurahan as desa_kelurahan_sekolah_asal,
             sekolah_asal.kecamatan as kecamatan_sekolah_asal,
             sekolah_asal.kabupaten_kota as kabupaten_kota_sekolah_asal,
             sekolah_asal.provinsi as provinsi_sekolah_asal,
             santri.alamat as alamat_santri,
             santri.desa_kelurahan as desa_kelurahan_santri,
             santri.kecamatan as kecamatan_santri,
             santri.kabupaten_kota as kabupaten_kota_sekolahan,
             santri.provinsi as provinsi_santri,
             wali_murid.alamat as alamat_wali_murid,
             wali_murid.desa_kelurahan as desa_kelurahan_wali_murid,
             wali_murid.kecamatan as kecamatan_wali_murid,
             wali_murid.kabupaten_kota as kabupaten_kota_wali_murid,
             wali_murid.provinsi as provinsi_wali_murid,
             wali_murid.posisi as posisi,
             berkas.status as status_berkas,
             users.id  as uid,
             pembayaran.tanggal as tgl_pembayaran,
             pembayaran.status as status_pembayaran,

            '
                )
                ->join('users', 'santri.user_id = users.id', 'right')
                ->join('wali_murid', 'wali_murid.user_id = santri.user_id', 'left')
                ->join('sekolah_asal', 'santri.user_id=sekolah_asal.user_id', 'left')
                ->join('berkas', 'santri.user_id=berkas.user_id', 'left')
                ->join('pembayaran', 'santri.user_id=pembayaran.user_id', 'left')
                ->limit(1)
                ->where('users.id', $id)
                ->get()->getFirstRow();

            $ayah = $this->orang_tua($santri_model->uid, 'Ayah');
            $ibu = $this->orang_tua($santri_model->uid, 'Ibu');
            $wali_murid = $this->orang_tua($santri_model->uid, 'WaliMurid');


            $d = [
                'judul' => 'Data Santri',
                'data_santri' => $santri_model,
                'ayah' => $ayah,
                'ibu' => $ibu,
                'wali_murid' => $wali_murid,
            ];
            return view('admin/detail-santri', $d);
        } else {
            return redirect()->to('/');
        }
    }

    public function show_by_jenjang($jenjang){

        if(logged_in() && in_groups(1,true) || logged_in() && in_groups(4,true)){
        if($jenjang == 'smpit-putra'){
            $el = 'SMPIT Putra';
        }elseif($jenjang == 'smpit-putri'){
            $el = 'SMPIT Putri';
        }elseif($jenjang == 'smait-putra'){
            $el = 'SMAIT Putra';
        }elseif($jenjang == 'smait-putri'){
            $el = 'SMAIT Putri';
        }elseif($jenjang == 'takhosus'){
            $el = 'TAKHOSUS';
        }else{
            $el = 'SDIT';
        }

       $santri_model = $this->db->table('users')
        ->select('*')
         ->select('users.id as uid, ')
         ->where('educational_level',$el)
        ->join('santri','santri.user_id = users.id','right')
        ->groupBy('santri.user_id')
        ->orderBy('full_name','DESC')
        ->get()->getResultArray();
      
        $d=[
        'judul' => 'Calon Santri '. $el,
        'data_santri'=>$santri_model,
        ];
        return view('admin/sudah-daftar',$d);
      }else{
         return redirect()->to('/');
      }
    }


    public function orang_tua($user_id,$posisi){
        $data = $this->db->table('wali_murid')
        ->select('*')
        ->where(['user_id'=>$user_id, 'posisi'=>$posisi])
        ->get()
        ->getFirstRow();
        return $data;
    }
}
