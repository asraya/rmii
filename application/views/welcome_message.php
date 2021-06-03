<!DOCTYPE html>
<html lang="en">
	<script src="<?php echo base_url()?>assets/javascript/jquery-3.1.1.min.js"></script>

   <script src="<?php echo base_url()?>assets/javascript/bootstrap.min.js"></script>
   <script src="<?php echo base_url()?>assets/javascript/jquery.easing.min.js"></script>
   <script src="<?php echo base_url()?>assets/javascript/transition.js"></script>
   <script src="<?php echo base_url()?>assets/lightbox2-master/src/js/lightbox.js"></script>
   <script src="<?php echo base_url()?>assets/javascript/scrollreveal.min.js"></script>
   <script src="<?php echo base_url()?>assets/javascript/creative.js"></script>
   <script src="<?php echo base_url()?>assets/javascript/aos.js"></script>

     <script>
		$(function() {
    		$('.nav a').on('click', function(){ 
        		if($('.navbar-toggle').css('display') !='none'){
						$(".navbar-toggle").trigger( "click" );
				}
    			});
		});
		$(document).on('click','.navbar-collapse.in',function(e) {
    if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
        $(this).collapse('hide');
    }
});
	
	</script>
	<script src="<?php echo base_url()?>assets/modal/jquery-loader.js"></script>
	<script src="<?php echo base_url()?>assets/modal/remodal.js"></script>
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable">
    	
    	<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/lightbox2-master/src/css/lightbox.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/modal/remodal.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/modal/remodal-default-theme.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/css/aos.css" rel="stylesheet">
	</head>
	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
	
	 <section class="bgHome" id="bgHome">
	 	
	 	  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	 		<div class="container">
	 			<div class="col-md-12">
	 				<div class="navbar-header"><!--class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"-->
	 				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	 							<span class="icon-bar"></span>
	 							<span class="icon-bar"></span>
	 							<span class="icon-bar"></span>
	 							
	 					</button>
	 						<a class="navbar-brand" href="#bgHome">RMIIA</a>
	 				</div>
	 				<div class="collapse navbar-collapse navbar-right" id="myNavbar">
	 					<ul class="nav navbar-nav">
	 						<li class="active"><a href="#bgHome">Beranda</a></li>
	 						<li><a href="#layanan">Layanan</a></li>
	 						<li><a href="#galeri">Galeri</a></li>
	 						<li><a href="#profil">Profil</a></li>
	 						<li><a href="#menu">Menu</a></li>
	 						<li><a href="#artikel">Berita</a></li>
	 						<li><a href="#kontak">Kontak Kami</a></li>
							 <li><a href="<?php echo base_url('login')?>">Login</a></li>


	 					</ul>
	 					
	 				</div>
	 			</div>
	 		 </div>
	 	  </nav>
	 	  <!--------Slider------------------->
	 	  <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="2500" id="bs-carousel">
  <!-- Overlay -->
  <div class="overlay"></div>
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>
    <li data-target="#bs-carousel" data-slide-to="2"></li>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item slides active">
	<?php $noprof=1; foreach($profil as $profil) { if($noprof==1) { ?>
      <!-- <div class="slide-1"></div>-->
	  <img class="one-third js-fullheight align-self-end order-md-last img-fluid" src="<?php echo base_url('assets/image/'.$profil->image)?>" alt="">
      <div class="hero"> 		  
         <hgroup>
		 <span class="subheading"><?php echo $profil->title ?></span>
		<h1 class="mb-3"><span><?php echo $profil->description ?></h1>
            <!--<h1>We are creative</h1>        
            <h3>Get start your next awesome project</h3>
			 -->
        </hgroup>
		<?php }$noprof++; } ?>
        <button class="btn btn-hero btn-lg" role="button" href="www.facebook.com" >See all features</button>
      </div>
    </div>
	
    <div class="item slides">
      <div class="slide-2"></div>
	  
      	 <div class="hero">
        <hgroup>
            <h1>Halaman kedua</h1>        
            <h3>Get start your next awesome project</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button" href="www.facebook.com" >See all features</button>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-2"></div>
      	 <div class="hero">
        <hgroup>
            <h1>Halaman kedua</h1>        
            <h3>Get start your next awesome project</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button">See all features</button>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-3"></div>
      
    </div>
  </div> 
