<?php

$data = array();

//$questions = array();

//if(!empty($db_help)){
//  foreach($db_help as $key => $row){
//    $questions[$key] = $row;
//  }
//}

if(!empty($db_table)){
  foreach($db_table[0] as $key => $row){
    $data[$key] = $row;
  }
}



//SCROLL TO SPECIFIC SECTION
$user_role_section = "";
if(isset($user_info->role)){
	if($user_info->role == 'career_experts'){
		$user_role_section = '#experts';
	}elseif($user_info->role == 'employer'){
		$user_role_section = '#employee';
	}elseif($user_info->role == 'candidates'){
		$user_role_section = '#candidiates';
	}
}

?>
<body id="help-center" class="main-content inner">
<div class="main-wrapper">
<div class="about-intro">
  <div class="container-fluid">
    <div class="row">
      <div class="intro-right col-md-6">
<!--        <h1>HELP CENTER</h1>-->
        <h1><?php echo $data["main_heading"];?></h1>
<!--        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor aboreet dolore magna aliqua.</p>-->
        <p><?php echo $data["main_title"];?></p>
        <a href="<?php echo base_url();?>">Home</a><img src="<?=base_url()?>assets/images/bread.png" alt=""/><a href="<?php echo base_url().'help-center';?>">Help center</a> </div>
      <div class="intro-img col-md-6">
<!--        <img src="--><?//=base_url()?><!--assets/images/help-center.jpg" alt=""/>-->
        <img src="<?=base_url()?>assets/images/<?php echo $data["help_banner"]; ?>" alt=""/>
      </div>
    </div>
  </div>
</div>
<div class="wow wow fadeInUp faq">
  <div class="container">
    <h2><?php echo $data["sub_heading"];?></h2>
<!--    <h2>Frequently Asked Question(s)</h2>-->
    <p><?php echo $data["sub_title"];?></p>
<!--    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit<br>-->
<!--      sed do eiusmod</p>-->
  </div>
</div>
<div class="wow wow fadeInUp talent space">
  <div class="works">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="img-box">
          
          <a  href="#candidiates">
          <img src="<?=base_url()?>assets/images/folks-help.png" alt="" /> </div>
          Questions<br>
          for <?php echo $data["inner_tab1"];?> ?</a>
          </div>
          
          
        <div class="col-md-4">
          <div class="img-box"> 
          <a  href="#employee">
          <img src="<?=base_url()?>assets/images/employers-help.png" alt="" /> </div>
          Questions<br>
          for <?php echo $data["inner_tab2"];?> ?</a>
                    
          </div>
          
        <div class="col-md-4">
          <div class="img-box"> 
          <a  href="#experts">
          <img src="<?=base_url()?>assets/images/experts-help.png" alt="" /> </div>
          Questions<br>
          for Career <?php echo $data["inner_tab3"];?> ?</a> </div>
      </div>
    </div>
  </div>
</div>
<!--Faq-->
<div class="wow wow fadeInUp faqs">
  <div class="container">
    <div class="row">
    <!-- @candidate starts here -->
     <div id="candidiates" class="col-md-12">
       <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <h2>Answers for <?php echo $data["inner_tab1"];?></h2>
            <?php
              // Loops Starts Here
            $i=0;
            if(!empty($questions))
            //print_r($questions);
            foreach($questions as $q):
if ($q->type === "candidate"):
            ?>
             <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?php echo $q->help_questions_id;?>">
                  <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $q->help_questions_id;?>" aria-expanded="false" aria-controls="collapse<?php echo $q->help_questions_id;?>" class="<?php echo ($i===0)?'':'collapsed';?>"><?php echo $q->help_questions; ?> </a> </h4>
                </div>
                <div id="collapse<?php echo $q->help_questions_id;?>" class="panel-collapse collapse <?php echo ($i===0)?'in':'';++$i;?>" role="tabpanel" aria-labelledby="heading<?php echo $q->help_questions_id;?>">
                  <div class="panel-body"> <?php echo $q->help_ans; ?> </div>
                </div>
             </div>
          <?php
