<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div id="bayarPage" class="pb-5">
    <div class="row">
        <div class="col-lg-4">
            <form id="<?= $form_id ?>" action="<?= $action ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" data-validate>
                <?= csrf_field() ?>
                <?php
                $date = date('Y');
                $code = substr($date, 2);
                $random = rand(1, 1000);
                $nokwitansi = user_id();
                $nokwitansi .= $code;
                $nokwitansi .= $random;
                // code kwitansi userID,Belakan9 Tahun,Random

                $digits = 3;
                ?>
                <input type="hidden" name="kode_unik" value="<?= user()->registration_number; ?>">
                <input type="hidden" name="no_kwitansi" value="<?= $nokwitansi ?>">
                <input type="hidden" name="nama_pembayaran" value="<?= $nama_pembayaran;  ?>">
                <input type="hidden" name="code" value="<?= $kode_pembayaran;  ?>">
                <div class="form-group">
                    <div class=" mb-3">
                        Setelah melakukan transaksi pembayaran, maka isi form di bawah ini untuk konfirmasi
                        <hr>
                        <label for="tanggal">Tanggal Pembayaran</label> <br>
                        <small> wajib di isi tanggal kapan waktu anda membayar</small>
                        <input type="text" name="tanggal" id="" class="form-control datepicker" value="<?= !empty($data_pembayaran['tanggal']) ? $data_pembayaran['tanggal'] : '' ?>" <?= $required ?> autocomplete="off">
                    </div>
                    <div class=" mb-3">
                        <label for="jenis_pembayaran">Jenis Pembayaran</label>
                        <?php $options = [
                            'Transfer'  => 'Transfer',
                            'Cash'    => 'Cash',
                            'Lain-lain'  => 'Lain-lain',
                        ];
                        if (isset($data_pembayaran)) {
                            $selected = $data_pembayaran['jenis_pembayaran'];
                        } else {
                            $selected = '';
                        }
                        echo form_dropdown('jenis_pembayaran', $options, $selected, ['class' => 'form-control']);
                        ?>
                    </div>
                </div>
                <div class="form-group ">
                    <div class=" mb-3">
                        <label for="catatan">Catatan</label>
                        <textarea name="catatan" class="form-control" id="" rows="4">
                    <?= !empty($data_pembayaran['catatan']) ? $data_pembayaran['catatan'] : '' ?>
                 </textarea>
                    </div>
                </div>
                <div class="form-group  mb-3">
                    <label for="bukti" class="form-label">Upload file</label> <br>
                    <input type="file" class="form-control" accept="image/*" @change="previewImage" name="bukti" class="form-control-file" id="my-file " value=" <?= !empty($data_pembayaran['bukti']) ? $data_pembayaran['bukti'] : '' ?>" <?= $required ?>>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <p>uang pembayaran sebesar <strong> Rp, 400.000 </strong></p>
                    <h4 class=""> 
                        <?= !empty($data_pembayaran['no_kwitansi']) ? 'No Kwitansi: '. $data_pembayaran['no_kwitansi'] : '' ?>
                    </h4>

                    <hr>
                    <?php if (!empty($data_pembayaran['bukti'])) : ?>
                        <div class="mb-3">
                            <img src="<?= base_url('/bukti_pembayaran/' . $data_response['bukti']) ?>" class="img-fluid">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<?php if (session()->getFlashdata('message')) : ?>
    <div class="modal " id="responseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h2> Terima kasih <?= user()->full_name; ?></h2>
                        <p>Anda telah melakukan konfirmasi pembayaran</p>
                        <?php if (!empty($data_response['no_kiwtansi'])) : ?>
                            <p>dengan nomer kwitansai <?= $data_response['no_kiwtansi'] ?></p>
                            <div class="col-md-3 mx-auto">
                                <img src="<?= base_url('bukti_pembayaran/' . $data_response['bukti']) ?>" class="img-fluid">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; // end response  
?>
<script>
    var myModal = new bootstrap.Modal(document.getElementById('responseModal'))
    myModal.show()
</script>
<?= $this->endsection() ?>