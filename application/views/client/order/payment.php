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
            <div class="container py-md-4 py-2">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-lg-6 col-md-8">
                        <div class="card">
                        <h5 class="card-header bg-warning text-white text-center"><b>Pembayaran</b></h5>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="my-4" src="https://image.flaticon.com/icons/svg/164/164436.svg" width="50%">
                            </div>
                            <?= $this->session->flashdata('message') ?>
                            <p class="card-title text-dark"><b>Jumlah yang harus dibayar :</b></p>
                            <h5 class="text-danger"><b>Rp.&nbsp;<?= number_format((int)$total['ongkir']+$total['total_akhir']) ?></b></h5><hr>
                            <h6 class="card-title text-dark"><b>Cara Pembayaran</b></h6>
                            <ul>
                                <li>Pembayaran dilakukan melalui transfer ke Bank BNI Syari'ah dengan 
                                    <b>No. Rekening : 0238272088 </b>atas Nama : <b>Ahmad Mahmud.</b> </li>
                                <li>Jumlah pembayaran harus sesuai dengan total tagihan.</li>
                                <li>Setelah melakukan transfer silahkan upload bukti pembayaran ke form berikut.</li>
                                <li>Pesanan anda akan dilanjutkan setelah divalidasi oleh pihak kami.</li>
                                <li>Kode pembayaran anda : <b><?= strtoupper($total['order_kode']) ?></b></li>
                            </ul><hr>
                            <h6 class="card-title text-dark"><b>Upload Bukti Pembayaran</b></h6>
                            <form method="post" action="<?= base_url('order/payment/'.$total['order_kode']); ?>" enctype="multipart/form-data">
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" accept=".jpg,.jpeg,.png" required>
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-dark" type="submit">Kirim</button>
                                </div>
                                </div>
                                <small class="text-danger"><i>* File ekstensi yang diperbolehkan : PNG, JPG, JPEG</i></small><br>
                                <?= $this->session->flashdata("salah"); ?>
                            </form>
                        </div>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
        <?php $this->load->view('client/partial/footer') ?>
    </div>
  </div>

  <?php $this->load->view('client/partial/js') ?>

</body>
</html>