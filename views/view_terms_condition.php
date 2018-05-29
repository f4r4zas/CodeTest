<?php

$data = array();

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

<body id="help-center" class="privacy main-content inner">
<div class="main-wrapper">
  <div class="about-intro">
    <div class="container-fluid">
      <div class="row">
        <div class="intro-right col-md-6">
<!--          <h1>Terms & Conditions</h1>-->
          <h1><?php echo $data["main_heading"];?></h1>
<!--          <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor aboreet dolore magna aliqua.</p>-->
          <p><?php echo $data["main_text"];?></p>
          <a href="<?php echo base_url();?>">Home</a><img src="<?=base_url()?>assets/images/bread.png" alt=""/><a href="<?php echo base_url().'terms-condition';?>">Terms And Conditions</a> </div>
        <div class="intro-img col-md-6">
<!--          <img src="--><?//=base_url()?><!--assets/images/terms-banner.jpg" alt=""/>-->
          <img src="<?=base_url()?>assets/images/<?php echo $data["terms_conditions_banner"]; ?>" alt=""/>
        </div>
      </div>
    </div>
  </div>
  <div class="wow bounceInUp faq">
    <div class="container">
<!--      <h2>Neque porro quisquam est qui dolorem</h2>-->
      <h2><?php echo $data["sub_heading"];?></h2>
<!--      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit<br>-->
<!--        sed do eiusmod</p>-->
      <p><?php echo $data["sub_text"];?></p>
    </div>
  </div>
  <div class="wow bounceInUp talent space">
    <div class="works">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="img-box"> <a  href="#candidiates"> <img src="<?=base_url()?>assets/images/folks-help.png" alt="" /> </div>
<!--            Terms and conditions<br>-->
<!--            for Candidates</a>-->
            <?php echo $data["sec1_heading"];?></a>

          </div>
          <div class="col-md-4">
            <div class="img-box"> <a  href="#employee"> <img src="<?=base_url()?>assets/images/employers-help.png" alt="" /> </div>
<!--            Terms and conditions<br>-->
<!--            for Employers</a>-->
            <?php echo $data["sec2_heading"];?></a>
          </div>
          <div class="col-md-4">
            <div class="img-box"> <a  href="#experts"> <img src="<?=base_url()?>assets/images/experts-help.png" alt="" /> </div>
<!--            Terms and conditions<br>-->
<!--            for Career Experts</a>-->
            <?php echo $data["sec3_heading"];?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Faq-->
  <div class="wow bounceInUp faqs">
    <div class="container">
      <div class="row">
        <div id="candidiates" class="col-md-12">
