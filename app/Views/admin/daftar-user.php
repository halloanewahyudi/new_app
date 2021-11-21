<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<div id="daftarUser">
<table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>Dari tanggal:</td>
            <td><input type="text" class="form-control" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Ke tanggal:</td>
            <td><input type="text" class="form-control" id="max" name="max"></td>
        </tr>
    </tbody></table>


    <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Nama</th>
                <th scope="col">NoReg</th>
                <th scope="col">Kontak</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Jenjang</th>
                <th scope="col">Waktu Daftar</th>
                <th scope="col">Status</th>
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
                         <input type="text" class="column_filter form-control" placeholder="Invalid / Terdaftar" id="col8_filter">
                       
                    </td>
                </tr>
            </tbody>
            </table>
    </div>

    <div class="table-responsive">
    <table id="table" class="table table-striped">
        <thead>
            <tr>
            <th scope="col"></th>
                <th scope="col">Nama</th>
                <th scope="col">NoReg</th>
                <th scope="col">Kontak</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Jenjang</th>
                <th scope="col">Waktu Daftar</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $no = 1;
            foreach ($data_user as $key => $ds) :
            ?>
                <tr id="row_<?= $ds['id'] ?>">
                    <td width="50"><?= $no ?></td>
                    <td><?= $ds['full_name'] ?></td>
                    <td style="width:70px;"><?= $ds['registration_number']; ?></td>
                    <td><?= $ds['kontak']; ?></td>
                    <td style="width:90px;"><?= $ds['email']; ?></td>
                    <td style="width:120px"><?= $ds['gender'] ;?></td>
                    <td style="width:120px"><?= $ds['educational_level'] ;?></td>
                    <?php $waktu = substr( $ds['created_at'], 0, -8); ?>
                    <td><?= $waktu ?></td>
                    <?php 
                    if(!empty($ds['san_user_id']) ){
                       
                        if(!empty($ds['san_user_id']) && $ds['no_kwitansi'] != ''){
                            $daftar = 'Sudah Bayar';
                        }else{
                            $daftar = 'Terdaftar';
                        }
                    }
                     else{
                        $daftar = '<span class="text-danger">Invalid</span>';
                    } 

                    ?>
                    <td><?= $daftar ?></td>
                </tr>
            <?php
                $no++;
            endforeach; ?>
        </tbody>
    </table>
    </div> <!-- end table responsive -->
</div>
<script>
    // range filter
    var minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[7] );
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);

        //============== filter column
        function filterColumn ( i ) {
            $('#table').DataTable().column( i ).search(
                $('#col'+i+'_filter').val(),
            ).draw();
        }
 
    //===============
      // jquery
    $(document).ready(function() {
      // Create date inputs
       // untuk range vilter
        // Create date inputs
        minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });

        // data table
        var t = $('#table').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    text: 'Download',
                    exportOptions: {
                    columns: [ 1, 2,3,4,5,6,7,8]
                     }
                },
                'pdf'
            ],
         
        });
        // end===

        $('input.column_filter').on( 'keyup click change', function () {
            filterColumn( $(this).parents('.cs').attr('data-column') );
        } );

          // get var t for date input
          $('#min, #max').on('change', function () {
        t.draw();
            });
       
        //==
        t.on('draw', function() {
            $('.delete').on('click', function(e) {
                e.preventDefault();
                var getid = $(this).data('delete');
                Swal.fire({
                    title: 'Apakah ingin di hapus?',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        axios.get('<?= base_url('delete-user') ?>/' + getid, {
                                status: 1,
                                headers: {
                                    'Access-Control-Allow-Origin': '*',
                                    'Access-Control-Allow-Methods': 'PUT'
                                },
                            }).then((res) => {
                                console.log(res)
                            })
                            .catch((err) => {
                                console.log(err)
                            })
                        location.reload();
                    }
                })
            });
        })

      
   //button excel
   $('.buttons-excel').addClass('btn btn-primary');
   $('.scdate').datepicker({
        format: 'yyyy-mm-dd'
     // startDate: '-3d'
    });

    });
    //=====
    
</script>
<style>
    #table_filter{
        display: none;
    }
</style>

<?= $this->endSection(); ?>