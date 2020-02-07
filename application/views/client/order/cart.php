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
                        <h4 class="text-danger"><b>Keranjang</b></h4>
                        <div class="flash-data" data="<?= $this->session->flashdata('success') ?>"></div>
                        <div class="flash-error" data="<?= $this->session->flashdata('error') ?>"></div>
                    </div>
                </div>
                <?php if(isset($keranjang)) { ?>
                <div class="row">
                <?php $total = 0; ?>
                <?php foreach ($keranjang as $key) : ?>
                    <?php $total += ((int)$key['harga'] * (int)$key['jumlah']) ?>
                    <div class="col-sm-6 mt-3">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-4">
                                    <img src="<?= base_url('upload/produk/'.$key['foto_produk']) ?>" class="card-img full-img" alt="...">
                                </div>
                                <div class="col-8">
                                <div class="card-body mini-card-body">
                                    <span class="card-title custom-title"><b class="text-danger"><?= $key['nama_kategori'] ?></b> / <small class="text-muted"><?= $key['jumlah'].' pcs' ?></small></span>
                                    <div class="row">
                                        <div class="col-12">
                                            <small class="text-muted"><b class="text-warning">Rp. <?= number_format((int)$key['harga'] * (int)$key['jumlah']) ?></b> | <?= (int)$key['berat'] * (int)$key['jumlah'] . ' gr | Ukuran : '.$key['ukuran'] ?></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button data-toggle="modal" data-target="#modalEdit" data="<?= $key['id_order'] ?>" href="" class="btn btn-sm btn-warning edit"><i class="fa fa-edit"></i></button>&nbsp;
                                            <button data-toggle="modal" data-target="#modalDelete" data="<?= $key['id_order'] ?>" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col-12 mt-3 border-top">
                    <ul class="list-group list-group-flush">
                        <li class="mini-list list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span>Total : <b class="text-danger">Rp. <?= number_format($total) ?></b></span>
                            <a href="<?= base_url('order/send/'.$keranjang[0]['kode']) ?>" class="btn btn-danger">Checkout</a>
                        </li>
                    </ul>
                    </div>
                </div>
                <?php } else {?>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-md-4 text-center">
                            <img width="100%" src="<?= base_url('assets/client/img/kosong.png') ?>" alt="">
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <span class="text-warning"><b>Keranjang anda kosong!</b></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php $this->load->view('client/partial/footer') ?>
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" class="form_edit">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah</label>
                            <input min="1" type="number" class="form-control jumlah" name="jumlah">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Ukuran</label>
                            <select class="form-control ukuran" name="ukuran">
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>XXL</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="submit" href="" class="btn btn-danger okEdit">Submit</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Apa anda yakin ? data yang dihapus tidak akan dikembalikan!</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <a href="" class="btn btn-danger conDelete">Submit</a>
                </div>
                </div>
            </div>
        </div>

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