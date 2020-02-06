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
                <div class="col-lg-6 col-md-8">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                        <li class="active"><a href="#edit-profil" data-toggle="tab">EDIT PROFIL</a></li>
                        <li class=""><a href="#ubah-sandi" data-toggle="tab">UBAH PASSWORD</a></li>
                        </ul>
                        <div class="tab-content">
                        <div class="active tab-pane" id="edit-profil">
                            <form class="form-horizontal" method="post" action="<?= base_url('admin/profil') ?>" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group <?php echo form_error('username') ? 'has-error':'' ?>">
                                <label class="col-sm-4 control-label text-left">Username</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="username"  value="<?= $user['username'] ?>"required>
                                    <span class="help-block"><?php echo form_error('username')?></span>
                                </div>
                                </div>

                                <div class="form-group <?php echo form_error('Foto') ? 'has-error':'' ?>">
                                <label class="col-sm-4 control-label text-left">Foto</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="file" id="exampleInputFile" name="foto" accept=".jpg, .jpeg, .png">
                                    <input type="hidden" name="old_foto" value="<?= $user['foto'] ?>">
                                    <input type="hidden" name="role_id" value="<?= $user['role_id'] ?>">
                                </div>
                                </div>

                                <div class="form-group">
                                <label class="col-sm-4 control-label text-left"></label>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                                </div>
                                </div>
                            </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="ubah-sandi">
                            <form class="form-horizontal" method="post" action="<?= base_url('admin/profil/ubah_sandi') ?>" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group <?php echo form_error('old_password') ? 'has-error':'' ?>">
                                <label class="col-sm-4 control-label text-left">Kata Sandi Lama</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="old_password" required>
                                    <span class="help-block"><?php echo form_error('old_password')?></span>
                                </div>
                                </div>

                                <div class="form-group <?php echo form_error('new_password1') ? 'has-error':'' ?>">
                                <label class="col-sm-4 control-label text-left">Password Baru</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="new_password1" required>
                                    <span class="help-block"><?php echo form_error('new_password1')?></span>
                                </div>
                                </div>

                                <div class="form-group <?php echo form_error('new_password2') ? 'has-error':'' ?>">
                                <label class="col-sm-4 control-label text-left">Ulangi Password Baru</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="new_password2" required>
                                    <span class="help-block"><?php echo form_error('new_password2')?></span>
                                </div>
                                </div>

                                <div class="form-group">
                                <label class="col-sm-4 control-label text-left"></label>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                                </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
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