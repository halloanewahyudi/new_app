<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<div id="adminDashboard">
	<div class="row equal">
		<div class="col-lg-8 col-md-6">
			<div class="card">
				<div class="card-body">
					<h3 class="display-4">Pendaftaran calon santri</h1>
					<p class="lead">tahun ajaran 2022/2023</p>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6">
			<div class="card">
				<div class="card-body">
					<span>Total Pendaftar: <?= $total_pendaftar; ?></span><br>
					<span>Total Santri (mengisi form): <?= $total_santri; ?></span> <br>
                       <?php if( in_groups(4,true) || in_groups(1,true) ): ?>
                    <a href="<?= base_url('ExportSantri')?>" class="btn btn-sm btn-outline-primary"> Download Santri <span data-feather="download"></span></a>
                   <?php endif; ?>
					<hr>
					<span>Total membayar: <?= $total_pembayaran; ?></span><br>
					<span>Total terverifikasi: <?= $total_verifikasi_pembayaran; ?></span>
                    <?php if( in_groups(3,true) || in_groups(1,true) ): ?>
                    <a href="<?= base_url('ExportBayar')?>" class="btn btn-sm btn-outline-primary"> Download Pembayaran <span data-feather="download"></span></a>
                <?php endif; ?>
					<hr>
						Login terakhir:  <br>
					 <?= $last_login; ?>
				</div>
			</div>
		</div>
	</div><!--END ROW-->
	<div class="row equal">
		<div class="col-md-3">
                <div class="card border-start border-0 border-warning border-4 shadow">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i data-feather="users"></i><br>
                                <span>Calon Santri</span><br>
                                <span>MTs Putra</span>
                            </div>
                            <h2><?= $total_mts_putra; ?> <small>Siswa</small></h2>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Sudah bayar</span><span><?= $total_pembayaran_mts_putra; ?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Terverifikasi</span><span><?= $total_verifikasi_mts_putra; ?></span>
                        </div>
                    </div>
                </div>
            </div><!-- end col-3-->
            <div class="col-md-3">
                <div class="card border-start border-0 border-primary border-4 shadow">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i data-feather="users"></i><br>
                                <span>Calon Santri</span><br>
                                <span>MTs Putri</span>
                            </div>
                            <h2><?= $total_mts_putri; ?> <small>Siswa</small></h2>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Sudah bayar</span><span><?= $total_pembayaran_mts_putri; ?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Terverifikasi</span><span><?= $total_verifikasi_mts_putri; ?></span>
                        </div>
                    </div>
                </div>
            </div><!-- end col-3-->
            <div class="col-md-3">
                <div class="card border-start border-0 border-success border-4 shadow">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i data-feather="users"></i><br>
                                <span>Calon Santri</span><br>
                                <span>MA Putra</span>
                            </div>
                            <h2><?= $total_ma_putra; ?> <small>Siswa</small></h2>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Sudah bayar</span><span><?= $total_pembayaran_ma_putra; ?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Terverifikasi</span><span><?= $total_verifikasi_ma_putra; ?></span>
                        </div>
                    </div>
                </div>
            </div><!-- end col-3-->
             <div class="col-md-3">
                <div class="card border-start border-0 border-success border-4 shadow">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i data-feather="users"></i><br>
                                <span>Calon Santri</span><br>
                                <span>MA Putri</span>
                            </div>
                            <h2><?= $total_ma_putri; ?> <small>Siswi</small></h2>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Sudah bayar</span><span><?= $total_pembayaran_ma_putri; ?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Terverifikasi</span><span><?= $total_verifikasi_ma_putri; ?></span>
                        </div>
                    </div>
                </div>
            </div><!-- end col-3-->
	</div><!--END ROW-->
	<div class="row">
		<div class="col-lg-6">
			<div class="p-2 bg-white mb-3 rounded">
				<div class="d-flex justify-content-around align-items-center">
					<span>Calon Santri RA</span>
					<span class="lead"> <?= $total_ra?></span>
					<span>Sudah bayar: <?= $total_pembayaran_ra; ?></span>
					<span>Terverifikasi: <?= $total_verifikasi_ra; ?></span>
			   </div>
		   </div>
		   <div class="p-2 bg-white mb-3 rounded">
				<div class="d-flex justify-content-around align-items-center">
					<span>Calon Santri MI</span>
					<span class="lead"> <?= $total_mi?></span>
					<span>Sudah bayar: <?= $total_pembayaran_mi; ?></span>
					<span>Terverifikasi: <?= $total_verifikasi_mi; ?></span>
			   </div>
		   </div>
		</div>
		<div class="col-lg-6">
			<span data-feather="layers"></span> Yang sudah upload Berkas 
			<?= $total_berkas ?> santri
		</div>
	</div>
</div>

<?=  $this->endSection();?>