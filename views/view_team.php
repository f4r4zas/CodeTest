<?php 
	// echo '<pre>';
	// print_r($team_group1);
	// print_r($team_group2);
	// print_r($team_page_db);
	// echo '<pre>';
	
	function checkEmpty($data){
		return isset($data) ?  $data : "";
	}
	
?>
<body id="team" class="main-content inner">
<div class="main-wrapper">
<div class="about-intro">
  <div class="container-fluid">
    <div class="row">
      <div class="intro-right col-md-6">
        <h1><?php echo checkEmpty($team_page_db[0]->r1_heading) ?></h1>
        <p><?php echo checkEmpty($team_page_db[0]->r1_desc) ?></p>
        <a href="<?php echo base_url();?>">Home</a><img alt="" src="<?=base_url()?>assets/images/bread.png"><a href="<?php echo base_url().'team';?>">Team</a> </div>
      <div class="intro-img col-md-6"> <img src="<?php echo base_url() . 'assets/images/' . checkEmpty($team_page_db[0]->r1_image)?>" alt=""/> </div>
    </div>
  </div>
</div>
<div id="jump" class="wow fadeInUp talent space">
  <div class="container">
    <div class="row">
      <div class="text-centers">
        <h2><?php echo checkEmpty($team_page_db[0]->r2_heading) ?></h2>
        <p><?php echo checkEmpty($team_page_db[0]->r2_desc) ?></p>
      </div>
    </div>
  </div>
</div>
<div class="wow fadeInUp teams">
<h3><?php echo (!empty($team_group1))?checkEmpty($team_page_db[0]->fteam_heading):""; ?></h3>
  <div class="container">
    <div class="row">
		<?php 
			foreach($team_group1 as $t1_row):?>
			
				<div class="team-member col-md-6"> <img src="<?php echo base_url().'assets/images/'. checkEmpty($t1_row->image); ?>" alt=""/>
					<div class="detail-text">
					  <h4><?php echo checkEmpty($t1_row->name);?></h4>
					  <h5><?php echo checkEmpty($t1_row->designation);?></h5>
					  <img src="<?=base_url()?>assets/images/comment-icon.png" alt=""/>
					  <p><?php echo checkEmpty($t1_row->description);?></p>
					  <div class="share-icons"> <i class="fa fa-facebook" aria-hidden="true"></i> <i class="fa fa-twitter" aria-hidden="true"></i> <i class="fa fa-google-plus" aria-hidden="true"></i> </div>
					</div>
				 </div>
			
		<?php endforeach;?>
      
    </div>
    
    <h3><?php echo (!empty($team_group2))?checkEmpty($team_page_db[0]->ateam_heading):""; ?></h3>
    <div class="team-amaze row">
      
      <?php 
			foreach($team_group2 as $t2_row):?>
			
				<div class="team-member col-md-4"> <img src="<?php echo base_url().'assets/images/'. checkEmpty($t2_row->image); ?>" alt=""/>
					<div class="detail-text">
					  <h4><?php echo checkEmpty($t2_row->name);?></h4>
					  <h5><?php echo checkEmpty($t2_row->designation);?></h5>
					  <img src="<?=base_url()?>assets/images/comment-icon.png" alt=""/>
					  <p><?php echo checkEmpty($t2_row->description);?></p>
					  <div class="share-icons"> <i class="fa fa-facebook" aria-hidden="true"></i> <i class="fa fa-twitter" aria-hidden="true"></i> <i class="fa fa-google-plus" aria-hidden="true"></i> </div>
					</div>
				 </div>
			
		<?php endforeach;?>
      
    </div>
    
    
    
    
    <h3><?php echo (!empty($team_group3))?checkEmpty($team_page_db[0]->advisers_heading):""; ?></h3>
    <div class="team-amaze row">
      
      <?php 
			foreach($team_group3 as $t3_row):?>
			
				<div class="team-member col-md-4"> <img src="<?php echo base_url().'assets/images/'. checkEmpty($t3_row->image); ?>" alt=""/>
					<div class="detail-text">
					  <h4><?php echo checkEmpty($t3_row->name);?></h4>
					  <h5><?php echo checkEmpty($t3_row->designation);?></h5>
					  <img src="<?=base_url()?>assets/images/comment-icon.png" alt=""/>
					  <p><?php echo checkEmpty($t3_row->description);?></p>
					  <div class="share-icons"> <i class="fa fa-facebook" aria-hidden="true"></i> <i class="fa fa-twitter" aria-hidden="true"></i> <i class="fa fa-google-plus" aria-hidden="true"></i> </div>
					</div>
				 </div>
			
		<?php endforeach;?>
      
    </div>
  </div>
</div>
<div class="wow fadeInUp amaze-born button-started" style="background-image:url('<?php echo base_url() . 'assets/images/' . checkEmpty($team_page_db[0]->r5_image)?>')" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2><?php echo checkEmpty($team_page_db[0]->r5_heading) ?></h2>
        <p><?php echo checkEmpty($team_page_db[0]->r5_description) ?></p>
        <a class="start" href="<?php echo checkEmpty($team_page_db[0]->r5_left_btn_link) ?>"><?php echo checkEmpty($team_page_db[0]->r5_left_btn) ?></a><a class="help-center" href="<?php echo checkEmpty($team_page_db[0]->r5_right_btn_link) ?>"><?php echo checkEmpty($team_page_db[0]->r5_right_btn) ?></a> </div>
    </div>
  </div>
</div>
