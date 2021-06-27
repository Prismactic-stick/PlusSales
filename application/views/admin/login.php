<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Plus sale</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- base_url() = http://localhost/ventas_ci/-->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
          </div>
            <center><h2>PLUS SALES</h2>
              <img src="<?php echo base_url()?>assets/template/dist/img/logo.png" width="165" height="165" class="user-image" alt="User Image"></center>     
        
        <div class="login-box-body">

            <p class="login-box-msg"><big>Introduzca sus datos de ingreso</big></p>
            <?php if($this->session->flashdata("error")):?>
              <div class="alert alert-danger">
                <p><?php echo $this->session->flashdata("error")?></p>
              </div>
            <?php endif; ?>
            <form action="<?php echo base_url();?>auth/login" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Usuario" name="username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">

                <!-- REcaptcha -->
               
                <div class="g-recaptcha" data-sitekey="6LcmtTobAAAAAP91onkBZiUJlyG59VRPh-z3tUQr"></div>
                <div class="row">

                    <div class="col-xs-12">
                    <a class="btn btn-primary btn-block btn-flat" href="https://accounts.google.com/o/oauth2/auth?response_type=code&amp;access_type=online&amp;client_id=1065284463756-7s7iujvlj4d66fslequgc50k4s97nfop.apps.googleusercontent.com&amp;redirect_uri=http://localhost:82/plusale/Auth/Glogin&amp;state&amp;scope=email%20profile&amp;approval_prompt=auto">Iniciar sesión con Google</a>

                    
                        <button type="submit" class="btn btn-primary btn-block btn-flat"><big>Entrar</big></button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
