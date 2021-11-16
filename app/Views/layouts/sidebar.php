<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse">

  <div class="position-sticky pt-3">

<?php $gdb = \Config\Database::connect(); 
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

        <a class="nav-link" href="<?= base_url('/santri-show/' .user_id()) ?>">
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
        <a class="nav-link" href="<?= base_url(' create-profile' .user()->username) ?>">
              Create Profile
          </a>
       
        <a class="nav-link" href="<?= base_url('/user-edit/' . user_id()) ?>">
              Edit User
            </a>

            <a class="nav-link" href="<?= base_url('/edit-profile/' . user_id()) ?>">
              Edit Profile
            </a>
            <?php if(isset($sekolah_asal)): ?>
            <a class="nav-link" href="<?= base_url('/edit-sekolah-asal/'.$sekolah_asal->id) ?>">
             Edit Sekolah Asal
            </a>
               <?php endif; ?>
             <?php if(isset($ayah)): ?>
            <a class="nav-link" href="<?= base_url('/edit-wali-murid/' .$ayah->id.'/'.$ayah->posisi) ?>">
              Edit Ayah
            </a>
            <?php endif; ?>
             <?php if(isset($ibu)): ?>
            <a class="nav-link" href="<?= base_url('/edit-wali-murid/' .$ibu->id.'/'.$ibu->posisi) ?>">
              Edit Ibu
            </a>
             <?php endif; ?>
            <?php if(isset($wali_murid)): ?>
            <a class="nav-link" href="<?= base_url('/edit-wali-murid/' .$wali_murid->id.'/'.$wali_murid->posisi) ?>">
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
          $link = base_url('/edit-bayar/' . $bayar->id) ;
        } else{
          $link = base_url('/bayar/' . user()->username);
        }
        ?>
        <a class="nav-link" href="<?= $link ?>">
          <span data-feather="credit-card"></span>
          Bayar Pendaftaran

        </a>

      </li>


     <?php if(isset($bayar) && $bayar->status == 1 ) : ?>
      <li class="nav-item">

        <a class="nav-link" href="<?= base_url('/upload-berkas/' . user()->username) ?>">

          <span data-feather="layers"></span>

          Upload Berkas

        </a>

      </li>
    <?php endif; ?>
    </ul>



  </div>

</nav>