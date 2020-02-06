<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('client/partial/css') ?>
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      
        <?php $this->load->view('client/partial/header') ?>
        <!-- Main Content -->
        <div id="content">
            <div class="container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="<?= base_url('upload/slide/1.png') ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="<?= base_url('upload/slide/2.png') ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="<?= base_url('upload/slide/3.png') ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="container py-md-5 py-3">
                <div class="row">
                    <div class="col-12">
                        <h3><b class="text-danger">Produk</b></h3>
                    </div>
                </div>
                <div class="row border-top">
                    <?php $no=0; ?>
                    <?php foreach ($kategori as $key) : ?>
                    <div class="col-md-3 col-sm-6 col-6 mt-3">
                        <div class="card h-100">
                            <a href="<?= base_url('order/tipe/'.$key['id_kategori']) ?>">
                                <img src="<?= base_url('upload/kategori/'.$key['foto']) ?>" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <p class="card-title title"><b>
                                    <a href="<?= base_url('order/tipe/'.$key['id_kategori']) ?>" class="text-danger"><?= $key['nama_kategori']; ?></a>
                                </b></p>
                                <small class="text-warning harga">Rp. <?= number_format($key['harga']) ?></small>
                            </div>
                            <div class="card-footer bg-danger"></div>
                        </div>
                    </div>
                    <?php 
                        $no++;
                        if ($show == false && $no == 4) {
                            break;
                        }
                    ?>
                    <?php endforeach; ?>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-md-12 text-center">
                        <?php if ($show == false) {?>
                            <a href="<?= base_url() ?>?fil=1" class="btn btn-warning">Show All</a>
                        <?php } else { ?>
                            <a href="<?= base_url() ?>" class="btn btn-warning">Show Little</a>
                        <?php } ?>
                    </div>
                </div>

                <!-- end of kategori -->
                <!-- begin of rule's order -->
                <div class="row py-md-5 py-3 border-bottom">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <img src="<?= base_url('assets/client/img/sales.png') ?>" alt="" width="50%">
                    </div>
                    <div class="col-md-8">
                        <h3><b class="text-danger">Alur Pemesanan</b></h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent"><span class="badge badge-warning">1</span>&nbsp;Pilihlah produk yang ingin dipesan</li>
                            <li class="list-group-item bg-transparent"><span class="badge badge-warning">2</span>&nbsp;Isi form pemesanan meliputi : jumlah, ukuran, dll</li>
                            <li class="list-group-item bg-transparent"><span class="badge badge-warning">3</span>&nbsp;Isi form pengiriman barang</li>
                            <li class="list-group-item bg-transparent"><span class="badge badge-warning">4</span>&nbsp;Pengiriman bukti pembayaran</li>
                            <li class="list-group-item bg-transparent"><span class="badge badge-warning">5</span>&nbsp;Validasi pembayaran oleh admin</li>
                            <li class="list-group-item bg-transparent"><span class="badge badge-warning">6</span>&nbsp;Pengiriman barang</li>
                            <li class="list-group-item bg-transparent"><span class="badge badge-warning">7</span>&nbsp;Konfirmasi penerimaan barang</li>
                        </ul>
                    </div>
                </div>

                <div class="row py-md-5 py-3 border-bottom">
                    <div class="col-md-12 text-center">
                        <h3><b class="text-danger">Cek Status Pesanan</b></h3>
                        <div class="d-flex justify-content-center">
                            <form class="search-form">
                                <div class="inner-form">
                                <div class="input-field second-wrap">
                                    <input id="search" type="text" placeholder="Enter Keywords?" />
                                </div>
                                <div class="input-field third-wrap">
                                    <button class="btn-search" type="button">
                                    <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                                    </svg>
                                    </button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php $this->load->view('client/partial/footer') ?>

    </div>
  </div>

  <?php $this->load->view('client/partial/js') ?>

</body>
</html>