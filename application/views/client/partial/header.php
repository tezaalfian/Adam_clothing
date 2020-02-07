
        <nav class="navbar navbar-expand navbar-light bg-danger topbar mb-4 static-top shadow">
          <div class="container">
            <a class="navbar-brand " href="<?= base_url() ?>">
              <img src="<?= base_url('assets/client') ?>/img/logo.png" class="logo d-inline-block align-top my-2" alt="" align="center">
            </a>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - Alerts -->
              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-shopping-cart fa-fw"></i>
                  <!-- Counter - Alerts -->
                  <?php if (isset($keranjang)) : ?>
                  <span class="badge badge-warning badge-counter"><?= count($keranjang) ?></span>
                  <?php endif; ?>
                </a>
                <!-- Dropdown - Alerts -->
                <?php if (isset($keranjang)) : ?>
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header bg-warning">
                    Keranjang
                  </h6>
                  <?php foreach ($keranjang as $key) : ?>
                  <a class="dropdown-item d-flex align-items-center">
                    <div class="mr-3">
                      <div class="icon-circle bg-danger">
                        <i class="fa fa-shirtsinbulk text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">Rp. <?= number_format((int)$key['harga'] * (int)$key['jumlah']).' / '. (int)$key['berat'] * (int)$key['jumlah'] ?> gr</div>
                      <?= $key['nama_kategori'] ?> <small class="small text-gray-500"> / <?= $key['jumlah'] ?> pcs</small>
                    </div>
                  </a>
                  <?php endforeach; ?>
                  <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('order/cart/'.$keranjang[0]['kode']) ?>">Show Detail</a>
                </div>
              </li>
              <?php endif; ?>
              
              <!-- <div class="topbar-divider d-none d-sm-block"></div>

              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link" href="#" role="button"><i class="fa fa-facebook fa-fw"></i></a>
              </li>
              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link" href="#" role="button"><i class="fa fa-instagram fa-fw"></i></a>
              </li>
              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link" href="#" role="button"><i class="fa fa-whatsapp fa-fw"></i></a>
              </li> -->

            </ul>
          </div>
        </nav>