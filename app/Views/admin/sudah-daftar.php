<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<div id="calonSantri">

<table id="table" class="table table-striped">
        <thead>
            <tr>
                
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NoReg</th>
                <th scope="col">NISN</th>
                <th scope="col">NIK</th>
                <th scope="col">Jenjang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach ($data_santri as $key => $ds) :

            ?>
                <tr id="row_<?= $ds['id'] ?>">
                    <td><?= $no ?></td>
                    <td><?= $ds['full_name'] ?></td>
                    <td><?= $ds['registration_number'] ;?></td>
                    <td><?= $ds['nisn'] ?></td>
                    <td><?= $ds['nik'] ?></td>
                    <td><?= $ds['educational_level'] ?></td>
                    <td><a href="<?= base_url('admin/detail-santri/'.$ds['id']) ?>" id="<?= $ds['id'] ?>" class="btn btn-sm btn-primary pb_action">Detail </a></td>
                </tr>
            <?php 
            $no++;
        endforeach; ?>
        </tbody>
    
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