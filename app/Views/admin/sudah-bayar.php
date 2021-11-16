<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<div id="calonSantri">

    <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">No Reg</th>
                <th scope="col">Tanggal</th>
                <th scope="col">No Kwitansi</th>
                <th scope="col">Pembayaran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach ($pembayaran as $key => $pb) :
                $num = $pb['uid'];
                $noreg = sprintf("%04d", $num);
                $codereg = user()->registration_number;  
            ?>
                <tr id="row_<?= $pb['pid'] ?>">
                    <td><?= $no ?></td>
                    <td><?= $pb['full_name'] ?></td>
                    <td><?= $codereg, $noreg;?></td>
                    <td><?= $pb['tanggal'] ?></td>
                    <td><?= $pb['no_kwitansi'] ?></td>
                    <td><?= $pb['jenis_pembayaran'] ?></td>
                    <td><button id="<?= $pb['pid'] ?>" class="btn btn-sm btn-primary pb_action" data-nama="<?= $pb['full_name'] ?>" data-kwitansi="<?= $pb['no_kwitansi'] ?>" data-img="<?= $pb['bukti'] ?>">Kofirmasi </button></td>
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
        var t = $('#table').DataTable({});
        //============
        // buton action
        $('.pb_action').on('click', function() {
            var getid = $(this).attr('id');
            var image = $(this).data('img');
            var noKwitansi = $(this).data('kwitansi');
            $('input#swal2-checkbox').attr('name', 'status');

            //====================================
                Swal.fire({
                imageUrl: '<?= base_url('bukti_pembayaran') ?>/' + image,
                text:'No Kwitansi: '+ noKwitansi,
                showCancelButton: true,
                input: 'checkbox',
                inputValue: '',
                inputPlaceholder: 'Centang sebagai terkonfirmasi',
                inputValidator: (result) => {
                    return !result && 'Cancel jika  Belum Sesuai !'
                }
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    axios({
                    method: 'put',
                    url: '/rest/pembayaranaction/di_konfirmasi/'+getid,
                    data: {
                        status:1,
                    }
                    }).then((res) => {console.log(res)})
                }
                location.reload();
            })
 
            //================================
          /*   Swal.fire({
                imageUrl: '<?= base_url('bukti_pembayaran') ?>/'+image,
                title:noKwitansi,
                imageHeight: 300,
                html:`<div class="form-check w-25 mx-auto">
                <input class="form-check-input" name="status" type="checkbox" value="1" id="status">
                <label class="form-check-label" for="status">
                    Konfirmasi
                </label>
                </div>`,
                }).then((result) => {
                if (result.value) {
                    axios({
                    method: 'put',
                    url: '/rest/pembayaranaction/di_konfirmasi/57/',
                    data: {
                        status:1,
                    }
                    }).then((res) => {console.log(res)});

                    console.log("Result: " + result.value);

                }
            }).catch((err) => {console.log(err)});  */


        });
    });
    //=====
</script>
<?= $this->endSection(); ?>