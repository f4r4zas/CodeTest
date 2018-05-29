<?php 
/*
$where = array(
						'user_id' => $this->uid,
					);
$user_assign_expert_details = $this->Get_db->get_details_by_multiple_column('amazetal_assign_expert',$where);
                    
$total_assign_expert = count($user_assign_expert_details);

echo $total_assign_expert."<br />";

echo "<pre>";
print_r($user_assign_expert_details);
echo "</pre>";
exit();*/

/*foreach($user_assign_expert_details as $user_assign_expert_detail){
    
}*/

$data = array();

if(!empty($db_table)){
	foreach($db_table[0] as $key => $row){
		$data[$key] = $row;
	}	
}
?>

<body id="about-us" class="main-content inner">
<div class="main-wrapper">
<div class="about-intro">
  <div class="container-fluid">
    <div class="row">
      <div class="intro-right col-md-6">
        <h1><?php echo $data['r1_heading']?></h1>
        <p><?php echo $data['r1_desc']?></p>
        <a href="<?php echo base_url();?>">Home</a><img alt="" src="<?=base_url()?>assets/images/bread.png"><a href="<?php echo base_url().'about';?>">About us</a>
      </div>
      <div class="intro-img col-md-6"> <img src="<?php echo base_url() . 'assets/images/'. $data['r1_image'] ?>" alt=""/> </div>
    </div>
  </div>
</div>
<div class="wow fadeInUp talent space">
  <div class="container">
    <div class="row">
      <h2><?php echo $data['r2_heading']?></h2>
      <p class="intro-text"><?php echo $data['r2_desc']?></p>
      <div class="vision col-md-6"> <img src="<?php echo base_url() . 'assets/images/'. $data['r3_image1'] ?>" alt=""/>
        <div class="text-content">
          <h3><?php echo $data['r3_heading1']?></h3>
          <p><?php echo $data['r3_desc1']?></p>
        </div>
      </div>
      <div class="vision col-md-6"> <img src="<?php echo base_url() . 'assets/images/'. $data['r3_image2'] ?>" alt=""/>
        <div class="text-content">
          <h3><?php echo $data['r3_heading2']?></h3>
          <p><?php echo $data['r3_desc2']?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="wow fadeInUp amaze-born" style="background-image:url('<?php echo base_url() . 'assets/images/'. $data['r4_image'] ?>')">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2><?php echo $data['r4_heading']?></h2>
        <p><?php echo $data['r4_desc']?></p>
      </div>
    </div>
  </div>
</div>
<div class="wow fadeInUp amaze-help space">
  <div class="container">
    <div class="row">
      <h2><?php echo $data['r5_heading']?></h2>
      <p class="intro-text"><?php echo $data['r5_desc']?></p>
      <div class="support col-md-4"> <i class="fa fa-clock-o" aria-hidden="true"></i>
        <h3><?php echo $data['r5_heading_c1']?></h3>
        <p><?php echo $data['r5_desc_c1']?></p>
      </div>
      <div class="support col-md-4"> <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
       <h3><?php echo $data['r5_heading_c2']?></h3>
        <p><?php echo $data['r5_desc_c2']?></p>
      </div>
      <div class="support col-md-4"> <i class="fa fa-globe" aria-hidden="true"></i>
        <h3><?php echo $data['r5_heading_c3']?></h3>
        <p><?php echo $data['r5_desc_c3']?></p>
      </div>
    </div>
  </div>
</div>
<!---End main Wrapper--> 