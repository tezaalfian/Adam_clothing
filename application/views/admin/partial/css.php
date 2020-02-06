<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title><?= SITE_NAME .": ".ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="icon" href="<?= base_url('assets/img/tahfizh.png') ?>">
<link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- Theme style -->

<link rel="stylesheet" href="<?= base_url('assets/dist/css/skins/skin-blue.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
<!-- <link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/datatables.min.css') ?>"> -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/select2/dist/css/select2.min.css') ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<link rel="stylesheet" href="<?= base_url('assets/dist/css/sweetalert.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?= base_url('assets/dist/css/AdminLTE.min.css') ?>">
  <!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<style type="text/css">
	/*.cover {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

    .cover2 {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 100%;
    }*/

    .dtHorizontalVerticalExampleWrapper {
      max-width: 600px;
      margin: 0 auto;
      }
      #dtHorizontalVerticalExample th, td {
      white-space: nowrap;
      }
      table.dataTable thead .sorting:after,
      table.dataTable thead .sorting:before,
      table.dataTable thead .sorting_asc:after,
      table.dataTable thead .sorting_asc:before,
      table.dataTable thead .sorting_asc_disabled:after,
      table.dataTable thead .sorting_asc_disabled:before,
      table.dataTable thead .sorting_desc:after,
      table.dataTable thead .sorting_desc:before,
      table.dataTable thead .sorting_desc_disabled:after,
      table.dataTable thead .sorting_desc_disabled:before {
      bottom: .5em;
    }

    .display-input {
      display: none;
    }
</style>