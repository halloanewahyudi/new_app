<?= $this->extend('layouts/main'); ?>
<?= $this->Section('content'); ?>
<div id="berkasPage" class="pb-5">
  <div class="row">
    <div class="col-lg-8">

      <!-- uplad berkas -->
      <div class="file-list">
<!-- Poto santri -->
        <div id="" class="card">
          <div class="card-body">
            <div class="d-md-flex align-items-center justify-content-between">
              <div class="image col-sm-2 text-center bg-light">
                <?php
                if (!empty($data_photo->file)) : ?>
                  <img src="<?= base_url('berkas/' . $data_photo->file) ?>" height="50">
                <?php else : ?>
                  <h2 class="text-center">1</h2>
                <?php endif; ?>
              </div>
              <div class="title">
                <span>Photo Calon Santri</span>
              </div>
              <div class="">
                  <?php if (!empty($data_photo->id)) : ?>
                  <button 
                  id="file_edit_1" 
                  data-id="<?= $data_photo->id ?>"
                  data-action="<?= base_url('santri/edit-berkas-action/'.$data_photo->id) ?>" 
                  data-status="1" data-judul="Photo Santri" 
                  class="btn-upload btn btn-sm btn-outline-warning"
                  >
                    Edit
                  </button>
                  <button 
                  id="file_delete_1" 
                  data-action="<?= base_url('delete-berkas/'.$data_photo->id) ?>" 
                  data-status="1" 
                  data-judul="Photo Santri" 
                  class="btn-delete btn btn-sm btn-outline-danger"
                  >
                    Delete
                  </button>
                  <?php else: ?>
                    <button id="file_1" 
                  data-action="<?= base_url('santri/create-berkas-action') ?>" 
                  data-status="1" 
                  data-judul="Photo Santri" 
                  class="btn-upload btn btn-sm btn-outline-primary"
                  >
                    Upload
                  </button>
                  <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
 <!-- Surat Kesanggupan -->
        <div id="" class="card">
          <div class="card-body">
            <div class="d-md-flex align-items-center justify-content-between">
              <div class="image col-sm-2 text-center bg-light">
                <?php if (!empty($data_kesanggupan->file)) : ?>
                  <img src="<?= base_url('berkas/' . $data_kesanggupan->file) ?>" height="50">
                <?php else : ?>
                  <h2 class="text-center">2</h2>
                <?php endif; ?>
              </div>
              <div class="title ">
                <span> Surat Kesanggupan </span>
              </div>
              <div class="">
                  <?php if (!empty($data_kesanggupan->id)) : ?>
                  <button 
                  id="file_edit_2" 
                  data-id="<?= $data_kesanggupan->id ?>"
                  data-action="<?= base_url('santri/edit-berkas-action/'.$data_kesanggupan->id) ?>" 
                  data-status="2" data-judul="Surat Kesanggupan" 
                  class="btn-upload btn btn-sm btn-outline-warning"
                  >
                    Edit
                  </button>
                  <button 
                  id="file_delete_2" 
                  data-action="<?= base_url('delete-berkas/'.$data_kesanggupan->id) ?>" 
                  data-status="2" 
                  data-judul="Surat Kesanggupan" 
                  class="btn-delete btn btn-sm btn-outline-danger"
                  >
                    Delete
                  </button>
                  <?php else: ?>
                    <button id="file_2" 
                  data-action="<?= base_url('santri/create-berkas-action') ?>" 
                  data-status="2" 
                  data-judul="Surat Kesanggupan" 
                  class="btn-upload btn btn-sm btn-outline-primary"
                  >
                    Upload
                  </button>
                  <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

      <!--   Rapor smester 1 -->
        <div id="" class="card">
          <div class="card-body">
            <div class="d-md-flex align-items-center justify-content-between">
              <div class="image col-sm-2 text-center bg-light">
                <?php if (!empty($data_rapor_1->file)) : ?>
                  <img src="<?= base_url('berkas/'. $data_rapor_1->file) ?>" height="50">
                <?php else : ?>
                  <h2 class="text-center">3</h2>
                <?php endif; ?>
              </div>
              <div class="title ">
                <span> Rapor Semester 1 </span>
              </div>
              <div class="">
                  
                  <?php if (!empty($data_rapor_1->id)) : ?>
                  <button 
                  id="file_edit_3" 
                  data-id="<?= $data_rapor_1->id ?>"
                  data-action="<?= base_url('santri/edit-berkas-action/'.$data_rapor_1->id) ?>" 
                  data-status="3" data-judul="Rapor Semester 1" 
                  class="btn-upload btn btn-sm btn-outline-warning"
                  >
                    Edit
                  </button>
                  <button 
                  id="file_delete_3" 
                  data-action="<?= base_url('santri/delete-berkas/'.$data_rapor_1->id) ?>" 
                  data-status="3" 
                  data-judul="Rapor Semester 1" 
                  class="btn-delete btn btn-sm btn-outline-danger"
                  >
                    Delete
                  </button>
                  <?php else : ?>
                    <button id="file_3" 
                  data-action="<?= base_url('santri/create-berkas-action') ?>" 
                  data-status="3" 
                  data-judul="Rapor Semester 1" 
                  class="btn-upload btn btn-sm btn-outline-primary"
                  >
                    Upload
                  </button>
                  <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

        <!--   Rapor smester 2 -->
        <div id="" class="card">
          <div class="card-body">
            <div class="d-md-flex align-items-center justify-content-between">
              <div class="image col-sm-2 text-center bg-light">
                <?php if (!empty($data_rapor_2->file)) : ?>
                  <img src="<?= base_url('berkas/'. $data_rapor_2->file) ?>" height="50">
                <?php else : ?>
                  <h2 class="text-center">4</h2>
                <?php endif; ?>
              </div>
              <div class="title ">
                <span> Rapor Semester 2 </span>
              </div>
              <div class="">
                  
                  <?php if (!empty($data_rapor_2->id)) : ?>
                  <button 
                  id="file_edit_4" 
                  data-id="<?= $data_rapor_2->id ?>"
                  data-action="<?= base_url('santri/edit-berkas-action/'.$data_rapor_2->id) ?>" 
                  data-status="4" data-judul="Rapor Semester 1" 
                  class="btn-upload btn btn-sm btn-outline-warning"
                  >
                    Edit
                  </button>
                  <button 
                  id="file_delete_4" 
                  data-action="<?= base_url('santri/delete-berkas/'.$data_rapor_2->id) ?>" 
                  data-status="4" 
                  data-judul="Rapor Semester 1" 
                  class="btn-delete btn btn-sm btn-outline-danger"
                  >
                    Delete
                  </button>
                  <?php else : ?>
                    <button id="file_4" 
                  data-action="<?= base_url('santri/create-berkas-action') ?>" 
                  data-status="4" 
                  data-judul="Rapor Semester 1" 
                  class="btn-upload btn btn-sm btn-outline-primary"
                  >
                    Upload
                  </button>
                  <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

         <!--   Akte -->
         <div id="" class="card">
          <div class="card-body">
            <div class="d-md-flex align-items-center justify-content-between">
              <div class="image col-sm-2 text-center bg-light">
                <?php if (!empty($data_akte->file)) : ?>
                  <img src="<?= base_url('berkas/'. $data_akte->file) ?>" height="50">
                <?php else : ?>
                  <h2 class="text-center">5</h2>
                <?php endif; ?>
              </div>
              <div class="title ">
                <span> Akte Kelahiran </span>
              </div>
              <div class="">
                  
                  <?php if (!empty($data_akte->id)) : ?>
                  <button 
                  id="file_edit_5" 
                  data-id="<?= $data_akte->id ?>"
                  data-action="<?= base_url('santri/edit-berkas-action/'.$data_akte->id) ?>" 
                  data-status="5" data-judul="Akte Kelahiran" 
                  class="btn-upload btn btn-sm btn-outline-warning"
                  >
                    Edit
                  </button>
                  <button 
                  id="file_delete_5" 
                  data-action="<?= base_url('santri/delete-berkas/'.$data_akte->id) ?>" 
                  data-status="5" 
                  data-judul="Akte Kelahiran" 
                  class="btn-delete btn btn-sm btn-outline-danger"
                  >
                    Delete
                  </button>
                  <?php else : ?>
                    <button id="file_5" 
                  data-action="<?= base_url('santri/create-berkas-action') ?>" 
                  data-status="5" 
                  data-judul="Akte Kelahiran" 
                  class="btn-upload btn btn-sm btn-outline-primary"
                  >
                    Upload
                  </button>
                  <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

         <!--   KK -->
         <div id="" class="card">
          <div class="card-body">
            <div class="d-md-flex align-items-center justify-content-between">
              <div class="image col-sm-2 text-center bg-light">
                <?php if (!empty($data_kk->file)) : ?>
                  <img src="<?= base_url('berkas/'. $data_kk->file) ?>" height="50">
                <?php else : ?>
                  <h2 class="text-center">6</h2>
                <?php endif; ?>
              </div>
              <div class="title ">
                <span> Kartu Keluarga </span>
              </div>
              <div class="">
                  
                  <?php if (!empty($data_kk->id)) : ?>
                  <button 
                  id="file_edit_6" 
                  data-id="<?= $data_kk->id ?>"
                  data-action="<?= base_url('santri/edit-berkas-action/'.$data_kk->id) ?>" 
                  data-status="6" data-judul="Kartu Keluarga" 
                  class="btn-upload btn btn-sm btn-outline-warning"
                  >
                    Edit
                  </button>
                  <button 
                  id="file_delete_6" 
                  data-action="<?= base_url('santri/delete-berkas/'.$data_kk->id) ?>" 
                  data-status="6" 
                  data-judul="Kartu Keluarga" 
                  class="btn-delete btn btn-sm btn-outline-danger"
                  >
                    Delete
                  </button>
                  <?php else : ?>
                    <button id="file_6" 
                  data-action="<?= base_url('santri/create-berkas-action') ?>" 
                  data-status="6" 
                  data-judul="Kartu Keluarga" 
                  class="btn-upload btn btn-sm btn-outline-primary"
                  >
                    Upload
                  </button>
                  <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

         <!--   Sertifikat Hafalan -->
         <div id="" class="card">
          <div class="card-body">
            <div class="d-md-flex align-items-center justify-content-between">
              <div class="image col-sm-2 text-center bg-light">
                <?php if (!empty($data_hafalan->file)) : ?>
                  <img src="<?= base_url('berkas/'. $data_hafalan->file) ?>" height="50">
                <?php else : ?>
                  <h2 class="text-center">7</h2>
                <?php endif; ?>
              </div>
              <div class="title ">
                <span> Sertifikat Hafalan </span>
              </div>
              <div class="">
                  
                  <?php if (!empty($data_hafalan->id)) : ?>
                  <button 
                  id="file_edit_7" 
                  data-id="<?= $data_hafalan->id ?>"
                  data-action="<?= base_url('santri/edit-berkas-action/'.$data_hafalan->id) ?>" 
                  data-status="7" data-judul="Sertifikat Hafalan" 
                  class="btn-upload btn btn-sm btn-outline-warning"
                  >
                    Edit
                  </button>
                  <button 
                  id="file_delete_7" 
                  data-action="<?= base_url('santri/delete-berkas/'.$data_hafalan->id) ?>" 
                  data-status="7" 
                  data-judul="Sertifikat Hafalan" 
                  class="btn-delete btn btn-sm btn-outline-danger"
                  >
                    Delete
                  </button>
                  <?php else : ?>
                    <button id="file_7" 
                  data-action="<?= base_url('santri/create-berkas-action') ?>" 
                  data-status="7" 
                  data-judul="Sertifikat Hafalan" 
                  class="btn-upload btn btn-sm btn-outline-primary"
                  >
                    Upload
                  </button>
                  <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

         <!--   Surat Kesehatan -->
         <div id="" class="card">
          <div class="card-body">
            <div class="d-md-flex align-items-center justify-content-between">
              <div class="image col-sm-2 text-center bg-light">
                <?php if (!empty($data_kesehatan->file)) : ?>
                  <img src="<?= base_url('berkas/'. $data_kesehatan->file) ?>" height="50">
                <?php else : ?>
                  <h2 class="text-center">8</h2>
                <?php endif; ?>
              </div>
              <div class="title ">
                <span> Surat Kesehatan </span>
              </div>
              <div class="">
                  
                  <?php if (!empty($data_kesehatan->id)) : ?>
                  <button 
                  id="file_edit_8" 
                  data-id="<?= $data_kesehatan->id ?>"
                  data-action="<?= base_url('santri/edit-berkas-action/'.$data_kesehatan->id) ?>" 
                  data-status="8" data-judul="Surat Kesehatan" 
                  class="btn-upload btn btn-sm btn-outline-warning"
                  >
                    Edit
                  </button>
                  <button 
                  id="file_delete_8" 
                  data-action="<?= base_url('santri/delete-berkas/'.$data_kesehatan->id) ?>" 
                  data-status="8" 
                  data-judul="Surat Kesehatan" 
                  class="btn-delete btn btn-sm btn-outline-danger"
                  >
                    Delete
                  </button>
                  <?php else : ?>
                    <button id="file_8" 
                  data-action="<?= base_url('santri/create-berkas-action') ?>" 
                  data-status="8" 
                  data-judul="Surat Kesehatan" 
                  class="btn-upload btn btn-sm btn-outline-primary"
                  >
                    Upload
                  </button>
                  <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- end file list -->

    </div> <!-- end col 8 -->
    <div class="col-lg-4">
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
    </div> <!-- end col4 -->
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="imageView"></div>
        <form id="form"  method="post" enctype="multipart/form-data" data-validate>
          <div class="modal-body">
            <?= csrf_field() ?>
            <input type="hidden" name="status" id="status">
            <input type="hidden" name="judul_berkas" id="judul_berkas">
            <div class="form-group mb-3">
              <label for="berkas" class="form-label">Upload Berkas</label> <br>
              <input type="file" ref="file" class="form-control" accept="image/*" name="file" id="file" required>
            </div>
            <div class="form-group  mb-3">
              <label for="deskripsi">Keterangan</label>
              <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" id="save">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      var myModal = new bootstrap.Modal(document.getElementById('myModal'))
      // button on click
      $('.btn-upload').on('click', function() {
        // modal show
        myModal.show();
        var status = $(this).attr('data-status');
        var judul = $(this).attr('data-judul');
        var action = $(this).data('action');
        $('#judul_berkas').val(judul);
        $('#status').val(status);
        $('#form').attr('action',action).data('id');
        $('.modal-title').html(judul);
        
      });

      $('.btn-delete').on('click',function(){
        Swal.fire({
              title: 'apakah ingin menghapus?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                var action = $(this).data('action');
                axios.get(action)
                .then(res => {
                  console.log(res.data);
                });
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })
      });
    });

    //====image view===
    $('.image img').on('click',function(){

    })
  </script>
</div>
<style>
  .delete {
    cursor: pointer;
  }

  .card {
    margin-bottom: 15px;
  }
  .image img{
    width: 50px;
  }
</style>
<?= $this->endSection(); ?>