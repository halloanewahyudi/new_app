<?= $this->extend('layouts/main'); ?>
<?= $this->Section('content'); ?>
<div id="bayarPage" class="pb-5">
<?php
                   $num = user_id();
                   $noreg = sprintf("%03d", $num);
                  
                    ?>
<div class="row">
    <div class="col-lg-4">
    <form id="form" action="<?= $action?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" data-validate>
        <?= csrf_field() ?>
        <?php
        $date = date('Y');
        $code = substr($date, 2);
        $random = rand(1,1000); 

        $nokwitansi = user_id();
        $nokwitansi .= $code;
        $nokwitansi .= $random;
        // code kwitansi userID,Belakan9 Tahun,Random
       
        $digits = 3;
         ?>
      <input type="hidden" name="kode_unik" value="<?= $noreg ?>">
        <input type="hidden" name="no_kwitansi" value="<?= $nokwitansi ?>">
        <input type="hidden" name="nama_pembayaran" value="<?= $nama_pembayaran;  ?>">
        <input type="hidden" name="code" value="<?= $kode_pembayaran;  ?>">
    
        <div class="form-group">
            <div class=" mb-3">
            Setelah melakukan transaksi pembayaran, maka isi form di bawah ini untuk konfirmasi <hr>
                <label for="tanggal">Tanggal Pembayaran</label> <br>
                <small> wajib di isi  tanggal kapan waktu anda membayar</small>
                <div id="dp">
            <vuejs-datepicker :language="id" name="tanggal" input-class="form-control" placeholder="Tanggal" value="state.date" required> </vuejs-datepicker>
                </div>
            </div>
           
            <div class=" mb-3">
                <label for="jenis_pembayaran">Jenis Pembayaran</label>
                
                <v-select :options="options" name="jenis_pembayaran" v-model="checked" class="form-control" required></v-select>
                <input type="hidden" name="jenis_pembayaran" id="pembayaran" :value="checked" required >
            </div>
        </div>
        <div class="form-group ">
            <div class=" mb-3">
                <label for="catatan">Catatan</label>
                <textarea name="catatan" class="form-control" id="" rows="4"><?= !empty($data_pembayaran['catatan']) ? $data_pembayaran['catatan'] : '' ?></textarea>

            </div>
        </div>
        <div class="form-group  mb-3">
            <label for="bukti" class="form-label">Upload file</label> <br>
            <input type="file" class="form-control" accept="image/*" @change="previewImage" name="bukti" class="form-control-file" id="my-file " required>
        </div>

        <template v-if="preview">
            <div style="width: 200px; height:100%; " class="mb-3">
                <img :src="preview" class="img-fluid" />
                <!--  <p class="mb-0">file name: {{ image.name }}</p>
              <p class="mb-3">size: {{ image.size/1024 }}KB</p> -->

                <button class="btn btn-sm btn-success" @click="reset">Hapus gambar</button>
            </div>
        </template>
        <div class="form-group">
            <button  class="btn btn-primary">Bayar</button>
        </div>
    </form>

    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                      <h3 class="fs-3">Rp, 400.<?= $noreg ?></h3>
                   <span>pembayaran anda dengan dengan kode unik di 3 angka akhir nominal  </span>
            </div>
        </div>
    </div>
</div>

</div>
<script>
    Vue.component('v-select', VueSelect.VueSelect)
    const bayarApp = new Vue({
        el: '#bayarPage',
        data() {
            return {
                preview: null,
                image: null,
                preview_list: [],
                image_list: [],
                checked: '',
                options: [
                    'Transfer',
                    'Cash',
                    'Lain-lain'
                ],
                pembayaran:'',
                tanggal:'',
            }
        },

        created() {
          
        },
        methods: {
            previewImage: function(event) {
                var input = event.target;
                if (input.files) {
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        this.preview = e.target.result;
                    }
                    this.image = input.files[0];
                    reader.readAsDataURL(input.files[0]);
                }
            },
            reset: function() {
                this.image = null;
                this.preview = null;
                this.image_list = [];
                this.preview_list = [];
            },
            getTanggal: function(){
                state.date = this.tanggal
            }
        }
    })
</script>

<?= $this->endSection();  ?>