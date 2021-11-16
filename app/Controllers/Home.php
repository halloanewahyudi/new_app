<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{

  public function __construct()
  {
    $this->db = \Config\Database::connect();
    helper(['auth']);
  }
  public function index()
  {

    if (logged_in()) {
      if (in_groups('Admin', true)) {
        return redirect()->to('admin/dashboard');
      } else {
        return redirect()->to('santri/dashboard');
      }
    }
    return view('welcome_message');
  }

  public function register_sdit()
  {
    return view('auth/sdit');
  }

  public function register_smpit_putra()
  {
    return view('auth/smpit-putra');
  }

  public function register_smpit_putri()
  {
    return view('auth/smpit-putri');
  }
  public function register_smait_putra()
  {
    return view('auth/smait-putra');
  }
  public function register_smait_putri()
  {
    return view('auth/smait-putri');
  }
  public function register_takhosus()
  {
    return view('auth/takhosus');
  }
}
