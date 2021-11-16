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
    <link href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet">

    <script src="<?= base_url(); ?>/assets/js/vue.js"></script>
    <script src="<?= base_url(); ?>/assets/js/axios.min.js"></script>

</head>
<body class="bg-light">
<div class="container">
        <!--ini content--> 
        <?= $this->renderSection('content'); ?>
       <!--  end content -->
    <?= $this->include('layouts/footer'); ?>
  </div>
</div>

<script src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/feather.min.js"></script>
<script>

  feather.replace()

</script>
</body>
</html>