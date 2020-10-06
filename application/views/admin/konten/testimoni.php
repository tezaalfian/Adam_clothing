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
                <?php foreach ($testimoni as $key) { ?>
                    <div class="col-md-4">
                        <form method="post" action="<?= base_url('admin/testimoni/edit/'.$key['id_testimoni']) ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label text-left">Testimoni <?= $no++; ?></label>
                                <img src="<?= base_url('upload/testimoni/'.$key['foto']) ?>" alt="testimoni 1" width="100%">
                                <input class="form-control" type="file" id="exampleInputFile" name="foto" accept=".jpg, .jpeg, .png" required>
                                <input type="hidden" name="old_foto" value="<?= $key['foto'] ?>">
                                <span class="help-block text-red"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-success">Edit</button>
                                    <a href="<?= base_url('admin/testimoni/delete/'.$key['id_testimoni']) ?>" class="btn btn-danger">Hapus</a>
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
          <h4 class="modal-title">Tambah Testimoni</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="<?= base_url('admin/testimoni/add') ?>" enctype="multipart/form-data">
                <input type="hidden" name="valid" value="true">
                <div class="form-group">
                    <label class="control-label text-left">Testimoni</label>
                    <input class="form-control" type="file" id="exampleInputFile" name="foto" accept=".jpg, .jpeg, .png" required>
                    <span class="help-block text-red"></span>
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
            title: 'Data testimoni',
            text: flashdata
            });
        }

        const error = $('.flash-error').attr('data');
        if (error) {
            swal({
            type: 'error',
            title: 'Data testimoni',
            text: error
            });
        }
    </script>
</body>
</html>