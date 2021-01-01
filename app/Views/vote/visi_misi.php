<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">

    </div>
    <!-- Page Title Header Ends-->

    <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <img src="/assets/images/<?= $visi_misi['img']; ?>" class="img-fluid mb-3" alt="">
            <h3>Visi :</h3>
            <ul>
              <?php
              $visi = $visi_misi['visi'];
              $visi = explode('//', $visi);
              foreach ($visi as $v) : ?>
                <li><?= $v; ?></li>
              <?php endforeach; ?>
            </ul>

            <h3>Misi :</h3>
            <ul>
              <?php
              $misi = $visi_misi['misi'];
              $misi = explode('//', $misi);
              foreach ($misi as $m) : ?>
                <li><?= $m; ?></li>
              <?php endforeach; ?>
            </ul>

          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <?php foreach ($kandidat as $kd) : ?>
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="/assets/images/<?= $kd['img'] ?>" class="img-fluid p-2" alt="...">
              </div>
              <div class="col-md-8">
                <h3 class="px-4 mb-n2 mt-1"><?= $kd['nama'] ?> <?= ($kd['posisi'] == 1) ? '(Ketua)' : '(Wakil)'; ?></h3>
                <div class="card-body">
                  <p class="card-text">Semester <?= $kd['semester']; ?></p>
                  <p class="card-text">Prodi <?= $kd['prodi']; ?></p>
                </div>
              </div>
              <div class="col-md-12 px-3">
                <p class="card-text">Prestasi :</p>
                <ul>
                  <?php
                  $prestasi = $kd['prestasi'];
                  $prestasi = explode('//', $prestasi);

                  foreach ($prestasi as $p) : ?>
                    <li><?= $p; ?></li>
                  <?php endforeach; ?>


                </ul>
              </div>
            </div>
            <br>
          <?php endforeach; ?>

        </div>
      </div>
    </div>


  </div>
  <!-- content-wrapper ends -->
  <?= $this->endSection('content'); ?>