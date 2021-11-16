<?= $this->extend('layouts/main'); ?>
<?= $this->Section('content'); ?>
<div id="berkasPage" class="pb-5">
  <div class="row">
    <div class="col-lg-8">
      <!-- uplad berkas -->
      <div class="card text-left">
        <div class="card-body">
          <h5 class="card-title">Upload Berkas</h5>
          <span class="card-text">
            upload Berkas - berkas berikut dengan ketentuan
          </span>
          <ul>
            <li>Berkas dapat di baca dengan jelas</li>
            <li>Ukuran berkas di bawah 1MB</li>
            <li>Untuk berkas berupa rapor kurikulum 2013 yang jumlahnya lebih dari 1 halaman dapat menggunakan format PDF</li>
            <li>Selain berkas tersebut dapat menggunakan format JPG,PNG</li>
          </ul>
          <span class="card-text">
            Petunjuk upload:
          </span>
          <ul>
            <li>Harap upload berkas satu-persatu</li>
            <li>Pilih jenis berkas yang akan di upload </li>
            <li>Lengkapi berkas</li>
          </ul>
  
        </div>
      </div>
      <?php
     $user_id = user_id();
      $status1 = $db->query(" SELECT * FROM berkas WHERE status = 1  AND user_id = $user_id");
      $status2 = $db->query(" SELECT * FROM berkas WHERE status = 2  AND user_id = $user_id ");
      $status3 = $db->query(" SELECT * FROM berkas WHERE status = 3  AND user_id = $user_id");
      $status4 = $db->query(" SELECT * FROM berkas WHERE status = 4  AND user_id = $user_id");
      $status5 = $db->query(" SELECT * FROM berkas WHERE status = 5  AND user_id = $user_id");
      $status6 = $db->query(" SELECT * FROM berkas WHERE status = 6  AND user_id = $user_id");
      $status7 = $db->query(" SELECT * FROM berkas WHERE status = 7  AND user_id = $user_id");
      $status8 = $db->query(" SELECT * FROM berkas WHERE status = 8  AND user_id = $user_id");
      $row1 = $status1->getRow();
      $row2 = $status2->getRow();
      $row3 = $status3->getRow();
      $row4 = $status4->getRow();
      $row5 = $status5->getRow();
      $row6 = $status6->getRow();
      $row7 = $status7->getRow();
      $row8 = $status8->getRow();
      ?>
      <br>

      <!--  mulai upload image -->
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <strong> <i data-feather="user-check"></i> Photo Calon Santri </strong>
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <?php
              ?>
              <?php if (isset($row1)) : ?>
                <div class="btn btn-sm btn-success">Sudah terupload </div>
              <?php else : ?>
                <form-berkas :status="1" judul_berkas="Photo Calon Santri"></form-berkas>
              <?php endif; ?>
            </div><!--  end sccordion body -->
          </div>
        </div> <!-- end accrodion item 1 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <strong> <i data-feather="file-text"></i> Surat Kesanggupan </strong>
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <?php if (isset($row2)) : ?>
                <div class="btn btn-sm btn-success">Sudah terupload </div>
              <?php else : ?>
                <form-berkas :status="2" judul_berkas="Surat Kesanggupan"></form-berkas>
              <?php endif; ?>
            </div>
          </div>
        </div> <!-- end accrodion item 2 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <strong><i data-feather="book-open"></i> Rapor Semester 1</strong>
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <?php if (isset($row3)) : ?>
                <div class="btn btn-sm btn-success">Sudah terupload </div>
              <?php else : ?>
                <form-berkas :status="3" judul_berkas="Rapor Semester 1"></form-berkas>
              <?php endif; ?>
            </div>
          </div>
        </div> <!-- end accrodion item 3 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              <strong><i data-feather="book-open"></i> Rapor Semester 2</strong>
            </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <?php if (isset($row4)) : ?>
                <div class="btn btn-sm btn-success">Sudah terupload </div>
              <?php else : ?>
                <form-berkas :status="4" judul_berkas="Rapor Semester 2"></form-berkas>
              <?php endif; ?>
            </div>
          </div>
        </div> <!-- end accrodion item 4 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              <strong><i data-feather="feather"></i> Akte kelahiran</strong>
            </button>
          </h2>
          <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <?php if (isset($row5)) : ?>
                <div class="btn btn-sm btn-success">Sudah terupload </div>
              <?php else : ?>
                <form-berkas :status="5" judul_berkas="Akte kelahiran"></form-berkas>
              <?php endif; ?>
            </div>
          </div>
        </div> <!-- end accrodion item 5 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingSix">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
              <strong><i data-feather="users"></i> Kartu Keluarga </strong>
            </button>
          </h2>
          <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <?php if (isset($row6)) : ?>
                <div class="btn btn-sm btn-success">Sudah terupload </div>
              <?php else : ?>
                <form-berkas :status="6" judul_berkas="Kartu Keluarga"></form-berkas>
              <?php endif; ?>
            </div>
          </div>
        </div> <!-- end accrodion item 5 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingSeven">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
              <strong> <i data-feather="award"></i> Sertifikat Hafalan</strong> &nbsp; <span class="text-danger"> <small>Opsional</small></span>
            </button>
          </h2>
          <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <?php if (isset($row7)) : ?>
                <div class="btn btn-sm btn-success">Sudah terupload </div>
              <?php else : ?>
                <form-berkas :status="7" judul_berkas="Sertifikat Hafalan"></form-berkas>
              <?php endif; ?>
            </div>
          </div>
        </div> <!-- end accrodion item 7 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingEight">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
              <strong> <i data-feather="activity"></i> Surat  Kesehatan</strong> &nbsp; <span class="text-danger"> 
            </button>
          </h2>
          <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <?php if (isset($row8)) : ?>
                <div class="btn btn-sm btn-success">Sudah terupload </div>
              <?php else : ?>
                <form-berkas :status="8" judul_berkas="Surat Kesehatan"></form-berkas>
              <?php endif; ?>
            </div>
          </div>
        </div> <!-- end accrodion item 7 -->
      </div> <!-- end accordion -->
    </div> <!-- end col 8 -->

    <div class="col-lg-4">
    <?php if (isset($row1)) : ?>
        <div class="d-flex justify-content-between align-items-center bg-white border rounded-3 p-2 mb-2">
          <img src="<?= base_url('/berkas/' . $row1->file) ?>" width="60" alt=""> <span class=""><strong><?= $row1->judul_berkas ?></strong>
        </span>
        <delete-file :get_id="<?= $row1->id ?>"></delete-file>
        </div>
      <?php endif; ?>
      <?php if (isset($row2)) : ?>
        <div class="d-flex justify-content-between align-items-center bg-white border rounded-3 p-2 mb-2">
          <img src="<?= base_url('/berkas/' . $row2->file) ?>" width="60" alt=""> <span class=""><strong><?= $row2->judul_berkas ?></strong>
        </span>
        <delete-file :get_id="<?= $row2->id ?>"></delete-file>
        </div>
      <?php endif; ?>
      <?php if (isset($row3)) : ?>
        <div class="d-flex justify-content-between align-items-center bg-white border rounded-3 p-2 mb-2">
          <img src="<?= base_url('/berkas/' . $row3->file) ?>" width="60" alt=""> <span class=""><strong><?= $row3->judul_berkas ?></strong>
        </span>
        <delete-file :get_id="<?= $row3->id ?>"></delete-file>
        </div>
      <?php endif; ?>
      <?php if (isset($row4)) : ?>
        <div class="d-flex justify-content-between align-items-center bg-white border rounded-3 p-2 mb-2">
          <img src="<?= base_url('/berkas/' . $row4->file) ?>" width="60" alt=""> <span class=""><strong><?= $row4->judul_berkas ?></strong>
        </span>
        <delete-file :get_id="<?= $row4->id ?>"></delete-file>
        </div>
      <?php endif; ?>
      <?php if (isset($row5)) : ?>
        <div class="d-flex justify-content-between align-items-center bg-white border rounded-3 p-2 mb-2">
          <img src="<?= base_url('/berkas/' . $row5->file) ?>" width="60" alt=""> <span class=""><strong><?= $row5->judul_berkas ?></strong>
        </span>
        <delete-file :get_id="<?= $row5->id ?>"></delete-file>
        </div>
      <?php endif; ?>
      <?php if (isset($row6)) : ?>
        <div class="d-flex justify-content-between align-items-center bg-white border rounded-3 p-2 mb-2">
          <img src="<?= base_url('/berkas/' . $row6->file) ?>" width="60" alt=""> <span class=""><strong><?= $row6->judul_berkas ?></strong>
        </span>
        <delete-file :get_id="<?= $row6->id ?>"></delete-file>
        </div>
      <?php endif; ?>
      <?php if (isset($row7)) : ?>
        <div class="d-flex justify-content-between align-items-center bg-white border rounded-3 p-2 mb-2">
          <img src="<?= base_url('/berkas/' . $row7->file) ?>" width="60" alt=""> <span class=""><strong><?= $row7->judul_berkas ?></strong>
        </span>
        <delete-file :get_id="<?= $row7->id ?>"></delete-file>
        </div>
      <?php endif; ?>
      <?php if (isset($row8)) : ?>
        <div class="d-flex justify-content-between align-items-center bg-white border rounded-3 p-2 mb-2">
          <img src="<?= base_url('/berkas/' . $row8->file) ?>" width="60" alt=""> <span class=""><strong><?= $row8->judul_berkas ?></strong>
        </span>
        <delete-file :get_id="<?= $row8->id ?>"></delete-file>
        </div>
      <?php endif; ?>
    </div> <!-- end col4 -->

  </div>
  <script>
    const formBerkas = {
      props: ['status', 'judul_berkas'],
      template: `
      <form action="<?= $action; ?>"  @submit="onSubmit" method="post" id="upload" enctype="multipart/form-data" data-validate>
                  <?= csrf_field() ?>
                  <input type="hidden" name="status" :value="status" id="">
                  <input type="hidden" name="judul_berkas" :value="judul_berkas" id="">

                  <div class="form-group mb-3">
                    <label for="berkas" class="form-label">Upload Berkas</label> <br>
                    <input type="file" ref="file" class="form-control" accept="image/*"  name="file"  id="my-file" required>
                  </div>
                  <div class="form-group  mb-3">
                    <label for="deskripsi">Keterangan</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary mt-4">Upload Photo</button>
                </form>
      `,
    }

    // template untuk card setelah di upload====
    const uploaded = {
      props: ['get_id'],
      template: `
          <div class="delete">
            <span class=" text-danger" @click="diDelete">
              <i data-feather="x-circle"></i>
            </span>
          </div>
      `,
      methods: {
        diDelete: function(e) {
          Swal.fire({
            title: 'Apakah ingin di hapus?',
         //   text: "Silakan hapus ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!'
          }).then((result) => {
            if (result.isConfirmed) {
              axios.delete('/delete-berkas/' + this.get_id)
                .then((reponse) => {
                  console.log(Response)
                });
              Swal.fire({
                title: 'Terhapus',
                text: "Data sudah terhapus",
                icon: 'success',
                showConfirmButton: false,
              })
              setTimeout(function() {
                window.location.reload(1);
              }, 1000);
            }
          })

        }
      },
    }


    const berkasApp = new Vue({
      el: '#berkasPage',
      data() {
        return {
          berkas: '',
        }
      },
      components: {
        formBerkas: formBerkas,
        deleteFile: uploaded,
      },
      methods: {
        onSubmit(e) {
          const file = this.$refs.file.files[0];
          if (!file) {
            e.preventDefault();
            alert('No file chosen');
            return;
          }

          if (file.size > 1024 * 1024) {
            e.preventDefault();
            alert('File too big (> 1MB)');
            return;
          }
          alert('File OK');
        },

      },

    })
  </script>
</div>
<style>
  .delete {
    cursor: pointer;
  }
</style>
<?= $this->endSection(); ?>