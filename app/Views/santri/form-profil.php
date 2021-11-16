<?= $this->extend('layouts/main'); ?>
<?= $this->Section('content'); ?>
<div id="formProfile">
    <form class="needs-validation" method="post" action="<?= $action ?>" data-validate>
        <?= csrf_field() ?>
        <div class="form-group row">
            <div class="col-md-3 mb-3">
                <label for="nik">NIK</label>
                <input type="number" name="nik" id="nik" value="<?= !empty($data_santri['nik']) ? $data_santri['nik'] : '' ?>" class="form-control" minlength="16" maxlength="16" required />
            </div>
            <div class="col-md-3 mb-3">
                <label for="nisn">NiSN</label>
                <input type="number" name="nisn" id="nisn" value="<?= !empty($data_santri['nisn']) ? $data_santri['nisn'] : '' ?>" class="form-control" required />
            </div>
            <div class="col-md-3 mb-3">
                <label for="golongan_darah">Golongan Darah</label>
                <?php $options = [
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
            <div class="col-md-3 mb-3">
                <label for="anak_ke">Anak Ke</label>
                <input type="text" name="anak_ke" value="<?= !empty($data_santri['anak_ke']) ? $data_santri['anak_ke'] : '' ?>" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 mb-3">
                <label for="kontak">Nomer Kontak</label>
                <input type="text" name="kontak" value="<?= !empty($data_santri['kontak']) ? $data_santri['kontak'] : '' ?>" class="form-control" required />
            </div>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" rows="4"><?= !empty($data_santri['alamat']) ? $data_santri['alamat'] : '' ?></textarea>
        </div>
        <!-- pakai datalist  -->
        <div class="form-group row">
            <div class="col-md-3 mb-3">
                <label for="desa_kelurahan">Desa Kelurahan</label>
                <?php if(empty($data_santri['desa_kelurahan'])){
                    $required= 'required';
                }else{
                    $required= '';
                } ?>
                <input class="form-control" name="desa_kelurahan" id="inputKel" v-on:keyup="getKelurahan" v-on:change="getKecamatan" v-model="kel" list="my-list" autocomplete="off" <?= $required ?>>
                <datalist id="my-list">
                    <option class="option" v-for="(item,index) in kelurahan" :value="[item.name , item.id]" :id="item.id" autocomplete="off" />
                </datalist>
            </div>
            <!--   end pakai data list -->
            <div class="col-md-3 mb-3">
                <!-- kecamatan -->
                <?php if(empty($data_santri['kecamatan'])){
                    $required= 'required';
                }else{
                    $required= '';
                } ?>
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control" name="kecamatan" :value="kecamatan_id" <?= $required ?>>
                </fieldset>
            </div> <!-- end kecamatan -->
            <div class="col-md-3 mb-3">
                <!-- kabupatan -->
                <?php if(empty($data_santri['kabupaten_kota'])){
                    $required= 'required';
                }else{
                    $required= '';
                } ?>
                <label for="kabupaten_kota">Kabupaten Kota</label>
                <input type="text" class="form-control" name="kabupaten_kota" :value="kabupaten_id"  <?= $required ?>>
            </div> <!-- ends kabupaten -->
            <div class="col-md-3 mb-3">
                <!-- provinsi -->
                <?php if(empty($data_santri['provinsi'])){
                    $required= 'required';
                }else{
                    $required= '';
                } ?>
                <label for="provinsi">Provinsi</label>
                <input type="text" class="form-control" name="provinsi" :value="provinsi_id"  <?= $required ?>>
            </div> <!-- end provinsi -->
        </div>
        <div class="form-group row">
            <div class="col-md-3 mb-3">
                <label for="kode_pos">Kode Pos</label>
                <input type="text" name="kode_pos" value="<?= !empty($data_santri['kode_pos']) ? $data_santri['kode_pos'] : '' ?>" class="form-control" />
            </div>
            <div class="col-md-3 mb-3">
                <label for="negara">Negara</label>
                <input type="text" name="negara" :value="negara" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label for="hobi">Hobi</label>
                <input type="text" name="hobi" value="<?= !empty($data_santri['hobi']) ? $data_santri['hobi'] : '' ?>" class="form-control" />
            </div>
            <div class="col-md-4 mb-3">
                <label for="cita_cita">Cita Cita</label>
                <input type="text" name="cita_cita" value="<?= !empty($data_santri['cita_cita']) ? $data_santri['cita_cita'] : '' ?>" class="form-control" />
            </div>
            <div class="col-md-4 mb-3">
                <label for="jumlah_hafalan">Jumlah Hafalan</label>
                <div class="d-flex">
                    <div class="w-50 mr-3">
                        <input class="form-control" type="number" name="jumlah_hafalan" value="<?= !empty($data_santri['jumlah_hafalan']) ? $data_santri['jumlah_hafalan'] : '' ?>" class="form-control  " />
                    </div>
                    <span class="ml-3"> Juz</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
<script>
    const myapp = new Vue({
        el: '#formProfile',
        porps: ['dataId'],
        data() {
            return {
                options: ['ane', 'ente'],
                kel: [],
                kelurahan: [],
                kelurahan_id: [],
                kecamatan_id: '',
                Kecamatan: '',
                kabupaten_id: '',
                provinsi_id: '',
                negara: 'Indonesia',
                santri: '',
                tampil: false,
            }
        },
        created() {
            axios.get('/SantriAction/show/<?php if (isset($data_santri)) echo $data_santri['id'] ?>')
                .then((res) => {
                    this.santri = res.data.data
                    console.log(res.data)
                });
            // posisi edit alamat
        },
        methods: {
               getKelurahan: function(e) {
                    axios.get('/lokasi/kelurahan/' + this.kel)
                        .then(response => (this.kelurahan = response.data.data, this.kelurahan_id = response.data.data))
                },
                getKecamatan: function() {
                    var string = this.kel
                    var ambil_angka = string.slice(-10)
                    getKecId = ambil_angka.slice(0, -3)
                    getKabId = ambil_angka.slice(0, -6)
                    getProvId = ambil_angka.slice(0, -8)
                    axios.get('/lokasi/kecamatan/' + getKecId)
                        .then(response => (this.kecamatan_id = response.data.data[0].name, console.log(response.data.data[0].name)))

                    axios.get('/lokasi/kabupaten/' + getKabId)
                        .then(response => (this.kabupaten_id = response.data.data[0].name, console.log(response.data.data[0].name)))

                    axios.get('/lokasi/provinsi/' + getProvId)
                        .then(response => (this.provinsi_id = response.data.data[0].name, console.log(response.data.data[0].name)))

                },
        },
        computed: {
            dKabupaten() {
                var inputKel = document.getElementById('inputKel')
                if (inputKel.onChange) {
                    dataKab = this.kabupaten_id
                    console.log('berubah')
                } else {
                    dataKab = this.santri.kabupaten_kota
                }
                return dataKab
            },
            dKelurahan() {
                $kab = this.santri.desa_kelurahan
                if ($kab) {
                    return $kab
                } else {
                    return this.kelurahan
                }
            },
            dKecamatan() {
                $kab = this.santri.kecamatan
                if ($kab) {
                    return $kab
                } else {
                    return this.kecamatan_id
                }
            },
            dProvinsi() {
                $kab = this.santri.provinsi
                if ($kab) {
                    return $kab
                } else {
                    return this.provinsi_id
                }
            }
        }
    }) //end vue
</script>
<?= $this->endSection(); ?> -->