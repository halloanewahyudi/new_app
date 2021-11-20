<?= $this->extend('layouts/main'); ?>
<?= $this->Section('content'); ?>
<div id="formSekolahAsal" class="py-3">
    <div class="col-lg-6">
        <form id="formWaliMurid" class="" action="<?= $action ?>" accept-charset="utf-8" data-validate>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" value="<?= !empty($data_wali_murid['nama']) ? $data_wali_murid['nama'] : '' ?>" class="form-control" <?= $required ?> />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="<?= !empty($data_wali_murid['tempat_lahir']) ? $data_wali_murid['tempat_lahir'] : '' ?>" class="form-control" <?= $required ?> />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" value="<?= !empty($data_wali_murid['tanggal_lahir']) ? $data_wali_murid['tanggal_lahir'] : '' ?>" class="form-control datepicker" <?= $required ?> autocomplete="off"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" name="pekerjaan" value="<?= !empty($data_wali_murid['pekerjaan']) ? $data_wali_murid['pekerjaan'] : '' ?>" class="form-control" <?= $required ?> />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="penghasilan">Penghasilan</label>
                        <?php $options = [
                            '' => 'Pilih',
                            'none' => 'none',
                            'di bawah atau 5jt' => 'di bawah atau 5jt',
                            'di atas 5jt' => 'di atas 5jt',
                            'di atas 6jt' => 'di atas 6jt',
                            'di atas 9jt' => 'di atas 9jt',
                            'di atas 12jt' => 'di atas 12jt',
                            'di atas 15jt' => 'di atas 15jt',
                            'di atas 18jt' => 'di atas 18jt',
                            'di atas 21jt' => 'di atas 21jt',
                            'di atas 24jt' => 'di atas 24jt',
                            'di atas 25jt' => 'di atas 25jt',
                            'di atas 30jt' => 'di atas 30jt',
                            'di atas 35jt' => 'di atas 35jt',
                            'di atas 40jt' =>  'di atas 40jt',
                            'di atas 45jt' => 'di atas 45jt',
                            'di atas 50jt' => 'di atas 50jt',
                        ];
                        if (isset($data_wali_murid)) {
                            $selected = $data_wali_murid['penghasilan'];
                        } else {
                            $selected = '';
                        }
                        echo form_dropdown('penghasilan', $options, $selected, ['id' => 'selectPenghasilan', 'class' => 'form-control']);
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                        <?php $options = [
                            '' => 'Pilih ',
                            'SD'  => 'SD',
                            'SMP/Sedrajat'    => 'SMP/Sedrajat',
                            'SMU/Sedrajat'  => 'SMU/Sedrajat',
                            'Perguruan Tinggi' => 'Perguruan Tinggi',
                            'lainya' => 'Lainya',
                        ];
                        if (isset($data_wali_murid)) {
                            $selected = $data_wali_murid['pendidikan_terakhir'];
                        } else {
                            $selected = '';
                        }
                        echo form_dropdown('pendidikan_terakhir', $options, $selected, ['id' => 'pendTerakhir', 'class' => 'form-control']);
                        ?>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" name="jurusan" value="<?= !empty($data_wali_murid['jurusan']) ? $data_wali_murid['jurusan'] : '' ?>" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="number" name="no_hp" value="<?= !empty($data_wali_murid['no_hp']) ? $data_wali_murid['no_hp'] : '' ?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?= !empty($data_wali_murid['email']) ? $data_wali_murid['email'] : '' ?>" class="form-control" <?= $required ?> />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <?php $options = [
                            '' => 'Pilih',
                            'Hidup'  => 'Hidup',
                            'Sudah meniggal'    => 'Sudah meniggal',
                            'Tidak Serumah'  => 'Tidak Serumah',
                        ];
                        if (isset($data_wali_murid)) {
                            $selected = $data_wali_murid['status'];
                        } else {
                            $selected = '';
                        }
                        echo form_dropdown('status', $options, $selected, ['class' => 'form-control']);
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="number" name="nik" value="<?= !empty($data_wali_murid['nik']) ? $data_wali_murid['nik'] : '' ?>" class="form-control" minlength="16" maxlength="16" <?= $required ?> />
                    </div>
                </div>
            </div>

            <input type="hidden" name="posisi" value="<?= $posisi ?>" class="form-control" />

            <div id="alamatBox" class="my-3">
                <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Isi alamat jika tidak serumah
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="" rows="4" class="form-control">
      <?= !empty($data_wali_murid['alamat']) ? $data_wali_murid['alamat'] : '' ?>
      </textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="desa_kelurahan">Desa Kelurahan</label>
                                <input type="text" name="desa_kelurahan" value="<?= !empty($data_wali_murid['desa_kelurahan']) ? $data_wali_murid['desa_kelurahan'] : '' ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" name="kecamatan" value="<?= !empty($data_wali_murid['kecamatan']) ? $data_wali_murid['kecamatan'] : '' ?>" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kabupaten_kota">Kabupaten Kota</label>
                                <input type="text" name="kabupaten_kota" value="<?= !empty($data_wali_murid['kabupaten_kota']) ? $data_wali_murid['kabupaten_kota'] : '' ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" name="provinsi" value="<?= !empty($data_wali_murid['provinsi']) ? $data_wali_murid['provinsi'] : '' ?>" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="negara">Negara</label>
                                <input type="text" name="negara" value="<?= !empty($data_wali_murid['negara']) ? $data_wali_murid['negara'] : '' ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" name="kode_pos" value="<?= !empty($data_wali_murid['kode_pos']) ? $data_wali_murid['kode_pos'] : '' ?>" class="form-control" />
                            </div>
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
<script>

</script>
<?= $this->endSection(); ?>