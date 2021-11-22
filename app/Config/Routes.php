<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('register-admin', 'Home::register_admin');
$routes->get('register-sdit', 'Home::register_sdit');
$routes->get('register-smpit-putra', 'Home::register_smpit_putra');
$routes->get('register-smpit-putri', 'Home::register_smpit_putri');
$routes->get('register-smait-putra', 'Home::register_smait_putra');
$routes->get('register-smait-putri', 'Home::register_smait_putri');
$routes->get('register-takhosus', 'Home::register_takhosus');
$routes->get('forgot-password', 'Home::forgot');

/* --------------------------------------------------------------------
 * Santri
 * --------------------------------------------------------------------*/
 
// dashboard santri
$routes->get('santri/dashboard', 'SantriDashboard::index');

//steping
$routes->get('steping/santri', 'Steping::santri');
$routes->add('steping/santri-action', 'Steping::santri_action');
$routes->get('steping/back-santri/(:any)', 'Steping::back_santri/$1');
$routes->add('steping/back-santri-action/(:any)', 'Steping::back_santri_action/$1');

$routes->get('steping/sekolah-asal', 'Steping::sekolah_asal');
$routes->add('steping/sekolah-asal-action', 'Steping::sekolah_asal_action');
$routes->get('steping/back-sekolah-asal/(:any)', 'Steping::back_sekolah_asal/$1');
$routes->add('steping/back-sekolah-asal-action/(:any)', 'Steping::back_sekolah_asal_action/$1');

$routes->get('steping/ayah', 'Steping::ayah');
$routes->add('steping/ayah-action', 'Steping::ayah_action');
$routes->get('steping/back-ayah/(:any)', 'Steping::back_ayah/$1');
$routes->add('steping/back-ayah-action/(:any)', 'Steping::back_ayah_action/$1');

$routes->get('steping/ibu', 'Steping::ibu');
$routes->add('steping/ibu-action', 'Steping::ibu_action');
$routes->get('steping/back-ibu/(:any)', 'Steping::back_ibu/$1');
$routes->add('steping/back-ibu-action/(:any)', 'Steping::back_ibu_action/$1');

$routes->get('steping/wali-murid', 'Steping::wali_murid');
$routes->add('steping/wali-murid-action', 'Steping::wali_murid_action');
$routes->get('steping/back-wali-murid/(:any)', 'Steping::back_wali_murid/$1');
$routes->add('steping/back-wali-murid-action/(:any)', 'Steping::back_wali_murid_action/$1');

// USersantri
$routes->get('santri/edit-santri-user/(:any)', 'SantriUser::edit/$1');
$routes->add('santri/edit-santri-user-action/(:any)', 'SantriUser::edit_action/$1');
// santri
$routes->get('santri/view-santri/(:any)', 'Santri::view/$1');
$routes->get('santri/create-santri', 'Santri::create');
$routes->add('santri/create-santri-action', 'Santri::create_action');
$routes->get('santri/edit-santri/(:any)', 'Santri::edit/$1');
$routes->add('santri/edit-santri-action/(:any)', 'Santri::edit_action/$1');

// sekolah asal
$routes->get('santri/view-sekolah-asal/(:any)','SekolahAsal::view/$1');
$routes->get('santri/create-sekolah-asal','SekolahAsal::create');
$routes->add('santri/create-sekolah-asal-action', 'SekolahAsal::create_action');
$routes->get('santri/edit-sekolah-asal/(:any)', 'SekolahAsal::edit/$1');
$routes->add('santri/edit-sekolah-asal-action/(:any)', 'SekolahAsal::edit_action/$1');

// Wali Murid
$routes->get('santri/show-wali-murid','WaliMurid::index');
$routes->get('santri/view-wali-murid/(:any)','WaliMurid::view/$1');
$routes->get('santri/create-wali-murid','WaliMurid::create');
$routes->add('santri/create-wali-murid-action','WaliMurid::create_action');
$routes->get('santri/edit-wali-murid/(:any)','WaliMurid::edit/$1');
$routes->add('santri/edit-wali-murid-action/(:any)','WaliMurid::edit_action/$1');

