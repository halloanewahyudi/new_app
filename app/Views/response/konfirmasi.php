<?= $this->extend('layouts/response-layout'); ?>
<?= $this->Section('content'); ?>
<div class="col-lg-8 mx-auto text-center">
    <div class="d-flex flex-column justify-content-center align-content-center" style="height: 90vh">
        <h2><?= $judul ?></h2>
        <p><?= $content ?></p>
            <div class="d-md-flex justify-content-md-center">
            <div class="btn-group" role="group" aria-label="Basic example">
                <?php if ($link_left) : ?>
                    <a class="btn btn-outline-success " href="<?= $link_left ?>" style="width: 130px;"><?= $text_link_left ?></a>
                <?php endif ?>
                <?php if ($link_right) : ?>
                    <a class="btn btn-outline-primary" href="<?= $link_right ?>" style="width: 130px;"><?= $text_link_right ?></a>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>