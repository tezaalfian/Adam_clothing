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
          <a href="<?= base_url('admin/kategori') ?>" class="btn btn-primary"><i class="fa fa-angle-left"></i>&nbsp;Kembali</a>
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
                <form class="form-horizontal" method="post" action="<?= base_url('admin/kategori/edit/'.$kategori['id_kategori']) ?>" enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="form-group <?php echo form_error('kategori') ? 'has-error':'' ?>">
                        <label class="col-sm-2 control-label text-left">Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kategori" value="<?= $kategori['nama_kategori'] ?>">
                            <span class="help-block"><?php echo form_error('kategori')?></span>
                        </div>
                    </div>
                    <!-- <div class="form-group <?php echo form_error('berat') ? 'has-error':'' ?>">
                        <label class="col-sm-2 control-label text-left">Berat</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="number" class="form-control" name="berat" value="<?= $kategori['berat'] ?>">
                                <span class="input-group-addon">gr</span>
                            </div>
                            <span class="help-block"><?php echo form_error('berat')?></span>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left">foto</label>
                        <div class="col-sm-10">
                            <img class="profile-user-img img-circle" src="<?= base_url('upload/kategori/'.$kategori['foto']) ?>">
                            <input type="file" id="exampleInputFile" name="foto" accept=".jpg, .jpeg, .png">
                            <input type="hidden" name="old_foto" value="<?= $kategori['foto'] ?>">
                            <span class="help-block text-red"><?php echo form_error('foto')?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group <?php echo form_error('harga') ? 'has-error':'' ?>">
                        <label class="col-sm-2 control-label text-left">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="harga" value="<?= $kategori['harga'] ?>">
                            <span class="help-block"><?php echo form_error('harga')?></span>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('deskripsi') ? 'has-error':'' ?>">
                        <label class="col-sm-2 control-label text-left">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" class="form-control" rows="3"><?= $kategori['deskripsi'] ?></textarea>
                            <span class="help-block"><?php echo form_error('deskripsi')?></span>
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