<!--          <h2>Terms and conditions for candidates</h2>-->
<!--          <h3>justo impedit vituperatoribus eu pri</h3>-->
<!--          <p>Lorem ipsum dolor sit amet, usu saperet assentior forensibus ut. Iriure phaedrum intellegam ius at. Aeterno accusata sed at. Omittam adipiscing ei vim. Appareat constituto ex cum, ex agam augue vituperata est, sed id tota ocurreret. Forensibus deseruisse deterruisset ea sea, eu nonumy mnesarchum sea, ad consul instructior per.Est eu magna dolor, vim eu modus consectetuer. Sumo porro accusam ei quo, summo debet qui ea, in hinc possim labitur sit. Ea sit cotidieque neglegentur, dicta liber facilisi eam ad. Ex mei veri timeam persius. No dicunt commodo duo.</p>-->
<!--          <p>Augue dicam rationibus no vim, justo impedit vituperatoribus eu pri, autem ullum scripserit usu in. Ut sea detraxit sapientem scripserit, ex usu partiendo interesset. In everti mediocrem eum. At pro modus solet. Id adhuc admodum sit, eu deserunt gloriatur vituperatoribus vel. Labores appellantur his ad. At his alii facilisis qualisque.Mea atomorum mediocritatem ex, cibo suavitate urbanitas vis at. Vocent ceteros pertinax pri ut, propriae detraxit dissentiunt sit at. Eos ei utamur suscipiantur. No doctus neglegentur his. Nemore delicata te eum, labore patrioque reformidans ne vis, suas vitae mel in.</p>-->
<!--          <h3>justo impedit vituperatoribus eu pri</h3>-->
<!--          <p>Lorem ipsum dolor sit amet, usu saperet assentior forensibus ut. Iriure phaedrum intellegam ius at. Aeterno accusata sed at. Omittam adipiscing ei vim. Appareat constituto ex cum, ex agam augue vituperata est, sed id tota ocurreret. Forensibus deseruisse deterruisset ea sea, eu nonumy mnesarchum sea, ad consul instructior per.Est eu magna dolor, vim eu modus consectetuer. Sumo porro accusam ei quo, summo debet qui ea, in hinc possim labitur sit. Ea sit cotidieque neglegentur, dicta liber facilisi eam ad. Ex mei veri timeam persius. No dicunt commodo duo.</p>-->
<!--          <p>Augue dicam rationibus no vim, justo impedit vituperatoribus eu pri, autem ullum scripserit usu in. Ut sea detraxit sapientem scripserit, ex usu partiendo interesset. In everti mediocrem eum. At pro modus solet. Id adhuc admodum sit, eu deserunt gloriatur vituperatoribus vel. Labores appellantur his ad. At his alii facilisis qualisque.Mea atomorum mediocritatem ex, cibo suavitate urbanitas vis at. Vocent ceteros pertinax pri ut, propriae detraxit dissentiunt sit at. Eos ei utamur suscipiantur. No doctus neglegentur his. Nemore delicata te eum, labore patrioque reformidans ne vis, suas vitae mel in.</p>-->
<!--          <h3>justo impedit vituperatoribus eu pri</h3>-->
<!--          <p>Lorem ipsum dolor sit amet, usu saperet assentior forensibus ut. Iriure phaedrum intellegam ius at. Aeterno accusata sed at. Omittam adipiscing ei vim. Appareat constituto ex cum, ex agam augue vituperata est, sed id tota ocurreret. Forensibus deseruisse deterruisset ea sea, eu nonumy mnesarchum sea, ad consul instructior per.Est eu magna dolor, vim eu modus consectetuer. Sumo porro accusam ei quo, summo debet qui ea, in hinc possim labitur sit. Ea sit cotidieque neglegentur, dicta liber facilisi eam ad. Ex mei veri timeam persius. No dicunt commodo duo.</p>-->
<!--          <p>Augue dicam rationibus no vim, justo impedit vituperatoribus eu pri, autem ullum scripserit usu in. Ut sea detraxit sapientem scripserit, ex usu partiendo interesset. In everti mediocrem eum. At pro modus solet. Id adhuc admodum sit, eu deserunt gloriatur vituperatoribus vel. Labores appellantur his ad. At his alii facilisis qualisque.Mea atomorum mediocritatem ex, cibo suavitate urbanitas vis at. Vocent ceteros pertinax pri ut, propriae detraxit dissentiunt sit at. Eos ei utamur suscipiantur. No doctus neglegentur his. Nemore delicata te eum, labore patrioque reformidans ne vis, suas vitae mel in.</p>-->
          <h2> <?php echo $data["sec1_heading"];?></h2>
          <?php echo $data["sec1_text"];?>
        </div>
      </div>
      <!---End Row--->
      <div class="wow bounceInUp row">
        <div id="employee" class="col-md-12">
