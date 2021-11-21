<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<div class="col-lg-4">
    <h4><?= $data_undangan['jenis_undangan'] ?></h4>
    <span>Tanggal: <?= $data_undangan['hari_tanggal'] ?></span><br>
    <span>Jam: <?= $data_undangan['jam'] ?></span><br>
    <span>tempat: <?= $data_undangan['tempat'] ?></span><br>
    <span>Keterangan:<br> <?= $data_undangan['keterangan'] ?></span><br>
</div>
<hr>
<table id="table" class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">No Registrasi</th>
            <th scope="col">Jenjang</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data_user as $key => $d) : ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $d['full_name'] ?></td>
                <td><?= $d['registration_number'] ?></td>
                <td><?= $d['educational_level'] ?></td>
                <td>
                    <?php 
                    $query = $data_santri_meta->table('santri_meta')
                    ->where(['undangan_id'=>$data_undangan['id'],'user_id'=> $d['uid']])
                    ->get()->getRow();
                    if(isset($query) && $query->user_id == $d['uid']){
                        $disabled = 'disabled';
                        $undang_text = 'Diundang';
                        $data_id = $query->id;
                    }else{
                        $disabled = '';
                        $undang_text = 'Undang';
                    } ?>
                    <button type="submit" id="undang" data-user="<?= $d['uid'] ?>" data-undangan="<?= $data_undangan['id']; ?>" class="btn btn-outline-primary btn-sm btn-undang" <?=$disabled ?>><?= $undang_text ?> </button>
                    <button  id="batal" class="btn btn-outline-danger btn-sm btn-batal" data-batal="<?= $data_id ?>" >Batal </a>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
</table>
<script>
    // jquery
    $(document).ready(function() {
        var t = $('#table').DataTable({});
        // tombol ngundang
        $('.btn-undang').on('click',function(e) {
            e.preventDefault();
            var uid = $(this).data('user');
            var unid = $(this).data('undangan');
            var url = '<?=base_url() ?>/admin/undang-santri?undangan_id='+unid+'&user_id='+uid;
            axios.get(url)
            .then((value) => {
                console.log(value)
                window.location.reload();
            })
            .catch((err) => {})
        });
        //tombol batalngundang
        $('.btn-batal').on('click',function(e) {
            e.preventDefault();
            var unid = $(this).data('batal');
            var url = '<?= base_url() ?>/admin/batal-ngundang/'+unid;
            axios.get(url)
            .then((value) => {
                window.location.reload();
            })
            .catch((err) => {})
        });
         

    });
    //=====
</script>
<?= $this->endSection();  ?>