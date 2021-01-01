<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">

    </div>
    <!-- Page Title Header Ends-->
    <div class="alert alert-warning" role="alert">
      <h4 class="alert-heading">Aturan memilih!</h4>
      <p>Setelah memilih, anda diberikan waktu <big><span class="badge badge-warning">5 menit</span></big> untuk mengubah pilihan anda, jika anda tidak mengubahnya selama <big><span class="badge badge-warning">5 menit</span></big> pilihan anda akan dikunci, apabila anda sudah mengubah pilihan sekali anda tidak dapat mengubahnya lagi.</p>
    </div>
    <?= (session()->getFlashdata('tipe') == 'danger' ? '<div class="alert alert-danger" role="alert">' : (session()->getFlashdata('tipe') == 'success' ? '<div class="alert alert-success" role="alert">' : '')) ?>
    <?= (session()->getFlashdata('message') ? session()->getFlashdata('message') . '</div>' : '') ?>
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
              <?php if ($pilih == 0) : ?>

                <a href="/hasil/<?= $p['no_urut'] ?>" class="btn btn-primary btn-lg btn-block">Pilih</a>
              <?php else : ?>
                <?php if ($pilihanUser['no_urut'] == $p['no_urut']) : ?>
                  <a href="/hasil/<?= $p['no_urut'] ?>" class="btn btn-primary btn-lg btn-block disabled">Pilih</a>
                <?php elseif ($pilihanUser['isUpdate'] == 1) : ?>
                  <a href="/hasil/<?= $p['no_urut'] ?>" class="btn btn-primary btn-lg btn-block disabled">Pilih</a>
                <?php elseif ($pilihanUser['isExpired'] == 1) : ?>
                  <a href="/hasil/<?= $p['no_urut'] ?>" class="btn btn-primary btn-lg btn-block disabled">Pilih</a>
                <?php else : ?>
                  <a href="/ubah/<?= $p['no_urut'] ?>" class="btn btn-warning btn-lg btn-block">Ubah pilihan</a>
                <?php endif; ?>
                <!-- <canvas class="mt-5" height="120" id="sales-statistics-overview"></canvas> -->
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php $i++; ?>
      <?php endforeach; ?>
    </div>


  </div>
  <!-- content-wrapper ends -->


  <!-- Modal -->
  <!-- <div class="modal fade" id="confirm-pilih" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Informasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Anda dapat mengubah pilihan dalam waktu <span class="badge badge-warning">5 menit</span> setelah <span class="badge badge-warning">5 menit</span> anda tidak dapat mengubah pilihan
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <button type="button" class="btn btn-primary btn-ok">Oke</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('#confirm-pilih').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
  </script> -->

  <?= $this->endSection('content'); ?>