</div>
	 	  <!--------Slider------------------->
	  </section>
	  <section id="layanan" class="service_lay">
	  <center>
	  		<img src="<?=base_url()?>assets/image/header1.png" class="img-responsive">
	  	</center>
	  	<div class="container">
		  <?php foreach($services as $services) { ?>
	  	<center>
	  		<div class="col-md-4 col-sm-6 col-xs-12">				
				<h2><?php echo $services->title ?></h2>
	  				<img src="<?=base_url()?>assets/icon/food.png" class="img-responsive">	  				
	  				<p style="text-align: justify"><?php echo $services->description ?></p>					  
	  		</div>	  	
			  <?php } ?>
	  	</center>
	  	</div>
	  </section>
	  
	  <section id="galeri" class="galeri_lay">
	  		<center>
	  				<img src="<?=base_url()?>assets/image/header2.png" class="img-responsive" >
	  			</div>
	  			</center>
  			<div class="container">
			  <?php foreach($galeri as $galeri) { ?>
	  			<center>					  
	  			<div class="col-md-4 col-sm-6 col-xs-12 galeri">				  			  
				  <img src="<?php echo base_url('assets/image/food/'.$galeri->image)?>" class="img-thumbnail">
	  			</div>
	  			</center>
				  <?php } ?>
	  	</div>
	  </section>

	  <section id="profil" class="about_lay">	
	  		<center>
	  			<img src="<?=base_url()?>assets/image/header3.png" class="img-responsive">
	  		</center>
			 
	  		<div class="container sec_pad">

	  			<div class="col-md-6 col-sm-12 col-xs-12 kiw">
				  <?php foreach($app2 as $app2) { ?>

	  				<div class="col-md-6 col-sm-6 col-xs-6">
					  <img src="<?php echo base_url('assets/image/food/'.$app2->image)?>" class="img-thumbnail gbr">

	  				</div>	
	  			
					  <?php } ?>
	  			</div>
				  <?php $noapp=1; foreach($app as $app) { if($noapp==1) { ?>
	  			<div class="col-md-6 col-sm-12 col-xs-12 ">
					  
				  <h2><?php echo $app->app_name ?></h2>
				  <?php }$noapp++; } ?>
  					<br>
	  					<p><?php echo $app->description?></p>
	  			</div>
				  
	  		</div>
			  
	  </section>	  
	  <section id="menu" class="menu_lay">
		<div class="container">
			<div class="row">
		         	<div class="col-md-12" style="margin: auto;">
                           <div class="card">
                           <div class="hMenu" style="margin: auto; background: url(assets/image/pattern.jpg); ">
                           		<center><img src="<?=base_url()?>assets/image/header5.png" class="img-responsive"></center>
                           </div>
                            <ul class="nav nav-tabs" role="tablist">
                               <li role="presentation" class="active"><a href="#makanan" aria-controls="home" role="tab" data-toggle="tab">Makanan</a></li>
                               <li role="presentation"><a href="#minuman" aria-controls="profile" role="tab" data-toggle="tab">Minuman</a></li>
                               
                            </ul>
                                    <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="makanan">
								<?php $noapp=1; foreach($menu as $menu1) { if($noapp==1) { ?>
									<?php echo $menu1->title ?>
                                       
									<?php }$noapp++; } ?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="minuman">
                                		
								<?php $noapp=1; foreach($menu as $menu2) { if($noapp==2) { ?>
									<?php echo $menu2->title ?>
                                       
								<?php }$noapp++; } ?>
								</div>                                
                            </div>
						</div>
            	</div>
			</div>
		</div>
	  </section>
	  <section id="artikel" class="artikel_lay">
	  			<center>
	  				<img src="<?=base_url()?>assets/image/header4.png" class="img-responsive" style="margin-bottom: 30px;">
	  			</center>

	  			<div class="container">	  			
				  <?php foreach($artikel as $artikel) { ?>

	  			<div class="col-md-3 col-sm-6 col-xs-12" style="position: relative;">
	  			<div class="container">
	  				
	  				<div class="news_box">
	  					<img src="<?=base_url()?>assets/image/food/discover-19.jpg" class="img-responsive" height="500" width="300">
	  					<h5 style="text-transform: uppercase;font-size: 10px;margin-left: 8px;margin-right: 8px;color: #696969">Created By <?php echo $artikel->post_by ?></h5>
	  					<p style="font-size: 13px; color: #151212; text-transform: uppercase; font-weight: lighter;font-family:Lucida Grande, Lucida Sans Unicode, Lucida Sans, DejaVu Sans, Verdana,' sans-serif';margin-left: 8px;margin-right: 8px;"><?php echo $artikel->artikel_title ?></p>
	  					<p style="margin-left: 8px;margin-right: 8px;color: #47484C; font-family:Segoe, Segoe UI, DejaVu Sans, Trebuchet MS, Verdana,' sans-serif'; text-align: justify; letter-spacing: 1px;font-size: 13px;"><?php echo $artikel->artikel_content ?></p>
	  					<a href="detail" data-remodal-target="modal" style="text-decoration: none;">Klick More</a>
	  				</div>	
	  				<div class="remodal" data-remodal-id="modal">
  						<a data-remodal-action="close" class="remodal-close"></a>
  						<h2><?php echo $artikel->category ?></h2>

  						
  						<a data-remodal-action="confirm" class="remodal-confirm" href="#">OK</a>
					</div>
	  			</div>
	  			</div>
				  <?php } ?>
				  
	  			</div>
	  </section>	 
 	 <section id="kontak" class="kami">
  			
  			<div class="container">
  			<center>
  				<img src="<?=base_url()?>assets/image/header7.png" class="img-responsive" style="margin-bottom: 20px;">
  				
  			</center>
  			<div class="col-md-6">
	  			
                  <div class="text-center"><h3 style="font-family: 'asoy'; color:#FFFFFF; font-weight:bold">
                  	Form Kritik & Saran
                  </h3></div>
                  <form action="" role="form" class="contactForm">
                   <div class="form-group">
                       <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                       <div class="validation"></div>
                   </div>
                   <div class="form-group">
                       <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                       <div class="validation"></div>
                   </div>
                   <div class="form-group">
                       <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                       <div class="validation"></div>
                   </div>
                   <div class="form-group">
                       <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                       <div class="validation"></div>
                   </div>
                            
                       <div class="text-center"><button type="submit" class="btn btn-primary btn-lg">Send Message</button></div>
					   
             	</form>			
	  		</div>
	  		<div class="col-md-6" style="padding-top: 40px; padding-left: 30px; ">
	  			
	  				<div class="location">
	  				<center>
	  				<img src="<?=base_url()?>assets/image/location.png"  height="80" width="50" style="margin-right: 10px;float: left;" class="img-responsive"></center>

                                       
	  				<p style="font-family:'asoy'; color: #fff; text-align: justify; font-size: 18px; line-height: 25px; font-size-adjust: auto;" > <?php echo $site->alamat ?></p>
	  				</div>
	  				<div class="location">
	  					
	  					<center><img src="<?=base_url()?>assets/image/phone.png"  height="90" width="50" style="margin-right: 5px;float: left;" class="img-responsive"></center>
	  					<p style="font-family:'asoy'; color: #fff; text-align: justify; font-size: 18px; line-height: 25px; font-size-adjust: auto;" ><?php echo $site->hp ?></p>
	  					
	  					
	  				</div>
	  				<div class="l">
	  					<center><img src="<?=base_url()?>assets/image/mail.png"  height="90" width="45" style="margin-right: 15px;float: left;" class="img-responsive"></center>
	  					<p style="font-family:'asoy'; color: #fff; text-align: justify; font-size: 18px; line-height: 25px; font-size-adjust: auto;" ><?php echo $site->email ?></p>
	  					
	  					
	  				</div>
	  			

	  		</div>
	  		</div>
	  	
	  	
	  </section>
		<!---------------------FOOTER-------------->
		<link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

