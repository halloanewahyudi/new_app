<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<div id="calonSantriDetail">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column justify-content-center align-items-center mb-4">
                            <div if="ds">
                                <img :src=`<?= base_url('avatar'), '/' ?>${ds.user_image}`>
                            </div>
                            <h5 class="card-title mb-5">
                                {{ds.full_name}}
                            </h5>
                            <span class="border-bottom border-light w-100 d-block my-2"></span>
                            <div class="d-flex justify-content-between align-self-stretch">
                                <span>
                                    No Reg
                                    <br>
                                    <strong> {{regNum}}</strong>
                                </span>
                                <span>
                                    Tanggal Daftar <br>
                                    <strong> {{regDate}} </strong>
                                </span>
                            </div>
                            <span class="border-bottom border-light w-100 d-block my-2"></span>
                            <div class="d-flex justify-content-between align-self-stretch">
                                <span>
                                    NISN
                                    <br>
                                    <strong> {{ds.nisn}}</strong>
                                </span>
                                <span>
                                    NIK <br>
                                    <strong> {{ds.nik}} </strong>
                                </span>
                            </div>
                            <span class="border-bottom border-light w-100 d-block my-2"></span>
                            <div class="d-flex justify-content-between align-self-stretch">
                                <span class="">
                                    Jenjang
                                    <br>
                                    <strong> {{ds.educational_level}}</strong>
                                </span>
                                <span class="text-right">
                                    Kontak <br>
                                    <strong> {{ds.kontak}} </strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="fs-5">Data Diri</h4>
                        <div class="mb-2 ">
                            Tanggal Lahir <br>
                            <strong>{{ds.date_of_birth}}</strong>
                        </div>
                        <div class="mb-2 ">
                            Anak ke <br>
                            <strong>{{ds.anak_ke}}</strong>
                        </div>
                        <div class="mb-2 ">
                            Golongan Darah <br>
                            <strong>{{ds.golongan_darah}}</strong>
                        </div>
                        <div class="mb-2 ">
                           Hobi <br>
                            <strong>{{ds.hobi}}</strong>
                        </div>
                        <div class="mb-2 ">
                            Cita - cita <br>
                            <strong>{{ds.cita_cita}}</strong>
                        </div>
                        <div class="mb-2 ">
                            Hafalan Quran <br>
                            <strong>{{ds.jumlah_hafalan}}</strong>
                        </div>
                        <span class="border-bottom border-light w-100 d-block my-2"></span>
                        <h4 class="fs-5">Alamat</h4>

                        <span class="border-bottom border-light w-100 d-block my-2"></span>
                        <?php if(isset($ayah)): ?>
                        <h4 class="fs-5">Orang tua</h4>
                        <div class="flex">
                            <span>Nama Ayah</span> <br>
                            <strong><?= $ayah['nama'] ?> </strong> <br>
                            <span>Tempat Lahir</span> <br>
                            <?= $ayah['tempat_lahir'] ?><br>
                            <span>Tanggal Lahir</span> <br>
                            <?= $ayah['tanggal_lahir'] ?>
                            <span>Alamat</span> <br>
                            <?= $ayah['alamat'] ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        const dataSantri = new Vue({
            el: '#calonSantriDetail',
            data() {
                return {
                    santri: <?= json_encode($data_santri) ?>,
                }
            },
            computed: {
                ds() {
                    var ds = this.santri[0]
                    return ds
                },
                regNum() {
                    var reg = this.ds.registration_number
                    var num = this.ds.uid
                    let str = num.toString().padStart(4, "0")
                    var regnum = reg + str
                    return regnum
                    //   console.log(str) 
                },
                regDate() {
                    var today = this.ds.created_at
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();

                    today = dd + '/' + mm + '/' + yyyy;
                    //  document.write(today);
                    return today
                }
            },

        })
    </script>
    <?= $this->endSection() ?>