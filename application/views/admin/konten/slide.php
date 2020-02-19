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
          <table id="dtHorizontalVerticalExample" width="100%" cellspacing="0" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Induk</th>
                <th>Nama Santri</th>
                <th>Kelas</th>
                <th width="15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <a type="button" href="<?= base_url('santri/edit/'); ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <button type="button" data-toggle="modal" data-target="#modal-hapus" nilai="" class="btn btn-danger hapus"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
            </tbody>
          </table>
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
          <h4 class="modal-title">Tambah Slide</h4>
        </div>
        <div class="modal-body">
            <form action="<?= base_url('admin/konten/addslide') ?>" method="post"></form>
                <div class="form-group">
                    <label class="control-label text-left">Slide</label>
                    <input class="form-control" type="file" id="exampleInputFile" name="foto" accept=".jpg, .jpeg, .png">
                    <span class="help-block text-red"></span>
                </div>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
      </div>
    </div>
  </div>
          
    <?php $this->load->view('admin/partial/js') ?>
</body>
</html>