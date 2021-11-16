<?= $this->extend('layouts/main'); ?>
<?= $this->Section('content'); ?>
<div id="ane">
    <form v-on:submit.prevent="submitForm" accept-charset="utf-8">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" v-model="form.nama" value="<?= !empty($data_ane['nama']) ? $data_ane['nama'] : '' ?>" class="form-control" />
        </div>
        {{form.nama}}
        <div class="form-group">
            <label for="umur">Umur</label>
            <input type="text" name="umur" v-model="form.umur" value="<?= !empty($data_ane['umur']) ? $data_ane['umur'] : '' ?>" class="form-control" />
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <input type="text" name="jenis_kelamin" v-model="form.jenis_kelamin" value="<?= !empty($data_ane['jenis_kelamin']) ? $data_ane['jenis_kelamin'] : '' ?>" class="form-control" />
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <div v-for="saya in ane" :key="saya.id">{{saya.nama}}</div>
</div>
<script>
  const  myVue = new Vue({
        el: '#ane',
        data() {
            return {
                ane:[],
                form: {
                    nama: '',
                    umur: '',
                    jenis_kelamin: '',
                }
            }
        },
        created() {
          
        },
        methods: {
            submitForm: function() {
                const formData = new FormData()
                axios.post('/ane/create/',{
                    nama:'Seorang kapiten Lagi',
                    umur:200,
                    jenis_kelamin:'Laki'
                })
                    .then(function(response) {
                      
                        console.log(response);

                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            },
            load(){
        axios.get('/ane').then(res => {
        this.ane = res.data
            }).catch ((err) => {
                console.log(err);
                
            })
            },
             add(){
            axios.post('/ane/create', this.form).then(res => {
                this.load()
                this.form.nama = this.form.nama 
                this.form.umur = this.form.umur
                this.form.jenis_kelamin = this.form.jenis_kelamin
            })
            }
        },

    });
</script>
<?= $this->endSection();  ?>