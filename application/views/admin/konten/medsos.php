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
          <button type="button" data-toggle="modal" data-target="#modal-add" nilai="" class="btn btn-primary hapus"><i class="fa fa-plus"></i>&nbsp;Tambah Baru</button>
          <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="">
            <div class="row">
                <?php $no=1; ?>
                <?php foreach ($medsos as $key) { ?>
                    <div class="col-md-6">
                        <form method="post" action="<?= base_url('admin/konten/editmedsos/'.$key['id_konten']) ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label text-left">Nama Akun</label>
                                <input type="text" class="form-control" name="nama_konten" value="<?= $key['nama_konten'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label text-left">Ikon</label>
                                <input type="text" class="form-control" name="icon" value="<?= $key['icon'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label text-left">Link</label>
                                <input type="text" class="form-control" name="link" value="<?= $key['link'] ?>" required>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-success">Edit</button>
                                    <a href="<?= base_url('admin/konten/deletemedsos/'.$key['id_konten']) ?>" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </form><hr>
                    </div>
                <?php } ?>
            </div>
        </div>
      </div>
    </section>
  </div>

  <?php $this->load->view('admin/partial/footer') ?>
</div>
    
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Medsos</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="<?= base_url('admin/konten/medsos') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label text-left">Nama Akun</label>
                    <input type="text" class="form-control" name="nama_konten" required>
                </div>
                <div class="form-group">
                    <label class="control-label text-left">Ikon</label>
                    <input type="text" class="form-control" name="icon" required>
                </div>
                <div class="form-group">
                    <label class="control-label text-left">Link</label>
                    <input type="text" class="form-control" name="link" required>
                </div>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
      </div>
    </div>
  </div>
          
    <?php $this->load->view('admin/partial/js') ?>

    <script>
        const flashdata = $('.flash-data').attr('data');
        if (flashdata) {
            swal({
            type: 'success',
            title: 'Data Medsos',
            text: flashdata
            });
        }

        const error = $('.flash-error').attr('data');
        if (error) {
            swal({
            type: 'error',
            title: 'Data Medsos',
            text: error
            });
        }
    </script>

</body>
</html>