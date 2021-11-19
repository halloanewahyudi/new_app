<?= $this->extend('layouts/main'); ?>
<?= $this->Section('content'); ?>
<!-- response -->
<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('message') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<div id="formSekolahAsal" class="py-3">
    <div class="col-lg-6">
        <form id="form" action="<?= $action; ?>" accept-charset="utf-8" data-validate>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sekolah_asal">Sekolah Asal</label>
                        <input type="text" name="sekolah_asal" value="<?= !empty($data_sekolah_asal['sekolah_asal']) ? $data_sekolah_asal['sekolah_asal'] : '' ?>" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="npsn">Npsn</label>
                        <input type="text" name="npsn" value="<?= !empty($data_sekolah_asal['npsn']) ? $data_sekolah_asal['npsn'] : '' ?>" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        <input type="number" name="tahun_lulus" value="<?= !empty($data_sekolah_asal['tahun_lulus']) ? $data_sekolah_asal['tahun_lulus'] : '' ?>" class="form-control" required />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="" rows="4" class="form-control" required >
                <?= !empty($data_sekolah_asal['alamat']) ? $data_sekolah_asal['alamat'] : '' ?>
                </textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="desa_kelurahan">Desa Kelurahan</label>
                        <input type="text" name="desa_kelurahan" value="<?= !empty($data_sekolah_asal['desa_kelurahan']) ? $data_sekolah_asal['desa_kelurahan'] : '' ?>" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" name="kecamatan" value="<?= !empty($data_sekolah_asal['kecamatan']) ? $data_sekolah_asal['kecamatan'] : '' ?>" class="form-control" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kabupaten_kota">Kabupaten Kota</label>
                        <input type="text" name="kabupaten_kota" value="<?= !empty($data_sekolah_asal['kabupaten_kota']) ? $data_sekolah_asal['kabupaten_kota'] : '' ?>" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" name="provinsi" value="<?= !empty($data_sekolah_asal['provinsi']) ? $data_sekolah_asal['provinsi'] : '' ?>" class="form-control" required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kode_pos">Kode Pos</label>
                        <input type="text" name="kode_pos" value="<?= !empty($data_sekolah_asal['kode_pos']) ? $data_sekolah_asal['kode_pos'] : '' ?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="negara">Negara</label>
                        <input type="text" name="negara" value="<?= !empty($data_sekolah_asal['negara']) ? $data_sekolah_asal['negara'] : '' ?>" class="form-control" required />
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>