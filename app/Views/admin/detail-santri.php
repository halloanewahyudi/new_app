<?= $this->extend('layouts/admin-layout'); ?>

<?= $this->Section('content'); ?>

<div id="calonSantriDetail">

    <div class="col-lg-12">
        <div class="row">

            <div class="col-lg-4">

                <div class="card">

                    <div class="card-body">
                        <div class="text-center">
                       <?php 
                       if(isset($data_santri)): ?>
                        <?php 
                        
                        if($data_santri->status_berkas == 1){
                            $image = base_url('/berkas/'.$data_santri->file);
                        }else{
                         $image = base_url('/avatar/'.$data_santri->user_image);
                         }?>
                         <img src="<?= $image; ?>" class="img-fluid" width="120">
                       <h4><?= $data_santri->nama_lengkap; ?></h4>
                       </div>
                          <?php endif; ?>
                          <div class="d-flex justify-content-between mb-3 pb-2 border-bottom">
                            <div>
                                NISN <br>
                                <strong><?= $data_santri->nisn; ?></strong>
                            </div>
                            <div>
                                NIK <br>
                                <strong><?= $data_santri->nik ; ?></strong>
                            </div>
                          </div>
                          <div class="d-flex justify-content-between mb-3 pb-2 border-bottom">
                            <div >
                                No Pendaftaran <br>
                                <?php 
                                $num = $data_santri->uid;
                            $noreg = sprintf("%04d", $num);
                            $codereg = $data_santri->registration_number;
                            
                            ?>
                                <strong><?= $data_santri->registration_number; ?></strong>
                            </div>
                            <div>
                                Jenjang <br>
                                <strong><?= $data_santri->educational_level ; ?></strong>
                            </div>
                          </div>
                          <div>
                           <?php if($data_santri->alamat_santri ): ?>
                            <br>
                              Alamat <br>
                              <strong><?= $data_santri->alamat_santri ; ?></strong>
                               <br>
                              Kelurahan <br>
                              <strong> 
                                <?php
                                $string = $data_santri->desa_kelurahan_santri;
                               $kel =  substr($string, 0, strrpos($string.",", ","));
                               echo $kel;
                                 ?></strong><br>
                              Kecamatan <br>
                              <strong> <?= $data_santri->kecamatan_santri; ?></strong><br>
                               Provinsi <br>
                              <strong> <?= $data_santri->provinsi_santri; ?></strong>
                          <?php else: ?>
                            <span class="text-muted">Alamat belum terisi</span>
                          <?php endif; ?>
                          </div>
                    </div> <!-- end card body -->
                </div>

                    <div class="card">
                        <div class="card-body">
                             <h4>Sekolah asal</h4> <br>
                             <?php if($data_santri->sekolah_asal): ?>
                            <strong><?= $data_santri->sekolah_asal ?></strong><br>
                            Alamat <br>
                            <?= $data_santri->alamat_sekolah_asal ?> <br>
                            Kelurahan <br>
                            <?= $data_santri->desa_kelurahan_sekolah_asal ?> <br>
                            Kecamatan <br>
                            <?= $data_santri->kecamatan_sekolah_asal ?> <br>
                            Kabupatan/Kota <br>
                            <?= $data_santri->kabupaten_kota_sekolah_asal ?> <br>
                        <?php else: ?>
                            <span class="text-muted">Belum ada data sekolah asal</span>
                        <?php endif; ?>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <strong>Pembayaran</strong><br>
                            No Kwitansi: <?= $data_santri->no_kwitansi ?><br>
                            Tanggal: <?= $data_santri->tgl_pembayaran; ?><br>
                            Metode Pembayaran: <?= $data_santri->jenis_pembayaran; ?>
                            <br>
                            <?php if($data_santri->status_pembayaran == 1){
                                $status = 'Valid';
                            }else{
                                $status = 'Belum Terkonfirmasi';
                            } 

                            ?>
                            Status : <?= $status; ?> <br>
                            <img class="img-fluid" src="<?= base_url('/bukti_pembayaran/'.$data_santri->bukti); ?>">
                            <br>
                            Catatan: <br>
                            <?= $data_santri->catatan ?>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                             <h4>Info tambahan</h4> 
                             Pembiayaan Sekolah:  <?= $data_santri->pembiayaan ?>  <br>
                             Status Rumah tinggal:  <?= $data_santri->status_tinggal ?> <br>
                             <hr>

                             Golongan darah:  <?= $data_santri->golongan_darah ?>  <br>
                             Tinggi badan:  <?= $data_santri->tinggi_badan ?> Cm <br>
                             Berat Badan:  <?= $data_santri->berat_badan ?> Kg <br>
                             <hr>
                             <?php if($data_santri->jumlah_hafalan || $data_santri->hobi || $data_santri->cita_cita ): ?>
                            Jumlah Hafalan :
                            <?= $data_santri->jumlah_hafalan ?> <br>
                            Hobi: 
                            <?= $data_santri->hobi ?> <br>
                            CIta-cita:
                            <?= $data_santri->cita_cita ?> <br>
                            Hobi:
                            <?= $data_santri->hobi ?> <br>
                        <?php else: ?>
                            <span class="text-muted">Belum ada data tambahan</span>
                        <?php endif; ?>
                        </div>
                    </div>
            </div>

            <div class="col-lg-8">

                <div class="card">

                    <div class="card-body">
                        <h4>Data Orang Tua</h4>
                         <?php if($ayah):?>
                        <strong class="mr-3">Data Ayah</strong>
                       
                        <table class="table">
                            <tr>
                                <td>Nama</td><td>:</td><td><?= $ayah->nama ?></td>
                            </tr>
                             <tr>
                                <td>Tempat Lahir</td><td>:</td><td><?= $ayah->tempat_lahir ?></td>
                            </tr>
                            <tr>
                                <td>Tangal Lahir</td><td>:</td><td><?= $ayah->tanggal_lahir ?></td>
                            </tr>
                            <tr>
                                <td>NIK</td><td>:</td><td><?= $ayah->nik ?></td>
                            </tr>
                             <tr>
                                <td>No HP</td><td>:</td><td><?= $ayah->no_hp ?></td>
                            </tr>
                            <tr>
                                <td>email</td><td>:</td><td><?= $ayah->email ?></td>
                            </tr>
                            <tr>
                                <td>Pendidikan Terakhir</td><td>:</td><td><?= $ayah->pendidikan_terakhir ?></td>
                            </tr>
                            <tr>
                                <td>Jurusan</td><td>:</td><td><?= $ayah->jurusan ?></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td><td>:</td><td><?= $ayah->pekerjaan ?></td>
                            </tr>
                            <tr>
                                <td>Penghasilan</td><td>:</td><td><?= $ayah->penghasilan ?></td>
                            </tr>
                        </table>
                    <?php else: ?>
                        <span class=" text-muted mb-3">Belum ada data Ayah</span>
                    <?php endif; ?>

                    <!-- bates -->
                     <?php if($ibu):?>
                    <strong class="mr-3">Data Ibu</strong>
                     
                        <table class="table">
                            <tr>
                                <td>Nama</td><td>:</td><td><?= $ibu->nama ?></td>
                            </tr>
                             <tr>
                                <td>Tempat Lahir</td><td>:</td><td><?= $ibu->tempat_lahir ?></td>
                            </tr>
                            <tr>
                                <td>Tangal Lahir</td><td>:</td><td><?= $ibu->tanggal_lahir ?></td>
                            </tr>
                            <tr>
                                <td>NIK</td><td>:</td><td><?= $ibu->nik ?></td>
                            </tr>
                             <tr>
                                <td>No HP</td><td>:</td><td><?= $ibu->no_hp ?></td>
                            </tr>
                            <tr>
                                <td>email</td><td>:</td><td><?= $ibu->email ?></td>
                            </tr>
                            <tr>
                                <td>Pendidikan Terakhir</td><td>:</td><td><?= $ibu->pendidikan_terakhir ?></td>
                            </tr>
                            <tr>
                                <td>Jurusan</td><td>:</td><td><?= $ibu->jurusan ?></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td><td>:</td><td><?= $ibu->pekerjaan ?></td>
                            </tr>
                            <tr>
                                <td>Penghasilan</td><td>:</td><td><?= $ibu->penghasilan ?></td>
                            </tr>
                        </table>
                           <?php else: ?>
                        <span class="mb-3 text-muted">Belum ada data Ibu</span>
                    <?php endif; ?>

                   <!--  bates -->
                   <?php if($wali_murid):?>
                    <strong class="mr-3">Data Wali Murid</strong>
                     
                        <table class="table">
                            <tr>
                                <td>Nama</td><td>:</td><td><?= $wali_murid->nama ?></td>
                            </tr>
                             <tr>
                                <td>Tempat Lahir</td><td>:</td><td><?= $wali_murid->tempat_lahir ?></td>
                            </tr>
                            <tr>
                                <td>Tangal Lahir</td><td>:</td><td><?= $wali_murid->tanggal_lahir ?></td>
                            </tr>
                            <tr>
                                <td>NIK</td><td>:</td><td><?= $wali_murid->nik ?></td>
                            </tr>
                             <tr>
                                <td>No HP</td><td>:</td><td><?= $wali_murid->no_hp ?></td>
                            </tr>
                            <tr>
                                <td>email</td><td>:</td><td><?= $wali_murid->email ?></td>
                            </tr>
                            <tr>
                                <td>Pendidikan Terakhir</td><td>:</td><td><?= $wali_murid->pendidikan_terakhir ?></td>
                            </tr>
                            <tr>
                                <td>Jurusan</td><td>:</td><td><?= $wali_murid->jurusan ?></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td><td>:</td><td><?= $wali_murid->pekerjaan ?></td>
                            </tr>
                            <tr>
                                <td>Penghasilan</td><td>:</td><td><?= $wali_murid->penghasilan ?></td>
                            </tr>
                        </table>
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