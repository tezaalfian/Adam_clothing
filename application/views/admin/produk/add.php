<!DOCTYPE html>

<html>
<head>
  <?php $this->load->view('admin/partial/css') ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php $this->load->view('admin/partial/header') ?>

    <?php $this->load->view('admin/partial/sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?php $this->load->view('admin/partial/breadcumb') ?>
    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header with-border">
          <a href="<?= base_url('admin/produk') ?>" class="btn btn-primary"><i class="fa fa-angle-left"></i>&nbsp;Kembali</a>
          <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="">
            <div class="row">
                <div class="col-md-6">
                    <?= $this->session->flashdata('message') ?>
                </div>
            </div>
            <div class="row">
                <form class="form-horizontal" method="post" action="<?= base_url('admin/produk/add') ?>" enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="form-group <?php echo form_error('kategori') ? 'has-error':'' ?>">
                        <label class="col-sm-2 control-label text-left">Kategori</label>
                        <div class="col-sm-10">
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="kategori">
                            <?php foreach ($kategori as $key) : ?>
                                <option value="<?= $key['id_kategori'] ?>"><?= $key['nama_kategori'] ?> | <?= substr($key['deskripsi'],0,30) ?>....</option>
                            <?php endforeach; ?>
                        </select>
                            <span class="help-block"><?php echo form_error('kategori')?></span>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('stok') ? 'has-error':'' ?>">
                        <label class="col-sm-2 control-label text-left">Stok</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="number" class="form-control" name="stok">
                                <span class="input-group-addon">pcs</span>
                            </div>
                            <span class="help-block"><?php echo form_error('stok')?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left">foto</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="exampleInputFile" name="foto" accept=".jpg, .jpeg, .png">
                            <span class="help-block text-red"><?php echo form_error('foto')?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" >Simpan</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
      </div>
    </section>
  </div>

  <?php $this->load->view('admin/partial/footer') ?>
</div>
          
    <?php $this->load->view('admin/partial/js') ?>
</body>
</html>