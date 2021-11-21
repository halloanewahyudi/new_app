<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<div id="listUndangan">

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
                <td>Action</td>
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