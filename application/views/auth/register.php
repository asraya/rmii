<!DOCTYPE html>
<html lang="en">
<head>
  <title>Openid</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/login/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/login/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/login/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <!-- <img src="<?php echo base_url()?>assets/imagein/login/images/img-01.png" alt="IMG"> -->
          <img src="<?php echo base_url()?>assets/image/play-video.png" alt="play-video">
        </div>
        <form class="login100-form validate-form" id="formLogin" method="post" enctype='multipart/form-data' action="<?= base_url('masuk/register'); ?>">
          <div id="msgERROR" align="center"></div>
            <?= $this->session->flashdata('message'); ?>
          <span class="login100-form-title" style="color: #000165;">
            <img src="<?php echo base_url('assets/image/dunlop.png')?>" style="width: 50%;">
            <br>
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Nama diperlukan : Ade Londok">
            <input class="input100" type="text" id="fullname" name="fullname" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('fullname'); ?>">
                <?= form_error('fullname', '<small class="text-danger pl-3">','</small>'); ?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>


          <div class="wrap-input100 validate-input" data-validate = "Email valid diperlukan: ex@abc.xyz">
            <input class="input100" type="text" id="email" name="email" class="form-control" placeholder="Email address" 
                value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password diperlukan">
            <input class="input100" type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
            <?= form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password diperlukan">
            <input class="input100" type="password" id="inputConfirmPassword" name="confirmpassword" class="form-control" placeholder="Konfirmasi Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <!-- <div class="wrap-input100 validate-input" data-validate = "CV diperlukan">
            <label>Upload CV</label>
            <input type="file" id="file_cv" name="file_cv" placeholder="File">
            <br>
            <small>Format File : <i class="text-danger">pdf, docx, doc</i></small>
            <br>
            <small>Ukuran File : <i class="text-danger">5mb</i></small>
          </div> -->
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
              Register
            </button>
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">
              Sudah Punya akun?
            </span>
            <a class="txt2" href="<?php echo base_url('masuk')?>">
              Login
            </a>
          </div>

          <!-- <div class="text-center p-t-136">
            <a class="txt2" href="<?php echo base_url();?>masuk/register">
              Register
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div> -->
        </form>
      </div>
    </div>
  </div>
  
  

  
<!--===============================================================================================-->  
  <script src="<?php echo base_url()?>assets/login/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url()?>assets/login/login/vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url()?>assets/login/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url()?>assets/login/login/vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="<?php echo base_url()?>assets/login/login/js/main.js"></script>
  <script src="<?php echo base_url()?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
 
<script type="text/javascript">

$(document).ready(function(){

    $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,  
    });

});
    


</script>

</body>
</html>