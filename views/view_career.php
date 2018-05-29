<?php

$data = array();
$career_post = array();

if(!empty($db_table)){
  foreach($db_table[0] as $key => $row){
    $data[$key] = $row;
  }
}
if(!empty($db_post)){
  foreach($db_post as $key => $row){
    $career_post[$key] = $row;
  }
}
?>
<body id="jobs" class="career main-content inner">
<div class="main-wrapper">
<div class="about-intro">
  <div class="container-fluid">
    <div class="row">
      <div class="intro-right col-md-6">
        <h1><?php echo $data['r1_heading']?></h1>
        <p><?php echo $data['r1_desc']?></p>
        <a href="<?php echo base_url();?>">Home</a><img alt="" src="<?=base_url()?>assets/images/bread.png"><a href="<?php echo base_url().'career';?>">Careers</a>
      </div>
      <div class="intro-img col-md-6"> <img src="<?php echo base_url() . 'assets/images/'. $data['r1_image'] ?>" alt=""/> </div>
    </div>
  </div>
</div>
<div class="wow fadeInUp talent space">
  <div class="container">
    <div class="row">
      <h2><?php echo $data['r2_heading']?></h2>
      <p class="intro-text" style="margin: 0 0 40px;"><?php echo $data['r2_desc']?></p>
      <div id="content">
        <?php
        if(!empty($career_post)):
        foreach($career_post as $post):
        ?>
        <div class="paginate col-md-4">
          <img src="<?php echo base_url().'assets/images/'.$post->career_post_img; ?>" alt=""/>
          <div class="text-content">
            <h3><?php echo $post->career_post_heading; ?></h3>
            <div class="info"> <a target="_blank" href="<?php echo $this->custom_functions->checkHttpUrl($post->career_post_link); ?>"><?php echo $post->career_post_sub_heading; ?></a>
              <div class="address"><?php echo $post->career_post_text; ?></div>
<!--              <div class="post-date">Job Posted Date: 25-04-16</div>-->
<!--              <div class="job-expire">Job Expiration Date: 25-04-16</div>-->
            </div>
            <?php
            if($post->career_post_level == '0'){
              $post->career_post_level =  'Entry Level';
            }
            else if($post->career_post_level == '1'){
              $post->career_post_level =  '> 1 year';
            }
            else{
              $post->career_post_level =  '1 year or more';
            }
            //                    range
            if($post->career_post_rang == '0'){
              $post->career_post_rang =  '$40k - $70k';
            }
            else if($post->career_post_rang == '1'){
              $post->career_post_rang =  '$70k - $90k';
            }
            else if($post->career_post_rang == '2'){
              $post->career_post_rang =  '$90k - $110k';
            }
            else if($post->career_post_rang == '3'){
              $post->career_post_rang =  '$110k - $130k';
            }
            else if($post->career_post_rang == '4'){
              $post->career_post_rang =  '$130k - $150k';
            }
            else if($post->career_post_rang == '5'){
              $post->career_post_rang =  '$150k - $180k';
            }
            else if($post->career_post_rang == '6'){
              $post->career_post_rang =  '$180k - $200k';
            }
            else{
              $post->career_post_rang =  'more than $200k';
            }

            //                    Period
            if($post->career_post_period == '0'){
              $post->career_post_period =  'Part Time';
            }
            else if($post->career_post_period == '1'){
              $post->career_post_period =  'Full Time';
            }
            else{
              $post->career_post_period =  'Freelance';
            }
            ?>
            <div class="detail-info"> <span class="level"><?php echo $post->career_post_level; ?></span> | <span class="salary"><?php echo $post->career_post_rang; ?></span> | <span class="time"><?php echo $post->career_post_period; ?></span> </div>
          </div>
        </div>
          <?php
        endforeach;
        endif;
        ?>
      </div>
    </div>
    <div id="pagingControls"></div>
  </div>
</div>
<div class="wow fadeInUp amaze-born button-started" style="background: rgba(0, 0, 0, 0) url(/assets/images/<?php echo $data['r4_image']; ?>) repeat scroll center center / cover;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2><?php echo $data['r4_heading']; ?></h2>
        <p><?php echo $data['r4_desc']; ?></p>
        <a class="start" href="<?php echo $data['r4_link1']; ?>">Get started</a><a class="help-center" href="<?php echo $data['r4_link2']; ?>">HELP CENTER</a> </div>
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
            html += '<a href="#">' + '<div class="my-container col-md-4 col-sm-6 col-xs-12">' + '<div class="inner-container">' + $(this).html() + '</div>' + '</div>' + "</a";
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
</script> 
<!---End main Wrapper-->