<!doctype html>
<html lang="en">
<head>
<title><?php echo (isset($pageTitle) && $pageTitle != "")? $pageTitle : "AmazeTal";?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo (isset($pageDesc) && !empty($pageDesc))? $pageDesc : "AmazeTal";?>">
<?php if(isset($noIndex) && $noIndex == '1' && isset($noFollow) && $noFollow == '1'){ ?>
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW"/>
<?php } elseif(isset($noIndex) && $noIndex == '1' && isset($noFollow) && $noFollow == '0'){ ?>
<meta name="ROBOTS" content="NOINDEX, FOLLOW"/>
<?php } elseif(isset($noIndex) && $noIndex == '0' && isset($noFollow) && $noFollow == '1'){ ?>
<meta name="ROBOTS" content="INDEX, NOFOLLOW"/>
<?php } else{ ?>
<?php } ?>
<meta name="robots" content="noydir" />
<meta name="robots" content="noodp" />
<link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/ico">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mootools/1.4.5/mootools-core-full-compat-yc.js"></script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/bootstrapTheme.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/custom.css?v=<?php echo time();?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css?v=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/font/font.css">
<link href="<?php echo base_url();?>assets/css/my-responsive.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/adeel-css.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/zeeshan-css.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/mu-responsive.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/blstyle.css" rel="stylesheet">

<meta charset="ISO-8859-1">
<!-- Owl Carousel Assets -->
<link href="<?php echo base_url();?>assets/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/owl.theme.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/js/counters.js" ></script>
<script src="https://use.fontawesome.com/271d277d47.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/owl.carousel.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
<script src="<?php echo base_url();?>assets/js/jssor_slider.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.mask.min.js"></script>

<!--for error showin -->
 <script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert.css"/>


<link rel="stylesheet" href="<?php echo base_url();?>assets/css/functional.css">
<script src="<?php echo base_url();?>assets/js/flowplayer.min.js"></script>

<script src="https://use.typekit.net/ftk4oni.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>


<style>
   .fp-brand{
    display:none;
   }   
   </style>

<script>
  (function(d) {
    var config = {
      kitId: 'ftk4oni',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<style>
#owl-demo .item img {
	display: block;
	width: 100%;
	height: auto;
}
</style>
<script>
        $(document).ready(function (){
            $('video').bind('contextmenu',function() { return false; });
          
            $("#click").click(function (){
                $('html, body').animate({
                    scrollTop: $(".nav-tabs").offset().top
                }, 900);
            });
        });
    </script>
    
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5915fd574ac4446b24a6ebf9/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    </head>


<?php # born to delete
// echo $this->session->flashdata('notification');
if(isset($_GET['verify'])){
 if($_GET['verify']==='true')
 {
   ?>
   <p class="verified alert alert-success" role="alert">Your account is verified.</p>
   <!--<p class="verified">Your account is verified. You can now login to your account</p>-->
   <?php
 }elseif($_GET['verify']==='false')
 {
   ?>
   <p class="verified alert alert-danger" role="alert">Your verification link is expired. kindly follow updated link in your email or <a href="<?php echo base_url();?>contact">contact</a> our support.</p>
   <!--<p class="not-verified">Your verification link is expired. Kindly follow updated link or contact our support.</p>-->
   <?php
 }
}

if(isset($_GET['unsubscribe'])){
 if($_GET['unsubscribe']==='yes')
 {
   ?>
   <p class="verified alert alert-success" role="alert">Your email is removed from subscription list.</p>
   
   <?php
 }elseif($_GET['unsubscribe']==='no')
 {
   ?>
   <p class="verified alert alert-danger" role="alert">Your unsubscribe link is not valid. kindly follow link in your email or <a href="<?php echo base_url();?>contact">contact</a> our support.</p>
   <!--<p class="not-verified">Your verification link is expired. Kindly follow updated link or contact our support.</p>-->
   <?php
 }
}


?>
<header>
		
  <nav class="navbar">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/logo.png" alt=""/></a> </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav main-menu">
          <li class=""><a href="<?php echo base_url().'how_it_works'?>">How it Works</a></li>
          <li class=""><a href="<?php echo base_url();?>about">About Us</a></li>
          <li><a class="dropdown-toggle" href="<?php echo base_url();?>blog">Blog</a> </li>
          <li><a href="<?php echo base_url();?>help-center">Help Center</a></li>
          <?php if(isset($user_info->role) && !empty($user_info->role)){?>
          <li><a href="<?php echo base_url().'contact';?>">Contact Us</a></li>
          <?php } else { ?>
          <li><a href="<?php echo base_url().'foremployer';?>">For Employers</a></li>
          <?php } ?>
        </ul>
		<?php 

		// echo "<pre>";
			// print_r($user_info);
		// echo "</pre>";
		 
		// echo '<pre>
	// ';
		// print_r($user_info->role);
		// echo '<pre>';
		// exit();
		
		
			/*if(@$user_info->role == '2' || @$user_info->role == '1'){
				redirect("/Amazetal_Admin");
			}*/
		
		
		if(@$user_info->role != '1' && @$user_info->role != "2" && !empty($user_info->role)){
		  if(@$user_info->role == "employer"){
		?>
        <ul class="nav navbar-nav navbar-right">
          <li class="<?php if($this->uri->segment(1)=="sign-in"){echo "active ";}?>sign-up"><a data-toggle="tooltip" title="Login" href="<?php echo base_url('employer/dashboard');?>">Dashboard</a></li>
          <li class="<?php if($this->uri->segment(1)=="sign-up"){echo "active ";}?>log-in"><a data-toggle="tooltip" title="Register" href="<?php echo site_url();?>logout">Logout</a></li>
        </ul>
		<?php } else{ ?> 
        <ul class="nav navbar-nav navbar-right">
          <li class="<?php if($this->uri->segment(1)=="sign-in"){echo "active ";}?>sign-up"><a data-toggle="tooltip" title="Login" href="<?php echo site_url();?>Dashboard">Dashboard</a></li>
          <li class="<?php if($this->uri->segment(1)=="sign-up"){echo "active ";}?>log-in"><a data-toggle="tooltip" title="Register" href="<?php echo site_url();?>logout">Logout</a></li>
        </ul>
        
        <?php } }
        elseif(@$user_info->role == '1' || @$user_info->role == "2"){ ?>
        <ul class="nav navbar-nav navbar-right">
            <li class="<?php if($this->uri->segment(1)=="sign-in"){echo "active ";}?>sign-up"><a data-toggle="tooltip" title="Login" href="<?php echo site_url();?>Amazetal_Admin">Dashboard</a></li>
          <li class="<?php if($this->uri->segment(1)=="sign-up"){echo "active ";}?>log-in"><a data-toggle="tooltip" title="Register" href="<?php echo site_url();?>logout">Logout</a></li>
        </ul>
        <?php } else { ?>
		<ul class="nav navbar-nav navbar-right">
			<li class="<?php if($this->uri->segment(1)=="sign-in"){echo "active ";}?>sign-up"><a data-toggle="tooltip" title="Login" href="<?php echo site_url();?>sign-in">Sign in</a></li>
			<li class="<?php if($this->uri->segment(1)=="sign-up"){echo "active ";}?>log-in"><a data-toggle="tooltip" title="Register" href="<?php echo site_url();?>sign-up">Sign up</a></li>
        </ul>
		<?php } ?>
      </div>
    </div>
  </nav>
</header>