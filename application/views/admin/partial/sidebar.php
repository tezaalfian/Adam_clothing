<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('upload/users/'.$user['foto']) ?>" class="img-circle cover2">
        </div>
        <div class="pull-left info">
          <p><?= ucfirst($user['username']) ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="<?php echo $this->uri->segment(1) == 'dashboard' ? 'active': '' ?>">
          <a href="<?= base_url('dashboard') ?>"><i class="fa fa-laptop"></i><span>Dashboard</span></a>
        </li>
        <li class="treeview <?php echo $this->uri->segment(2) == 'kategori' || $this->uri->segment(2) == 'users' || $this->uri->segment(2) == 'testimoni' ? 'active': '' ?>" >
          <a href="#"><i class="fa fa-folder"></i> <span>Master Data</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $this->uri->segment(2) == 'kategori' ? 'active': '' ?>">
              <a href="<?= base_url('admin/kategori') ?>"><i class="fa fa-bookmark"></i> Data Kategori</a>
            </li>
            <li  class="<?php echo $this->uri->segment(2) == 'testimoni' ? 'active': '' ?>">
              <a href="<?= base_url('admin/testimoni') ?>"><i class="fa fa-shirtsinbulk"></i>Testimoni</a>
            </li>
            <!-- <li  class="<?php echo $this->uri->segment(2) == 'produk' ? 'active': '' ?>">
              <a href="<?= base_url('admin/produk') ?>"><i class="fa fa-shirtsinbulk"></i> Data Produk</a>
            </li> -->
            <?php if($user['role_id'] == 2) : ?>
            <li  class="<?php echo $this->uri->segment(2) == 'users' ? 'active': '' ?>">
              <a href="<?= base_url('admin/users') ?>"><i class="fa fa-users"></i> Data User</a>
            </li>
            <?php  endif; ?>
          </ul>
        </li>
        <li class="treeview <?= $this->uri->segment(2) == 'konten' ? 'active': '' ?>" >
          <a href="#"><i class="fa fa-folder"></i> <span>Konten</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $this->uri->segment(3) == 'slide' ? 'active': '' ?>">
              <a href="<?= base_url('admin/konten/slide') ?>"><i class="fa fa-photo"></i>Slide</a>
            </li>
            <li class="<?php echo $this->uri->segment(3) == 'medsos' ? 'active': '' ?>">
              <a href="<?= base_url('admin/konten/medsos') ?>"><i class="fa fa-link"></i>Medsos</a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>