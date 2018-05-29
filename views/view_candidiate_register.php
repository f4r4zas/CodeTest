<?php
$data = array();
if(!empty($db_table)){
  foreach($db_table[0] as $key => $row){
    $data[$key] = $row;
  }
}


?>
<body id="candidiates-register" class="main-content inner">
<?php # born to delete
/*if(isset($_GET['verify'])){
  if($_GET['verify']==='true')
  {
    ?>
    <p class="verified">You account is verified. You can now login to your account</p>
    <?php
  }
}
echo $this->session->flashdata('notification');*/


?>
<div class="main-wrapper">
  <div class="talent">
    <div class="container"> 
      <!--      <h1>Bragging about Company tie ups,<br>--> 
      <!--        how it works to the left</h1>-->
      <h1 id="main_title"><?php echo $data['main_title']?></h1>
      <!--      <p>Companies apply to you, not the other way around. You may hide your info from current and former employers.<br>--> 
      <!--        It's free for candidates, plus you get a $1000 hiring bonus!</p>-->
      <p id="main_desc"><?php echo $data['main_text']?></p>
      <div class="wow fadeInUp row">
        <div id="exTab1">
          <ul  class="nav nav-pills">
            <li class="active user"> <a  href="#1a" data-toggle="tab">For Candidates</a> </li>
            <li class="flow"><a href="#2a" data-toggle="tab">For Employers</a> </li>
            <li class="thrice"><a href="#3a" data-toggle="tab">For Career Experts</a> </li>
          </ul>
          <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">
              <h3>Candidate Profile</h3>
              <p style="display: none;" class="alert alert-danger" role="alert"></p>
              <form class="form-horizontal" id="form">
                <fieldset>
                  
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="canfullname">Full Name*</label>
                      <input id="canfullname" name="canfullname" type="text" placeholder="First and Last Name" class="form-control input-md alphaonly stoppaste" >
                      <label class="lbl"></label>
                    </div>
                  </div>
                  
                  <!-- Text input-->
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="Email">Email Address*</label>
                      <input id="Email" name="Email" type="text" placeholder="Your Email" class="form-control input-md" >
                      <label class="lbl"></label>
                    </div>
                  </div>
                  
                  <!-- Password input-->
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="password">Password*</label>
                      <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" >
                      <label class="lbl"></label>
                      <!--<sub><span class="pass_note" style="display: none;">Note: Password must be at least 6 characters and contain at least 1 uppercase letter 1 lowercase letter and 1 number</span></sub>-->
                      <span class="pass_note col-md-8" style="color: #ccc; font-size: 12px; font-weight: normal; margin: 0 auto; display: none; width: 100%; padding-left: 0px;">Note: Password must be at least 6 characters long and must contain at least 1 uppercase letter, 1 lowercase letter and 1 number</span>
                    </div>
                  </div>
                  
                  <!-- Text input--> 
                  <!-- Password input-->
                 <?php /*  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="confirm">Confirm Password*</label>
                      <input id="confirm" name="confirm" type="password" placeholder="Confirm Password" class="form-control input-md" >
                      <label class="lbl"></label>
                    </div>
                  </div> */ ?>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="textinput">Phone*</label>
                      <input id="phone" name="phone" type="text" placeholder="Your Phone Number" class="form-control input-md phone_us" >
                      <label class="lbl"></label>
                    </div>
                  </div>
                  
                  <!-- Text input-->
                  <div class="form-group">
                    <div class="col-md-12 getlocation">
                      <label class="control-label" for="textinput">Current Location*</label>
                      <input name="search_location" id="search_location" data-role="For_Candidates" type="text" placeholder="City, State, Country" class="form-control input-md"  autocomplete="on" runat="server">
                      <label class="lbl"></label>
                    </div>
                  </div>
                  
                  <!-- Select Basic -->
                <?php /* 
				  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="timezone">Time Zone*</label>
                      <select id="timezone" name="timezone" class="my-timezone form-control">
                        <option value="">Select your Time Zone</option>
                        <?php 
// print_r($time_zone)
if(!empty($time_zone)){
foreach($time_zone as $key => $vall){
?>
                        <option value="<?php echo $key; ?>"><?php echo $vall ?></option>
                        <?php }
}?>
                      </select>
                      <label class="lbl"></label>
                    </div>
                  </div>
                  
				  */?>
                  
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="how_did_you_hear_about_us">How did you hear about us?</label>
                      <select id="how_did_you_hear_about_us" name="how_did_you_hear_about_us" class="form-control">
                        <option value="Facebook">Facebook</option>
                        <option value="Linkedin">Linkedin</option>
                        <option value="Google">Google</option>
                        <option value="Job posting">Job posting</option>
                        <option value="Email">Email</option>
                        <option value="Other">Other</option>
                      </select>
                      <label class="lbl"></label>
                   </div>
                  </div>
				
                
                <div class="form-group">
                    <div class="col-md-12">
                      <label>
                      <input type="checkbox" name="newsletter_question" id="newsletter_question" checked="checked" value=""/>
                      Subscribe for blog
                      <label class="lbl"></label>
                      </label>
                    </div>
                  </div>
                  <!-- Button -->
                  <div class="form-group myterms">
                    <div class="col-md-12">
                      <label>
                      <input type="checkbox" name="coupon_question" id="coupon_question" value=""/>
                      By signing up you agree to AmazeTal's <a target="_blank" href="<?php echo base_url("/terms-condition");?>">Terms and Services</a> and <a target="_blank" href="<?php echo base_url("/privacy");?>">Privacy Policy</a>
                      <label class="lbl"></label>
                      </label>
                      <div class="submit-button">
                        <button id="singlebutton" type="submit" name="singlebutton" class="btn btn-info singlebutton">Get started</button>
                      </div>
                    </div>
                  </div>
                  <!-- Success Notification-->
                  <div class="form-group success">
                    <div class="col-md-12">
                      <p></p>
                    </div>
                  </div>
                  <p class="login-text">Already have an account? <a href="<?php echo site_url();?>sign-in">Login</a></p>
                </fieldset>
              </form>
            </div>
            <div class="tab-pane" id="2a">
              <h3>Employer Profile</h3>
              <p style="display: none;" class="alert alert-danger" role="alert"></p>
              <form class="form-horizontal" id="form_2">
                <fieldset>
                  
                  <!-- Text input-->
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="textinput">Corporate Email Address*</label>
                      <input id="Email2" name="Email" placeholder="Your Work Email" class="form-control input-md"  type="text">
                      <label class="lbl"></label>
                    </div>
                  </div>
                <?php /*   <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="textinput">Confirm Corporate Email Address*</label>
                      <input id="confirmemail" name="confirmemail" placeholder="Retype company email" class="form-control input-md"  type="text">
                      <label class="lbl"></label>
                    </div>
                  </div>
                   */ ?>
                  <!--<div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="Email">Email Address</label>
                      <input id="Email" name="Email" type="text" placeholder="Enter your Email Address" class="form-control input-md" >
                      <label class="lbl"></label>
                    </div>
                  </div>--> 
                  
                  <!-- Password input-->
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="password">Password*</label>
                      <input id="password2" name="password" type="password" placeholder="Password" class="form-control input-md" >
                      <label class="lbl"></label>
                      <!--<sub><span class="pass_note" style="display: none;">Note: Password must be at least 6 characters and contain at least 1 uppercase letter 1 lowercase letter and 1 number</span></sub>-->
                      <span class="pass_note col-md-8" style="color: #ccc; font-size: 12px; font-weight: normal; margin: 0 auto; display: none; width: 100%; padding-left: 0px;">Note: Password must be at least 6 characters long and must contain at least 1 uppercase letter, 1 lowercase letter and 1 number</span>
                    </div>
                  </div>
                  
                  <!-- Text input--> 
                  <!-- Password input-->
                 <?php /*  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="confirm">Confirm Password*</label>
                      <input id="confirm" name="confirm" type="password" placeholder="Confirm Password" class="form-control input-md" >
                      <label class="lbl"></label>
                    </div>
                  </div> */ ?>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="confirm">Full Name*</label>
                      <input id="fullname" name="fullname" type="text" placeholder="First and Last Name" class="form-control input-md alphaonly stoppaste" >
                      <label class="lbl"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="textinput">Phone*</label>
                      <input id="phone2" name="phone" type="text" placeholder="Your Phone Number" class="form-control input-md phone_us" >
                      <label class="lbl"></label>
                    </div>
                  </div>
                  
                  <!-- Text input-->
                  <div class="form-group">
                    <div class="col-md-12 getlocation">
                      <label class="control-label" for="textinput">Current Location*</label>
                      <input name="search_location2" id="search_location2" data-role="For_Employers" type="text" placeholder="City, State, Country" class="form-control input-md"  autocomplete="on" runat="server">
                      <label class="lbl"></label>
                    </div>
                  </div>
                  <!--<div class="form-group">
                    <div class="col-md-12 getlocation">
                      <label class="control-label" for="textinput">Current Location</label>
                       <input name="textinput" id="search_location2" type="text"  placeholder="Enter your Location" class="form-control input-md "   data-role="For_Employers" autocomplete="on" runat="server">
                      <label class="lbl"></label>
                    </div>
                  </div>-->
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="textinput">Company*</label>
                      <input id="company" name="company" type="text" placeholder="Your Company Name" class="form-control input-md" >
                      <?php /*
                      <select id="company" name="company" class="form-control">
                        <option value="">Your Company Name</option>
                        <?php 
                            // @here
                            if(!empty($companies)){
                            foreach($companies as $key => $vall){
                            ?>
                        <option value="<?php echo $key; ?>"><?php echo $vall ?></option>
                        <?php }
                            }?>
                      </select>
                      */?>
                      <label class="lbl"></label>
                    </div>
                  </div>
                  
                  <!-- Select Basic -->
                  <!--<div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="selectbasic">Reasons For Application</label>
                      <select id="reason" name="reason" class="form-control">
                        <option value="1">Job Posting Only</option>
                        <option value="2">View Top Candidates Only</option>
                        <option value="3">Job Posting and View Top Candidates</option>
                      </select>
                      <label class="lbl"></label>
                    </div>
                  </div>-->
                  <!--<div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="blockcand">Block current company candidate</label>
                      <select id="blockcand" name="blockcand" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                      </select>
                      <label class="lbl"></label>
                    </div>
                  </div>-->
                   
                  
                      <!--<input id="selectbasic" name="selectbasic" type="text" placeholder="How did you hear about us?" class="form-control input-md" >-->
                      
                    
                  
                  
                 <?php /*  <!-- Select Basic -->
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="selectbasic">Time Zone*</label>
                      <select id="timezone" name="timezone" class="my-timezone form-control">
                        <option value="">Select your Time Zone</option>
                        <?php 
// print_r($time_zone)
if(!empty($time_zone)){
foreach($time_zone as $key => $vall){
?>
                        <option value="<?php echo $key; ?>"><?php echo $vall ?></option>
                        <?php }
}?>
                      </select>
                      <label class="lbl"></label>
                    </div>
                  </div>
                   */ ?>
                  <!-- Button -->
                  <div class="form-group myterms">
                    <div class="col-md-12">
                      <label>
                      <input type="checkbox" name="coupon_question" id="coupon_question2" value=""/>
                      By signing up you agree to AmazeTal's <a target="_blank" href="<?php echo base_url("/terms-condition");?>">Terms and Services</a> and <a target="_blank" href="<?php echo base_url("/privacy");?>">Privacy Policy</a>
                      <label class="lbl"></label>
                      </label>
                      <div class="submit-button">
                        <button id="singlebutton" type="submit" name="singlebutton" class="btn btn-info singlebutton">Get started</button>
                      </div>
                    </div>
                  </div>
                  <!-- Success Notification-->
                  <div class="form-group success">
                    <div class="col-md-12">
                      <p></p>
                    </div>
                  </div>
                  <p class="login-text">Already have an account? <a href="<?php echo site_url();?>sign-in">Login</a></p>
                </fieldset>
              </form>
            </div>
            <div class="tab-pane" id="3a">
              <h3>Expert Profile</h3>
              <p style="display: none;" class="alert alert-danger" role="alert"></p>
              <form class="form-horizontal" id="form_3">
                <fieldset>
                  
                  <!-- Text input-->
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="Email">Email Address*</label>
                      <input id="Email3" name="Email" type="text" placeholder="Your Email" class="form-control input-md" >
                      <label class="lbl"></label>
                    </div>
                  </div>
                 <?php /*  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="Email">Confirm Email Address</label>
                      <input id="confirm_email" name="confirm_email" type="text" placeholder="Enter your Email Address" class="form-control input-md" >
                      <label class="lbl"></label>
                    </div>
                  </div>
                   */ ?>
                  <!-- Password input-->
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="password">Password*</label>
                      <input id="password3" name="password" type="password" placeholder="Password" class="form-control input-md" >
                      <label class="lbl"></label>
                      <!--<sub><span class="pass_note" style="display: none;">Note: Password must be at least 6 characters and contain at least 1 uppercase letter 1 lowercase letter and 1 number</span></sub>-->
                      <span class="pass_note col-md-8" style="color: #ccc; font-size: 12px; font-weight: normal; margin: 0 auto; display: none; width: 100%; padding-left: 0px;">Note: Password must be at least 6 characters long and must contain at least 1 uppercase letter, 1 lowercase letter and 1 number</span>
                    </div>
                  </div>
                  
                  <!-- Text input--> 
                  <!-- Password input-->
                  <?php /* <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="confirm">Confirm Password</label>
                      <input id="confirm" name="confirm" type="password" placeholder="Confirm Password" class="form-control input-md" >
                      <label class="lbl"></label>
                    </div>
                  </div> */ ?>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="Full Name*">Full Name*</label>
                      <input id="fullname" name="fullname" type="text" placeholder="First and Last Name" class="form-control input-md alphaonly stoppaste exp-fullname" >
                      <label class="lbl"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="textinput">Phone*</label>
                      <input id="phone3" name="phone" type="text" placeholder="Your Phone Number" class="form-control input-md phone_us" >
                      <label class="lbl"></label>
                    </div>
                  </div>
                  
                  <!-- Text input-->
                  <div class="form-group">
                    <div class="col-md-12 ">
                      <label class="control-label" for="textinput">Current Location*</label>
                      <input id="search_location3" name="search_location" type="text" data-role="For_Career_Experts" placeholder="City, State, Country" class="form-control input-md "  autocomplete="on" runat="server">
                      <label class="lbl"></label>
                    </div>
                  </div>
                  
                 <?php /*  <!-- Select Basic -->
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="how_did_you_hear_about_us">How did you hear about us</label>
                      <select id="how_did_you_hear_about_us" name="how_did_you_hear_about_us" class="form-control">
                        <option value="">Select your How did you hear about us</option>
                        <option value="Newspaper"  >Newspaper</option>
                        <option value="Social media"  >Social media</option>
                        <option value="Friend (Email)"  >Friend (Email)</option>
                      </select>
                      <input type="hidden" name="how_did_you_hear_about_us_hidden" id="how_did_you_hear_about_us_hidden" value="">
                      <label class="lbl"></label>
                    </div>
                  </div>
                  <!-- Select Basic --> */ ?>
                  
                  <div class="form-group" id="how_did_you_hear_about_us_other" style="display:none;">
                    <div class="col-md-12">
                      <label class="control-label" for="textinput">Name or Email</label>
                      <input id="Name_email_other" name="Name_email_other" type="text"  placeholder="Do you here about us with your Friend so name or email please" class="form-control input-md" >
                      <label class="lbl"></label>
                    </div>
                  </div>
                 <?php /*  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label" for="timezone">Time Zone</label>
                      <select id="timezone" name="timezone" class="my-timezone form-control">
                        <option value="">Select your Time Zone</option>
                        <?php
// print_r($time_zone)
if(!empty($time_zone)){
foreach($time_zone as $key => $vall){
?>
                        <option value="<?php echo $key; ?>"><?php echo $vall ?></option>
                        <?php }
}?>
                      </select>
                      <label class="lbl"></label>
                    </div>
                  </div>
                   */ ?>
                  <!-- Button -->
                  <div class="form-group myterms">
                    <div class="col-md-12">
                      <label >
                      <input type="checkbox" name="coupon_question" id="coupon_question3" value=""/>
                      By signing up you agree to AmazeTal's <a target="_blank" href="<?php echo base_url("/terms-condition");?>">Terms and Services</a> and <a target="_blank" href="<?php echo base_url("/privacy");?>">Privacy Policy</a>
                      <label class="lbl"></label>
                      </label>
                      <div class="submit-button">
                        <button id="singlebutton" type="submit" name="singlebutton" class="btn btn-info btn_exp singlebutton">Get started</button>
                      </div>
                    </div>
                  </div>
                  <!-- Success Notification-->
                  <div class="form-group success">
                    <div class="col-md-12">
                      <p ></p>
                    </div>
                  </div>
                  <p class="login-text">Already have an account? <a href="<?php echo site_url();?>sign-in">Login</a></p>
                </fieldset>
              </form>
            </div>
            <div class="se-pre-con" style="display: none;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!---End main Wrapper--> 
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyDBrWVwNiX1IWMrVv17r_E6MHirOym2LG0" type="text/javascript"></script>
<script type="text/javascript">
		var IsplaceChangesearch_location = false;
		var IsplaceChangesearch_location2 = false;
		var IsplaceChangesearch_location3 = false;
         function initialize() {

          input = document.getElementById('search_location');

          var options = {
            types: ['(cities)'],
            componentRestrictions: {country: 'us'}
          };
          var autocomplete = new google.maps.places.Autocomplete(input,options);
          // console.log(autocomplete);
          google.maps.event.addListener(autocomplete, 'place_changed', function(){
              var place = autocomplete.getPlace();
			  IsplaceChangesearch_location = true;
              // console.log(place);
              document.getElementById('place').value = place.formatted_address;
              document.getElementById('cityLat').value = place.geometry.location.lat();
              document.getElementById('cityLng').value = place.geometry.location.lng();
          });

		   $("#search_location").keydown(function () {
				IsplaceChangesearch_location = false;
			});





          input2 = document.getElementById('search_location2');
          var options2 = {
            types: ['(cities)'],
            componentRestrictions: {country: 'us'}
          };
          var autocomplete2 = new google.maps.places.Autocomplete(input2,options2);
          // console.log(autocomplete2);
          google.maps.event.addListener(autocomplete2, 'place_changed', function(){
              var place2 = autocomplete2.getPlace();
			  IsplaceChangesearch_location2 = true;
              document.getElementById('place').value = place2.formatted_address;
              document.getElementById('cityLat').value = place2.geometry.location.lat();
              document.getElementById('cityLng').value = place2.geometry.location.lng();
          });


		  $("#search_location2").keydown(function () {
				IsplaceChangesearch_location2 = false;
			});





          input3 = document.getElementById('search_location3');
          var options3 = {
            types: ['(cities)'],
            componentRestrictions: {country: 'us'}
          };
          // var input = document.getElementById('search_location2');
          var autocomplete3 = new google.maps.places.Autocomplete(input3,options3);
          // console.log(autocomplete3);
          google.maps.event.addListener(autocomplete3, 'place_changed', function(){
              var place3 = autocomplete3.getPlace();
			  IsplaceChangesearch_location3 = true;
			   // console.log(autocomplete3);
              document.getElementById('place').value = place3.formatted_address;
              document.getElementById('cityLat').value = place3.geometry.location.lat();
              document.getElementById('cityLng').value = place3.geometry.location.lng();
          });

			$("#search_location3").keydown(function () {
				IsplaceChangesearch_location3 = false;
			});





        }
        google.maps.event.addDomListener(window, 'load', initialize);

		 $(".btn-info").click(function () {
			// alert("sdsdsa");

			if (IsplaceChangesearch_location == false) {
                $("#search_location").val('');
				 // $('#search_location3').siblings('.lbl').html("You must provide a valid location.");
            }else {
                // alert($("#search_location3").val());
            }
			if (IsplaceChangesearch_location2 == false) {
                $("#search_location2").val('');
				 // $('#search_location3').siblings('.lbl').html("You must provide a valid location.");
            }else {
                // alert($("#search_location3").val());
            }


			 if (IsplaceChangesearch_location3 == false) {
                $("#search_location3").val('');
				 // $('#search_location3').siblings('.lbl').html("You must provide a valid location.");
            }else {
                // alert($("#search_location3").val());
            }

        });



        // $('.location').on('keyup',function(){
        //   $this= $(this);
        //   console.log($this);
        //   var parent= $this.closest('.getlocation');
        //   console.log(parent);
        //   google.maps.event.addDomListener(window, 'load', initialize(parent.closest('.location')));
        // });
      // $('.location').on('input propertychange paste', function() {
      //     // console.log($(this).attr('data-role'));
      //     $(".location").each(function(){
      //         // console.log($(this).attr('id'));
      //         google.maps.event.addDomListener(window, 'load', initialize($(this).attr('id')));
      //     });
      // });
        //location
    </script> 
