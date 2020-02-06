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
                <div class="row produk">
                    <div class="col-md-3 mt-3 border-right">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-danger"><b>Pilih Produk</b></h4>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach($allKategori as $key) : ?>
                            <div class="col-4 text-center">
                                <a href="<?= base_url('order/tipe/'.$key['id_kategori']) ?>">
                                    <img src="<?= base_url('upload/kategori/'.$key['foto']) ?>" alt="..." class="img-thumbnail">
                                    <small><?= $key['nama_kategori'] ?></small>
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-md-9 mt-3">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-danger"><b>Detail Produk</b></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= base_url('upload/kategori/'.$kategori['foto']) ?>" alt="..." class="img-thumbnail">
                            </div>
                            <div class="col-md-8 mt-2">
                                <h5><b class="text-danger">
                                    <?= $kategori['nama_kategori'] ?>
                                </b></h5>
                                <p class="text-warning"><b>Rp. <?= number_format($kategori['harga']) ?></b> / <small><?= $kategori['berat'] ?> gr</small></p>
                                <span><b>Deskripsi Produk</b></span><br>
                                <span><?= ucfirst($kategori['deskripsi']) ?></span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <h5><b class="text-danger">Desain Produk</b></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                        <?php foreach($produk as $key) : ?>
                            <div class="col-lg-3 col-md-4 col-6 pt-2">
                                <div class="card">
                                    <img src="<?= base_url('upload/produk/'.$key['foto']) ?>" class="card-img-top <?= $key['stok'] == 0 ? 'empty':'' ?>" alt="...">
                                    <div class="card-body tipe-produk">
                                        <!-- <form> -->
                                            <div class="form-row align-items-center">
                                                <div class="col-12">
                                                    <input min="1" max="<?= $key['stok'] ?>" type="number" class="form-control mb-2 mini-form jumlah" required>
                                                </div>
                                                <div class="col-8">
                                                    <select class="form-control mini-form ukuran">
                                                        <option>S</option>
                                                        <option>M</option>
                                                        <option>L</option>
                                                        <option>Xl</option>
                                                        <option>XXl</option>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <button id="<?= $key['id_produk'] ?>" class="addCart btn btn-block btn-warning mini-form" <?= $key['stok'] == 0 ? 'disabled':'' ?>><i class="fa fa-shopping-cart"></i></button>
                                                </div>
                                            </div>
                                        <!-- </form> -->
                                    </div>
                                    <div style="padding: 0px 6px 0px 6px;" class="card-footer text-right bg-warning">
                                        <small class="text-white mini-text"><i><?= $key['stok'] != 0 ? 'Jumlah Stok '.$key['stok']:'Stok Kosong' ?></i></small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
        $('.addCart').on("click", function() {

            let send = {
                id_produk: $(this).attr('id'),
                ukuran: $(this).parents('.form-row').children('.col-8').children('.ukuran').val(),
                jumlah: $(this).parents('.form-row').children('.col-12').children('.jumlah').val()
            }

            $.ajax({
                url: "<?= base_url('request/addorder') ?>",
                method: "post",
                data: send,
                dataType: "json",
                success: function (result) {
                    console.log(result);
                }
            });
        })

    </script>

</body>
</html>