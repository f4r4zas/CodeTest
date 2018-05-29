<?php

$data = array();
$blog_post = array();

if(!empty($db_table)){
  foreach($db_table as $key => $row){
    $data[$key] = $row;
  }
}
if(!empty($db_press_post)){
  foreach($db_press_post as $key => $row){
    $blog_post[$key] = $row;
  }
}
?>

<body id="press" class="main-content inner">
<div class="main-wrapper">
<div class="about-intro">
  <div class="container-fluid">
    <div class="row">
      <div class="intro-right col-md-6">
        <h1><?php echo $data[0]->main_heading?></h1>
        <p><?php echo $data[0]->main_text?></p>
        <a href="<?php echo base_url();?>">Home</a><img alt="" src="<?=base_url()?>assets/images/bread.png"><a href="<?php echo base_url();?>press">Press</a> </div>
      <div class="intro-img col-md-6"> <img src="<?=base_url()?>assets/images/<?php echo $data[0]->main_banner; ?>" alt=""/> </div>
    </div>
  </div>
</div>
<div id="jump" class="wow fadeInUp talent space">
  <div class="container">
    <div class="row">
      <div class="text-centers col-md-8 col-md-offset-2">
        <h2><?php echo $data[0]->sub_heading; ?></h2>
        <p><?php echo $data[0]->sub_text; ?></p>
      </div>
      <div class="col-md-2"></div>
      <div id="content">
      <?php
      if(!empty($blog_post)):
        foreach($blog_post as $post):
          ?>
          <div class="paginate col-md-4 col-sm-6 col-xs-12">

              <img style="height: 210px" src="<?php echo base_url().'assets/images/'.$post->post_img; ?>" alt=""/>
            
            <div class="text-content">
              <a href="<?php echo base_url().'pressFullPost/'.$post->press_post_id; ?>">
                <h3><?php echo $post->post_heading; ?></h3>
              </a>
              <div class="">
                <p>By <a hef="#">Admin</a> | <?php echo date('F jS, Y',strtotime($post->post_created_on));?></p>
              </div>
              <?php echo $post->post_text; ?>
              <?php if(!empty($post->external_link)){?>
                <a class="read_more_button" target="_blank" href="<?php echo $this->custom_functions->checkHttpUrl($post->external_link); ?>">Read More</a>
              <?php }
              else{
              ?>
              <a href="<?php echo base_url().'pressFullPost/'.$post->press_post_id; ?>">Read More</a>
          <?php }?>
              </div>

          </div>
          <?php
        endforeach;
      endif;
      ?>
        </div>
<!--      <div id="content">-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-1.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-2.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-2.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-3.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-2.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-4.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-2.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-3.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-5.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-2.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-6.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-2.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-6.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-2.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-5.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-6.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-6.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--        <div class="paginate col-md-4"> <img src="--><?//=base_url()?><!--assets/images/post-5.jpg" alt=""/>-->
<!--          <div class="text-content">-->
<!--            <h3>Lorem Ipsums Un Voluptas</h3>-->
<!--            <div class="author-info"> </div>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
<!--            <a href="#">Read More</a> </div>-->
<!--        </div>-->
<!--      </div>-->
      <div id="pagingControls"></div>
    </div>
  </div>
</div>
<div class="wow fadeInUp amaze-born button-started" style="background-image: url('<?=base_url()?>assets/images/<?php echo $data[0]->sec_back_img; ?>')">
  <div class="container">
    <div class="row">
      <div class="text-centers" style="padding-bottom:0">
        <h2 class="col-md-12"><?php echo $data[0]->sec_title?><br><br></h2>
        <p class="col-md-10 col-md-offset-1"><?php echo $data[0]->sec_desc?></p>
        <span class="col-md-1"></span>
        <div class="col-md-12"><br><br></div>
        <a class="start" href="<?php echo base_url();?><?php echo $data[0]->sec_left_btn_link?>"><?php echo $data[0]->sec_left_btn?></a><a class="help-center" href="<?php echo base_url();?><?php echo $data[0]->sec_right_btn_link?>"><?php echo $data[0]->sec_right_btn?></a> </div>
    </div>
  </div>
</div>
<script>
var Imtech = {};
Imtech.Pager = function() {
    this.paragraphsPerPage = 3;
    this.currentPage = 1;
    this.pagingControlsContainer = '#pagingControls';
    this.pagingContainerPath = '#content';

    this.numPages = function() {
        var numPages = 0;
        if (this.paragraphs != null && this.paragraphsPerPage != null) {
            numPages = Math.ceil(this.paragraphs.length / this.paragraphsPerPage);
        }
        
        return numPages;
    };

    this.showPage = function(page) {
        this.currentPage = page;
        var html = '';

        this.paragraphs.slice((page-1) * this.paragraphsPerPage,
            ((page-1)*this.paragraphsPerPage) + this.paragraphsPerPage).each(function() {
            html += '<div class="my-container col-md-4 col-sm-6 col-xs-12">' + '<div class="inner-container">' + $(this).html() + '</div>' + '</div>';
        });

        $(this.pagingContainerPath).html(html);

        renderControls(this.pagingControlsContainer, this.currentPage, this.numPages());
    }

    var renderControls = function(container, currentPage, numPages) {
        var pagingControls = '<ul>';
        for (var i = 1; i <= numPages; i++) {
            if (i != currentPage) {
                pagingControls += '<li class="disable"><a href="#" onclick="pager.showPage(' + i + '); return false;">' + i + '</a></li>';
            } else {
                pagingControls += '<li>' + i + '</li>';
            }
        }

        pagingControls += '</ul>';

        $(container).html(pagingControls);
    }
}

</script> 
<script type="text/javascript">
var pager = new Imtech.Pager();
$(document).ready(function() {
    pager.paragraphsPerPage = 6; // set amount elements per page
    pager.pagingContainer = $('#content'); // set of main container
    pager.paragraphs = $('div.paginate', pager.pagingContainer); // set of required containers
    pager.showPage(1);
	
});

$(document).ready(function(){
	$('#content').find('.my-container').css('cursor','pointer');
	$('#content').on('click','.my-container',function(e){
		$this = $(this);
		window.open($this.find("a.read_more_button").attr("href")); 
		return false;
	});
});

</script>