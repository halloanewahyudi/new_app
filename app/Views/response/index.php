<?= $this->extend('layouts/response-layout'); ?>
<?= $this->Section('content'); ?>
<?php
    if (session()->getFlashdata('message')) {
    ?>
      <div class="vh-100 d-flex flex-column align-items-center justify-content-center">
          <div class="col-md-4 mx-auto text-center">
           <?= session()->getFlashdata('message') ?>
          </div>
      </div>
    <?php
    }
    ?>
<?= $this->endSection() ?>