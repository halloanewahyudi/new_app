<?= $this->extend('layouts/main'); ?>
<?= $this->Section('content'); ?>
<div id="waliMuridPage" class="pb-5">

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Isi Form data orang tua atau wali murid</h4>
            <p class="card-text">
                Silakan isi data orang tua atau wali anda dengan sebenarnya agar memnudahkan pihak pesantren untuk keperluan administratif dan hal-hal mengenai santri
            </p>

            <div class="btn-group">
  <a href="<?= base_url('create-ayah/'.user()->username)?>" class="btn btn-primary active" aria-current="page"> Form data Ayah</a>
  <a href="<?= base_url('create-ibu/'.user()->username)?>" class="btn btn-primary">Form data Ibu</a>
  <a href="<?= base_url('create-wali/'.user()->username)?>" class="btn btn-primary">Form data Wali</a>
</div>
        </div>
    </div>
    <div class="row">

        <div v-if="ayah != '' " class="ayah-item col-lg">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ayah</h4>
                    <div class="d-flex justify-content-between py-2">
                        <span>Nama</span> <span> {{ayah[0].nama}} </span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span>Pendidikan</span> <span> {{ayah[0].pendidikan_terakhir}} </span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span>No Hp</span> <span> {{ayah[0].no_hp}} </span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span>email</span> <span> {{ayah[0].email}} </span>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="ibu != '' " class="ibu-item col-lg">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ibu</h4>
                    <div class="d-flex justify-content-between py-2">
                        <span>Nama</span> <span> {{ibu[0].nama}} </span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span>Pendidikan</span> <span> {{ibu[0].pendidikan_terakhir}} </span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span>No Hp</span> <span> {{ibu[0].no_hp}} </span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span>email</span> <span> {{ibu[0].email}} </span>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="wali != '' " class="wali-item col-lg">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">wali Santri</h4>
                    <div class="d-flex justify-content-between py-2">
                        <span>Nama</span> <span> {{wali[0].nama}} </span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span>Pendidikan</span> <span> {{wali[0].pendidikan_terakhir}} </span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span>No Hp</span> <span> {{wali[0].no_hp}} </span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span>email</span> <span> {{wali[0].email}} </span>
                    </div>
                </div>
            </div>
        </div>
    </div><!--  end row -->
</div>
<script>
    const walmur = new Vue({
        el: '#waliMuridPage',
        data() {
            return {
                ayah: '',
                ibu: '',
                wali: ''
            }
        },
        created() {
            axios.get('rest/walimuridaction/wali/Ayah')
                .then((response) => {
                    this.ayah = response.data.data
                    console.log(response.data)
                });
            axios.get('rest/walimuridaction/wali/Ibu')
                .then((response) => {
                    this.ibu = response.data.data
                    console.log(response.data)
                });
            axios.get('rest/walimuridaction/wali/walimurid')
                .then((response) => {
                    this.wali = response.data.data
                    console.log(response.data)
                });

        },

    })
</script>
<?= $this->endSection() ?>