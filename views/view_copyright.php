<?php 

$data = array();

if(!empty($db_table)){
	foreach($db_table[0] as $key => $row){
		$data[$key] = $row;
	}	
}
?>

<body id="about-us" class="copyright-content main-content inner">
<div class="main-wrapper">
<div class="about-intro">
  <div class="container-fluid">
    <div class="row">
      <div class="intro-right col-md-6">
        <h1><?php echo $data['main_heading']?></h1>
        <p><?php echo $data['main_title']?></p>
        <a href="<?php echo base_url();?>">Home</a><img alt="" src="<?=base_url()?>assets/images/bread.png"><a href="<?php echo base_url().'copyright';?>">Copyright</a>
      </div>
      <div class="intro-img col-md-6"> <img src="<?php echo base_url() . 'assets/images/'. $data['copy_main_img'] ?>" alt=""/> </div>
    </div>
  </div>
</div>
<div class="wow bounceInUp talent space">
  <div class="container">
    <div class="row">
      <h2><?php echo $data['sec2_heading']?></h2>
      <p><?php echo $data['sec2_desc']?></p>
      <div class="col-md-12">
	  
        <div class="text-content">
          <h3><?php echo $data['sec3_title']?></h3>
          <p><?php echo $data['sec3_desc']?></p>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!---End main Wrapper--> 