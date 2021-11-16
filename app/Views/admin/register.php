<?= $this->extend('layouts/template-auth'); ?>
<?= $this->section('content'); ?>
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.register') ?></h1>
        <?= view('Myth\Auth\Views\_message_block') ?>
    </div>
    <form class="user" action="<?= route_to('register') ?>" method="post">
    <input type="hidden" name="registration_number" value="admin">
        <div class="form-group row">
            <div class="col-sm-6 mb-3 ">
                <input type="text" class="form-control  <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" id="exampleFirstName" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
            </div>
            <div class="col-sm-6">
                <input type="text" name="full_name" class="form-control" id="exampleLastName" placeholder="Nama Lengkap">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="gender">Jenis Kelamin</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender1" value="Laki-laki">
                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="Permpuan">
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                </div>
            </div>
            <div class="col-sm-6">
                <!--tanggal lahir -->
                <div id="dp">
                    <vuejs-datepicker :language="id" name="date_of_birth" input-class="form-control" placeholder="Tangal Lahir" value="state.date"></vuejs-datepicker>
                </div>
            </div>
        </div>

        <div class="form-group">
            <input type="email" name="email" aria-describedby="emailHelp" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="exampleInputEmail" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
            <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" id="exampleInputPassword" autocomplete="off">
            </div>
            <div class="col-sm-6">
                <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="exampleRepeatPassword" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">
                <?= lang('Auth.register') ?>
            </button>
        </div>

    </form>
    <div class="text-center">
        <?= lang('Auth.alreadyRegistered') ?> <a href="<?= route_to('login') ?>"><?= lang('Auth.signIn') ?></a>
    </div>
</div>
<?= $this->endsection() ?>