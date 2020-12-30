<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header">
          <h4 class="page-title">Pemilihan ketua BEM</h4>
          <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">

            <ul class="quick-links ml-auto">
              <li><a href="#">Settings</a></li>
              <li><a href="#">Analytics</a></li>
              <li><a href="#">Watchlist</a></li>
            </ul>
          </div>
        </div>
      </div>

    </div>
    <!-- Page Title Header Ends-->

    <div class="row">
      <?php $i = 0; ?>
      <?php foreach ($paslon as $p) : ?>
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3 class="mb-0 text-center"><?= $ketua[$i]['nama']; ?></h3>
              <h3 class="mb-4 text-center"><?= $wakil[$i]['nama']; ?></h3>
              <h1 class="mb-0 text-center"><?= $p['no_urut']; ?></h1>
              <img src="assets/images/<?= $p['img'] ?>" class="img-fluid mb-3" alt="">
              <a href="/visi-misi/<?= $p['id_paslon']; ?>" class="btn btn-secondary btn-lg btn-block">Lihat visi misi</a>
              <a class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Pilih</a>
              <!-- <canvas class="mt-5" height="120" id="sales-statistics-overview"></canvas> -->
            </div>
          </div>
        </div>
        <?php $i++; ?>
      <?php endforeach; ?>
    </div>


  </div>
  <!-- content-wrapper ends -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <?= $this->endSection('content'); ?>