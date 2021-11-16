<?= $this->extend('layouts/main'); ?>
<?= $this->Section('content'); ?>
<div id="myUser" class="pb-5">

    <div class="row">
        <div class="col-lg-8">
            <?php
            if (session()->getFlashdata('message')) {
            ?>
                <div class="alert alert-info">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php
            }
            ?>
            <form id="form" action="<?= $action; ?>"  method="post" enctype="multipart/form-data" data-validate>
                <?= csrf_field() ?>
                <div class="form-group mb-3">
                    <label for="jenjang">Email</label>
                    <input type="email" name="email" value="<?= !empty($data_user['email']) ? $data_user['email'] : '' ?>" class="form-control" />
                </div>
                <div class="form-group mb-3">
                    <label for="jenjang">Nama Lengkap</label>
                    <input type="text" name="full_name" value="<?= !empty($data_user['full_name']) ? $data_user['full_name'] : '' ?>" class="form-control" />
                </div>

                <div id="dp">
            <vuejs-datepicker :language="id" name="date_of_birth" input-class="form-control" placeholder="<?= $data_user['date_of_birth']?>" value="state.date" required> </vuejs-datepicker>
                </div>
                <div class="form-group mb-3">
                    <label for="berkas" class="form-label">Photo Santri</label> <br>
                    <input type="file" class="form-control" accept="image/*" name="user_image" id="my-file">
                </div>
                <?php if (isset($data_user['user_image'])) : ?>
                    <div style="width: 200px; height:100%; " class="mb-3">
                        <img src="<?= base_url('avatar/' . $data_user['user_image']) ?>" class="img-fluid">
                    </div>
                <?php endif; ?>

                <vuejs-datepicker :language="id" name="date_of_birth" input-class="form-control" placeholder="<?= !empty($data_user['date_of_birth']) ? $data_user['date_of_birth'] : '' ?>" value="state.date" required> </vuejs-datepicker>

                <label for="gender">Jenis Kelamin</label>
                <?php $options = [
                    'Laki-laki'  => 'Laki-laki',
                    'Perempuan'    => 'Perempuan',
                ];
                if (isset($data_pembayaran)) {
                    $selected = $data_user->gender;
                } else {
                    $selected = '';
                }
                echo form_dropdown('gender', $options, $selected, ['class' => 'form-control']);
                ?>

                <label for="gender">Jenjang Pendidikan</label>
                <?php $options = [
                    'RA' => 'RA',
                    'MI' => 'MI',
                    'MTS Putra' => 'MTS Putra',
                    'MTS Putri' => 'MTS Putri',
                    'MA Putra' => 'MA Putra',
                    'MA Putri' => 'MA Putri',
                ];
                if (isset($data_pembayaran)) {
                    $selected = $data_user['educational_level'];
                } else {
                    $selected = '';
                }
                echo form_dropdown('educational_level', $options, $selected, ['class' => 'form-control mb-3']);
                ?>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const myUSer = new Vue({
        el:"#myUser",
        data() {
            return {
                tanggal:'',
                image: null,
                preview: null,
            }
        },
        methods: {
            getTanggal: function(){
                state.date = this.tanggal
            }
        },
    })
</script>

            <?= $this->endSection() ?>