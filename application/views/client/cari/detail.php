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
                    <div class="col-md-12"><h4 class="text-danger"><b>Detail Pemesanan</b></h4></div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <span><b>Kode : </b><?= strtoupper($order[0]['kode']) ?></span><br>
                        <span><b>Tgl Pesan : </b><?= date('d M Y', strtotime($order[0]['tgl_pemesanan'])) ?></span><br>
                        <span><b>Status : </b><?= ucwords($order[0]['nama_status']) ?></span><br>
                        <?php if($order[0]['status'] != 2) : ?>
                        <a href="<?= base_url('upload/payment/'.$order[0]['bukti_payment']) ?>" target="_blank">Bukti Pembayaran</a>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 mt-3">
                        <small>Untuk</small><br>
                        <b><?= ucwords($order[0]['pemesan']) ?></b><br>
                        <small>
                            <?= ucfirst($order[0]['alamat']) ?><br><?php $prov =  explode(',',$order[0]['provinsi']); $kota = explode(',',$order[0]['kota']); ?>
                            <?= $kota[1],', '.$prov[1].' '.$order[0]['kode_pos'] ?><br>
                            No. Hp : <?= $order[0]['no_hp'] ?><br>
                            Kurir : <?= $order[0]['kurir'] ?>
                        </small>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Ukuran</th>
                                    <th>Berat</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($order as $key) : ?>
                                <tr>
                                    <td><?= $key['nama_kategori'] ?></td>
                                    <td><?= 'Rp. '. number_format($key['harga']) ?></td>
                                    <td><?= $key['jumlah'].' item' ?></td>
                                    <td><?= $key['ukuran'] ?></td>
                                    <td><?= $key['berat'].' gr' ?></td>
                                    <td>Rp. <?= number_format((int)$key['harga']*$key['jumlah']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row py-1">
                            <div class="col-6"><span>Subtotal : </span></div>
                            <div class="col-6 text-right">Rp. <?= number_format($order[0]['total_tagihan']) ?></div>
                        </div>
                        <div class="row py-1">
                            <div class="col-6"><span>Diskon : </span></div>
                            <div class="col-6 text-right">Rp. <?= number_format($order[0]['diskon']) ?></div>
                        </div>
                        <div class="row py-1">
                            <div class="col-6"><span>Ongkir : </span></div>
                            <div class="col-6 text-right">Rp. <?= number_format($order[0]['ongkir']) ?></div>
                        </div>
                        <div class="row py-1">
                            <div class="col-6"><b>Total : </b></div>
                            <div class="col-6 text-right"><b>Rp. <?= number_format((int)$order[0]['total_akhir']+$order[0]['ongkir']) ?></b></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row py-1">
                            <div class="col-md-12">
                                <?php if($order[0]['status'] == 2) : ?>
                                    Batas waktu pembayaran : <b class="text-warning"><?= date('d M Y - H:i', strtotime('+1 day', $order[0]['id_pengiriman'])) ?> WIB</b>
                                <?php endif; ?>
                                <?php if($order[0]['status'] == 5 || $order[0]['status'] == 6) : ?>
                                    No. Resi Pengiriman : <b class="text-warning"><?= $order[0]['no_resi'] ?></b><br>
                                    Tanggal Dikirim : <b class="text-warning"><?= $order[0]['tgl_dikirim'] ?></b><br>
                                    <?php if($order[0]['status'] == 6) : ?>
                                        Tanggal Diterima : <b class="text-warning"><?= $order[0]['tgl_diterima'] ?></b>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-row">
                        <?php if($order[0]['status'] == 2) : ?>
                            <div class="col-sm-4 mt-2"><button class="btn btn-block btn-outline-danger">Batalkan</></div>
                            <div class="col-sm-4 mt-2"><a href="" class="btn btn-block btn-outline-warning">Edit</a></div>
                        <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="col"></div>
                            <?php if($order[0]['status'] == 2) : ?>
                            <div class="col-sm-4 mt-2"><a href="<?= base_url('order/payment/'.$order[0]['kode']) ?>" class="btn btn-block btn-danger">Lanjut Pembayaran</a></div>
                            <?php endif; ?>
                            <?php if($order[0]['status'] == 5) : ?>
                            <div class="col-sm-4 mt-2"><a href="" class="btn btn-block btn-danger">Pesanan Diterima</a></div>
                            <?php endif; ?>
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