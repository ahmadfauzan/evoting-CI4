<div class="container-scroller">
  <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">

      <a class="navbar-brand" href="/home">
        Selamat Datang</a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
      <ul class="navbar-nav">
        <li class="nav-item d-none d-lg-block">
          <h4>Pemilihan ketua BEM</h4>
        </li>

      </ul>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
          <?php if (logged_in()) : ?>
            <a class="dropdown-item" href="/logout">Logout<i class="dropdown-item-icon ti-help-alt"></i></a>
          <?php else : ?>
            <a class="dropdown-item" href="/login">Login<i class="dropdown-item-icon ti-help-alt"></i></a>

          <?php endif; ?>

        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>