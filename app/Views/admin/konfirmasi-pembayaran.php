<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<div id="konfirmasi-pembayaran">
	<div class="col-md-4">
<div class="card">
   <img src="<?= base_url('bukti_pembayaran/'.$data_bayar->bukti);?>">
    <div class="card-body">
        <h4 class="card-title"><small>Kwitansi:</small><?= $data_bayar->no_kwitansi ?></h4>
        <span class="card-text"><?= $data_bayar->full_name ?></span><br>
        <small><?= $data_bayar->jenjang; ?></small>
        <p class="card-text"> tanggal:<?= $data_bayar->tanggal ?></p>
        <p class="card-text"> catatan:<br><?= $data_bayar->catatan ?></p>
    </div>
    <div class="card-footer">
    	<button id="confirm" class="btn btn-primary">Konfirmasi</button>
    </div>
</div>
	</div>
</div>
<?php $str_jenjang = strtolower($data_bayar->jenjang);
$link = str_replace(" ", "-", $str_jenjang);
 ?>
<script type="text/javascript">
	  $('#confirm').on('click', function() {
	  	 axios({
        method: 'get',
        url: '/admin/valid-pembayaran/'+ <?= $data_bayar->pid ?>,
        }).then((res) => {
        	Swal.fire({
				  icon: 'success',
				  title: '<?= $data_bayar->no_kwitansi ?>',
				  text:'Ter konfirmasi'
				}).then((result) => {
                if (result.isConfirmed) {
                	window.location.href = "<?= base_url( 'admin/pembayaran-'.$link) ?>";
                }
            })
            console.log(res)
            // location.reload();
        }).catch((err)=>{
        	console.log(err)
        })
	  })
	 
</script>
<?= $this->endSection() ?>