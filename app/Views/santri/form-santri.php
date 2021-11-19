<?= $this->extend('layouts/main'); ?>
<?php echo $this->section('content') ?>
<!-- response -->
<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('message') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div id="formSantri" class="py-3">
    <div class="col-lg-6">
        <form id="form" action="<?= $action; ?>" accept-charset="utf-8" class="form my-3" data-validate>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" name="nik" value="<?= !empty($data_santri['nik']) ? $data_santri['nik'] : '' ?>" class="form-control" minlength="16" maxlength="16" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik">NISN</label>
                        <input type="number" name="nisn" id="nisn" value="<?= !empty($data_santri['nisn']) ? $data_santri['nisn'] : '' ?>" class="form-control" minlength="10" maxlength="10" required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="anak_ke">Anak Ke</label>
                        <input type="number" name="anak_ke" value="<?= !empty($data_santri['anak_ke']) ? $data_santri['anak_ke'] : '' ?>" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status_anak">Status Anak</label>
                        <?php $options = [
                            '' => 'Pilih ',
                            'Anak kandung'  => 'Anak kandung',
                            'Anak Tiri'    => 'Anak Tiri',
                            'Anak Angkat'  => 'Anak Angkat',
                            'lainya' => 'Lainya',
                        ];
                        if (isset($data_santri)) {
                            $selected = $data_santri['status_anak'];
                        } else {
                            $selected = '';
                        }
                        echo form_dropdown('status_anak', $options, $selected, ['id' => 'statusAnak', 'class' => 'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="kontak">Kontak</label>
                <input type="number" name="kontak" value="<?= !empty($data_santri['kontak']) ? $data_santri['kontak'] : '' ?>" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="golongan_darah">Golongan Darah</label>
                <?php $options = [
                    '' => 'Pilih ',
                    'A'  => 'A',
                    'B'    => 'B',
                    'AB'  => 'AB',
                    'O' => 'O',
                    'lainya' => 'Lainya',
                ];
                if (isset($data_santri)) {
                    $selected = $data_santri['golongan_darah'];
                } else {
                    $selected = '';
                }
                echo form_dropdown('golongan_darah', $options, $selected, ['class' => 'form-control']);
                ?>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tinggi_badan">Tinggi Badan</label>
                        <div class="input-group">
                            <input type="number" name="tinggi_badan" value="<?= !empty($data_santri['tinggi_badan']) ? $data_santri['tinggi_badan'] : '' ?>" class="form-control" required />
                            <span class="input-group-text" id="basic-addon2">Cm</span>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="berat_badan">Berat Badan</label>
                        <div class="input-group">
                            <input type="number" name="berat_badan" value="<?= !empty($data_santri['berat_badan']) ? $data_santri['berat_badan'] : '' ?>" class="form-control" required />
                            <span class="input-group-text" id="basic-addon2">Kg</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status_tinggal">Status Tinggal</label>
                        <?php $options = [
                            '' => 'Pilih ',
                            'Milik Pribadi'  => 'Milik Pribadi',
                            'Sewa/Kontrak'    => 'Sewa/Kontrak',
                            'Tinggal Non Sewa'  => 'Tinggal Non Sewa',
                            'lainya' => 'Lainya',
                        ];
                        if (isset($data_santri)) {
                            $selected = $data_santri['status_tinggal'];
                        } else {
                            $selected = '';
                        }
                        echo form_dropdown('status_tinggal', $options, $selected, ['class' => 'form-control']);
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pembiayaan">Pembiayaan</label>
                        <?php $options = [
                            '' => 'Pilih ',
                            'Orang Tua'  => 'Orang Tua',
                            'Wali Murid'    => 'WaliMurid',
                            'Beasiswa'  => 'Beasiswa',
                            'lainya' => 'Lainya',
                        ];
                        if (isset($data_santri)) {
                            $selected = $data_santri['pembiayaan'];
                        } else {
                            $selected = '';
                        }
                        echo form_dropdown('pembiayaan', $options, $selected, ['class' => 'form-control']);
                        ?>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" rows="4" class="form-control" required>
            <?= !empty($data_santri['alamat']) ? $data_santri['alamat'] : '' ?>
            </textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="desa_kelurahan">Desa Kelurahan</label>
                        <input type="text" name="desa_kelurahan" value="<?= !empty($data_santri['desa_kelurahan']) ? $data_santri['desa_kelurahan'] : '' ?>" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" name="kecamatan" value="<?= !empty($data_santri['kecamatan']) ? $data_santri['kecamatan'] : '' ?>" class="form-control" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kabupaten_kota">Kabupaten Kota</label>
                        <input type="text" name="kabupaten_kota" value="<?= !empty($data_santri['kabupaten_kota']) ? $data_santri['kabupaten_kota'] : '' ?>" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" name="provinsi" value="<?= !empty($data_santri['provinsi']) ? $data_santri['provinsi'] : '' ?>" class="form-control" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="negara">Negara</label>
                        <input type="text" name="negara" value="<?= !empty($data_santri['negara']) ? $data_santri['negara'] : '' ?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kode_pos">Kode Pos</label>
                        <input type="text" name="kode_pos" value="<?= !empty($data_santri['kode_pos']) ? $data_santri['kode_pos'] : '' ?>" class="form-control" />
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="hobi">Hobi</label>
                        <input type="text" name="hobi" value="<?= !empty($data_santri['hobi']) ? $data_santri['hobi'] : '' ?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cita_cita">Cita Cita</label>
                        <input type="text" name="cita_cita" value="<?= !empty($data_santri['cita_cita']) ? $data_santri['cita_cita'] : '' ?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="form-group">
                        <label for="jumlah_hafalan">Jumlah Hafalan</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_hafalan" value="<?= !empty($data_santri['jumlah_hafalan']) ? $data_santri['jumlah_hafalan'] : '' ?>" class="form-control" />
                            <span class="input-group-text" id="basic-addon2">Juz</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
<?php echo $this->endSection() ?>