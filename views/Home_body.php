<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script> -->
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script> -->

<?php
$sec1_data = array();

if(!empty($sec1)){
  foreach($sec1[0] as $key => $row){
    $sec1_data[$key] = $row;
  }
}
$all_section_2_home_data = array();

if(!empty($all_section_2_home)){
  foreach($all_section_2_home as $key => $row){
    $all_section_2_home_data[$key] = $row;
  }
}



if($user_agent['name'] == "Google Chrome"){

  if( (int) $user_agent['version'] > 54){
    ?>
    <style>
      video::-internal-media-controls-download-button {
        display:none !important;
      }

      video::-webkit-media-controls-enclosure {
        overflow:hidden;
      }
      video::-webkit-media-controls-panel {
        width: calc(100% + 30px); /* Adjust as needed */
      }
    </style>
<?php
  }
}
?>

<body id="home" class="main-content">
<div class="main-wrapper">
  <div id="demo">
    <div class="container-fluid">
      <div class="row">
        <div class="main-slide">
          <div id="owl-demo" class="owl-carousel">
            <?php

                    if(!empty($Sliders)){
                        foreach ($Sliders as  $value) {
                    ?>
            <div class="item"> <img src="<?php echo base_url()?>assets/images/slider_images/<?php print_r($value->SliderTemp);?>" alt="The Last of us">
              <div class="slide-content container">
                <h3 class="fruite"><?php print_r($value->slider_title_small);?></h3>
                <h1><?php print_r($value->slider_title_big);?></h1>
                <h4><?php print_r($value->slider_slogan);?></h4>
                <h3><?php print_r($value->slider_desc);?></h3>
                <a href="<?php print_r($value->redirection);?>">Sign Up</a> </div>
            </div>
            <?php }
                    }
                    ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="wow fadeInUp slider-buttons" id="tab-header">
    <div class="container">
      <div class="row">
        <ul id="click" class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#myHome">For Candidates</a></li>
          <li><a data-toggle="tab" href="#menu1">For Employers</a></li>
          <li><a data-toggle="tab" href="#menu2">For Career Experts</a></li>
        </ul>
      </div>
    </div>
    <div class="tab-content">
      <div id="myHome" class="pay-band tab-pane fade in active">
        <div class="container">
          <div class="row">
            <div class="col-md-6 editable_w section_2"> <?php echo $sec1_data['can_text']; ?> <a class="btn-start" href="<?php echo $sec1_data["can_link"]; ?>">Let's Go</a> </div>
            <div class="video col-md-6">
            <!--<iframe src="https://www.amazetal.com/index.php?/home/can_video" frameborder="0" style="border: 0px none; width: 100%; height: 320px; overflow: hidden;"></iframe>
              <iframe src="<?php //echo $sec1_data['can_video_link']; ?>" width="512" height="380" frameborder="0" allowfullscreen></iframe>-->
              <div class="flowplayer" data-swf="flowplayer.swf" data-embed="false" data-poster="<?php echo base_url().'assets/images/cand-video-place.jpg';?>">
              <video width="512" height="380">
    			<source src="<?php echo $sec1_data['can_video_link'];?>" type="video/mp4">
    		  </video>
              <div class="fp-context-menu">
                 <ul>
                   <li><a href="<?php echo base_url();?>">AmazeTal</a></li>
                 </ul>
               </div>
              </div>
            </div>
          </div>
        </div>
        <div class="wow fadeInUp connects" style="background: rgba(0, 0, 0, 0) url(assets/images/<?php echo $home["section_3_can_image"]; ?>) no-repeat scroll center center / cover;">
          <div class="container">
            <div class="row">
              <!--edit to here -->
              <?php //print_r($home); ?>
              <div class="col-md-12">
                <h2 class="editable_w section_3"><?php echo $home["section_3_can_head"]; ?></h2>
                <p class="editable_w section_3"><?php echo $home["section_3_can_desc"] ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="wow fadeInUp spot-light">
          <div class="container-fluid">
            <div class="row">
              <div class="users-1 col-md-3" style="
              background: rgba(0, 0, 0, 0) url(assets/images/<?php echo $home["section_4_1_img"]; ?>) no-repeat scroll 0 0;background-size:cover;">
                <div class="content-text">
                  <h3 class="editable_w section_4_1"><?php echo $home["section_4_1_title"] ?></h3>
                  <p class="editable_w section_4_1"><?php echo $home["section_4_1_text"] ?></p>
                  <a href="<?php echo base_url();?>home/job_search<?php //echo $home["section_4_1_link"]; ?>" class="editable_w section_4_1">Read More</a> </div>
              </div>
              <div class="users-2 col-md-3" style="
                  background: rgba(0, 0, 0, 0) url(assets/images/<?php echo $home["section_4_2_img"]; ?>) no-repeat scroll 0 0;background-size:cover;">
                <div class="content-text">
                  <h3 class="editable_w section_4_1"><?php echo $home["section_4_2_title"] ?></h3>
                  <p class="editable_w section_4_1"><?php echo $home["section_4_2_text"] ?></p>
                  <a href="<?php echo $home["section_4_2_link"]; ?>" class="editable_w section_4_1">Read More</a> </div>
              </div>
              <div class="users-3 col-md-3" style="
                  background: rgba(0, 0, 0, 0) url(assets/images/<?php echo $home["section_4_3_img"]; ?>) no-repeat scroll 0 0;background-size:cover;">
                <div class="content-text">
                  <h3 class="editable_w section_4_1"><?php echo $home["section_4_3_title"] ?></h3>
                  <p class="editable_w section_4_1"><?php echo $home["section_4_3_text"] ?></p>
                  <a href="<?php echo $home["section_4_3_link"]; ?>" class="editable_w section_4_1">Read More</a> </div>
              </div>
              <div class="users-4 col-md-3" style="
                  background: rgba(0, 0, 0, 0) url(assets/images/<?php echo $home["section_4_4_img"]; ?>) no-repeat scroll 0 0;background-size:cover;">
                <div class="content-text">
                  <h3 class="editable_w section_4_1"><?php echo $home["section_4_4_title"] ?></h3>
                  <p class="editable_w section_4_1"><?php echo $home["section_4_4_text"] ?></p>
                  <a href="<?php echo $home["section_4_4_link"]; ?>" class="editable_w section_4_1">Read More</a> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="wow fadeInUp counters">
          <div class="container">
            <h2><?php echo $home["for_candi_stats"][0]->home_sec3_heading; ?></h2>
            <p><?php echo $home["for_candi_stats"][0]->home_sec3_title;    ?></p>
            <div class="row">
              <div class="col-md-3">
                <div class="thumbnail"> <img src="<?=base_url()?>assets/images/<?php echo  $home["for_candi_stats"][0]->home_sec3_col1_img; ?>" alt="" /> </div>
