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
          <form class="form-horizontal" id="pass_form">
          <?php 

        		 //$attributes = array('class' => 'form-horizontal', 'role' => 'form','id' => 'pass_form');
        		 
        		   //echo form_open('VerifyLogin/forgot_password',$attributes); ?>
                        
            <fieldset>
                <div class="form-group">
                
                <div style="display: none;" class="alert alert-danger pass_error"></div>
                <?php 
              	//echo form_error('email', '<div class="alert alert-danger">', '</div>'); 
                  #	echo form_error('password', '<div class="alert alert-danger">', '</div>'); 	
                  	
                  ?>
                <input id="pass_hash" type="hidden" name="hash" value="<?php echo $this->uri->segment(2);?>"/>             	  
                <input autocomplete="off" type="password" name="password" class="col-md-8 new_password" placeholder="Enter New Password"/>	   
                <input autocomplete="off" type="password" class="col-md-8 confirm_password" placeholder="Re-enter Password"/>
                
                
                <span class="pass_note col-md-8" style="color: #ccc; font-size: 12px; font-weight: normal; margin: 0 auto; display: none; width: 100%; padding-left: 0px;">Note: Password must be at least 6 characters long and must contain at least 1 uppercase letter, 1 lowercase letter and 1 number</span>
              <div class="submit-button">
                <input type="submit" name="login" class="login loginmodal-submit" value="Change Password">
              </div>
              </div>
            </form>
              <div class="se-pre-con" style="display: none;"></div>
            
          
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
$(function(){
    $('input[type=password]').focusout(function(){
        $('.pass_note').slideUp();
    }); 
    
    $('input[type=password]').focusin(function(){
        $('.pass_note').slideDown();
    });   
});
    $('#pass_form').submit(function(e){
        e.preventDefault();
      var formData = new FormData();
      if($('.new_password').val() != "" || $('.confirm_password').val() !== ""){
    		if($('.new_password').val() == $('.confirm_password').val()){
    			formData.append('password', $('.new_password').val());
    		}else{
    			formData.append('password','not_matched');
    		}
    	} else {
    	   formData.append('password', "");
    	}
        
        formData.append('hash', $('#pass_hash').val());
     $.ajax({
        url: '<?php echo site_url();?>Home_child/set_pass',
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend:function()
          {
            $(".se-pre-con").fadeIn("slow");
          },
          processData: false,
          contentType: false,
          success: function (data) {
			  var canChange = true;
               var data_msg=$.parseJSON(data);
			   var canChange=true;
			  
            $.each( data_msg.Error_Mess, function( key, value )
            {
				
                if(key != "error_count"){
                    $(".pass_error").fadeIn();
                  $(".pass_error").html(value);
                  
                  $('html, body').animate({
                            scrollTop: $(".pass_error").offset().top
                        }, 1000);
              }
              //$("[name='"+key+"[]']").next('label').html(value);
				canChange = false;
			});
			
			
            
             
            $(".se-pre-con").fadeOut("slow");
			if(canChange == true){
                $(".pass_error").fadeOut();                
                // swal("Success","Password changed", "success",function(){
					// location.href="<?php echo base_url().'sign-in';?>"
				// });
				
				
				swal({
					title: "Success",
					text: "Password changed",
					type: "success",
					showCancelButton: false,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Ok",
					closeOnConfirm: true
					},
					function(){
						location.href="<?php echo base_url().'sign-in';?>";
				});
				
				
				$('html,body').animate({
				scrollTop: 0
				}, 700);
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            $(".se-pre-con").fadeOut("slow");
            alert('Error adding / update data');
          }
        });
    
    });
</script>
<!---End main Wrapper-->