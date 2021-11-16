<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<div id="exportTest">
  <div class="col-lg-12">
    <?php
    if (session()->getFlashdata('message')) {
    ?>
      <div class="alert alert-info">
        <?= session()->getFlashdata('message') ?>
      </div>
    <?php
    }
    ?>
    <form method="post" action="<?= base_url('admin/hasil-test-action') ?>" enctype="multipart/form-data">
      <?= csrf_field() ?>
      <div class="form-group">
        <label>File Excel</label>
        <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
      </div>
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Upload</button>
      </div>
    </form>

     <!-- tampil table -->
     <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NISN</th>
                <th scope="col">Nama</th>
                <th scope="col">Nilai Alquran</th>
                <th scope="col">Nilai Kepribadian</th>
                <th scope="col">Kemampuan Dasar</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Nilai rata-rata</th>
                <th scope="col">Rangking</th>
                <th scope="col">Hasil Kesehatan</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach ($hasil_test as $key => $pb) :
              if($pb['nisn'] >= 1):
            ?>
                <tr id="row_<?= $pb['id'] ?>">
                    <td><?= $no ?></td>
                    <td><?= $pb['nisn'] ?></td>
                    <td><?= $pb['nama_lengkap'] ?></td>
                    <td><?= $pb['nilai_alquran'] ?></td>
                    <td><?= $pb['nilai_kepribadian'] ?></td>
                    <td><?= $pb['kemampuan_dasar'] ?></td>
                    <td><?= $pb['jumlah'] ?></td>
                    <td><?= $pb['nilai_rata_rata'] ?></td>
                    <td><?= $pb['rangking'] ?></td>
                    <td><?= $pb['test_kesehatan'] ?></td>
                    <td><?= $pb['keterangan'] ?></td>          
                </tr>
                <?php endif; ?>
            <?php 
            $no++;
        endforeach; ?>
        </tbody>
    </table>
  </div>

  <div>

  </div>

</div>
<script>
   $(document).ready(function() {
        var t = $('#table').DataTable({});
    }
   )
</script>
<?= $this->endSection(); ?>