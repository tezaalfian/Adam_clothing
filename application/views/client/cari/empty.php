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
            <div class="container py-md-5 py-3">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4><b class="text-warning">Mohon Maaf!</b></h4>
                        <img width="30%" src="<?= base_url('assets/client/img/kosong.png') ?>" alt=""><br>
                        <Span>Pesanan dengan kode pemesanan <b class="text-danger"><?= strtoupper($key) ?></b> tidak dapat ditemukan!</Span>
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