<script>
<?php function parag_formating($text){
	
	$text = $text;

$text = str_replace("\r\n","\n",$text);

$paragraphs = preg_split("/[\n]{2,}/",$text);
foreach ($paragraphs as $key => $p) {
    $paragraphs[$key] = str_replace("\n","<br />",$paragraphs[$key]);
}

$text = implode("", $paragraphs);

return $text;
	
	
} ?>



$(document).ready(function() {
  $('input').keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});

jQuery(document).ready(function(e) {
    
    <?php if($this->uri->segment(2) == 'employer' || $this->uri->segment(2) == 'expert'){?>
        $(".nav.nav-pills li").removeClass("active");
        $(".tab-content.clearfix .tab-pane").removeClass("active");
        <?php if($this->uri->segment(2)=='employer'){ ?>
        $(".nav.nav-pills li.flow").addClass("active");
        $(".tab-content.clearfix .tab-pane#2a").addClass("active");
        jQuery("#candidiates-register").attr("style",'background-image: url("<?php echo base_url() . 'assets/images/'. $data['back_image_employers'] ?>");');
    	jQuery("#main_title").html("<?php echo parag_formating($data["emp_title"]); ?>");
    	jQuery("#main_desc").html("<?php echo parag_formating($data["emp_desc"]); ?>");
        <?php }else{ ?>
        $(".nav.nav-pills li.thrice").addClass("active");
        $(".tab-content.clearfix .tab-pane#3a").addClass("active");
        
        jQuery("#candidiates-register").attr("style",'background-image: url("<?php echo base_url() . 'assets/images/'. $data['back_image_experts'] ?>");');
	  
		jQuery("#main_title").html("<?php echo parag_formating($data["exp_title"]); ?>");
		jQuery("#main_desc").html("<?php echo parag_formating($data["exp_desc"]); ?>");
        
        <?php } ?>
    <?php }else{ ?>
        jQuery("#candidiates-register").attr("style",'background-image: url("<?php echo base_url() . 'assets/images/'. $data['back_image_candidates'] ?>");');
        var main_title = "<?php echo parag_formating($data["main_title"]); ?>";
	
    	var main_desc = "<?php echo parag_formating($data["main_text"]); ?>";
    	
    	jQuery("#main_title").html(main_title);
    	jQuery("#main_desc").html(main_desc);
    <?php } ?>
    
    
    
	$('.phone_us').mask('(000) 000-0000');
	
	// $('#search_location').on('focusout',function(){
		// alert($(this).val());
	// });
	
	
	
	
	/* $('#how_did_you_hear_about_us').on('change', function() {
		  var selected_value = ( this.value ); // or $(this).val()
		  console.log(selected_value);
		  $("#how_did_you_hear_about_us_hidden").val(selected_value);
		  if(selected_value == "Friend (Email)"){
			  $("#how_did_you_hear_about_us_other").fadeIn();
			  $("#how_did_you_hear_about_us_hidden").val('');
		  } else {
			  $("#how_did_you_hear_about_us_other").fadeOut();
			  // $("#how_did_you_hear_about_us_hidden").val('');
		  }
		});
		 */
		$('#Name_email_other').on('input propertychange paste', function() {
			$("#how_did_you_hear_about_us_hidden").val("Friend, "+this.value);
		});





    


  jQuery(".nav-pills .user").click(function(){

    jQuery("#candidiates-register").attr("style",'background-image: url("<?php echo base_url() . 'assets/images/'. $data['back_image_candidates'] ?>");');
	
	
	jQuery("#main_title").html("<?php echo parag_formating($data["main_title"]); ?>");
	jQuery("#main_desc").html("<?php echo parag_formating($data["main_text"]); ?>");
	

  });
  jQuery(".nav-pills .flow").click(function(){

    jQuery("#candidiates-register").attr("style",'background-image: url("<?php echo base_url() . 'assets/images/'. $data['back_image_employers'] ?>");');
	
	jQuery("#main_title").html("<?php echo parag_formating($data["emp_title"]); ?>");
	jQuery("#main_desc").html("<?php echo parag_formating($data["emp_desc"]); ?>");
	

  });
  jQuery(".nav-pills .thrice").click(function(){

//    jQuery("#candidiates-register").attr("style",'background-image: url("<?php //echo base_url();?>//assets/images/sign-in-expert.jpg");');
      jQuery("#candidiates-register").attr("style",'background-image: url("<?php echo base_url() . 'assets/images/'. $data['back_image_experts'] ?>");');
	  
		jQuery("#main_title").html("<?php echo parag_formating($data["exp_title"]); ?>");
		jQuery("#main_desc").html("<?php echo parag_formating($data["exp_desc"]); ?>");
	  
  });
  
  
  

  
  
/*SAVING DATA*/
  var role;
  $('#1a .singlebutton').on('click',function(e){
    e.preventDefault();
    idx='#1a ';
    role = 'candidates';
    save_data(role,idx);
  })

  $('#2a .singlebutton').on('click',function(e){
    e.preventDefault();
    idx='#2a ';
    role = 'employer';
    save_data(role,idx);
  })

  $('#3a .singlebutton').on('click',function(e){
    e.preventDefault();
    idx='#3a ';
    role = 'career_experts';
		save_data(role,idx);
  })


  function save_data(role,idx){
    
    var formData = new FormData();
    formData.append('role',role);
    if(role == 'candidates')  
    {
        formData.append('canfullname',$('#canfullname').val());
        formData.append('Email', $(idx+'#Email').val().trim());
        formData.append('password', $(idx+'#password').val());
        formData.append('phone', $(idx+'#phone').val());
        formData.append('place', $('#place').val());
        formData.append('how_did_you_hear_about_us', $('#how_did_you_hear_about_us').val());
        
        var temp = $(idx+'#coupon_question');
          formData.append('coupon_question','');
        if (temp.is(":checked"))
        {
          // it is checked
          formData.append('coupon_question','1');
        }
        
        var temp1 = $(idx+'#newsletter_question');
          formData.append('newsletter_question','');
        if (temp1.is(":checked"))
        {
          // it is checked
          formData.append('newsletter_question','1');
        }
    }
    else if(role == 'employer')  
    {
        formData.append('fullname',$('#fullname').val());
        formData.append('Email', $(idx+'#Email2').val().trim());
        formData.append('password', $(idx+'#password2').val());
        formData.append('phone', $(idx+'#phone2').val());
        formData.append('place', $('#place2').val());
        var temp = $(idx+'#coupon_question2');
          formData.append('coupon_question','');
        if (temp.is(":checked"))
        {
          // it is checked
          formData.append('coupon_question','1');
        }
    }
    else{
        formData.append('fullname', $('.exp-fullname').val());
        formData.append('Email', $(idx+'#Email3').val().trim());
        formData.append('password', $(idx+'#password3').val());
        formData.append('phone', $(idx+'#phone3').val());
        formData.append('place', $('#place3').val());
        var temp = $(idx+'#coupon_question3');
          formData.append('coupon_question','');
        if (temp.is(":checked"))
        {
          // it is checked
          formData.append('coupon_question','1');
        }
    }
    
    formData.append('cityLng', $('#cityLng').val());
    formData.append('cityLat', $('#cityLat').val());
    //formData.append('fullname', $('#fullname').val());
    
    // formData.append('confirm', $(idx+'#confirm').val());
    /*var replaced_ph = $(idx+'#phone').val(function(index, value) {
       var asd = value.replace('_', '');
       alert( asd);
    });*/
    
    
    
    //console.log(replaced_ph);
    //var ph = $(idx+'#phone').val();
    //var replaced_ph = $(idx+'#phone').val().replace('_', ''); 
    
    // formData.append('timezone', $(idx+'#timezone :selected').val());
   
    
 
    if(role == 'candidates')  
    {
      formData.append('search_location', $('#search_location').val());
      
    }
    else if(role == 'employer')
    {
      // formData.append('confirmemail', $(idx+'#confirmemail').val().trim());
      formData.append('search_location2',$('#search_location2').val());
      
      formData.append('company',$('#company').val());
      formData.append('reason',$('#reason :selected').val());
    }
    else if(role == 'career_experts')
    {
      formData.append('search_location3', $('#search_location3').val());
      // formData.append('how_did_you_hear_about_us_hidden', $('#how_did_you_hear_about_us_hidden').val());
      
    }
    

    $.ajax({
        url: '<?php echo base_url();?>home/add_candidiate',
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        // dataType: "JSON",
        beforeSend: function( xhr ) {
           $('.se-pre-con').fadeIn();
           $('.lbl').html('');
           $('.success p').text('');
        },
        success: function (data) {
           $('.lbl').fadeIn();
           $('.success').fadeIn();
          $('.se-pre-con').fadeOut();
            var data_msg=$.parseJSON(data);
           
           if(data_msg.status){
            

             // $(idx+".success p").html('<div class="alert alert-success"><strong>Success!</strong> Follow your email to get verification link.</div>');
             
			 swal("Success!", "Follow your email to get verification link.", "success")
			 
			 
			 /* Custom Form Reset */
               
                    $('input').val('');
                    $('input').text('');
                    $('textarea').val('');
                    $('textarea').text('');
                    $('select option').eq(0).attr('selected','true');
                    $('input[type="checkbox"]').removeAttr('checked','false');
                 
               }
               
               
               
                // if(data_msg.error.error_count > 0){
            //console.log(data_msg.Error_Mess.Email);
            // debugger;
            // $(idx+"[id='Email']").siblings('.lbl').html(data_msg.Error_Mess.Email);
                    $.each( data_msg.Error_Mess, function( key, value ) {
                        //console.log(key);
                        if(key == "search_location" || key == "search_location2" || key == "search_location3"){
                        
                       

                        $(idx+"[id='"+key+"']").siblings('.lbl').html(value);
                      } else {
                        $(idx+"[name='"+key+"']").siblings('.lbl').html(value);
                         //.slice(0,-1);
                      }
                      // console.log($(value).unwrap('<p></p>'));
                    }); 
                    // if(data_msg.Error_Mess.search_location3.is(":empty")){
                    //   console.log('null');
                    // }
                    /*if(data_msg.Error_Mess.search_location3 == null){
                      console.log('null');
                    }
                    else{
                      $(idx+"[id='search_location3']").siblings('.lbl').html(data_msg.Error_Mess.search_location3)
                      // console.log(data_msg.Error_Mess.search_location3);
                    }*/
                    
                    
                    $.each( data_msg.Error_Mess, function( key, value ) {
                        if(value != "" && $("body").find(idx+"[name='"+key+"']").length > 0) {
                            
                            $('html, body').animate({
                                scrollTop: $(idx+"[name='"+key+"']").offset().top
                            }, 1000);
                        return false;
                        }
                        /*else if(data_msg.Error_Mess.search_location3 != null){
                            $('html, body').animate({
                                scrollTop: $(idx+"[id='search_location3']").offset().top
                            }, 1000);
                        return false;
                        }*/
                    });
                // }
                // else{
                    //if success close modal and reload ajax table
                    // $('#modal_form').modal('hide');
                    // reload_table();
                // }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          //console.log(jqXHR);
          //console.log(textStatus);
          //console.log(errorThrown);

            //alert('Error adding / update data');
        }
    });
  }
/*	$('.num-formatin').keyup(function(e) {
  if ((e.keyCode > 47 && e.keyCode < 58) || (e.keyCode < 106 && e.keyCode > 95)) {
    this.value = this.value.replace(/(\d{3})\-?/g, '$1-');
    return true;
  }
  
  //remove all chars, except dash and digits
  this.value = this.value.replace(/[^\-0-9]/g, '');
});*/

});

$(function(){
    $('input[type=password]').focusout(function(){
        $('.pass_note').slideUp();
    }); 
    
    $('input[type=password]').focusin(function(){
        $('.pass_note').slideDown();
    });   
    
    
    
});
</script>
</body>
