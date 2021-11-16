<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/dashboard.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bouncer.polyfills.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bootstrap-datepicker.min.js"></script>
    

<body class="bg-light">
<?= $this->include('layouts/header'); ?>
<div class="container-fluid">
  <div class="row">
   <!-- Sidebar --> 
   <?= $this->include('layouts/sidebar-admin'); ?>
   <!-- end sidebar -->

    <main id="app" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
       <!--  page title -->
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php
        if($judul){
          echo $judul;
        }else{

        } ?></h1>

      </div>
      <!-- endpagetitle -->
        <!--ini content--> 
        <?= $this->renderSection('content'); ?>
       <!--  end content -->
      
    </main>
    <?= $this->include('layouts/footer'); ?>
  </div>
</div>


<script src="<?= base_url(); ?>/assets/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/feather.min.js"></script>
<script>


  feather.replace()
 
  var bouncer = new Bouncer('[data-validate]')
  
  // datepicker
  $(document).ready(function(){
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      startDate: '-3d'
    });
 })
  
</script>
</body>
</html>