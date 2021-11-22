<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/admin/dashboard') ?>">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#santriItem">
          <span data-feather="users"></span>
          Santri
        </a>
        <div class="collapse bg-light border-right border" id="santriItem">
          <a class="nav-link" href="<?= base_url('admin/users') ?>">
            Pendaftar
          </a>
          <a class="nav-link" href="<?= base_url('admin/santri') ?>">
            Calon Santri
          </a>
          <a class="nav-link" href="<?= base_url('admin/santri-by-jenjang/sdit') ?>">
            Santri SDIT
          </a>
          <a class="nav-link" href="<?= base_url('admin/santri-by-jenjang/smpit-putra') ?>">
            Santri SMPIT Putra
          </a>
          <a class="nav-link" href="<?= base_url('admin/santri-by-jenjang/smpit-putri') ?>">
            Santri SMPIT Putri
          </a>
          <a class="nav-link" href="<?= base_url('admin/santri-by-jenjang/smait-putra') ?>">
            Santri SMAIT Putra
          </a>
          <a class="nav-link" href="<?= base_url('admin/santri-by-jenjang/takhosus') ?>">
           Takhosus
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#pembayaranItem">
          <span data-feather="credit-card"></span>
          Pembayaran
        </a>
        <div class="collapse bg-light border-right border" id="pembayaranItem">
        <a class="nav-link" href="<?= base_url('admin/pembayaran') ?>">
           Santri Yang Sudah Bayar
          </a>
          <a class="nav-link" href="<?= base_url('admin/pembayaran-sdit') ?>">
           Santri SDIT
          </a>
          <a class="nav-link" href="<?= base_url('admin/pembayaran-smpit-putra') ?>">
           Santri SMPIT Putra
          </a>
          <a class="nav-link" href="<?= base_url('admin/pembayaran-smpit-putri') ?>">
           Santri SMPIT Putri
          </a>
          <a class="nav-link" href="<?= base_url('admin/pembayaran-smait-putra') ?>">
           Santri SMAIT Putra
          </a>
          <a class="nav-link" href="<?= base_url('admin/pembayaran-smait-putri') ?>">
           Santri SMAIT Putri
          </a>
          <a class="nav-link" href="<?= base_url('admin/pembayaran-takhosus') ?>">
           Santri TAKHOSUS
          </a>
        </div>
      </li>

    </ul>

  </div>
</nav>