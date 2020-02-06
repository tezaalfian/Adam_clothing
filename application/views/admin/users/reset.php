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
          <a href="<?= base_url('admin/users') ?>" class="btn btn-primary"><i class="fa fa-angle-left"></i>&nbsp;Kembali</a>
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
                <form class="form-horizontal" method="post" action="<?= base_url('admin/users/reset/'.$users['id_users']) ?>" enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="form-group <?php echo form_error('password1') ? 'has-error':'' ?>">
                        <label class="col-sm-4 control-label text-left">Password Baru</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password1">
                            <span class="help-block"><?php echo form_error('password1')?></span>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('password2') ? 'has-error':'' ?>">
                        <label class="col-sm-4 control-label text-left">Ulangi Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password2">
                            <span class="help-block"><?php echo form_error('password2')?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label text-left"></label>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary" >Reset Password</button>
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