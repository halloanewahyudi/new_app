<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SantriDashboard extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        helper(['auth']);
    }
    public function index()
    {
    
            $d = [
                'judul' => user()->full_name,
                'data_santri' => $this->profile(),
                'data_sekolah_asal' => $this->sekolah_asal(),
                'data_ayah' => $this->ayah(),
                'data_ibu' => $this->ibu(),
                'data_wali_murid' => $this->wm(),
                'data_pembayaran' => $this->pembayaran(),
                'data_photo_santri' => $this->photo_santri(),
                'data_surat_kesanggupan' => $this->surat_kesanggupan(),
                'data_rapor_semester_1' => $this->rapor_semeter_1(),
                'data_rapor_semester_2' => $this->rapor_semeter_2(),
                'data_akte_kelahiran' => $this->akte_kelahiran(),
                'data_kartu_keluarga' => $this->kartu_keluarga(),
                'data_sertifikat_hafalan' => $this->sertifikat_hafalan(),
                'data_surat_kesehatan' => $this->surat_kesehatan(),
                'data_db'=> $this->db,
            ];
    
            return view('santri-dashboard', $d);
     
    }
    // widget pprofile
    function profile()
    {
        $data_santri = $this->db->table('santri')
            ->select('*')
            ->where(['santri.user_id' => user_id()])
            ->get()
            ->getFirstRow();
        return $data_santri;
    }

    // widget sekolah asal
    function sekolah_asal()
    {
        $data = $this->db->table('sekolah_asal')
            ->where('user_id', user_id())
            ->get()
            ->getFirstRow();
        return $data;
    }

    //widget orang tua
    function wali_murid($posisi)
    {
        $data = $this->db->table('wali_murid')
            ->where(['user_id' => user_id(), 'posisi' => $posisi])
            ->get()
            ->getFirstRow();
        return $data;
    }

    function ayah()
    {
        return $this->wali_murid('Ayah');
    }
    function ibu()
    {
        return $this->wali_murid('Ibu');
    }
    function wm()
    {
        return $this->wali_murid('WaliMurid');
    }

    function pembayaran()
    {
        $data = $this->db->table('pembayaran')
            ->where(['user_id' => user_id()])
            ->get()
            ->getFirstRow();
        return $data;
    }

    //berkas
    function berkas($status)
    {
        $data = $this->db->table('berkas')
            ->select('file')
            ->where(['user_id' => user_id(), 'status' => $status])
            ->get()
            ->getFirstRow();
        return $data;
    }
    // item berkas
    function photo_santri()
    {
        return $this->berkas(1);
    }
    function surat_kesanggupan()
    {
        return $this->berkas(2);
    }
    function rapor_semeter_1()
    {
        return $this->berkas(3);
    }
    function rapor_semeter_2()
    {
        return $this->berkas(4);
    }
    function akte_kelahiran()
    {
        return $this->berkas(5);
    }
    function kartu_keluarga()
    {
        return $this->berkas(6);
    }
    function sertifikat_hafalan()
    {
        return $this->berkas(7);
    }
    function surat_kesehatan()
    {
        return $this->berkas(8);
    }
}
