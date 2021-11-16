<?= $this->extend('layouts/main'); ?>
<?= $this->Section('content'); ?>
<div id="sekolahAsalPage" class="pb-5">

    <form id="form" action="<?= $action ?>"  accept-charset="utf-8" data-validate>
        <div class="form-group row">
        <div class="form-group col-md-4 mb-3">
            <label for="sekolah_asal">Sekolah Asal</label>
            <input type="text" name="sekolah_asal" value="<?= !empty($data_sekolah_asal['sekolah_asal']) ? $data_sekolah_asal['sekolah_asal'] : '' ?>" class="form-control"required />
        </div>
        <div class="form-group col-md-2 mb-3">
         <label for="npsn">NPSN</label>
            <input type="text" name="npsn" value="<?= !empty($data_sekolah_asal['npsn']) ? $data_sekolah_asal['npsn'] : '' ?>" class="form-control" required/>
        </div>
        <div class="form-group col-md-2 mb-3">
        <label for="tahun_lulus">Tahun Lulus</label>
            <input type="text" name="tahun_lulus" value="<?= !empty($data_sekolah_asal['tahun_lulus']) ? $data_sekolah_asal['tahun_lulus'] : '' ?>" class="form-control"  pattern= "\d{4}" required/>
        </div>
        </div>

        <div class="form-group col-md-8 mb-3">
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
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
<script>
    var sekolahAsalPage = new Vue({
        el: '#sekolahAsalPage',
        data() {
            return {
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
<?= $this->endSection(); ?>