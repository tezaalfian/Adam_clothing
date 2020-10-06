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
          <?php $no = 1; ?>
          <?php foreach ($slide as $key) : ?>
          <div class="carousel-item <?= $no == 1 ? 'active' : '' ?>">
            <?php $no++; ?>
            <div class="carousel-background"><img src="<?= base_url('upload/konten/'.$key['foto']) ?>" alt=""></div>
            <div class="carousel-container">
            </div>
          </div>
          <?php endforeach; ?>
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

    <!-- <section id="about">
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
    </section> -->

    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Our Produk</h3>
        </header>

        <div class="row portfolio-container">

          <?php foreach($kategori as $key) : ?>
          <div class="col-lg-4 col-md-6  portfolio-item wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?= base_url('upload/kategori/'.$key['foto']) ?>" class="img-fluid" alt="">
                <a href="<?= base_url('upload/kategori/'.$key['foto']) ?>" data-lightbox="portfolio" data-title="<?= $key['nama_kategori'] ?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="<?= base_url('home/order/'.$key['id_kategori']) ?>" target=_blank class="link-details" title="Order Now"><i class="fa fa-whatsapp"></i></a>
              </figure>
              <div class="portfolio-info">
                <h4><?= $key['nama_kategori'] ?></h4>
                <!-- <p>Rp. <?= number_format($key['harga']) ?></p>
                <h4><span class="badge badge-primary">Detail</span></h4> -->
                <button type="button" data-nilai="<?= $key['id_kategori'] ?>" class="btn btn-danger btn-sm btn-detail" data-toggle="modal" data-target="#exampleModal">
                  Detail
                </button>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Testimoni</h3>
        </header>

        <div class="row portfolio-container">

          <?php $no=1; foreach($testimoni as $key) : ?>
          <div class="col-lg-4 col-md-6  portfolio-item wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?= base_url('upload/testimoni/'.$key['foto']) ?>" class="img-fluid" alt="">
                <a href="<?= base_url('upload/testimoni/'.$key['foto']) ?>" data-lightbox="portfolio" data-title="Testimoni <?= $no; ?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                <!-- <a href="https://api.whatsapp.com/send?phone=6285703038309" target=_blank class="link-details" title="Order Now"><i class="fa fa-whatsapp"></i></a> -->
              </figure>
              <div class="portfolio-info">
                <h4>Testimoni <?= $no; ?></h4>
                <?php $no++; ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
          <h3>Cara Pemesanan</h3>
        </header>

        <div class="row">

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s" style="visibility: visible; animation-duration: 1.4s; animation-name: bounceInUp;">
            <div class="icon"><i class="ion-tshirt-outline"></i></div>
            <h4 class="title"><a>Pilih Produk</a></h4>
            <p class="description">Tentukan produk yang ingin dipesan, pilih menu detail untuk melihat detail dari produk, lalu pilih ikon whatsapp pada produk yang ingin dipesan</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s" style="visibility: visible; animation-duration: 1.4s; animation-name: bounceInUp;">
            <div class="icon"><i class="fa fa-send-o"></i></div>
            <h4 class="title"><a>Pemesanan Lewat Whatsapp</a></h4>
            <p class="description">Untuk pengisian formulir pemesanan bisa lewat whatsapp dengan memilih metode pembayaran dan pengiriman, dan detail dari produk yang ingin dipesan</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s" style="visibility: visible; animation-duration: 1.4s; animation-name: bounceInUp;">
            <div class="icon"><i class="fa fa-credit-card"></i></div>
            <h4 class="title"><a>Pembayaran</a></h4>
            <p class="description">Pengiriman barang akan dilakukan setelah pelanggan melakukan proses pembayaran sesuai tagihan dari barang yang dipesan. Dengan mengirimkan bukti transfer ke Whatsapp</p>
          </div>

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
              <p><a href="https://api.whatsapp.com/send?phone=6285703038309" target="_blank">0857030383092</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="fa fa-instagram"></i>
              <h3>Instagram</h3>
              <p><a href="https://www.instagram.com/adamclothing_bo2ho/" target="_blank">@adamclothing_bo2ho</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
  
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3">
            <img src="..." alt="..." class="img-thumbnail foto-kategori">
          </div>
          <div class="col-md-9">
            <h4 class="text-danger nama-kategori">Tes</h4>
            <p class="text-yellow harga-berat">Berat</p>
            <span>Deskripsi</span>
            <p class="deskripsi">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus aliquid nam, in dolore consequatur quaerat ipsam? Minus facere quo ipsum veritatis qui rerum unde, nesciunt illum, aut iure provident omnis!</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  </main>
        
  <?php $this->load->view('client/partial/footer') ?>

  <?php $this->load->view('client/partial/js') ?>
  <script>
    $(document).on('click','.btn-detail', function(){
      const id = $(this).data('nilai');
      $.ajax({
        url: `<?= base_url('home/kategoriDetail/') ?>${id}`,
        dataType: "json",
        success: function(result){
          $('.foto-kategori').attr("src","<?= base_url('upload/kategori/') ?>"+result.foto);
          $('.foto-kategori').attr("alt",result.nama_kategori);
          $('.nama-kategori').text(result.nama_kategori);
          $('.deskripsi').text(result.deskripsi);
          $('.harga-berat').text(`Rp ${Intl.NumberFormat('de-DE').format(result.harga)}/${result.berat} gr`);
        }
      });
    });
  </script>
</body>
</html>