<!--          <h2>Terms and conditions for Employers</h2>-->
<!--          <h3>justo impedit vituperatoribus eu pri</h3>-->
<!--          <p>Lorem ipsum dolor sit amet, usu saperet assentior forensibus ut. Iriure phaedrum intellegam ius at. Aeterno accusata sed at. Omittam adipiscing ei vim. Appareat constituto ex cum, ex agam augue vituperata est, sed id tota ocurreret. Forensibus deseruisse deterruisset ea sea, eu nonumy mnesarchum sea, ad consul instructior per.Est eu magna dolor, vim eu modus consectetuer. Sumo porro accusam ei quo, summo debet qui ea, in hinc possim labitur sit. Ea sit cotidieque neglegentur, dicta liber facilisi eam ad. Ex mei veri timeam persius. No dicunt commodo duo.</p>-->
<!--          <p>Augue dicam rationibus no vim, justo impedit vituperatoribus eu pri, autem ullum scripserit usu in. Ut sea detraxit sapientem scripserit, ex usu partiendo interesset. In everti mediocrem eum. At pro modus solet. Id adhuc admodum sit, eu deserunt gloriatur vituperatoribus vel. Labores appellantur his ad. At his alii facilisis qualisque.Mea atomorum mediocritatem ex, cibo suavitate urbanitas vis at. Vocent ceteros pertinax pri ut, propriae detraxit dissentiunt sit at. Eos ei utamur suscipiantur. No doctus neglegentur his. Nemore delicata te eum, labore patrioque reformidans ne vis, suas vitae mel in.</p>-->
<!--          <h3>justo impedit vituperatoribus eu pri</h3>-->
<!--          <p>Lorem ipsum dolor sit amet, usu saperet assentior forensibus ut. Iriure phaedrum intellegam ius at. Aeterno accusata sed at. Omittam adipiscing ei vim. Appareat constituto ex cum, ex agam augue vituperata est, sed id tota ocurreret. Forensibus deseruisse deterruisset ea sea, eu nonumy mnesarchum sea, ad consul instructior per.Est eu magna dolor, vim eu modus consectetuer. Sumo porro accusam ei quo, summo debet qui ea, in hinc possim labitur sit. Ea sit cotidieque neglegentur, dicta liber facilisi eam ad. Ex mei veri timeam persius. No dicunt commodo duo.</p>-->
<!--          <p>Augue dicam rationibus no vim, justo impedit vituperatoribus eu pri, autem ullum scripserit usu in. Ut sea detraxit sapientem scripserit, ex usu partiendo interesset. In everti mediocrem eum. At pro modus solet. Id adhuc admodum sit, eu deserunt gloriatur vituperatoribus vel. Labores appellantur his ad. At his alii facilisis qualisque.Mea atomorum mediocritatem ex, cibo suavitate urbanitas vis at. Vocent ceteros pertinax pri ut, propriae detraxit dissentiunt sit at. Eos ei utamur suscipiantur. No doctus neglegentur his. Nemore delicata te eum, labore patrioque reformidans ne vis, suas vitae mel in.</p>-->
<!--          <h3>justo impedit vituperatoribus eu pri</h3>-->
<!--          <p>Lorem ipsum dolor sit amet, usu saperet assentior forensibus ut. Iriure phaedrum intellegam ius at. Aeterno accusata sed at. Omittam adipiscing ei vim. Appareat constituto ex cum, ex agam augue vituperata est, sed id tota ocurreret. Forensibus deseruisse deterruisset ea sea, eu nonumy mnesarchum sea, ad consul instructior per.Est eu magna dolor, vim eu modus consectetuer. Sumo porro accusam ei quo, summo debet qui ea, in hinc possim labitur sit. Ea sit cotidieque neglegentur, dicta liber facilisi eam ad. Ex mei veri timeam persius. No dicunt commodo duo.</p>-->
<!--          <p>Augue dicam rationibus no vim, justo impedit vituperatoribus eu pri, autem ullum scripserit usu in. Ut sea detraxit sapientem scripserit, ex usu partiendo interesset. In everti mediocrem eum. At pro modus solet. Id adhuc admodum sit, eu deserunt gloriatur vituperatoribus vel. Labores appellantur his ad. At his alii facilisis qualisque.Mea atomorum mediocritatem ex, cibo suavitate urbanitas vis at. Vocent ceteros pertinax pri ut, propriae detraxit dissentiunt sit at. Eos ei utamur suscipiantur. No doctus neglegentur his. Nemore delicata te eum, labore patrioque reformidans ne vis, suas vitae mel in.</p>
-->
          <h2> <?php echo $data["sec2_heading"];?></h2>
          <?php echo $data["sec2_text"];?>
        </div>
      </div>
      <!--End Row--->
      <div class="wow bounceInUp row">
        <div id="experts" class="col-md-12">
