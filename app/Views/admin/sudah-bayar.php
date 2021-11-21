<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<div id="sudahBayar">
    <table border="0" cellspacing="5" cellpadding="5">
        <tbody>
            <tr>
                <td>Dari tanggal:</td>
                <td><input type="text" class="form-control " id="min" name="min"></td>
            </tr>
            <tr>
                <td>Ke tanggal:</td>
                <td><input type="text" class="form-control " id="max" name="max"></td>
            </tr>
        </tbody>
    </table>

    <div class="table-responsive">
        <table  class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nama</th>
                    <th scope="col">No Reg</th>
                    <th scope="col">No Kwitansi</th>
                    <th scope="col">Pembayaran</th>
                    <th scope="col" style="max-width: 300px;">Catatan</th>
                    <th scope="col">Tgl Byr</th>
                    <th scope="col">Tgl input</th>
                    <th scope="col">Aksi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td class="cs" id="filter_col2" data-column="1">
                        <input type="text" class="column_filter form-control" id="col1_filter">
                    </td>
                    <td class="cs" id="filter_col3" data-column="2">
                        <input type="text" class="column_filter form-control" id="col2_filter">
                    </td>
                    <td class="cs" id="filter_col4" data-column="3">
                        <input type="text" class="column_filter form-control" id="col3_filter">
                    </td>
                    <td class="cs" id="filter_col5" data-column="4">
                        <input type="text" class="column_filter form-control" id="col4_filter">
                    </td>
                    <td class="cs" id="filter_col6" data-column="5">
                        <input type="text" class="column_filter form-control" id="col5_filter">
                    </td>
                    <td class="cs" id="filter_col7" data-column="6">
                        <input type="text" class="column_filter form-control" id="col6_filter">
                    </td>
                    <td class="cs" id="filter_col8" data-column="7">
                        <input type="text" class="column_filter form-control scdate" id="col7_filter">
                    </td>
                    <td class="cs" id="filter_col9" data-column="8">
                        <input type="text" class="column_filter form-control" placeholder="valid/konfirmasi" id="col8_filter">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">No Reg</th>
                <th scope="col">No Kwitansi</th>
                <th scope="col">Pembayaran</th>
                <th scope="col" style="max-width: 300px;">Catatan</th>
                <th scope="col">Tgl byr</th>
                <th scope="col">Tgl input</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($pembayaran as $key => $pb) :
            ?>
                <tr id="row_<?= $pb['pid'] ?>">
                    <td><?= $no ?></td>
                    <td><?= $pb['full_name'] ?></td>
                    <td><?= $pb['reg'] ?></td>
                    <td><?= $pb['no_kwitansi'] ?></td>
                    <td><?= $pb['jenis_pembayaran'] ?></td>
                    <td style="width:180px"><?= $pb['catatan'] ?></td>
                    <td><?= $pb['tanggal'] ?></td>
                    <?php $waktu = substr($pb['tgl_input'], 0, -8);  ?>
                    <td><?= $waktu; ?></td>

                    <?php if ($pb['status'] == 1) {
                        $btn_text = 'Valid';
                        $disabled = 'disabled';
                    } else {
                        $btn_text = 'Konfirmasi';
                        $disabled = '';
                    } ?>
                    <td>
                        <a href="<?= base_url('admin/pembayaran-detail/' . $pb['pid']) ?>" class="btn btn-sm btn-primary <?= $disabled; ?>"><?= $btn_text; ?> </a>
                    </td>
                </tr>
            <?php
                $no++;
            endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    // set date range filter=============
    // range filter
    var minDate, maxDate;

    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
             var min = minDate.val();
            var max = maxDate.val(); 
            var date = new Date(data[7]);

            if (
                (min === null && max === null) ||
                (min === null && date <= max) ||
                (min <= date && max === null) ||
                (min <= date && date <= max)
            ) {
                return true;
            }
            return false;
        }
    );

    //============== filter column
    function filterColumn(i) {
        $('#table').DataTable().column(i).search(
            $('#col' + i + '_filter').val(),
        ).draw();
    }
    // jquery
    $(document).ready(function() {
        // Create date inputs format
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        }); 
  
        // ini master table nya
        var t = $('#table').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    text: 'Download',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6,7,8]
                    }
                },
                'pdf'
            ],
        });
        //============
        $('input.column_filter').on('keyup click change ', function() {
            filterColumn($(this).parents('.cs').attr('data-column'));
        });

        // get var t for date input
        $('#min, #max').on('change', function() {
            t.draw();
        });

        // buton action
        t.on('draw', function() {
            $('.pb_action').on('click', function() {
                var getid = $(this).attr('id');
                var image = $(this).data('img');
                var noKwitansi = $(this).data('kwitansi');
                $('input#swal2-checkbox').attr('name', 'status');
                //====================================
                Swal.fire({
                    imageUrl: '<?= base_url('bukti_pembayaran') ?>/' + image,
                    text: 'No Kwitansi: ' + noKwitansi,
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
                            method: 'get',
                            url: '/PembayaranAction/di_konfirmasi/' + getid,
                        }).then((res) => {
                            console.log(res)
                            location.reload();
                        })
                    }
                })


            });
        }); // end draw function
    });
    //=====
    //date picker
    $(document).ready(function(){
     //scdate   
    $('.scdate').datepicker({
        format: 'yyyy-mm-dd'
     // startDate: '-3d'
    });
    // filter date
    $('.filter_date').datepicker({
      format: 'dd-mm-yyyy',
     // startDate: '-3d'
    });

      //button excel
  $('.buttons-excel').addClass('btn btn-primary')
 })
  

</script>
<style>
 #table_filter{
     display: none;
 }
</style>
<?= $this->endSection(); ?>