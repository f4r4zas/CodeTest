<?php
	if(empty($background_image)){
//		$background_image = "";
	}

?>
<body id="sign-in" class="main-content inner" >
<div class="main-wrapper" style="background-image:url(<?php echo base_url().'assets/images/'.$sign_in_background;?>)">
<div class="talent">
<div class="container">
<div class="row">
<div class="wow wow fadeInUp login-section">
<div class="loginmodal-container">
<div class="form-logo"> <img src="<?=base_url()?>assets/images/form-logo.png" alt=""/> </div>
<?php 
        		 $attributes = array('class' => 'form-horizontal', 'role' => 'form');
        		 
        		   echo form_open('VerifyLogin',$attributes); ?>
<fieldset>
<div class="form-group">
  <?php 
              	echo form_error('username', '<div class="alert alert-danger">', '</div>'); 
              	echo form_error('password', '<div class="alert alert-danger">', '</div>'); 	
              	
              ?>
  <?php echo form_hidden('Loginfrom', '-1'); ?> 
  <!-- OLD .. 7/9/2016 <input type="text" name="user" placeholder="Username">
              <input type="password" name="pass" placeholder="Password">  --> 
  <!-- New -->
  <input type="text" name="username" placeholder="Email">
  <input type="password" name="password" placeholder="Password">
  <a style="color: #518ed2;" class="forgot-password" href="<?php echo site_url();?>forget-password">Forgot Password?</a>
  <div class="submit-button">
    <input type="submit" name="login" class="login loginmodal-submit" value="Login">
  </div>
  </form>
  <div class="login-help"> <a style="color: #518ed2;" href="<?php echo site_url();?>sign-up">Don't have an account? Register</a> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!---End main Wrapper-->