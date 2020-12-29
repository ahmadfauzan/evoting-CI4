<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
  <link rel="stylesheet" href="/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/assets/css/shared/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/assets/images/favicon.ico" />
</head>

<body class="bg" style="background-image: url('/assets/images/bg.jpg');  background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form action="<?= route_to('login') ?>" method="post">
                <?= csrf_field() ?>
                <h3 class="text-center mt-n3 mb-4">Login Evoting</h3>
                <div class="form-group">
                  <div class="form-group">
                    <label for="login">Username</label>
                    <input name="login" type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="exampleInputEmail3" placeholder="Username">
                  </div>
                  <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input name="password" type="password" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="exampleInputPassword4" placeholder="***********">
                  <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="/assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="/assets/js/shared/off-canvas.js"></script>
  <!-- <script src="/assets/js/shared/misc.js"></script> -->
  <!-- endinject -->
  <!-- <script src="/assets/js/shared/jquery.cookie.js" type="text/javascript"></script> -->
</body>

</html>