<!--          <h2>Terms and conditions for career experts</h2>-->
<!--          <h3>justo impedit vituperatoribus eu pri</h3>-->
<!--          <p>Lorem ipsum dolor sit amet, usu saperet assentior forensibus ut. Iriure phaedrum intellegam ius at. Aeterno accusata sed at. Omittam adipiscing ei vim. Appareat constituto ex cum, ex agam augue vituperata est, sed id tota ocurreret. Forensibus deseruisse deterruisset ea sea, eu nonumy mnesarchum sea, ad consul instructior per.Est eu magna dolor, vim eu modus consectetuer. Sumo porro accusam ei quo, summo debet qui ea, in hinc possim labitur sit. Ea sit cotidieque neglegentur, dicta liber facilisi eam ad. Ex mei veri timeam persius. No dicunt commodo duo.</p>-->
<!--          <p>Augue dicam rationibus no vim, justo impedit vituperatoribus eu pri, autem ullum scripserit usu in. Ut sea detraxit sapientem scripserit, ex usu partiendo interesset. In everti mediocrem eum. At pro modus solet. Id adhuc admodum sit, eu deserunt gloriatur vituperatoribus vel. Labores appellantur his ad. At his alii facilisis qualisque.Mea atomorum mediocritatem ex, cibo suavitate urbanitas vis at. Vocent ceteros pertinax pri ut, propriae detraxit dissentiunt sit at. Eos ei utamur suscipiantur. No doctus neglegentur his. Nemore delicata te eum, labore patrioque reformidans ne vis, suas vitae mel in.</p>-->
<!--          <h3>justo impedit vituperatoribus eu pri</h3>-->
<!--          <p>Lorem ipsum dolor sit amet, usu saperet assentior forensibus ut. Iriure phaedrum intellegam ius at. Aeterno accusata sed at. Omittam adipiscing ei vim. Appareat constituto ex cum, ex agam augue vituperata est, sed id tota ocurreret. Forensibus deseruisse deterruisset ea sea, eu nonumy mnesarchum sea, ad consul instructior per.Est eu magna dolor, vim eu modus consectetuer. Sumo porro accusam ei quo, summo debet qui ea, in hinc possim labitur sit. Ea sit cotidieque neglegentur, dicta liber facilisi eam ad. Ex mei veri timeam persius. No dicunt commodo duo.</p>-->
<!--          <p>Augue dicam rationibus no vim, justo impedit vituperatoribus eu pri, autem ullum scripserit usu in. Ut sea detraxit sapientem scripserit, ex usu partiendo interesset. In everti mediocrem eum. At pro modus solet. Id adhuc admodum sit, eu deserunt gloriatur vituperatoribus vel. Labores appellantur his ad. At his alii facilisis qualisque.Mea atomorum mediocritatem ex, cibo suavitate urbanitas vis at. Vocent ceteros pertinax pri ut, propriae detraxit dissentiunt sit at. Eos ei utamur suscipiantur. No doctus neglegentur his. Nemore delicata te eum, labore patrioque reformidans ne vis, suas vitae mel in.</p>-->
<!--          <h3>justo impedit vituperatoribus eu pri</h3>-->
<!--          <p>Lorem ipsum dolor sit amet, usu saperet assentior forensibus ut. Iriure phaedrum intellegam ius at. Aeterno accusata sed at. Omittam adipiscing ei vim. Appareat constituto ex cum, ex agam augue vituperata est, sed id tota ocurreret. Forensibus deseruisse deterruisset ea sea, eu nonumy mnesarchum sea, ad consul instructior per.Est eu magna dolor, vim eu modus consectetuer. Sumo porro accusam ei quo, summo debet qui ea, in hinc possim labitur sit. Ea sit cotidieque neglegentur, dicta liber facilisi eam ad. Ex mei veri timeam persius. No dicunt commodo duo.</p>-->
<!--          <p>Augue dicam rationibus no vim, justo impedit vituperatoribus eu pri, autem ullum scripserit usu in. Ut sea detraxit sapientem scripserit, ex usu partiendo interesset. In everti mediocrem eum. At pro modus solet. Id adhuc admodum sit, eu deserunt gloriatur vituperatoribus vel. Labores appellantur his ad. At his alii facilisis qualisque.Mea atomorum mediocritatem ex, cibo suavitate urbanitas vis at. Vocent ceteros pertinax pri ut, propriae detraxit dissentiunt sit at. Eos ei utamur suscipiantur. No doctus neglegentur his. Nemore delicata te eum, labore patrioque reformidans ne vis, suas vitae mel in.</p>-->
          <h2> <?php echo $data["sec3_heading"];?></h2>
          <?php echo $data["sec3_text"];?>
        </div>
      </div>
    </div>
    <!---End Container---> 
  </div>
</div>
<!---End main Wrapper-->

<script>
	$(document).ready(function(){
		$('html, body').animate({
			scrollTop: $("<?php echo $user_role_section?>").offset().top
		}, 2000);
	});
</script>
