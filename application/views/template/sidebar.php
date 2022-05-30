<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    
      <img src="<?= base_url('img/') ?>logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      
      <span class="brand-text font-weight-light">PDAM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 ">
        <div class="image">
          <center>
          <?php 
      if (!$_SESSION['image']) { ?>
      <img src="<?= base_url('img/user/') ?>user.png" class="img-circle elevation-3">
      <?php }else{ ?>
        <img src="<?= base_url('img/user/').$_SESSION['image'] ?>.jpg" class="img-circle elevation-3">
      <?php } ?>
          <div style="color: #fffff8;">
            <?= $_SESSION['name'] ?>
          </div>
          </center>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <?php 

      $cek_user = $_SESSION['role_id'];

          $this->db->order_by('id', 'asc');
          $menu = $this->db->query("SELECT user_menu.id, user_menu.menu, user_access_menu.role_id, user_access_menu.menu_id FROM user_menu JOIN user_access_menu 
          ON user_menu.id = user_access_menu.menu_id WHERE user_access_menu.role_id = $cek_user ORDER BY user_access_menu.menu_id ASC")->result_array();
      ?>
      
      <nav class="mt-2">
    <hr class="sidebar-divider">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <?php foreach($menu as $m): ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php
          $sub_menu = $this->db->get_where('user_sub_menu', array('menu_id' => $m['id'], 'is_active' => 1))->result_array();
          $id = $this->session->userdata('id');
          foreach($sub_menu as $sm) :
          if($sm['id'] == 4){
          ?>
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas <?= $sm['icon'] ?>"></i>
              <p>
                <?= $sm['title'] ?>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item nav-open">
                <a href="<?= base_url('admin/form_pengaduan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Pengaduan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/form_sambung_kembali') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Sambung Kembali</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/form_pemutusan_langganan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Pemutusan Langganan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url($sm['url']) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tabel Data Pengaduan</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } else {
            if ($id == 36 AND $sm['id'] == 11) {
              echo '';
           }else{
           ?>
            <li class="nav-item">
            <a href="<?= base_url($sm['url']) ?>" class="nav-link">
              <i class="nav-icon fas <?= $sm['icon'] ?>"></i>
              <p>
                <?= $sm['title'] ?>
              </p>
            </a>
          </li>

          
          <?php  } } endforeach; ?>
        <?php endforeach; ?>
        <?php if ($_SESSION['role_id'] == 1 OR $_SESSION['role_id'] == 5 OR $_SESSION['role_id'] == 4) { 

          $link='';
            if ($_SESSION['role_id'] == 1) {
              $link1 = base_url('').'admin/laporan';
              $link2 = base_url('').'admin/laporan_sambung_kembali';
              $link3 = base_url('').'admin/laporan_pemutusan_sambungan';
            }elseif ($_SESSION['role_id'] == 4) {
              $link1 = base_url().'kabag/laporan';
              $link2 = base_url('').'kabag/laporan_sambung_kembali';
              $link3 = base_url('').'kabag/laporan_pemutusan_sambungan';
            }elseif ($_SESSION['role_id'] == 5) {
              $link1 = base_url().'direktur/laporan';
              $link2 = base_url('').'direktur/laporan_sambung_kembali';
              $link3 = base_url('').'direktur/laporan_pemutusan_sambungan';
            }
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-book"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item nav-open">
                <a href="<?= $link1 ?>" class="nav-link">
                  <i class="far fa-square nav-icon"></i>
                  <p>Laporan Pengaduan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $link2 ?>" class="nav-link">
                  <i class="far fa-square nav-icon"></i>
                  <p>Laporan Sambung Kembali</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $link3 ?>" class="nav-link">
                  <i class="far fa-square nav-icon"></i>
                  <p>Laporan Pemutusan Langganan</p>
                </a>
              </li>
            </ul>
          </li>
         <?php } ?>
            <hr class="sidebar-divider">
            <li class="nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>