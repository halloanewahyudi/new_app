<?= $this->extend('layouts/main'); ?>
<?= $this->Section('content'); ?>
<div id="santriDasboard">
    <!-- response -->
<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('message') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php $santri_meta =  $data_db->table('santri_meta')
  ->where('user_id',user_id())
  ->get()
  ->getFirstRow();
  if(isset($santri_meta)):
    $undangan = $data_db->table('undangan')
    ->where('id',$santri_meta->undangan_id)
    ->get()
    ->getFirstRow();
    
?>
<div class="undangan">
<div class="card bg-opacity-25 bg-primary">
    <div class="card-body">
        <div class="badge btn btn-primary btn-sm  badge-pill">Undangan</div>
        <h4 class="card-title"><?= $undangan->jenis_undangan ?></h4>
        <table>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><?= $undangan->hari_tanggal; ?></td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td><?= $undangan->jam; ?></td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
                <td><?= $undangan->tempat; ?></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><?= $undangan->keterangan; ?></td>
            </tr>
        </table>
    </div>
</div>
</div>
<?php endif; ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <div class="mb-3 avatar mx-auto rounded-circle"></div>
                        <h4 class="mb-3"><?= user()->full_name ?></h4>
                    </div>
                    <div class="">
                        Tanggal Lahir:
                        <?= user()->date_of_birth ?><br>
                        Jenis Kelamin :
                        <?= user()->gender; ?>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div>
                            No Reg:<br>
                            <?= user()->registration_number; ?>
                        </div>
                        <div>
                            Tgl daftar:<br>
                            <?php
                            $angka = user()->created_at;
                            $string = substr($angka, 0, -8);
                            echo $string;
                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div>
                            <span>NISN</span><br>
                            <span>
                            <?= !empty($data_santri->nisn) ? $data_santri->nisn : 'Belum terinput' ?>
                              </span>
                        </div>
                        <div>
                            <span>NIK</span><br>
                            <span> <?= !empty($data_santri->nik) ? $data_santri->nik : 'Belum terinput' ?></span>
                        </div>
                    </div>
                </div> <!-- end card bodey -->
            </div><!--  end card -->
            <div class="card">
                <div class="card-header">
                    <h5>Sekolah Asal</h5>
                </div>
                <div class="card-body">
                <?php if(isset($data_sekolah_asal)): ?>
                    <strong> <?= $data_sekolah_asal->sekolah_asal; ?></strong> <br>
                    <span>Alamat :</span><br>
                    <?= $data_sekolah_asal->alamat; ?>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div>
                            <span>NPSN</span><br>
                            <span>
                          <?= !empty($data_sekolah_asal->npsn) ? $data_sekolah_asal->npsn : 'Belum terinput' ?>
                            </span>
                        </div>
                        <div>
                            <span>Tahun lulus</span><br>
                            <?= !empty($data_sekolah_asal->tahun_lulus) ? $data_sekolah_asal->tahun_lulus : 'Belum terinput' ?>
                        </div>
                    </div>
                    <?php else: ?>
                        <h4 class="text-muted">Data Belum ter input</h4>
                        <br> <a href="<?= base_url('steping/sekolah-asal')?>">Silakan isi data sekolah asal</a>
                    <?php endif; ?>
                </div>
            </div><!--  end card -->
            <div class="card">
                <div class="card-header">
                    <h5>Orang Tua / Wali </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <span>Ayah</span><br>
                            <span>
                            <?= !empty($data_ayah->nama) ? $data_ayah->nama : 'Belum terinput <br> <a href="'.base_url('steping/ayah').'">Silakan isi data Ayah</a>' ?>
                            </span>
                        </div>
                        <div>
                            <span>Ibu</span><br>
                            <span>
                            <?= !empty($data_ibu->nama) ? $data_ibu->nama : 'Belum terinput <br> <a href="'.base_url('steping/ibu').'">Silakan isi data Ibu</a>' ?>
                        </span>
                        </div>
                    </div>
                    <?php if (!empty($data_wali_murid)) : ?>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div>
                                <span>Wali</span><br>
                                <span><?= $data_wali_murid->nama ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div> <!--  end card -->
        </div><!-- end col-lg-4 -->
        <div class="col-lg-8">
            <div class="card"> <!-- progress perndaftaran -->
                <div class="card-header d-md-flex justify-content-between bg-warning ">
                    <h5>Progress Pendaftaran</h5>
                    <a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Lihat Proses
                    </a>
                </div>
                <div class="collapse" id="collapseExample">
                    <div class=" card-body">
                    <ul class="list-unstyled">
                                <li class="d-flex mb-2 pb-2 ">
                                    <span data-feather="edit-3" class="list-icon pr-2"></span> <span>
                                        <strong>Mengisi formulir pendaftaran online </strong>
                                    </span>
                                </li>
                                <li class="d-flex mb-2 pb-2">
                                    <span data-feather="credit-card" class="list-icon pr-2"></span> <span> <strong>Membayar biaya pendaftaran </strong><br>
                                        Nomer rekening dan nominal yang harus di bayar tercantum pada <a href=""> surat informasi</a> proses memerlukan waktu 10-30 menit setelah pembayaran di lakukan.
                                    </span>
                                </li>
                                <li class="d-flex mb-2 pb-2">
                                    <span data-feather="upload" class="list-icon pr-2"></span> <span>
                                        <strong>Mengupload semua berkas yang di butuhkan </strong> <br>
                                      
                                    </span>
                                </li>
                                <li class="d-flex mb-2 pb-2">
                                    <span data-feather="mail" class="list-icon pr-2"></span> <span>
                                        <strong> Menerima undangan seleksi</strong> <br>
                                        Santri bisa mendapatkan jadwal ujian seleksi setelah semua berkas di upload dan membayar biaya pendaftaran yang di verivikasi oleh sistem.
                                    </span>
                                </li>
                                <li class="d-flex mb-2 pb-2">
                                    <span data-feather="edit" class="list-icon pr-2"></span> <span>
                                        <strong> Mengikuti ujian seleksi</strong> <br>
                                        Sesuai alamat/url jadwal yang tercantum pada surat undangan. SD(datang langsung ke pesantren), MTW dan IL online.
                                    </span>
                                </li>
                                <li class="d-flex mb-2 pb-2">
                                    <span data-feather="file-text" class="list-icon pr-2"></span> <span>
                                        <strong> Menerima hasil ujian seleksi</strong> <br>
                                        Akan di umum kan pada jadwal yang telah di tentukan
                                    </span>
                                </li>
                                <li class="d-flex mb-2 pb-2">
                                    <span data-feather="credit-card" class="list-icon pr-2"></span> <span>
                                        <strong> Membayar biaya daftar ulang</strong> <br>
                                        Nomer rekiening dan nominal harus tercantum pada surat pengumuman hasil seleksi. Status pembayaran dapat di lihat melalui halaman informasi santri
                                    </span>
                                </li>
                                <li class="d-flex mb-2 pb-2">
                                    <span data-feather="check-square" class="list-icon pr-2"></span> <span>
                                        <strong> Semua berkas di verivikasi panitia</strong> <br>
                                        sesuai dengan antrean yang ada
                                    </span>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
            <div class="card"> <!-- pembayaran -->
                <div class="card-header d-md-flex justify-content-between">
                    <h5>Pembayaran</h5>
                    <?php if (isset($data_pembayaran) && $data_pembayaran->status == 1) : ?>
                        <div class="btn btn-success btn-sm"> sudah tervalidasi<span data-feather="check"></span></div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                <?php if (isset($data_pembayaran)) : ?>
                    <div class="row p-3">
                        <div class="col-md-4">
                            <img class="card-img-top" src="<?= base_url('bukti_pembayaran/' . $data_pembayaran->bukti) ?>" alt="">
                        </div>
                        <div class="col-md-4">
                            <span>No Kwitansi</span><br>
                            <strong class="mb-2"><?= $data_pembayaran->no_kwitansi; ?></strong> <br>
                            <span>Tanggal Transaksi</span><br>
                            <strong class="mb-2"><?= $data_pembayaran->tanggal; ?></strong><br>
                            <span>Pembayarn</span><br>
                            <strong class="mb-2"><?= $data_pembayaran->jenis_pembayaran; ?></strong> <br>
                        </div>
                        <div class="col-md-4">
                            <span>Catatan</span><br>
                            <?= $data_pembayaran->catatan ?>
                        </div>
                    </div>
                    <?php else: ?>
                        <div class=" text-center">
                        <p class="text-muted"> Belum melakukan pembayaran</p>
                        <h4>Silakan melakukan pembayaran <br> Rp,400.000</h4>
                        <a href="<?= base_url('santri/create-pembayaran') ?>" class="btn btn-outline-primary">Konfirmasi pembayaran</a>
                        </div>
                        <?php endif; ?>
                </div>
            </div><!--  end card -->
            <div class="card"> <!-- Download berkas -->
            <div class="card-header d-md-flex justify-content-between">
                <h5>Download Berkas</h5>
            </div>
                <div class="card-body">
                        <div class="d-md-flex justify-content-lg-around">
                            <a href="<?= base_url('download/data-santri') ?>" class="btn btn-outline-primary btn-sm">Data Santri <span data-feather="download"></span></a>
                            <a href="<?= base_url('download/pernyataan-orang-tua') ?>" class="btn btn-outline-primary btn-sm">Pernyataan Orang Tua <span data-feather="download"></span></a>
                            <a href="<?= base_url('download/form-kesehatan') ?>" class="btn btn-outline-primary btn-sm">Fromulir Kesehatan <span data-feather="download"></span></a>
                        </div>
                </div>
            </div>
            <div class="card"><!-- Berkas -->
                <div class="card-header d-md-flex justify-content-between">
                    <h5>Berkas</h5>
                    <?php if(isset($data_pembayaran)) {
                        $disabled = '';
                    }else{
                        $disabled ='disabled';
                    }?>
                    <a href="<?= base_url('santri/create-berkas') ?>" class="btn-warning btn btn-sm  <?= $disabled ?>">Uplad Berkas</a>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td>Foto Santri</td>
                            <td>:</td>
                            <?php if (!empty($data_photo_santri->file)) : ?>
                                <td><span data-feather="check"></span></td>
                            <?php else : ?>
                                <td><span>Belum terupload</span></td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td>Surat Kesangupan</td>
                            <td>:</td>
                            <?php if (!empty($data_surat_kesanggupan->file)) : ?>
                                <td><span data-feather="check"></span></td>
                            <?php else : ?>
                                <td><span>Belum terupload</span></td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td>Rapor Smester 1</td>
                            <td>:</td>
                            <?php if (!empty($data_rapor_semester_1->file)) : ?>
                                <td><span data-feather="check"></span></td>
                            <?php else : ?>
                                <td><span>Belum terupload</span></td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td>Rapor Smester 2</td>
                            <td>:</td>
                            <?php if (!empty($data_rapor_semester_2->file)) : ?>
                                <td><span data-feather="check"></span></td>
                            <?php else : ?>
                                <td><span>Belum terupload</span></td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td>Akte Kelahiran</td>
                            <td>:</td>
                            <?php if (!empty($data_akte_kelahiran->file)) : ?>
                                <td><span data-feather="check"></span></td>
                            <?php else : ?>
                                <td><span>Belum terupload</span></td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td>Kartu Keluarga</td>
                            <td>:</td>
                            <?php if (!empty($data_kartu_keluarga->file)) : ?>
                                <td><span data-feather="check"></span></td>
                            <?php else : ?>
                                <td><span>Belum terupload</span></td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td>Sertifikat Hafalan</td>
                            <td>:</td>
                            <?php if (!empty($data_sertifikat_hafalan->file)) : ?>
                                <td><span data-feather="check"></span></td>
                            <?php else : ?>
                                <td><span>Belum terupload</span></td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td>Keteragan Sehat</td>
                            <td>:</td>
                            <?php if (!empty($data_surat_kesehatan->file)) : ?>
                                <td><span data-feather="check"></span></td>
                            <?php else : ?>
                                <td><span>Belum terupload</span></td>
                            <?php endif; ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div> <!-- end col-lg-8 -->
    </div> <!-- endrow -->