// Pembayaran
$routes->get('santri/view-pembayaran/(:any)','Pembayaran::view/$1');
$routes->get('santri/create-pembayaran','Pembayaran::create');
 $routes->add('santri/create-pembayaran-action','Pembayaran::create_action');
$routes->get('santri/edit-pembayaran/(:any)','Pembayaran::edit/$1');
$routes->add('santri/edit-pembayaran-action/(:any)','Pembayaran::edit_action/$1');

// Download
$routes->get('download/data-santri','Download::data_santri');
$routes->get('download/data-santri-view','Download::data_santri_view');
$routes->get('download/pernyataan-orang-tua-view','Download::pernyataan_orang_tua_view');
$routes->get('download/pernyataan-orang-tua','Download::pernyataan_orang_tua');
$routes->get('download/form-kesehatan','Download::form_kesehatan');
$routes->get('download/undangan','Download::undangan');
$routes->get('download/hasil-test','Download::hasil_test');

// Berkas
$routes->get('santri/show-berkas','Berkas::index');
$routes->get('santri/upload-berkas','Berkas::upload');
$routes->get('santri/view-berkas/(:any)','Berkas::view/$1');
$routes->get('santri/create-berkas','Berkas::create');
$routes->add('santri/create-berkas-action','Berkas::create_action');
$routes->get('santri/edit-berkas/(:any)','Berkas::edit/$1');
$routes->add('santri/edit-berkas-action/(:any)','Berkas::edit_action/$1');
$routes->get('santri/delete-berkas/(:any)','Berkas::delete/$1');

// Response
$routes->get('konfirmasi/(:any)','Response::konfirmasi/$1');

/* --------------------------------------------------------------------
 * Admin
 * --------------------------------------------------------------------*/
 $routes->get('admin/dashboard', 'AdminDashboard::index');
 $routes->get('admin/users', 'AdminUsers::index');
 $routes->get('admin/santri', 'AdminSantri::index');
 $routes->get('admin/santri-by-jenjang/(:any)', 'AdminSantri::show_by_jenjang/$1');
 $routes->get('admin/detail-santri/(:any)', 'AdminSantri::detail_santri/$1');

 $routes->get('admin/pembayaran', 'AdminPembayaran::index');
 $routes->get('admin/pembayaran-sdit', 'AdminPembayaran::sdit_bayar');
 $routes->get('admin/pembayaran-smpit-putra', 'AdminPembayaran::smpit_putra_bayar');
 $routes->get('admin/pembayaran-smpit-putri', 'AdminPembayaran::smpit_putri_bayar');
 $routes->get('admin/pembayaran-smait-putra', 'AdminPembayaran::smait_putra_bayar');
 $routes->get('admin/pembayaran-smait-putri', 'AdminPembayaran::smait_putri_bayar');
 $routes->get('admin/pembayaran-takhosus', 'AdminPembayaran::takhosus_bayar');
 $routes->get('admin/pembayaran-detail/(:any)', 'AdminPembayaran::view/$1');
 
 $routes->add('admin/valid-pembayaran/(:any)', 'AdminPembayaran::valid_pembayaran/$1');

 $routes->get('admin/berkas', 'AdminBerkas::index');

 $routes->get('admin/undangan', 'AdminUndangan::index');
 $routes->get('admin/detail-undangan/(:any)', 'AdminUndangan::view/$1');
 $routes->get('admin/create-undangan', 'AdminUndangan::create');
 $routes->get('admin/create-undangan-action', 'AdminUndangan::create_action');
 $routes->get('admin/edit-undangan/(:any)','AdminUndangan::edit/$1');
 $routes->add('admin/edit-undangan-action/(:any)','AdminUndangan::edit_action/$1');
 $routes->get('admin/delete-undangan/(:any)','AdminUndangan::delete/$1');

 $routes->add('admin/undang-santri','AdminUndangan::undang_santri');
 $routes->get('admin/batal-ngundang/(:any)','AdminUndangan::batal_ngundang/$1');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
