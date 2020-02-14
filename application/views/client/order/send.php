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
                        <form method="post" action="<?= base_url('order/send/'.$order['order_kode']) ?>">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Penerima</label>
                                        <input type="text" class="form-control <?= form_error('penerima') ? 'is-invalid':'' ?>" name="penerima" required>
                                        <div class="invalid-feedback"><?= form_error('penerima') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No HP</label>
                                        <input type="text" class="form-control <?= form_error('no_hp') ? 'is-invalid':'' ?>" name="no_hp" required>
                                        <div class="invalid-feedback"><?= form_error('no_hp') ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <select class="form-control <?= form_error('provinsi') ? 'is-invalid':'' ?>" name="provinsi" id="provinsi">
                                        </select>
                                        <div class="invalid-feedback"><?= form_error('provinsi') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kota / Kabupaten</label>
                                        <select class="form-control <?= form_error('kota') ? 'is-invalid':'' ?>" name="kota" id="kota">
                                        </select>
                                        <div class="invalid-feedback"><?= form_error('kota') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input type="text" class="form-control <?= form_error('kode_pos') ? 'is-invalid':'' ?>" name="kode_pos" id="kode_pos" required>
                                        <div class="invalid-feedback"><?= form_error('kode_pos') ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea placeholder="Nama jalan, RT/RW, Kecamatan, No. Rumah" class="form-control <?= form_error('alamat') ? 'is-invalid':'' ?>" name="alamat" required></textarea>
                                        <div class="invalid-feedback"><?= form_error('alamat') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kurir</label>
                                        <select class="form-control <?= form_error('kurir') ? 'is-invalid':'' ?>" id="kurir">
                                        </select>
                                        <div class="invalid-feedback"><?= form_error('kurir') ?></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <h5 class="text-warning"><b>Ringkasan Belanja</b></h5>
                        <div class="row mb-2">
                            <div class="col-6"><span>Subtotal : </span></div>
                            <div class="col-6 text-right"><span>Rp. <?= number_format($order['total_tagihan']) ?></span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><span>Ongkir : </span></div>
                            <div class="col-6 text-right"><span id="ongkir"></span><small>/<?= $order['berat'] ?>gr</small></div>
                            <input type="hidden" name="ongkir" class="ongkir">
                            <input type="hidden" name="kurir" id="kurir_paket">
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><span>Diskon : </span></div>
                            <div class="col-6 text-right"><span>Rp. <?= $order['diskon'] ?></span></div>
                        </div>
                        <div class="row py-2 border-top border-border-bottom">
                            <div class="col-6"><span>Total : </span></div>
                            <div class="col-6 text-right">Rp. <span id="total"></span></div>
                        </div>
                        <div class="row py-2 border-top border-border-bottom">
                            <div class="col-12">
                                <button type="submit" class="btn btn-block btn-danger">Lanjut Bayar</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('client/partial/footer') ?>
    </div>
  </div>

  <?php $this->load->view('client/partial/js') ?>

    <script>        
        //cek ongkir
        function all_prov() {
            let prov;
            $.ajax({
                url: "<?= base_url('request/all_prov') ?>",
                dataType: "json",
                success: function (result) {
                    prov = "";
                    for (var i = result.rajaongkir.results.length - 1; i >= 0; i--) {
                        prov += "<option value='"+result.rajaongkir.results[i].province_id+"'>"+result.rajaongkir.results[i].province+"</option>";
                    }
                    $('#provinsi').html(prov);
                }
            });
        }

        function kota_by_id() {
            let kota;
            $.ajax({
                type: "post",
                url: "<?= base_url('request/kota_by_id') ?>",
                data: {id: $('#provinsi').val()},
                dataType: "json",
                success: function (result) {
                    kota = "";
                    for (var i = result.rajaongkir.results.length - 1; i >= 0; i--) {
	    				kota += "<option value='"+result.rajaongkir.results[i].city_id+"'>"+result.rajaongkir.results[i].type+" "+result.rajaongkir.results[i].city_name+"</option>";
	    			}
                    $('#kota').html(kota);
                }
            });
        }

        function set_value() {
            $('.ongkir').val($('#kurir option:selected').val());
            $('#ongkir').html('Rp. '+$('#kurir option:selected').val());
            $('#total').html(parseInt($('.ongkir').val())+parseInt("<?= $order['total_tagihan'] ?>"));
    		$('#kurir_paket').val($('#kurir option:selected').html());
        }

        function ongkir() {
            let kurir;
            $.ajax({
                type: "post",
                url: "<?= base_url('request/ongkir') ?>",
                data: {
                    kota: $('#kota').val(),
                    berat: "<?= $order['berat'] ?>"
                },
                dataType: "json",
                success: function (result) {
                    kurir = "";
                    $('#kode_pos').val(result.rajaongkir.destination_details.postal_code);
                    for (var i = result.rajaongkir.results[0].costs.length - 1; i >= 0; i--) {
	    				kurir += "<option value='"+result.rajaongkir.results[0].costs[i].cost[0].value+"'>"+result.rajaongkir.results[0].code+" - "+result.rajaongkir.results[0].costs[i].service+" "+result.rajaongkir.results[0].costs[i].cost[0].etd+" Hari"+"</option>";
	    			}
                    $('#kurir').html(kurir);
                    set_value();
                }
            });
        }

        all_prov();
        kota_by_id();
        $('#provinsi').on('change', function () {
            kota_by_id();
        })
        $('#kota').on('change', function () {
            ongkir();
        })
        $('#kurir').on('change', function() {
            set_value();
        })

    </script>

</body>
</html>