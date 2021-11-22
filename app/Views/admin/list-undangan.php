<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<div id="listUndangan">
<a href="<?= base_url('admin/create-undangan') ?>" class="btn btn-outline-primary btn-sm">Buat Undangan</a>
<table id="table" class="table table-striped">
<thead>
            <tr>
                
                <th scope="col">No</th>
                <th scope="col">No Surat</th>
                <th scope="col">Jenis Undangan</th>
                <th scope="col">Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach ($data_undangan as $key => $d) :?>
            <tr>
                 <td><?= $no ?></td>
                <td><?= $d['no_surat'] ?></td>
                <td><?= $d['jenis_undangan'] ?></td>
                <td><?= $d['hari_tanggal'] ?></td>
                <td>
                    <a href="<?= base_url('admin/detail-undangan/'.$d['id']) ?>" class="btn btn-outline-success btn-sm">View</a>
                    <a href="<?= base_url('admin/edit-undangan/'.$d['id']) ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                    <a href="<?= base_url('admin/delete-undangan/'.$d['id']) ?>" class="btn btn-outline-danger btn-sm">Delete</a>
              </td>
            </tr>
            <?php $no++; ?>
            <?php endforeach; ?>
</table>
</div>
<script>

    // jquery
    $(document).ready(function() {
   var t = $('#table').DataTable( { } );

    } );
    //=====
  
</script>
<?= $this->endSection(); ?>