endif;
          endforeach;
              // Loops ends here
            ?>
            </div>
     </div>
    <!-- @candidate ends here -->
     <!--  <div id="candidiates" class="col-md-12">
       <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
       <h2>Answers for Candidates</h2>
         <div class="panel panel-default">
           <div class="panel-heading" role="tab" id="headingOne">
             <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> Are there any upfront recruiting or contractual costs? </a> </h4>
           </div>
           <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
             <div class="panel-body"> For each engagement, we require a $500 deposit that ultimately gets applied to the first invoice. In the event of a failed trial period, the deposit is refunded. </div>
           </div>
         </div>
         <div class="panel panel-default">
           <div class="panel-heading" role="tab" id="headingTwo">
             <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Is it really risk-free? </a> </h4>
           </div>
           <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
             <div class="panel-body"> Yes. All of our weekly engagements begin with a predetermined trial period (up to two weeks). This means that Toptalers have time to prove to you that they are absolutely exceptional and worth every penny. If you’re completely satisfied with the results, we’ll bill you for the time and continue the engagement for as long as you’d like. If you’re not completely satisfied, you won’t be billed (and we'll pay the Toptaler out of our own pocket). From there, we can either part ways, or we can provide you with another freelancer who may be a better fit and with whom we will begin a second risk-free trial. </div>
           </div>
         </div>
         <div class="panel panel-default">
           <div class="panel-heading" role="tab" id="headingThree">
             <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> What happens if I’m not satisfied with a Toptal engineer or designer? </a> </h4>
           </div>
           <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
             <div class="panel-body"> We allow our clients to try up to five freelancers per position. While all Toptalers are extraordinarily talented and intelligent, we understand that not every person will be a perfect “cultural” fit for every company. A “cultural” match can be ambiguous as well as highly subjective. For this reason, we allow our clients to work with multiple freelancers for each position before they decide on a candidate with whom they are confident, content, and comfortable. </div>
           </div>
         </div>
         <div class="panel panel-default">
           <div class="panel-heading" role="tab" id="headingFour">
             <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> What does Toptal offer that comparable services do not? </a> </h4>
           </div>
           <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
             <div class="panel-body"> Toptal was created to offer a solution to the lower-than-expected technical performance of resources obtained through the myriad of talent providers. It’s become incredibly difficult to find reliable engineers and designers through these services due to the lack of sufficient screening.
               
               At Toptal, we thoroughly screen our freelancers (please see “Testing & Screening” below) to ensure we only supply developers and designers of the absolute highest caliber. To make an analogy, existing open freelance marketplaces are an eBay for developers, whereas Toptal is an Amazon. At Toptal, we go to extreme lengths to provide and guarantee quality. </div>
           </div>
         </div>
         <div class="panel panel-default">
           <div class="panel-heading" role="tab" id="headingFive">
             <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> Do all Toptalers speak fluent English? </a> </h4>
           </div>
           <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
             <div class="panel-body"> Yes - each and every one of them. All Toptalers write and speak English fluently. In fact, before we invite candidates to tackle our rigorous technical tests, we conduct lengthy interviews to ensure they are proficient in English and have personalities well-suited to working with western technical teams. </div>
           </div>
         </div>
       </div>
     </div> -->
    </div>
    <!-- End Row-->
    <div class="wow wow fadeInUp row">
      <div id="employee" class="col-md-12">
        <h2> Answers for <?php echo $data["inner_tab2"];?></h2>
        <div class="panel-group" id="accordionb" role="tablist" aria-multiselectable="true">
         <?php
              // Loops Starts Here
         $i=0;
         if(!empty($questions))
           foreach($questions as $q):
             if ($q->type === "employer"):
               ?>
               <div class="panel panel-default">
                 <div class="panel-heading" role="tab" id="heading<?php echo $q->help_questions_id;?>">
                   <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $q->help_questions_id;?>" aria-expanded="false" aria-controls="collapse<?php echo $q->help_questions_id;?>" class="<?php echo ($i===0)?'':'collapsed';?>"><?php echo $q->help_questions; ?> </a> </h4>
                 </div>
                 <div id="collapse<?php echo $q->help_questions_id;?>" class="panel-collapse collapse <?php echo ($i===0)?'in':'';++$i;?>" role="tabpanel" aria-labelledby="heading<?php echo $q->help_questions_id;?>">
                   <div class="panel-body"> <?php echo $q->help_ans; ?> </div>
                 </div>
               </div>
               <?php
             endif;
           endforeach;
              // Loops ends here
            ?>
        </div>
      </div>
    </div>



<!--      custom test-->

      

<!--      custom test end-->



    <!-- End Row -->
    <div class="wow wow fadeInUp row">
      <div id="experts" class="col-md-12">
        <h2> Answers for <?php echo $data["inner_tab3"];?></h2>
        <div class="panel-group" id="accordionc" role="tablist" aria-multiselectable="true">
        <?php
              // Loops Starts Here
        $i=0;
        if(!empty($questions))
          foreach($questions as $q):
            if ($q->type === "expert"):
              ?>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?php echo $q->help_questions_id;?>">
                  <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $q->help_questions_id;?>" aria-expanded="false" aria-controls="collapse<?php echo $q->help_questions_id;?>" class="<?php echo ($i===0)?'':'collapsed';?>"><?php echo $q->help_questions; ?> </a> </h4>
                </div>
                <div id="collapse<?php echo $q->help_questions_id;?>" class="panel-collapse collapse <?php echo ($i===0)?'in':'';++$i;?>" role="tabpanel" aria-labelledby="heading<?php echo $q->help_questions_id;?>">
                  <div class="panel-body"> <?php echo $q->help_ans; ?> </div>
                </div>
              </div>
              <?php
            endif;
          endforeach;
          ?>
        <!--   <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwoc">
            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionc" href="#collapseTwoc" aria-expanded="false" aria-controls="collapseTwoc"> Is it really risk-free? </a> </h4>
          </div>
          <div id="collapseTwoc" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwoc">
            <div class="panel-body"> Yes. All of our weekly engagements begin with a predetermined trial period (up to two weeks). This means that Toptalers have time to prove to you that they are absolutely exceptional and worth every penny. If you’re completely satisfied with the results, we’ll bill you for the time and continue the engagement for as long as you’d like. If you’re not completely satisfied, you won’t be billed (and we'll pay the Toptaler out of our own pocket). From there, we can either part ways, or we can provide you with another freelancer who may be a better fit and with whom we will begin a second risk-free trial. </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingThreec">
            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionc" href="#collapseThreec" aria-expanded="false" aria-controls="collapseThreec">What happens if I’m not satisfied with a Toptal engineer or designer? </a> </h4>
          </div>
          <div id="collapseThreec" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThreec">
            <div class="panel-body">We allow our clients to try up to five freelancers per position. While all Toptalers are extraordinarily talented and intelligent, we understand that not every person will be a perfect “cultural” fit for every company. A “cultural” match can be ambiguous as well as highly subjective. For this reason, we allow our clients to work with multiple freelancers for each position before they decide on a candidate with whom they are confident, content, and comfortable. </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingFourc">
            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionc" href="#collapseFourc" aria-expanded="false" aria-controls="collapseFourc">What does Toptal offer that comparable services do not? </a> </h4>
          </div>
          <div id="collapseFourc" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFourc">
            <div class="panel-body">Toptal was created to offer a solution to the lower-than-expected technical performance of resources obtained through the myriad of talent providers. It’s become incredibly difficult to find reliable engineers and designers through these services due to the lack of sufficient screening.
              
              At Toptal, we thoroughly screen our freelancers (please see “Testing & Screening” below) to ensure we only supply developers and designers of the absolute highest caliber. To make an analogy, existing open freelance marketplaces are an eBay for developers, whereas Toptal is an Amazon. At Toptal, we go to extreme lengths to provide and guarantee quality.</div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingFivec">
            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionc" href="#collapseFivec" aria-expanded="false" aria-controls="collapseFiveb">Do all Toptalers speak fluent English? </a> </h4>
          </div>
          <div id="collapseFivec" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFivec">
            <div class="panel-body">Yes - each and every one of them. All Toptalers write and speak English fluently. In fact, before we invite candidates to tackle our rigorous technical tests, we conduct lengthy interviews to ensure they are proficient in English and have personalities well-suited to working with western technical teams. </div>
          </div>
        </div> -->
        </div> <!-- Comment end -->
      </div>
    </div>
  </div>
  <!---End Container---> 
</div>
<!--End Faq-->

<div class="wow wow fadeInUp amaze-born button-started" style="background: rgba(0, 0, 0, 0) url(<?=base_url()?>assets/images/<?php echo $data["sec_banner"]; ?>) no-repeat scroll center center / cover">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
<!--        <h2>sed do eiusmod tempor incididunt ut labore</h2>-->
        <h2><?php echo $data["sec_heading"];?></h2>
<!--        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore<br>-->
<!--          magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>-->
        <p><?php echo $data["sec_text"];?></p>
        <a class="start" href="<?php echo $data["sec_left_btn_link"];?>"><?php echo $data["sec_left_btn"];?></a><a class="help-center" href="<?php echo $data["sec_right_btn_link"];?>"><?php echo $data["sec_right_btn"];?></a> </div>
    </div>
  </div>
</div>
<?php if($user_role_section != ""):?>
<script>
	$(document).ready(function(){
		$('html, body').animate({
			scrollTop: $("<?php echo $user_role_section?>").offset().top
		}, 2000);
	});
</script>
<?php endif;?>