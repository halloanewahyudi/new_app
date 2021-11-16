<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<div id="dashboard">
    <div class="col-lg-12">
        <div class="p-5 bg-white">
            <div class="container">
                <h4 class="display-6">Pendaftaran Santri Al Andalus</h4>
                <p class="lead">Tahun Ajaran 2021/2022</p>
                <div class="row">
                    <div class="col-md-3">
                        <div class="border rounded p-2 text-center">
                            <i data-feather="users"></i> <br>
                            Calon santri <br> yang mendaftar <br>
                            <span class="fs-3"> <?= $total_daftar; ?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border rounded p-2 text-center">
                            <i data-feather="credit-card"></i> <br>
                            Calon santri <br> yang membayar <br>
                            <span class="fs-3"> <?= $total_pembayaran; ?></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    const v_dashboard = new Vue({
        el: '#dashboard',
        data() {
            return {
                yang_daftar: '',
            }
        }
    });
</script>
<?= $this->endSection(); ?>