<h5 class="pi-counter" data-count-from="0" data-count-to="<?php echo $home["for_candi_stats"][0]->home_sec3_col1_counter ?>" data-easing="easeInCirc" data-duration="1000" data-frames-per-second="0"><span class="pi-counter-number"><?php echo $home["for_candi_stats"][0]->home_sec3_col1_counter; ?></span></h5>

                <h6><?php echo  $home["for_candi_stats"][0]->home_sec3_col1_text; ?></h6>
              </div>
              <div class="col-md-3">
                <div class="thumbnail"> <img src="<?=base_url()?>assets/images/<?php echo  $home["for_candi_stats"][0]->home_sec3_col2_img; ?>" alt="" /> </div>
<h5 class="pi-counter" data-count-from="0" data-count-to="<?php echo $home["for_candi_stats"][0]->home_sec3_col2_counter ?>" data-easing="easeInCirc" data-duration="2000" data-frames-per-second="10"><span class="pi-counter-number"><?php echo $home["for_candi_stats"][0]->home_sec3_col2_counter; ?></span> </h5>
                <h6><?php echo  $home["for_candi_stats"][0]->home_sec3_col2_text; ?></h6>
              </div>
              <div class="col-md-3">
                <div class="thumbnail"> <img src="<?=base_url()?>assets/images/<?php echo  $home["for_candi_stats"][0]->home_sec3_col3_img; ?>" alt="" /> </div>
