<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;

class AdminPembayaran extends BaseController
{
    protected $helpers = ['auth', 'url'];
    protected $config;

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->pembayaran_model = new PembayaranModel();
    }

    public function index()
    {
        //
        if (logged_in() && in_groups(1, true) || logged_in() && in_groups(3, true)) {

            // $pembayaran = $this->pembayaran_model->yang_sudah_bayar();
            $pembayaran = $this->db->table('pembayaran')
                ->select(
                    'pembayaran.id as pid, 
                users.registration_number as reg,
                 users.id as uid,
                 users.full_name,
                 users.registration_number,
                 pembayaran.tanggal,
                 pembayaran.no_kwitansi,
                 pembayaran.jenis_pembayaran,
                 pembayaran.bukti,
                 pembayaran.status,
                 pembayaran.catatan,
                 pembayaran.created_at as tgl_input,
                '
                )
                ->join('users', 'pembayaran.user_id = users.id', 'right')
                ->where(['pembayaran.code' => 'BP'])
                ->groupBy('pembayaran.user_id')
                ->orderBy('pembayaran.id', 'DESC')
                ->get()->getResultArray();
            $d = [
                'pembayaran' => $pembayaran,
                'judul' => 'Yang sudah Membayar pendaftaran',

            ];
            return view('admin/sudah-bayar', $d);
        } else {
            return redirect()->to('/');
        }
    }


    // detail sudah bayar

    public function view($id)
    {

        $pembayaran = $this->db->table('pembayaran')
            ->select(
                'pembayaran.id as pid, 
           users.registration_number as reg,
            users.id as uid,
            users.educational_level as jenjang,
            users.full_name,
            users.registration_number,
            pembayaran.tanggal,
            pembayaran.no_kwitansi,
            pembayaran.jenis_pembayaran,
            pembayaran.bukti,
            pembayaran.status,
            pembayaran.catatan,
            pembayaran.created_at as tgl_input,
           '
            )
            ->join('users', 'pembayaran.user_id = users.id', 'right')
            ->where(['pembayaran.id' => $id])
            ->groupBy('users.registration_number')
            ->orderBy('pembayaran.id', 'DESC')
            ->get()->getFirstRow();

        $d = [
            'judul' => 'Detail Pembayaran',
            'data_bayar' => $pembayaran,
        ];
        return view('admin/konfirmasi-pembayaran', $d);
    }

    // pembayaran
    //=========================================================

    // RA bayar==
    public function sdit_bayar()
    {

        if (logged_in() && in_groups(1, true)) {

            // $pembayaran = $this->pembayaran_model->yang_sudah_bayar();
            $pembayaran = $this->db->table('pembayaran')
                ->select(
                    'pembayaran.id as pid, 
       users.registration_number as reg,
        users.id as uid,
        users.full_name,
        users.registration_number,
        pembayaran.tanggal,
        pembayaran.no_kwitansi,
        pembayaran.jenis_pembayaran,
        pembayaran.bukti,
        pembayaran.status,
        pembayaran.catatan,
        pembayaran.created_at as tgl_input,
       '
                )
                ->join('users', 'pembayaran.user_id = users.id')
                ->where('educational_level', 'SDIT')
                ->groupBy('pembayaran.user_id')
                ->orderBy('pembayaran.id', 'DESC')
                ->get()->getResultArray();
            $d = [
                'pembayaran' => $pembayaran,
                'judul' => 'Yang sudah Membayar pendaftaran',

            ];
            return view('admin/sudah-bayar', $d);
        } else {
            return redirect()->to('/');
        }
    }

    // smpit bayar===
    public function smpit_putra_bayar()
    {

        if (logged_in() && in_groups(1, true)) {

            // $pembayaran = $this->pembayaran_model->yang_sudah_bayar();
            $pembayaran = $this->db->table('pembayaran')
                ->select(
                    'pembayaran.id as pid, 
       users.registration_number as reg,
        users.id as uid,
        users.full_name,
        users.registration_number,
        pembayaran.tanggal,
        pembayaran.no_kwitansi,
        pembayaran.jenis_pembayaran,
        pembayaran.bukti,
        pembayaran.status,
        pembayaran.catatan,
        pembayaran.created_at as tgl_input,
       '
                )
                ->join('users', 'pembayaran.user_id = users.id')
                ->where('educational_level', 'SMPIT Putra')
                ->groupBy('pembayaran.user_id')
                ->orderBy('pembayaran.id', 'DESC')
                ->get()->getResultArray();
            $d = [
                'pembayaran' => $pembayaran,
                'judul' => 'Yang sudah Membayar pendaftaran',

            ];
            return view('admin/sudah-bayar', $d);
        } else {
            return redirect()->to('/');
        }
    }

    // smpit bayar===
    public function smpit_putri_bayar()
    {

        if (logged_in() && in_groups(1, true)) {

            // $pembayaran = $this->pembayaran_model->yang_sudah_bayar();
            $pembayaran = $this->db->table('pembayaran')
                ->select(
                    'pembayaran.id as pid, 
       users.registration_number as reg,
        users.id as uid,
        users.full_name,
        users.registration_number,
        pembayaran.tanggal,
        pembayaran.no_kwitansi,
        pembayaran.jenis_pembayaran,
        pembayaran.bukti,
        pembayaran.status,
        pembayaran.catatan,
        pembayaran.created_at as tgl_input,
       '
                )
                ->join('users', 'pembayaran.user_id = users.id')
                ->where('educational_level', 'SMPIT Putri')
                ->groupBy('pembayaran.user_id')
                ->orderBy('pembayaran.id', 'DESC')
                ->get()->getResultArray();
            $d = [
                'pembayaran' => $pembayaran,
                'judul' => 'Yang sudah Membayar pendaftaran',

            ];
            return view('admin/sudah-bayar', $d);
        } else {
            return redirect()->to('/');
        }
    }

    // smpit bayar===
    public function smait_putra_bayar()
    {

        if (logged_in() && in_groups(1, true)) {

            // $pembayaran = $this->pembayaran_model->yang_sudah_bayar();
            $pembayaran = $this->db->table('pembayaran')
                ->select(
                    'pembayaran.id as pid, 
       users.registration_number as reg,
        users.id as uid,
        users.full_name,
        users.registration_number,
        pembayaran.tanggal,
        pembayaran.no_kwitansi,
        pembayaran.jenis_pembayaran,
        pembayaran.bukti,
        pembayaran.status,
        pembayaran.catatan,
        pembayaran.created_at as tgl_input,
       '
                )
                ->join('users', 'pembayaran.user_id = users.id')
                ->where('educational_level', 'SMAIT Putra')
                ->groupBy('pembayaran.user_id')
                ->orderBy('pembayaran.id', 'DESC')
                ->get()->getResultArray();
            $d = [
                'pembayaran' => $pembayaran,
                'judul' => 'Yang sudah Membayar pendaftaran',

            ];
            return view('admin/sudah-bayar', $d);
        } else {
            return redirect()->to('/');
        }
    }

    // smait bayar===
    public function smait_putri_bayar()
    {

        if (logged_in() && in_groups(1, true)) {

            // $pembayaran = $this->pembayaran_model->yang_sudah_bayar();
            $pembayaran = $this->db->table('pembayaran')
                ->select(
                    'pembayaran.id as pid, 
       users.registration_number as reg,
        users.id as uid,
        users.full_name,
        users.registration_number,
        pembayaran.tanggal,
        pembayaran.no_kwitansi,
        pembayaran.jenis_pembayaran,
        pembayaran.bukti,
        pembayaran.status,
        pembayaran.catatan,
        pembayaran.created_at as tgl_input,
       '
                )
                ->join('users', 'pembayaran.user_id = users.id')
                ->where('educational_level', 'SMAIT Putri')
                ->groupBy('pembayaran.user_id')
                ->orderBy('pembayaran.id', 'DESC')
                ->get()->getResultArray();
            $d = [
                'pembayaran' => $pembayaran,
                'judul' => 'Yang sudah Membayar pendaftaran',

            ];
            return view('admin/sudah-bayar', $d);
        } else {
            return redirect()->to('/');
        }
    }

    // smpit bayar===
    public function takhosus_bayar()
    {

        if (logged_in() && in_groups(1, true)) {

            // $pembayaran = $this->pembayaran_model->yang_sudah_bayar();
            $pembayaran = $this->db->table('pembayaran')
                ->select(
                    'pembayaran.id as pid, 
       users.registration_number as reg,
        users.id as uid,
        users.full_name,
        users.registration_number,
        pembayaran.tanggal,
        pembayaran.no_kwitansi,
        pembayaran.jenis_pembayaran,
        pembayaran.bukti,
        pembayaran.status,
        pembayaran.catatan,
        pembayaran.created_at as tgl_input,
       '
                )
                ->join('users', 'pembayaran.user_id = users.id')
                ->where('educational_level', 'TAKHOSUS')
                ->groupBy('pembayaran.user_id')
                ->orderBy('pembayaran.id', 'DESC')
                ->get()->getResultArray();
            $d = [
                'pembayaran' => $pembayaran,
                'judul' => 'Yang sudah Membayar pendaftaran',

            ];
            return view('admin/sudah-bayar', $d);
        } else {
            return redirect()->to('/');
        }
    }

    public function valid_pembayaran($id)
    {
        $data = ['status' => 1];
        $this->pembayaran_model->update($id, $data);
    }
}