</div> <!-- end #santridashboard -->
<?php
if (!empty($data_photo_santri->file)) {
    $image = base_url('/berkas/' . $data_photo_santri->file);
} else {
    $image = base_url('/avatar/' . user()->user_image);
}
?>
<?php if(empty($data_santri->nik)): ?>
    <!-- Modal -->
<div class="modal " id="stepingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0">
    <div class="modal-header border-0">
        <a href="<?= base_url('logout') ?>" class="btn-close" data-bs-toggle="tooltip" title="Logout" aria-label="Close"></a>
      </div>
      <div class="modal-body">
          <div class="text-center">
        <h2> Hai <?= user()->full_name; ?>..!</h2>
        <p>Selamat, anda sudah mendaftar sebagai calon santri</p>
        <p>Silakan lengkapi isian form berikut</p>
        <a href="<?= base_url('steping/santri') ?>" class="btn btn-primary">Isi form data profil</a>
          </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<style>
    .avatar {
        width: 120px;
        height: 120px;
        background: url('<?= $image ?>') no-repeat center;
        background-size: cover;
    }
    #stepingModal.show{
        background-color: #fff;
    }
</style>
<script>
var myModal = new bootstrap.Modal(document.getElementById('stepingModal'))
myModal.show()
</script>
<?= $this->endSection(); ?>