<h5 class="pi-counter" data-count-from="0" data-count-to="<?php echo $home["for_candi_stats"][0]->home_sec3_col3_counter ?>" data-easing="easeInCirc" data-duration="3000" data-frames-per-second="10"> <span class="pi-counter-number"></span> </h5>
                <h6><?php echo  $home["for_candi_stats"][0]->home_sec3_col3_text; ?></h6>
              </div>
              <div class="col-md-3">
                <div class="thumbnail"> <img src="<?=base_url()?>assets/images/<?php echo  $home["for_candi_stats"][0]->home_sec3_col4_img; ?>" alt="" /> </div>
<h5 class="pi-counter" data-count-from="0" data-count-to="<?php echo $home["for_candi_stats"][0]->home_sec3_col4_counter ?>" data-easing="easeInCirc" data-duration="4000" data-frames-per-second="10"> <span class="pi-counter-number"></span> </h5>
                <h6><?php echo  $home["for_candi_stats"][0]->home_sec3_col4_text; ?></h6>
              </div>
            </div>
          </div>
        </div>
        <?php
		/* echo "<pre>";
			print_r($testimonials_For_Candidates);
		echo "</pre>"; */
		if(!empty($testimonials_For_Candidates)){
		?>
        <div class="wow fadeInUp testimonials">
          <div class="container">
            <h2><?php echo $testimonials_For_Candidates[0]->main_heading ?></h2>
            <div id="carousel">
              <div class="btn-bar">
                <div id="buttons" class="buttons-can"><a id="prev" class="prev-can" href="#"></a><a id="next" class="next-can" href="#"></a> </div>
              </div>
              <div id="slides" class="slides-can">
                <ul>
                  <?php

			if(!empty($testimonials_For_Candidates)){
				foreach($testimonials_For_Candidates as $testimonials){

			?>
                  <li class="slide slide_can">
                    <div class="author-container">
                      <div class="info"><img src="<?=base_url()?>assets/images/testimonials_images/<?php echo $testimonials->testimonials_pic ?>" alt=""/> </div>
                      <div class="response">
                        <p class="quote1-phrase"><?php echo $testimonials->testimonials_desc ?></p>
                        <p class="quote1-author"><?php echo $testimonials->testimonials_name ?><br>
                          <span><?php echo $testimonials->testimonials_company ?></span></p>
                      </div>
                    </div>
                  </li>
                  <?php 	}
			}
			?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <?php
		}
		?>
        <div class="wow fadeInUp help">
          <div class="container">
            <h2><?php echo $cand_carousel_data->heading?></h2>
            <p><?php echo $cand_carousel_data->content?></p>
            <div class="row">
              <div class="parent_thumbnail">
              <?php
					$images = json_decode($cand_carousel_data->images);
					foreach($images as $image){ ?>
              <div class="thumbnail car_thumb"> <img style="max-width:200px" src="<?=base_url()?>upload/carousel/<?php echo $image;?>" alt="" /> </div>
              <?php } ?>
             </div>
            </div>
          </div>
        </div>
      </div>
      <div id="menu1" class="pay-band tab-pane fade">
        <div class="container">
          <div class="row">
            <div class="col-md-6"> <?php echo $sec1_data["emp_text"]; ?> <a class="btn-start" href="<?php echo $sec1_data["emp_link"]; ?>" data-toggle="tooltip" data-placement="bottom" title="Get Started">GET STARTED</a> </div>
            <div class="video col-md-6">
            <!--<iframe src="https://www.amazetal.com/index.php?/home/emp_video" frameborder="0" style="border: 0px none; width: 100%; height: 350px; overflow: hidden;"></iframe>
            <iframe width="512" height="380" src="<?php //echo $sec1_data['emp_video_link']; ?>" frameborder="0" allowfullscreen></iframe>-->
            <div class="flowplayer" data-swf="flowplayer.swf" data-embed="false" data-poster="<?php echo base_url().'assets/images/emp-video-place.jpg';?>">
              
              <video width="512" height="380">
    			<source src="<?php echo $sec1_data['emp_video_link'];?>" type="video/mp4">
    		  </video>
              <div class="fp-context-menu">
                 <ul>
                   <li><a href="<?php echo base_url();?>">AmazeTal</a></li>
                 </ul>
               </div>
              </div>
            </div>
          </div>
        </div>
        <div class="wow fadeInUp connects">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2><?php echo $all_section_2_home_data[1]->r1_heading; ?></h2>
                <p><?php echo $all_section_2_home_data[1]->r1_desc; ?></p>
                <a href="<?php echo base_url();?>how_it_works">How it works</a> </div>
            </div>
          </div>
        </div>
        <div class="wow employers-spot-light fadeInUp spot-light">
          <div class="container-fluid">
            <div class="row">
              <div class="employee-1 col-md-6"  style="background: rgba(0, 0, 0, 0) url(assets/images/<?php echo $home["for_emp_section_3"][0]->sec1_col1_img; ?>) no-repeat scroll 0 0 / cover;">
                <div class="content-text">
                  <h3><?php echo $home["for_emp_section_3"][0]->sec1_col1_title; ?></h3>
                  <p><?php echo $home["for_emp_section_3"][0]->sec1_col1_text; ?></p>
                  <a class="btn-1 btn-1e" href="<?php echo $home["for_emp_section_3"][0]->sec1_col1_link; ?>">Read More</a> </div>
              </div>
              <div class="employee-2 col-md-6"  style="background: rgba(0, 0, 0, 0) url(assets/images/<?php echo $home["for_emp_section_3"][0]->sec1_col2_img; ?>) no-repeat scroll 0 0 / cover;">
                <div class="content-text">
                  <h3><?php echo $home["for_emp_section_3"][0]->sec1_col2_title;  ?></h3>
                  <p><?php echo $home["for_emp_section_3"][0]->sec1_col2_text;  ?></p>
                  <a href="<?php echo $home["for_emp_section_3"][0]->sec1_col2_link;  ?>">Read More</a> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="wow fadeInUp view-profile">
          <div class="container">
            <h2><?php echo $home["for_emp_section_3"][0]->sec2_heading; ?></h2>
            <p><?php echo $home["for_emp_section_3"][0]->sec2_title; ?></p>
            <div class="row">
              <div class="col-md-4 col-sm-6"> <img src="<?=base_url()?>assets/images/<?php echo $home["for_emp_section_3"][0]->sec2_col1_img; ?>" alt="" />
                <div class="content-text">
                  <h3>Step 1</h3>
                  <a href="<?php echo $home["for_emp_section_3"][0]->sec2_col1_link; ?>" ><?php echo $home["for_emp_section_3"][0]->sec2_col1_link_txt; ?></a> </div>
              </div>
              <div class="col-md-4 col-sm-6"> <img src="<?=base_url()?>assets/images/<?php echo $home["for_emp_section_3"][0]->sec2_col2_img; ?>" alt="" />
                <div class="content-text">
                  <h3>Step 2</h3>
                  <a href="<?php echo $home["for_emp_section_3"][0]->sec2_col2_link; ?>" type="search"> <?php echo $home["for_emp_section_3"][0]->sec2_col2_link_txt; ?></a> </div>
              </div>
              <div class="col-md-4 col-sm-6"> <img src="<?=base_url()?>assets/images/<?php echo $home["for_emp_section_3"][0]->sec2_col3_img; ?>" alt="" />
                <div class="content-text">
                  <h3>Step 3</h3>
                  <a href="<?php echo $home["for_emp_section_3"][0]->sec2_col3_link; ?>" type="search"><?php echo $home["for_emp_section_3"][0]->sec2_col3_link_txt; ?></a> </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Plans -->
        <div id="plans" class="wow fadeInUp">
          <div class="container">
            <div class="row">
              <div class="text-center">
                <h2><?php echo $home["for_emp_section_3"][0]->sec3_heading; ?></h2>
                <p><?php echo $home["for_emp_section_3"][0]->sec3_title; ?></p>
              </div>
              <!-- item -->
              <div class="one col-md-4 text-center">
                <div class="panel panel-danger panel-pricing">
                  <div class="panel-header"> <img src="<?=base_url()?>assets/images/<?php echo $home["for_emp_section_3"][0]->sec3_col1_img; ?>" alt=""/>
                    <h3><?php echo $home["for_emp_section_3"][0]->sec3_col1_title; ?></h3>
                  </div>
                  <ul class="list-group text-center">
                    <?php
              $section_1_price =  explode(",",$home["for_emp_section_3"][0]->sec3_col1_list_item);
              foreach($section_1_price as $price_value){
                ?>
                    <li class="list-group-item"><?php echo $price_value; ?></li>
                    <?php }?>
                  </ul>
                  <div class="panel-footer"> <a class="btn btn-lg btn-block btn-danger" href="<?php echo $home["for_emp_section_3"][0]->sec3_col1_link;?>">Get Started</a> </div>
                </div>
              </div>
              <!-- /item -->

              <!-- item -->
              <div class="two col-md-4 text-center">
                <div class="panel panel-warning panel-pricing">
                  <div class="panel-header"> <img src="<?=base_url()?>assets/images/<?php echo $home["for_emp_section_3"][0]->sec3_col2_img; ?>" alt=""/>
                    <h3><?php echo $home["for_emp_section_3"][0]->sec3_col2_title; ?></h3>
                  </div>
                  <ul class="list-group text-center">
                    <?php
            $section_2_price =  explode(",",$home["for_emp_section_3"][0]->sec3_col2_list_item);
            foreach($section_2_price as $price_value){
              ?>
                    <li class="list-group-item"><?php echo $price_value; ?></li>
                    <?php }?>
                  </ul>
                  <div class="panel-footer"> <a class="btn btn-lg btn-block btn-warning" href="<?php echo $home["for_emp_section_3"][0]->sec3_col2_link;?>">Get Started</a> </div>
                </div>
              </div>
              <!-- /item -->

              <!-- item -->
              <div class="three col-md-4 text-center">
                <div class="panel panel-success panel-pricing">
                  <div class="panel-header"> <img src="<?=base_url()?>assets/images/<?php echo $home["for_emp_section_3"][0]->sec3_col3_img; ?>" alt=""/>
                    <h3><?php echo $home["for_emp_section_3"][0]->sec3_col3_title; ?></h3>
                  </div>
                  <ul class="list-group text-center">
                    <?php
            $section_3_price =  explode(",",$home["for_emp_section_3"][0]->sec3_col3_list_item);
            foreach($section_3_price as $price_value){
              ?>
                    <li class="list-group-item"><?php echo $price_value; ?></li>
                    <?php }?>
                  </ul>
                  <div class="panel-footer"> <a class="btn btn-lg btn-block btn-success" href="<?php echo $home["for_emp_section_3"][0]->sec3_col3_link;?>">Get Started</a> </div>
                </div>
              </div>
              <!-- /item -->

            </div>
          </div>
        </div>
        <!-- /Plans -->

        <div class="wow fadeInUp counters">
          <div class="container">

            <h2><?php echo $home["for_candi_stats"][1]->home_sec3_heading; ?></h2>
            <p><?php echo $home["for_candi_stats"][1]->home_sec3_title; ?></p>
            <div class="row">
              <div class="col-md-3">
                <div class="thumbnail"> <img src="<?=base_url()?>assets/images/<?php echo  $home["for_candi_stats"][1]->home_sec3_col1_img; ?>" alt="" /> </div>
                <h5 class="timer count-title" id="count-number-a" data-to="<?php echo $home["for_candi_stats"][1]->home_sec3_col1_counter; ?>" data-speed="1500"><?php echo $home["for_candi_stats"][1]->home_sec3_col1_counter; ?></h5>
                <h6><?php echo  $home["for_candi_stats"][1]->home_sec3_col1_text; ?></h6>
              </div>
              <div class="col-md-3">
                <div class="thumbnail"> <img src="<?=base_url()?>assets/images/<?php echo  $home["for_candi_stats"][1]->home_sec3_col2_img; ?>" alt="" /> </div>
                <h5 class="timer count-title" id="count-number-b" data-to="90" data-speed="<?php echo $home["for_candi_stats"][1]->home_sec3_col2_counter; ?>"></h5>
                <h6><?php echo  $home["for_candi_stats"][1]->home_sec3_col2_text; ?></h6>
              </div>
              <div class="col-md-3">
                <div class="thumbnail"> <img src="<?=base_url()?>assets/images/<?php echo  $home["for_candi_stats"][1]->home_sec3_col3_img; ?>" alt="" /> </div>
                <h5 class="timer count-title" id="count-number-c" data-to="<?php echo $home["for_candi_stats"][1]->home_sec3_col3_counter; ?>" data-speed="1500"></h5>
                <h6><?php echo  $home["for_candi_stats"][1]->home_sec3_col3_text; ?></h6>
              </div>
              <div class="col-md-3">
                <div class="thumbnail"> <img src="<?=base_url()?>assets/images/<?php echo  $home["for_candi_stats"][1]->home_sec3_col4_img; ?>" alt="" /> </div>
                <h5 class="timer count-title" id="count-number-d" data-to="<?php echo $home["for_candi_stats"][1]->home_sec3_col4_counter; ?>" data-speed="1500"></h5>
                <h6><?php echo  $home["for_candi_stats"][1]->home_sec3_col4_text; ?></h6>
              </div>
            </div>
          </div>
        </div>
        <?php

		if(!empty($testimonials_For_Employer)){
		?>
        <div class="wow fadeInUp testimonials">
          <div class="container">
            <h2><?php echo $testimonials_For_Employer[0]->main_heading ?></h2>
            <div id="carousel">
              <div class="btn-bar">
                <div id="buttons" class="buttons_emp"><a id="prev" href="#"></a><a id="next-a" href="#"></a> </div>
              </div>
              <div id="slides" class="slides-emp">
                <ul>
                  <?php

			if(!empty($testimonials_For_Employer)){
				foreach($testimonials_For_Employer as $For_Employer){

			?>
                  <li class="slide slide-emp">
                    <div class="author-container">
                      <div class="info"><img src="<?=base_url()?>assets/images/testimonials_images/<?php echo $For_Employer->testimonials_pic ?>" alt=""/> </div>
                      <div class="response">
                        <p class="quote1-phrase"><?php echo $For_Employer->testimonials_desc ?></p>
                        <p class="quote1-author"><?php echo $For_Employer->testimonials_name ?><br>
                          <span><?php echo $For_Employer->testimonials_company ?></span></p>
                      </div>
                    </div>
                  </li>
                  <?php 	}
			}
			?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <?php 	}

			?>
        <div class="wow fadeInUp help">
          <div class="container">
            <h2><?php echo $emp_carousel_data->heading?></h2>
            <p><?php echo $emp_carousel_data->content?></p>
            <div class="row">
              <div class="parent_thumbnail">
              <?php
                $images = json_decode($emp_carousel_data->images);
                foreach($images as $image){ ?>
              <div class="thumbnail car_thumb"> <img style="max-width:200px" src="<?=base_url()?>upload/carousel/<?php echo $image;?>" alt="" /> </div>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="menu2" class="pay-band tab-pane fade">
        <div class="container">
          <div class="row">
            <div class="col-md-6"> <?php echo $sec1_data["exp_text"]; ?> <a class="btn-start" href="<?php echo $sec1_data["exp_link"]; ?>" title="Let's Go" >GET STARTED</a> </div>
            <div class="video col-md-6">
              <!--<iframe width="512" height="380" src="<?php //echo $sec1_data['exp_video_link']; ?>" frameborder="0" allowfullscreen></iframe>
              <iframe src="https://www.amazetal.com/index.php?/home/exp_video" frameborder="0" style="border: 0px none; width: 100%; height: 350px; overflow: hidden;"></iframe>-->
              <div class="flowplayer" data-swf="flowplayer.swf" data-embed="false" data-poster="<?php echo base_url().'assets/images/new-video-place.jpg';?>">
              <video width="512" height="380">
    			<source src="<?php echo $sec1_data['exp_video_link'];?>" type="video/mp4">
    		  </video>
              <div class="fp-context-menu">
                 <ul>
                   <li><a href="<?php echo base_url();?>">AmazeTal</a></li>
                 </ul>
               </div>
              </div>

            </div>
          </div>
        </div>
        <div class="wow fadeInUp connects" style="background: rgba(0, 0, 0, 0) url(assets/images/<?php echo $home["section_3_exp_image"]; ?>) no-repeat scroll center center / cover;">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2><?php echo $home["section_3_exp_head"]; ?></h2>
                <p><?php echo $home["section_3_exp_desc"]; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="wow fadeInUp spot-light">
          <div class="container-fluid">
            <div class="row">
              <div class="expert-1 col-md-4">
                <div class="content-text">
                  <h3><?php echo $home['section_3_exp'][0]->exp_sec1_col1_heading; ?></h3>
                  <p><?php echo $home["section_3_exp"][0]->exp_sec1_col1_txt; ?></p>
                  <a href="<?php echo $home["section_3_exp"][0]->exp_sec1_col1_link; ?>">Read More</a> </div>
              </div>
              <div class="expert-2 col-md-4">
                <div class="content-text">
                  <h3><?php echo $home['section_3_exp'][0]->exp_sec1_col2_heading; ?></h3>
                  <p><?php echo $home["section_3_exp"][0]->exp_sec1_col2_txt; ?></p>
                  <a href="<?php echo $home["section_3_exp"][0]->exp_sec1_col2_link; ?>">Read More</a> </div>
              </div>
              <div class="expert-3 col-md-4">
                <div class="content-text">
                  <h3><?php echo $home['section_3_exp'][0]->exp_sec1_col3_heading; ?></h3>
                  <p><?php echo $home["section_3_exp"][0]->exp_sec1_col3_txt; ?></p>
                  <a href="<?php echo $home["section_3_exp"][0]->exp_sec1_col3_link; ?>">Read More</a> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="wow fadeInUp works">
          <div class="container">
            <h2><?php echo $home['section_3_exp'][0]->exp_sec2_heading; ?></h2>
            <p><?php echo $home['section_3_exp'][0]->exp_sec2_title; ?></p>
            <div class="row">
              <div class="col-md-3"> <img src="<?=base_url()?>assets/images/<?php echo $home['section_3_exp'][0]->exp_sec2_col1_img; ?>" alt="" /> <a href="<?php echo $home['section_3_exp'][0]->exp_sec2_col1_link; ?>"><?php echo $home['section_3_exp'][0]->exp_sec2_col1_link_txt; ?></a>
                <p><?php echo $home['section_3_exp'][0]->exp_sec2_col1_txt; ?></p>
              </div>
              <div class="col-md-3"> <img src="<?=base_url()?>assets/images/<?php echo $home['section_3_exp'][0]->exp_sec2_col2_img; ?>" alt="" /> <a href="<?php echo $home['section_3_exp'][0]->exp_sec2_col2_link; ?>"><?php echo $home['section_3_exp'][0]->exp_sec2_col2_link_txt; ?></a>
                <p><?php echo $home['section_3_exp'][0]->exp_sec2_col2_txt; ?></p>
              </div>
              <div class="col-md-3"> <img src="<?=base_url()?>assets/images/<?php echo $home['section_3_exp'][0]->exp_sec2_col3_img; ?>" alt="" /> <a href="<?php echo $home['section_3_exp'][0]->exp_sec2_col3_link; ?>"><?php echo $home['section_3_exp'][0]->exp_sec2_col3_link_txt; ?></a>
                <p><?php echo $home['section_3_exp'][0]->exp_sec2_col2_txt; ?></p>
              </div>
              <div class="col-md-3"> <img src="<?=base_url()?>assets/images/<?php echo $home['section_3_exp'][0]->exp_sec2_col4_img; ?>" alt="" /> <a href="<?php echo $home['section_3_exp'][0]->exp_sec2_col4_link; ?>"><?php echo $home['section_3_exp'][0]->exp_sec2_col4_link_txt; ?></a>
                <p><?php echo $home['section_3_exp'][0]->exp_sec2_col2_txt; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="wow fadeInUp counters">

          <div class="container">
            <h2><?php echo $home["for_candi_stats"][2]->home_sec3_heading; ?></h2>
            <p><?php echo $home["for_candi_stats"][2]->home_sec3_title; ?></p>
            <div class="row">
              <div class="col-md-3">
                <div class="thumbnail"> <img src="<?php base_url(); ?>assets/images/<?php echo  $home["for_candi_stats"][2]->home_sec3_col1_img; ?>" alt="" /> </div>
                <h5 class="timer count-title" id="count-number-w" data-to="<?php echo $home["for_candi_stats"][2]->home_sec3_col1_counter; ?>" data-speed="1500"></h5>
                <h6><?php echo  $home["for_candi_stats"][2]->home_sec3_col1_text; ?></h6>
              </div>
              <div class="col-md-3">
                <div class="thumbnail"> <img src="<?php base_url(); ?>assets/images/<?php echo  $home["for_candi_stats"][2]->home_sec3_col2_img; ?>" alt="" /> </div>
                <h5 class="timer count-title" id="count-number-x" data-to="<?php echo $home["for_candi_stats"][2]->home_sec3_col2_counter; ?>" data-speed="1500"></h5>
                <h6><?php echo  $home["for_candi_stats"][2]->home_sec3_col2_text; ?></h6>
              </div>
              <div class="col-md-3">
                <div class="thumbnail"> <img src="<?php base_url(); ?>assets/images/<?php echo  $home["for_candi_stats"][2]->home_sec3_col3_img; ?>" alt="" /> </div>
                <h5 class="timer count-title" id="count-number-y" data-to="<?php echo $home["for_candi_stats"][2]->home_sec3_col3_counter; ?>" data-speed="1500"></h5>
                <h6><?php echo  $home["for_candi_stats"][2]->home_sec3_col3_text; ?></h6>
              </div>
              <div class="col-md-3">
                <div class="thumbnail"> <img src="<?php base_url(); ?>assets/images/<?php echo  $home["for_candi_stats"][2]->home_sec3_col4_img; ?>" alt="" /> </div>
                <h5 class="timer count-title" id="count-number-z" data-to="<?php echo $home["for_candi_stats"][2]->home_sec3_col4_counter; ?>" data-speed="1500"></h5>
                <h6><?php echo  $home["for_candi_stats"][2]->home_sec3_col4_text; ?></h6>
              </div>
            </div>
          </div>
        </div>
        <?php

		if(!empty($testimonials_For_expert)){
		?>
        <div class="wow fadeInUp testimonials">
          <div class="container">
            <h2><?php echo $testimonials_For_expert[0]->main_heading ?></h2>
            <div id="carousel">
              <div class="btn-bar">
                <div id="buttons" class="buttons_exp" ><a id="prev" href="#"></a><a id="next-b" href="#"></a> </div>
              </div>
              <div id="slides" class="slides-exp">
                <ul>
                  <?php

			if(!empty($testimonials_For_expert)){
				foreach($testimonials_For_expert as $For_expert){

			?>
                  <li class="slide slide-exp">
                    <div class="author-container">
                      <div class="info"><img src="<?=base_url()?>assets/images/testimonials_images/<?php echo $For_expert->testimonials_pic ?>" alt=""/> </div>
                      <div class="response">
                        <p class="quote1-phrase"><?php echo $For_expert->testimonials_desc ?></p>
                        <p class="quote1-author"><?php echo $For_expert->testimonials_name ?><br>
                          <span><?php echo $For_expert->testimonials_company ?></span></p>
                      </div>
                    </div>
                  </li>
                  <?php 	}
				}

			?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <?php 	}


			// include('carousel_company_helped.php');
			//$this->load->view('carousel_company_helped',$data);
			?>

            <div class="wow fadeInUp help">
          <div class="container">
            <h2><?php echo $exp_carousel_data->heading?></h2>
            <p><?php echo $exp_carousel_data->content?></p>

            <div class="row">
              <div class="parent_thumbnail">
              <?php
                $images = json_decode($exp_carousel_data->images);
                foreach($images as $image){ ?>
              <div class="thumbnail car_thumb"> <img src="<?=base_url()?>upload/carousel/<?php echo $image;?>" alt="" /> </div>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!---menu2-->
    </div>
  </div>
</div>
<!--<div class="round-button">
    <div class="round-button-circle">
    <a href="http://example.com" class="round-button">Update!</a>
    </div>
</div>-->

<!--End main Wrapper-->
<script>
jQuery(window).load(function(e) {
    <?php if($this->uri->segment(1) == 'foremployer'){?>
        $(".nav.nav-tabs li").removeClass("active");
        $(".tab-content .tab-pane").removeClass("in");
        $(".tab-content .tab-pane").removeClass("active");
        $(".nav.nav-tabs li").eq(1).addClass("active");
        $(".tab-content .tab-pane#menu1").addClass("active");
        $(".tab-content .tab-pane#menu1").addClass("in");
        
        $('html, body').animate({
            scrollTop: $("#tab-header").offset().top
        }, 1000);
    <?php } ?>
});
</script>