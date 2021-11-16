<?= $this->extend('layouts/homepage'); ?>
<?= $this->section('content'); ?>
<div id="homepage" class="home-cover">
	<div class="row">
		<div class="col-lg-5 d-flex flex-column  justify-content-center ">
			<div>
				<span class="fs-6">Pondok Pesantren </span>
				<h2 class="display-4"> PESANTREN AL ANDALUS </h2>
				<p>
					Selamat datang di aplikasi pendaftaran santri baru
					Sebelum membaca pastikakn anda membaca alur pandaftaran terlebih dahulu dan pilih jenjang yang kamu inginkan
				</p>
				<p>
					Demi kenyamanan dan kelancaran dalam pengisian formulir maka baiknya gunakan komputer atau laptop
				</p>
			</div>
		</div>
		<div class="col-lg-7">
			<div id="card" class="row">
				<div class="col-md-6">
					<div class="card  border-warning">
						<div class="card-body">
							<h4 class="card-title">SDIT</h4>
							<p class="card-text">Silakan daftar untuk jenjang SDIT </p>
							<a href="<?= base_url('/register-sdit') ?>" class="btn btn-warning btn-sm">Daftar</a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card  border-secondary">
						<div class="card-body">
							<h4 class="card-title">TAKHOSUS</h4>
							<p class="card-text">Silakan daftar untuk jenjang TAKHOSUS</p>
							<a href="<?= base_url('/register-takhosus') ?>" class="btn btn-secondary btn-sm">Daftar</a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card  border-primary">
						<div class="card-body">
							<h4 class="card-title">SMPIT Putra</h4>
							<p class="card-text">Silakan daftar untuk jenjang SMPIT Putra</p>
							<a href="<?= base_url('/register-smpit-putra') ?>" class="btn btn-primary btn-sm">Daftar</a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card  border-info">
						<div class="card-body">
							<h4 class="card-title">SMPIT Putri</h4>
							<p class="card-text">Silakan daftar untuk jenjang SMPIT Putri</p>
							<a href="<?= base_url('/register-smpit-putri') ?>" class="btn btn-info btn-sm">Daftar</a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card  border-danger">
						<div class="card-body">
							<h4 class="card-title">SMAIT Putra</h4>
							<p class="card-text">Silakan daftar untuk jenjang SMAIT Putra</p>
							<a href="<?= base_url('/register-smait-putra') ?>" class="btn btn-danger btn-sm">Daftar</a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card  border-success">
						<div class="card-body">
							<h4 class="card-title">SMAIT Putri</h4>
							<p class="card-text">Silakan daftar untuk jenjang SMAIT Putri</p>
							<a href="<?= base_url('/register-smait-putri') ?>" class="btn btn-success btn-sm">Daftar</a>
						</div>
					</div>
				</div>
				<script>
					$(document).ready(function() {
						$('.card').hover(function() {
							$(this).toggleClass('shadow border-0');
						})
					});
				</script>
				<?= $this->endsection(); ?>