<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/vue-select.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/dashboard.css" rel="stylesheet">

    <script src="<?= base_url(); ?>/assets/js/vue.js"></script>
    <script src="<?= base_url(); ?>/assets/js/vuejs-datepicker.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/vue-datepicker-id.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/axios.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bouncer.polyfills.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/vue-select.js"></script>


<body class="bg-light ">
<div class="d-flex flex-column align-items-center justify-content-center vh-100 ">
    <h2>Selamat <?= user()->full_name; ?> </h2>
  <h4>Anda telah terdaftar sebagai calon santri</h4>
  <span>Dengan nomer registrasi </span>
  <h3 class="mt-0"><?= user()->registration_number; ?></h3>

<div class="btn-group" role="group" aria-label="Basic outlined example">
<a href="<?= base_url('detail-santri/'.user()->username) ?>" class="btn btn-outline-primary">Dashboard</a> <a href="<?= base_url('create-profile/'.user()->username) ?>" class="btn btn-outline-success">Silakan isi profil anda</a>

</div>

</div>

</body>
</head>