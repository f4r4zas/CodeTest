<?php

$data = array();

if(!empty($db_table)){
  foreach($db_table[0] as $key => $row){
    $data[$key] = $row;
  }
}
?>
<body id="why-amaze-tal" class="main-content inner">
<div class="main-wrapper">
<div class="about-intro">
  <div class="container-fluid">
    <div class="row">
      <div class="intro-right col-md-6">
<!--        <h1>Why Amazetal</h1>-->
        <h1><?php echo $data["main_heading"];?> </h1>
<!--        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor aboreet dolore magna aliqua.</p>-->
        <p><?php echo $data["main_title"];?></p>
        <a href="#">Home</a><img src="<?=base_url()?>assets/images/bread.png" alt=""/><a href="#">Why AmazeTal</a> </div>
      <div class="intro-img col-md-6">
<!--        <img src="--><?//=base_url()?><!--assets/images/why-amaze-img.jpg" alt=""/>-->
        <img src="<?=base_url()?>assets/images/<?php echo $data["why_banner"]; ?>" alt=""/>
      </div>
    </div>
  </div>
</div>
<div class="wow bounceInUp choose-us-white">
  <div class="container">
    <div class="row">
<!--      <h2>Why choose us</h2>-->
      <h2><?php echo $data["sub_heading"];?></h2>
<!--      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit<br>-->
<!--        sed do eiusmod</p>-->
      <p><?php echo $data["sub_title"];?></p>
      <div class="text-col col-md-6">
<!--        <h3>PROBLEM</h3>-->
<!--        <h4>Ut enim ad minim veniam quis nostrud.</h4>-->
<!--        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>-->
        <?php echo $data["sec1_text"];?>
      </div>
      <div class="img-col col-md-6">
<!--        <img src="--><?//=base_url()?><!--assets/images/problem-solvers.png" alt=""/>-->
        <img src="<?=base_url()?>assets/images/<?php echo $data["sec1_img"]; ?>" alt=""/>
      </div>
    </div>
  </div>
</div>
<div class="wow bounceInUp choose-us-white colored">
  <div class="container">
    <div class="row">
      <div class="img-col col-md-6">
<!--        <img src="--><?//=base_url()?><!--assets/images/girl.png" alt=""/>-->
        <img src="<?=base_url()?>assets/images/<?php echo $data["sec2_img"]; ?>" alt=""/>
      </div>
      <div class="text-col col-md-6">
<!--        <h3>MARKET COMPARISONS</h3>-->
<!--        <h4>Ut enim ad minim veniam quis nostrud.</h4>-->
<!--        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>-->
        <?php echo $data["sec2_text"];?>
      </div>
    </div>
  </div>
</div>
<div class="wow bounceInUp choose-us-white factor">
  <div class="container">
    <div class="row">
      <div class="text-col col-md-6">
<!--        <h3>DIFFERENTIATING FACTOR</h3>-->
<!--        <h4>Ut enim ad minim veniam quis nostrud.</h4>-->
<!--        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>-->
        <?php echo $data["sec3_text"];?>
      </div>
      <div class="img-col col-md-6">
<!--        <img src="--><?//=base_url()?><!--assets/images/factor.jpg" alt=""/>-->
        <img src="<?=base_url()?>assets/images/<?php echo $data["sec3_img"]; ?>" alt=""/>
      </div>
    </div>
  </div>
</div>
<div class="wow bounceInUp choose-us-white factor colored">
  <div class="container">
    <div class="row">
      <div class="img-col col-md-6">
<!--        <img src="--><?//=base_url()?><!--assets/images/efficient.png" alt=""/>-->
        <img src="<?=base_url()?>assets/images/<?php echo $data["sec4_img"]; ?>" alt=""/>
      </div>
      <div class="text-col col-md-6">
<!--        <h3>EFFICIENCY AND TRANSPARENCY</h3>-->
<!--        <h4>Ut enim ad minim veniam quis nostrud.</h4>-->
<!--        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>-->
        <?php echo $data["sec4_text"];?>
      </div>
    </div>
  </div>
</div>

<!---End main Wrapper-->