<!--footer start from here-->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6 footer-col">
        <div class="logofooter"> Logo</div>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
        <p><i class="fa fa-map-pin"></i> #228, Tiruvannamalai, Tamilnadu, India</p>
        <p><i class="fa fa-phone"></i> Phone (India) : +91 9999 999 999</p>
        <p><i class="fa fa-envelope"></i> E-mail : info@prabuuideveloper.com</p>
        
      </div>
      <div class="col-md-3 col-sm-6 footer-col">
        <h6 class="heading7">GENERAL LINKS</h6>
        <ul class="footer-ul">
          <li><a href="#bgHome"> Beranda</a></li>
          <li><a href="#"> Layanan</a></li>
          <li><a href="#"> Galeri</a></li>
          <li><a href="#"> Profil</a></li>
          <li><a href="#"> Menu</a></li>
          <li><a href="#"> Artikel</a></li>
          <li><a href="#"> Kontak Kami</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 footer-col">
        <h6 class="heading7">LATEST POST</h6>
        <div class="post">
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 footer-col">
        <h6 class="heading7">Social Media</h6>
        <ul class="footer-social">
          <li><i class="fa fa-linkedin social-icon linked-in" aria-hidden="true"></i></li>
          <li><i class="fa fa-facebook social-icon facebook" aria-hidden="true"></i></li>
          <li><i class="fa fa-twitter social-icon twitter" aria-hidden="true"></i></li>
          <li><i class="fa fa-google-plus social-icon google" aria-hidden="true"></i></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!--footer start from here-->

<div class="copyright">
  <div class="container">
    <div class="col-md-12 col-xs-12">
     <center> <p>© 2017 - Develop by robbyazizmaulana@gmail.com</p></center>
    </div>
    
</div>	   
	</body>
</html>
