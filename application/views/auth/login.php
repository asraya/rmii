<!DOCTYPE html>
<html lang="en">
<head>
  <title>Openind</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/login/login/images/icons/favicon.ico"/>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/login/vendor/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/login/vendor/animate/animate.css">
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/login/vendor/css-hamburgers/hamburgers.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/login/vendor/select2/select2.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/login/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/login/css/main.css">

</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="<?php echo base_url()?>assets/login/login/images/img-01.png" alt="IMG">
          <!-- <img src="<?php echo base_url()?>assets/images/play-video.png" alt="play-video"> -->
          
        </div>

        <form class="login100-form validate-form" id="formLogin" method="post" action="<?= base_url('login') ?>">
          <div id="msgERROR" align="center"></div>
            <?= $this->session->flashdata('message'); ?>
          <span class="login100-form-title" style="color: #000165;">
						<h1>Login</h1>
            <br>
            
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" id="email" name="email" class="form-control" placeholder="Email address" 
                value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
            <?= form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
              Login
            </button>
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">
              Lupa
            </span>
            <a class="txt2" href="<?php echo base_url('login/forgot_pass')?>">
              Password?
            </a>
          </div>

          <div class="text-center">
            <a class="txt2" href="<?php echo base_url();?>login/register">
              Register
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  

  
  <script src="<?php echo base_url()?>assets/login/login/vendor/jquery/jquery-3.2.1.min.js"></script>

  <script src="<?php echo base_url()?>assets/login/login/vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="<?php echo base_url()?>assets/login/login/vendor/select2/select2.min.js"></script>

  <script src="<?php echo base_url()?>assets/login/login/vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>

  <script src="<?php echo base_url()?>assets/login/login/js/main.js"></script>

</body>
</html>
