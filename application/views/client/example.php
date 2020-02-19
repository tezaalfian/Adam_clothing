<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('client/partial/css') ?>
</head>
<body>
 
  <?php $this->load->view('client/partial/header') ?>

  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="<?= base_url('upload/slide/1.jpg') ?>" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>We are professional</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section>

  <main id="main">
    <section id= "featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <i class="ion-bag"></i>
            <h4 class="title"><a href="">Desain Terkini</a></h4>
            <p class="description">Desain produk yang dijual sangat kekinian dan menyesuaikan dengan desain trendi saat ini</p>
          </div>

          <div class="col-lg-4 box box-bg">
            <i class="ion-tshirt-outline"></i>
            <h4 class="title"><a href="">Bahan Berkualitas</a></h4>
            <p class="description">Bahan produk berkualitas tinggi dan original sehingga sangat nyaman saat dipakai</p>
          </div>

          <div class="col-lg-4 box">
            <i class="ion-ios-pricetags-outline"></i>
            <h4 class="title"><a href="">Harga Grosir</a></h4>
            <p class="description">Harga barang grosir sehingga semakin banyak barang yang dibeli semakin murah harganya</p>
          </div>

        </div>
      </div>
    </section>

    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Our Produk</h3>
        </header>

        <div class="row about-cols">
          <?php foreach($kategori as $key) : ?>
          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="<?= base_url('upload/kategori/'.$key['foto']) ?>" alt="" class="img-fluid">
                <div class="icon"><i class="ion-bag"></i></div>
              </div>
              <h2 class="title"><a href="#"><?= ucwords($key['nama_kategori']) ?></a></h2>
              <p><?= $key['deskripsi'] ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

      </div>
    </section>

    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Ready Stock</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <?php foreach($kategori as $key) : ?>
              <li data-filter="<?= '.'. $key['id_kategori'] ?>"><?= $key['nama_kategori'] ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <?php foreach($produk as $key) : ?>
          <div class="col-lg-3 col-md-6  portfolio-item <?= $key['kategori_id'] ?> wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?= base_url('upload/produk/'.$key['foto_produk']) ?>" class="img-fluid" alt="">
                <a href="<?= base_url('upload/produk/'.$key['foto_produk']) ?>" data-lightbox="portfolio" data-title="<?= $key['nama_kategori'] ?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="https://api.whatsapp.com/send?phone=6285703038309" target=_blank class="link-details" title="Order Now"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><?= $key['nama_kategori'] ?></h4>
                <p>Rp. <?= number_format($key['harga']) ?></p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
          <p>Silahkan hubungi kami jika ingin mengetahui lebih jauh tentang produk kami</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <address>Jl. Merbabu, RT.02 RW 10, Kec. Gunung Puyuh, Kota Sukabumi</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>No. HP / Whatsapp</h3>
              <p><a href="tel:+155895548855">089631902592</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="fa fa-instagram"></i>
              <h3>Instagram</h3>
              <p><a href="mailto:info@example.com">@adamclothingbo2ho</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>


  </main>
        
  <?php $this->load->view('client/partial/footer') ?>

  <?php $this->load->view('client/partial/js') ?>

</body>
</html>