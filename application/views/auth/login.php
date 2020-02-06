<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= SITE_NAME .": ".ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/')?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/')?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/')?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/')?>dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets/')?>plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Adam</b>Clothing</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h3 class="login-box-msg">Login</h3>

    <form action="<?= base_url('login') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control <?= form_error('username') ? 'is-invalid':'' ?>" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <div class="invalid-feedback text-danger">                    
            <?php echo form_error('username')?>
	    </div>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" placeholder="Password" name="password" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <div class="invalid-feedback text-danger">
		    <?php echo form_error('password')?>
		</div>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" > Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <?php echo $this->session->flashdata('message'); ?>
    </div>

  </div>
  <!-- /.login-box-body -->
</div>
    <script src="<?= base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('assets/')?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/iCheck/icheck.min.js"></script>
    <script>
    $(function () {
        $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
        });
    });
    </script>
</body>
</html>