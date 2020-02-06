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
                <form class="form-horizontal" method="post" action="<?= base_url('admin/users/edit/'.$users['id_users']) ?>" enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="form-group <?php echo form_error('username') ? 'has-error':'' ?>">
                        <label class="col-sm-4 control-label text-left">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="username" value="<?= $users['username'] ?>" >
                            <span class="help-block"><?php echo form_error('username')?></span>
                        </div>
                    </div>
                    <?php if ($user['role_id'] == 2) {?>
                        <div class="form-group <?php echo form_error('role_id') ? 'has-error':'' ?>">
                        <label class="col-sm-4 control-label text-left">Role</label>
                        <div class="col-sm-8">
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="role_id" id="role_id">
                            <option value="1">Admin</option>
                            <option value="2">Super Admin</option>
                        </select>
                            <span class="help-block"><?php echo form_error('role_id')?></span>
                        </div>
                    </div>
                    <?php } elseif($user['role_id'] == 1) { ?>
                        <input type="hidden" name="role_id" value="1">
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-sm-4 control-label text-left">foto</label>
                        <div class="col-sm-8">
                            <img class="profile-user-img img-circle" src="<?= base_url('upload/users/'.$users['foto']) ?>">
                            <input type="hidden" name="old_foto" value="<?= $users['foto'] ?>">
                            <input type="file" id="exampleInputFile" name="foto" accept=".jpg, .jpeg, .png">
                            <span class="help-block text-red"><?php echo form_error('foto')?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label text-left"></label>
                        <div class="col-sm-8">
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
    <script>
        $('#role_id').val('<?= $users['role_id'] ?>');
    </script>
</body>
</html>