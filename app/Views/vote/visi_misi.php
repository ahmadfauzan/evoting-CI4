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
            <!-- <h3 class="mb-0 text-center">Budi</h3>
                  <h3 class="mb-4 text-center">Rahmat</h3>
                  <h1 class="mb-0 text-center">1</h1> -->
            <img src="/assets/images/<?= $visi_misi[0]['img']; ?>" class="img-fluid mb-3" alt="">
            <h3>Visi :</h3>
            <ul>
              <?php foreach ($visi_misi as $vs) : ?>
                <li><?= $vs['visi']; ?></li>
              <?php endforeach; ?>
            </ul>

            <h3>Misi :</h3>
            <ul>
              <?php foreach ($visi_misi as $vs) : ?>
                <li><?= $vs['misi']; ?></li>
              <?php endforeach; ?>
            </ul>

            <!-- <canvas class="mt-5" height="120" id="sales-statistics-overview"></canvas> -->
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
                <h3 class="px-4 mb-n2 mt-1"><?= $kd['nama'] ?></h3>
                <div class="card-body">
                  <p class="card-text">Semester <?= $kd['semester']; ?></p>
                  <p class="card-text">Prodi <?= $kd['prodi']; ?></p>
                </div>
              </div>
              <div class="col-md-12 px-3">
                <p class="card-text">Prestasi :</p>
                <ul>
                  <?php foreach ($prestasi as $p) : ?>
                    <li><?= $p['prestasi']; ?></li>
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