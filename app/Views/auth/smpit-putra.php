<?= $this->extend('layouts/template-auth'); ?>
<?= $this->section('content'); ?>
<?php $db = \Config\Database::connect(); 
 $ta = $db->table('setting')->select('ta_awal')->get()->getFirstRow();
 $belakang_ta_awal = substr($ta->ta_awal, 2);
//=========== create serial nubmber
function GenerateSerial() {
  $chars = array(0,1,2,3,4,5,6,7,8,9);
  $sn = '';
  $max = count($chars)-1;
  for($i=0;$i<4;$i++){
    $sn .= $chars[rand(0, $max)];

  }
  return $sn;
}
$serial = GenerateSerial() ; 
// setting 
$jenjang = 'SMPIT Putra';
 ?>
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.register') ?> <?= $jenjang ?></h1>
        <?= view('Myth\Auth\Views\_message_block') ?>
    </div>
    <form class="user" action="<?= route_to('register') ?>" method="post">
    <?= csrf_field() ?>
          <input type="hidden" name="status" value="1">
        <input type="hidden" name="registration_number" value="<?='SMPITPa'.$belakang_ta_awal,$serial; ?>">
        <div class="form-group row">
            <div class="col-sm-6 mb-3 ">
                <input type="text" class="form-control  <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" id="exampleFirstName" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
            </div>
            <div class="col-sm-6">
                <input type="text" name="full_name" class="form-control" id="exampleLastName" placeholder="Nama Lengkap">
            </div>
        </div>

        <div class="form-group row">
            <input type="hidden" name="gender" value="Laki-laki">
            <div class="col-sm-6 mb-3">
                <!--tanggal lahir -->
                <input type="text" class="datepicker form-control" name="date_of_birth" placeholder="Tanggal Lahir" autocomplete="off">
            </div>
            <div class="col-sm-6 mb-3">
                <input type="hidden" name="educational_level" value="<?= $jenjang ?>">
                <input type="email" name="email" aria-describedby="emailHelp" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="exampleInputEmail" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 ">
                <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" id="exampleInputPassword" autocomplete="off">
            </div>
            <div class="col-sm-6">
                <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="exampleRepeatPassword" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary ">
                <?= lang('Auth.register') ?>
            </button>
        </div>
    </form>
    <div class="text-center">
        <?= lang('Auth.alreadyRegistered') ?> <a href="<?= route_to('login') ?>"><?= lang('Auth.signIn') ?></a>
    </div>
</div>

<?= $this->endsection() ?>