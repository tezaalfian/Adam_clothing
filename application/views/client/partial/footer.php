<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>AdamClothing</h3>
            <p>Menyediakan berbagai macam barang dengan kualitas tinggi tapi harga yang lebih murah dibandingkan harga di pasaran dan semakin banyak jumlah barang yang dibeli semakin murah harganya</p> 
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <div class="social-links">
              <?php foreach ($medsos as $key) : ?>
                <a href="<?= $key['link'] ?>" class="<?= $key['nama_konten'] ?>"><i class="fa fa-<?= $key['nama_konten'] ?>"></i></a>
              <?php endforeach; ?>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Alamat</h4>
            <p>Jl. Merbabu RT.02/10, Kec. Gunung Puyuh, Kota Sukabumi</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Peta Lokasi</h4>
	          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8427600005466!2d106.91127871414467!3d-6.9093974695399405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6849d597ac023b%3A0x89444c6550db9086!2sJl.+Merbabu+No.30%2C+Karang+Tengah%2C+Gn.+Puyuh%2C+Sukabumi%2C+Jawa+Barat+43121!5e0!3m2!1sid!2sid!4v1562544346576!5m2!1sid!2sid" width="100%" height="180" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><?= SITE_NAME ?></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
      </div>
    </div>
  </footer>