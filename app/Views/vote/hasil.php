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


      <div class="col-md-8 grid-margin">
        <div class="card">
          <div class="p-4 pr-5 border-bottom bg-light d-flex justify-content-between">
            <h4 class="card-title mb-0">Doughnut chart</h4>
            <div id="doughnut-chart-legend" class="mr-4"></div>
          </div>
          <div class="card-body d-flex flex-column">
            <?php if ($totalHasil == 0) : ?>
              <h1>Belum ada hasil</h1>

          </div>
        </div>
      </div>
    </div>
  </div>


<?php else : ?>
  <canvas class="my-auto" id="myChart" height="180"></canvas>
  <?php $i = 0;
              $j = 0;
              $length = count($hasil);
  ?>
  <?php foreach ($ketua as $k) : ?>
    <div class="d-flex <?= ($i == 0 && $j == 0) ? 'mt-5 py-3' : (($i == 0 && $j == 1) ? 'py-3' : 'py-3') ?> border-top">
      <p class="mb-0 font-weight-semibold"><span class="dot-indicator bg-success"></span> <?= $k['nama']; ?>
      </p>
      <p class="mb-0 ml-auto text-primary"><?= ($i == 0 && $j == 0) ? $hasil[$i]['total'] / $totalUser * 100 : (($i == 0 && $j == 1) ? '0' : $hasil[$i]['total'] / $totalUser * 100) ?>%</p>
    </div>
    <?php if ($length > 1) {
                  // <?= $hasil[$i]['total'] / $totalUser * 100 
                  $i++;
                } else {
                  $i = 0;
                }
                $j++;  ?>
  <?php endforeach; ?>
  <div class="d-flex pt-3 border-top">
    <p class="mb-0 font-weight-semibold"><span class="dot-indicator bg-success"></span> Total suara
    </p>
    <p class="mb-0 ml-auto text-primary"><?= $totalHasil / $totalUser * 100; ?>%</p>
  </div>
</div>
</div>
</div>

<div class="col-md-4 grid-margin stretch-card">
  <div class="card">
    <div class="p-4 pr-5 border-bottom bg-light d-flex justify-content-between">
      <h4 class="mb-0">Unggul sementara</h4>
      <div id="doughnut-chart-legend" class="mr-4"></div>
    </div>
    <div class="card-body">
      <h3 class="mb-0 text-center"><?= $ketuaUnggul['nama']; ?></h3>
      <h3 class="mb-4 text-center"><?= $wakilUnggul['nama']; ?></h3>
      <h1 class="mb-0 text-center"><?= $unggul['no_urut']; ?></h1>
      <img src="/assets/images/<?= $unggul['img'] ?>" class="img-fluid mb-3" alt="">
      <!-- <canvas class="mt-5" height="120" id="sales-statistics-overview"></canvas> -->
    </div>
  </div>
</div>
</div>

</div>
<?php
              $kandidat = "";
              $jumlah = null;
              $i = 0;
              $j = 0;

              $length = count($hasil);
              foreach ($ketua as $k) {
                $ketu = $k['nama'];
                $kandidat .= "'$ketu'" . ", ";

                if ($i == 0 && $j == 0) {
                  $to = $hasil[$i]['total'];
                } elseif ($i == 0 && $j == 1) {
                  $to = 0;
                } else {
                  $to = $hasil[$i]['total'];
                }
                $jumlah .= "'$to'" . ", ";
                if ($length > 1) {

                  // <?= $hasil[$i]['total'] / $totalUser * 100 
                  $i++;
                } else {
                  $i = 0;
                }
                // $i++;
                $j++;
              }


?>
<script>
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: [<?= $kandidat; ?>],
      datasets: [{
        label: '# of Tomatoes',
        data: [<?= $jumlah; ?>],
        backgroundColor: [
          'rgb(255, 104, 107)',
          'rgb(104, 182, 255)'

        ],
        borderColor: [
          'rgb(255, 104, 107)',
          'rgb(104, 182, 255)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      //cutoutPercentage: 40,
      responsive: false,

    }
  });
</script>
<?php endif; ?>
<!-- content-wrapper ends -->
<?= $this->endSection('content'); ?>