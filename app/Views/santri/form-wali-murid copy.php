<?= $this->extend('layouts/main'); ?>
<?= $this->Section('content'); ?>
<div id="waliMuridPage" class="pb-5">

    <!-- Content -->
    <form id="form" accept-charset="utf-8" action="<?= $action ?>" data-validate>
        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" value="<?= !empty($data_wali_murid['nama']) ? $data_wali_murid['nama'] : '' ?>" class="form-control" required />
            </div>
            <div class="col-md-2 mb-3">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="<?= !empty($data_wali_murid['tempat_lahir']) ? $data_wali_murid['tempat_lahir'] : '' ?>" class="form-control" required />
            </div>
            <div class="col-md-2 mb-3">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <div id="dp">
                    <vuejs-datepicker :language="id" name="tanggal_lahir" v-model="tanggal_lahir" input-class="form-control" placeholder="Tanggal" value="state.date" required> </vuejs-datepicker>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" name="pekerjaan" value="<?= !empty($data_wali_murid['pekerjaan']) ? $data_wali_murid['pekerjaan'] : '' ?>" class="form-control" required />
            </div>
            <div class="col-md-4 mb-3">
                <label for="penghasilan">Penghasilan</label>
                <v-select :options="['di atas 5 Juta','di atas 10 Juta', 'di atas 15 Juta' ]" v-model="gaji" class="form-control"></v-select>
                <input type="hidden" name="penghasilan" :value="gaji" required>
            </div>

        </div>
        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                <input type="text" name="pendidikan_terakhir" value="<?= !empty($data_wali_murid['pendidikan_terakhir']) ? $data_wali_murid['pendidikan_terakhir'] : '' ?>" class="form-control" />
            </div>
            <div class="col-md-4 mb-3">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" value="<?= !empty($data_wali_murid['jurusan']) ? $data_wali_murid['jurusan'] : '' ?>" class="form-control" />
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label for="no_hp">No Hp</label>
                <input type="text" name="no_hp" value="<?= !empty($data_wali_murid['no_hp']) ? $data_wali_murid['no_hp'] : '' ?>" class="form-control" required />
            </div>
            <div class="col-md-4 mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?= !empty($data_wali_murid['email']) ? $data_wali_murid['email'] : '' ?>" class="form-control" required />
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 mb-3">
                <label for="status">Status</label>
                <v-select :options="['Masih ada','Sudah meniggal', 'Pisah' ]" v-model="status" class="form-control"></v-select>
                <input type="hidden" name="status" :value="status" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="nik">Nik</label>
                <input type="text" name="nik" value="<?= !empty($data_wali_murid['nik']) ? $data_wali_murid['nik'] : '' ?>" class="form-control" required />
            </div>
        </div>
        <!-- AlAMAT DIMULAI -->
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" @input="bukaAlamat">
            <label class="form-check-label" for="flexSwitchCheckDefault">Masukan Alamat jika Tidak Serumah</label>
        </div>
        <hr>
        <div class="alamat-box" v-if="alamatBox">
            <div class="form-group col-md-6 mb-3">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= !empty($data_alamat['alamat']) ? $data_alamat['alamat'] : '' ?></textarea>
            </div>
            <div class="form-group row">
                <div class="col-md-4 mb-3">
                    <label for="desa_kelurahan">Desa Kelurahan</label>
                    <input class="form-control" name="desa_kelurahan" id="inputKel" v-on:keyup="getKelurahan" v-on:change="getKecamatan" v-model="kel" list="my-list" autocomplete="off">
                    <datalist id="my-list">
                        <option class="option" v-for="(item,index) in kelurahan" :value="[item.name , item.id]" :id="item.id" autocomplete="off" />
                    </datalist>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" name="kecamatan" :value="kecamatan_id" class="form-control" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4 mb-3">
                    <label for="kabupaten_kota">Kabupaten Kota</label>
                    <input type="text" name="kabupaten_kota" :value="kabupaten_id" class="form-control" />
                </div>

                <div class="col-md-4 mb-3">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" name="provinsi" :value="provinsi_id" class="form-control" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 mb-3">
                    <label for="negara">Negara</label>
                    <input type="text" name="negara" :value="negara" class="form-control" />
                </div>
                <div class="col-md-4 mb-3">
                    <label for="kode_pos">Kode Pos</label>
                    <input type="text" name="kode_pos" value="<?= !empty($data_alamat['kode_pos']) ? $data_alamat['kode_pos'] : '' ?>" class="form-control" />
                </div>
            </div>


        </div> <!-- end alamat box -->

        <input type="hidden" name="posisi" value="<?= $posisi ?>" class="form-control" />
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    <!-- endcontent -->

    <script>
        Vue.component('v-select', VueSelect.VueSelect)
        var WaliMuridApp = new Vue({
            el: '#waliMuridPage',
            data() {
                return {
                    tanggal_lahir: '',
                    gaji: '',
                    status: '',
                    alamatBox: false,
                    kel: [],
                    kelurahan: [],
                    kelurahan_id: [],
                    kecamatan_id: '',
                    Kecamatan: '',
                    kabupaten_id: '',
                    provinsi_id: '',
                    negara: 'Indonesia'
                }
            },
            methods: {
                bukaAlamat: function() {
                    this.alamatBox = !this.alamatBox
                },
                getKelurahan: function(e) {
                    axios.get('/rest/lokasi/kelurahan/' + this.kel)
                        .then(response => (this.kelurahan = response.data.data, this.kelurahan_id = response.data.data))
                },
                getKecamatan: function() {
                    var string = this.kel
                    var ambil_angka = string.slice(-10)
                    getKecId = ambil_angka.slice(0, -3)
                    getKabId = ambil_angka.slice(0, -6)
                    getProvId = ambil_angka.slice(0, -8)
                    axios.get('/rest/lokasi/kecamatan/' + getKecId)
                        .then(response => (this.kecamatan_id = response.data.data[0].name, console.log(response.data.data[0].name)))

                    axios.get('/rest/lokasi/kabupaten/' + getKabId)
                        .then(response => (this.kabupaten_id = response.data.data[0].name, console.log(response.data.data[0].name)))

                    axios.get('/rest/lokasi/provinsi/' + getProvId)
                        .then(response => (this.provinsi_id = response.data.data[0].name, console.log(response.data.data[0].name)))

                },
            },
            computed: {
                removeString: function() {
                    var string = this.kel
                    return string.slice(-10) // tetap sepuluh akhir
                },
            }
        })
    </script>
</div>
<?= $this->endSection() ?>