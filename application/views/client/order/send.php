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
                    <div class="col-md-12">
                        <h4 class="text-danger"><b>Checkout</b></h4>
                        <div class="flash-data" data="<?= $this->session->flashdata('success') ?>"></div>
                        <div class="flash-error" data="<?= $this->session->flashdata('error') ?>"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <h5 class="text-warning"><b>Alamat Pengiriman</b></h5>
                        <form method="post" action="">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Penerima</label>
                                        <input type="text" class="form-control <?= form_error('penerima') ? 'is-invalid':'' ?>" name="penerima">
                                        <div class="invalid-feedback"><?= form_error('penerima') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No HP</label>
                                        <input type="text" class="form-control <?= form_error('no_hp') ? 'is-invalid':'' ?>" name="no_hp">
                                        <div class="invalid-feedback"><?= form_error('no_hp') ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <select class="form-control <?= form_error('provinsi') ? 'is-invalid':'' ?>" name="provinsi" id="provinsi">
                                            <option>1</option>
                                        </select>
                                        <div class="invalid-feedback"><?= form_error('provinsi') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kota / Kabupaten</label>
                                        <select class="form-control <?= form_error('kota') ? 'is-invalid':'' ?>" name="kota" id="kota">
                                            <option>1</option>
                                        </select>
                                        <div class="invalid-feedback"><?= form_error('kota') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input type="text" class="form-control <?= form_error('kode_pos') ? 'is-invalid':'' ?>" name="kode_pos">
                                        <div class="invalid-feedback"><?= form_error('kode_pos') ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control <?= form_error('alamat') ? 'is-invalid':'' ?>" name="alamat"></textarea>
                                        <div class="invalid-feedback"><?= form_error('alamat') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kurir</label>
                                        <select class="form-control <?= form_error('kurir') ? 'is-invalid':'' ?>" name="kurir" id="kurir">
                                            <option>1</option>
                                        </select>
                                        <div class="invalid-feedback"><?= form_error('kurir') ?></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <h5 class="text-warning"><b>Ringkasan Belanja</b></h5>
                        <div class="row mb-2">
                            <div class="col-6"><span>Subtotal : </span></div>
                            <div class="col-6 text-right"><span>Rp. <?= number_format($order['total_tagihan']) ?></span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><span>Ongkir : </span></div>
                            <div class="col-6 text-right"><span id="ongkir"><small>/<?= $order['berat'] ?>gr</small></span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><span>Diskon : </span></div>
                            <div class="col-6 text-right"><span>Rp. <?= $order['diskon'] ?></span></div>
                        </div>
                        <div class="row py-2 border-top border-border-bottom">
                            <div class="col-6"><span>Total : </span></div>
                            <div class="col-6 text-right"><span>Rp. </span></div>
                        </div>
                        <div class="row py-2 border-top border-border-bottom">
                            <div class="col-12">
                                <button class="btn btn-block btn-danger">Lanjut Bayar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('client/partial/footer') ?>
    </div>
  </div>

  <?php $this->load->view('client/partial/js') ?>

    <script>
        const flashdata = $('.flash-data').attr('data');
        if (flashdata) {
            swal({
            type: 'success',
            title: 'Keranjang',
            text: flashdata
            });
        }

        const error = $('.flash-error').attr('data');
        if (error) {
            swal({
            type: 'error',
            title: 'Keranjang',
            text: error
            });
        }

        $('.edit').click(function() {
            $.ajax({
                type: "post",
                url: "<?= base_url('request/getOrder') ?>",
                data: {id: $(this).attr('data')},
                dataType: "json",
                success: function (result) {
                    $('.jumlah').val(result.jumlah);
                    // $('.jumlah').attr('max',result.stok);
                    $('.ukuran').val(result.ukuran);
                    $('.form_edit').attr('action','<?= base_url('order/editcart/') ?>'+result.id_order);
                }
            });
        })

        $('.delete').click(function() {
            $.ajax({
                type: "post",
                url: "<?= base_url('request/getOrder') ?>",
                data: {id: $(this).attr('data')},
                dataType: "json",
                success: function (result) {
                    $('.conDelete').attr('href','<?= base_url('order/deleteCart/') ?>'+result.id_order);
                }
            });
        })

    </script>

</body>
</html>