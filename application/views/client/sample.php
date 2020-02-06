<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('client/partial/css') ?>
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <?php $this->load->view('client/partial/header') ?>
    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="<?= base_url('upload/slide/1.png') ?>" alt="First slide">

                      <div class="carousel-caption">
                        First Slide
                      </div>
                    </div>
                    <div class="item">
                      <img src="<?= base_url('upload/slide/2.png') ?>" alt="Second slide">

                      <div class="carousel-caption">
                        Second Slide
                      </div>
                    </div>
                    <div class="item">
                      <img src="<?= base_url('upload/slide/3.png') ?>" alt="Third slide">

                      <div class="carousel-caption">
                        Third Slide
                      </div>
                    </div>
                  </div>
                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                  </a>
                </div>
          </div>
          <!-- /.col -->
        </div>

        <h3><b class="text-danger">Produk</b></h3>
                <div class="row border-top">
                    <?php foreach ($kategori as $key) : ?>
                    <div class="col-md-3 col-sm-6 col-6 mt-3">
                        <div class="card h-100">
                            <a href="">
                                <img src="<?= base_url('upload/kategori/'.$key['foto']) ?>" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <span class="card-title title"><b>
                                    <a href="" class="text-danger"><?= strtoupper($key['nama_kategori']); ?></a>
                                </b></span></br>
                                <small class="text-warning harga">Rp. <?= number_format($key['harga']) ?></small>
                            </div>
                            <div class="card-footer bg-danger"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
      </div>
    </div>
      <?php $this->load->view('client/partial/footer') ?>

</div>

  <?php $this->load->view('client/partial/js') ?>

</body>
</html>