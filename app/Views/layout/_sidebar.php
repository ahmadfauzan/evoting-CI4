<div class="container-fluid page-body-wrapper">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-category">Main Menu</li>
      <li class="nav-item">
        <a class="nav-link" href="/home">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Home</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Visi Misi</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <?php $i = 0;
            foreach ($ketua as $k) : ?>
              <li class="nav-item">
                <a class="nav-link" href="/visi-misi/<?= $k['no_urut'] ?>"><?= $k['no_urut']; ?> <?= $k['nama']; ?> & <?= $wakil[$i]['nama']; ?></a>
              </li>

            <?php
              $i++;
            endforeach; ?>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/hasil">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Hasil</span>
        </a>
      </li>


    </ul>
  </nav>