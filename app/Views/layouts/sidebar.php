<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse">
  <div class="position-sticky pt-3">
<?php $gdb = \Config\Database::connect(); 
// santri=========================
$santri = $gdb->table('santri')
->where('user_id',user_id())
->get()
->getRow();
// sekolah asal ==============
$sekolah_asal = $gdb->table('sekolah_asal')
->where('user_id',user_id())
->get()
->getRow();
//==============
$ayah = $gdb->table('wali_murid')
->where([
  'user_id'=>user_id(),
  'posisi'=>'Ayah',
])
->get()
->getRow();
// ibu
$ibu = $gdb->table('wali_murid')
->where([
  'user_id'=>user_id(),
  'posisi'=>'Ibu',
])
->get()
->getRow();
// wali Murid
$wali_murid = $gdb->table('wali_murid')
->where([
  'user_id'=>user_id(),
  'posisi'=>'WaliMurid',
])
->get()
->getRow();
 ?>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('santri/dashboard/') ?>">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#profileItem" >
          <span data-feather="user"></span>
          Profil 
        </a>
        <div class="collapse bg-light border-right border" id="profileItem">
                 
        <a class="nav-link" href="<?= base_url('santri/edit-santri-user/' . user_id()) ?>">
              Edit User
            </a>

        <a class="nav-link" href="<?= base_url(' santri/edit-santri/'.$santri->id) ?>">
              Edit Profile Santri
          </a>
            <?php if(isset($sekolah_asal)): ?>
            <a class="nav-link" href="<?= base_url('santri/edit-sekolah-asal/'.$sekolah_asal->id) ?>">
             Edit Sekolah Asal
            </a>
               <?php endif; ?>
             <?php if(isset($ayah)): ?>
            <a class="nav-link" href="<?= base_url('santri/edit-wali-murid/'.$ayah->id) ?>">
              Edit Ayah
            </a>
            <?php endif; ?>
             <?php if(isset($ibu)): ?>
            <a class="nav-link" href="<?= base_url('santri/edit-wali-murid/' .$ibu->id) ?>">
              Edit Ibu
            </a>
             <?php endif; ?>
            <?php if(isset($wali_murid)): ?>
            <a class="nav-link" href="<?= base_url('santri/edit-wali-murid/' .$wali_murid->id) ?>">
              Edit Wali Murid
            </a>
          <?php endif; ?>
        </div>
      </li>
      <li class="nav-item">
       <?php 
         $bayar =  $gdb->table('pembayaran')
       ->where('user_id',user_id())->get()->getRow();
        if(isset($bayar)){
          $link = base_url('santri/edit-pembayaran/'. $bayar->id) ;
        } else{
          $link = base_url('santri/create-pembayaran');
        }
        ?>
        <a class="nav-link" href="<?= $link ?>">
          <span data-feather="credit-card"></span>
          Bayar Pendaftaran
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('santri/create-berkas') ?>">
          <span data-feather="layers"></span>
          Upload Berkas
        </a>
      </li>

    </ul>
  </div>
</nav>