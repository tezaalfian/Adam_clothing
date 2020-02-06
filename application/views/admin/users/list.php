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
          <div class="flash-data" data="<?= $this->session->flashdata('success') ?>"></div>
          <div class="flash-error" data="<?= $this->session->flashdata('error') ?>"></div>
          <a href="<?= base_url('admin/users/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Baru</a>
          <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="">
          <table id="dtHorizontalVerticalExample" width="100%" cellspacing="0" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Role</th>
                <th>Status</th>
                <th>Foto</th>
                <?php if($user['role_id'] == 2) : ?>
                <th width="15%">Aksi</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
                <?php foreach ($users as $key) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $key['username'] ?></td>
                  <td><?php 
                    if ($key['role_id'] == 2) {
                      echo 'Super Admin';
                    }else if($key['role_id'] == 1) {
                      echo 'Admin';
                    }
                  ?></td>
                  <td><?php 
                    if ($key['is_online'] == 1) {
                      echo '<span class="label label-success">Online</span>';
                    }else if($key['is_online'] == 0) {
                      echo '<span class="label label-danger">Offline</span>';
                    }
                  ?></td>
                  <td><img src="<?= base_url('upload/users/'.$key['foto']) ?>" width="50" alt=""></td>
                  <?php if($user['role_id'] == 2) : ?>
                  <td>
                    <a type="button" href="<?= base_url('admin/users/edit/'.$key['id_users']); ?>" class="btn btn-success <?= $key['is_online'] == 1 ? 'disabled': '' ?>"><i class="fa fa-edit"></i></a>
                    <button type="button" <?= $key['is_online'] == 0 ? 'data-toggle="modal"': '' ?> data-target="#modal-hapus" nilai="<?= $key['id_users'] ?>" class="btn btn-danger <?= $key['is_online'] == 1 ? 'disabled': '' ?> hapus"><i class="fa fa-trash"></i></button>
                    <a type="button" href="<?= base_url('admin/users/reset/'.$key['id_users']); ?>" class="btn btn-info <?= $key['is_online'] == 1 ? 'disabled': '' ?>"><i class="fa fa-unlock-alt"></i></a>
                  </td>
                  <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

  <?php $this->load->view('admin/partial/footer') ?>
</div>
    
  <div class="modal fade" id="modal-hapus">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Apakah kamu yakin ?</h4>
        </div>
        <div class="modal-body">
          <h4>Data yang dihapus tidak dapat dikembalikan</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <a class="btn btn-danger delete">Delete</a>
        </div>
      </div>
    </div>
  </div>
          
    <?php $this->load->view('admin/partial/js') ?>
    <script type="text/javascript">
      const flashdata = $('.flash-data').attr('data');
      if (flashdata) {
        swal({
          type: 'success',
          title: 'Data users',
          text: 'Berhasil '+flashdata
        });
      }

      const error = $('.flash-error').attr('data');
      if (error) {
        swal({
          type: 'error',
          title: 'Data users',
          text: error
        });
      }

      $('.hapus').click(function(){
        kode = $(this).attr('nilai');
        $('.delete').attr('href', '<?= base_url('admin/users/delete/') ?>'+kode);
      });
    </script>
</body>
</html>