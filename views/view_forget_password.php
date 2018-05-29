<body id="sign-in" class="main-content inner">
<div class="main-wrapper">
  <div class="talent">
    <div class="container">
      <div class="row">
        <div class="wow bounceInUp login-section">
          <div class="loginmodal-container">
            <div class="form-logo"> <img src="<?=base_url()?>assets/images/form-logo.png" alt=""/> </div>
            <?php if(!empty($notify)){?>
          <div class="alert alert-info" role="alert">
          <p><?php echo @$notify;?></p>
          </div>
          <?php }?>
          <?php 

        		 $attributes = array('class' => 'form-horizontal', 'role' => 'form');
        		 
        		   echo form_open('VerifyLogin/forgot_password',$attributes); ?>
                        
            <fieldset>
                <div class="form-group">
              <?php 
              	echo form_error('email', '<div class="alert alert-danger">', '</div>'); 
              #	echo form_error('password', '<div class="alert alert-danger">', '</div>'); 	
              	
              ?>
             <?php echo form_hidden('Loginfrom', '-1'); ?>
              <!-- OLD .. 7/9/2016 <input type="text" name="user" placeholder="email">
              <input type="password" name="pass" placeholder="Password">  -->
            <!-- New -->
              <input type="text" name="email" id='email' placeholder="Email Address">
              <div class="submit-button">
                <input type="submit" name="login" class="login loginmodal-submit" value="Forgot Password">
              </div>
            </form>
              <div class="se-pre-con" style="display: none;"></div>
            <div class="login-help"> <a href="<?php echo site_url();?>sign-up">Don't have an account? Register</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
    /*  var formData = new FormData();
      formData.append('email',$('#email').val());
     $.ajax({
        url: '<?php echo site_url();?>VerifyLogin/forgot_password',
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function( xhr ) {
           $('.se-pre-con').fadeIn();
           $('.lbl').fadeOut();
        },
        success: function (data) {
          $('.lbl').fadeIn();
          $('.se-pre-con').fadeOut();
            var data_msg=$.parseJSON(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
        }
    });*/
</script>
<!---End main Wrapper-->