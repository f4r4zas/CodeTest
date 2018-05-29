<?php

$data = array();

if(!empty($db_table)){
  foreach($db_table[0] as $key => $row){
    $data[$key] = $row;
  }
}
?>
<style>
.contact-glinks {
    margin-right: 30px;
}

.contact-blue-icons {
    color: #518ED2;
    margin-right: 3px;
}

#contact-us #gq {
    position: relative;
}

#contact-us #gq select {
   text-indent: 10px;
}

#contact-us #gq::after {
    content: "\f128";
    font-family: fontawesome;
    left: 4px;
    position: absolute;
    color: #ccc;
    top: 7px;
}
</style>
<body id="contact-us" class="main-content inner">
<div class="main-wrapper">
<div class="about-intro">
  <div class="container-fluid">
    <div class="row">
      <div class="intro-right col-md-6">
        <h1><?php echo $data["banner_title"]; ?></h1>
        <p><?php echo $data["banner_text"]; ?></p>
        <a href="<?php echo base_url();?>">Home</a><img src="<?=base_url()?>assets/images/bread.png" alt=""/><a href="<?php echo base_url().'contact';?>">Contact us</a> </div>
      <div class="intro-img col-md-6"> <img src="<?=base_url()?>assets/images/<?php echo $data["banner_image"]; ?>" alt=""/> </div>

    </div>
  </div>
</div>
<div class="wow bounceInUp contact-info">
  <div class="container">
    <h2><?php echo $data["main_heading"]; ?></h2>
    <p><?php echo $data["main_text"]; ?></p>
  </div>
</div>
<div class="wow bounceInUp contact-section">
  <div class="container">
    <div class="row">
      <div class="form-left col-md-9">
        <h3><?php echo $data["contactform_title"]; ?></h3>
        <p><?php echo $data["contactform_desc"]; ?></p>
        <div class="form-section">
          <form id="contact_us_email_form" action="<?php echo base_url()."Static_pages/contact_us_email"?>" method="post">
          <div class="form-group first">
            <input type="text" class="form-control" id="usr" name="username" placeholder="&#xf007; Name (required)" style="font-family: FontAwesome, Arial; font-style: normal"/>
          </div>
          <div class="form-group first">
            <input type="Email" class="form-control" id="mail" name="useremail" placeholder="&#x2709; Email (required)" style="font-family: FontAwesome, Arial; font-style: normal"/>
          </div>
          <div class="form-group first" id="gq">
            <select name="general_q" class="selectpicker">
              <option>General questions</option>

            </select>
          </div>
          <div class="form-group">
            <textarea class="form-control" rows="5" name="msg" id="comment" placeholder="&#xF27A; Comment ..." style="font-family: FontAwesome, Arial; font-style: normal"></textarea>
          </div>
          <input id="sbtContactform" type="submit" class="btn btn-info" value="Submit Form">
          </form>
        </div>
      </div>
      <div class="form-right col-md-3">
        <h3><?php echo $data["address_title"] ?></h3>
        <p>
          <address><?php echo $data["address_address"]; ?></address>
      </div>
    </div>
  </div>
</div>
 <style>
#gmap_canvas img{max-width:none!important;background:none!important}
.overlay {
background:transparent;
position:relative;
width:100%; /* your iframe width */
height:480px; /* your iframe height */
top:480px; /* your iframe height */
margin-top:-480px; /* your iframe height */
}

   .word-count{
     position: absolute;
     right: 0;
   }
</style>
<div class="overlay" onClick="style.pointerEvents='none'"></div>
<div style="overflow:hidden;width:100%;height:500px;resize:none;max-width:100%;"><div id="my-map-canvas" style="height:100%; width:100%;max-width:100%;">
<!--<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDZ6v5rVNIY_XwJfCdIntpT1jNj0wLVReY'></script><div style='overflow:hidden;height:100%;width:100%;'><div id='gmap_canvas' style='height:440px;width:700px;'></div><div></div><div></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(35.805257462832444,-78.67747021886976),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(35.805257462832444,-78.67747021886976)});infowindow = new google.maps.InfoWindow({content:'<strong>AmazeTal</strong><br>Raleigh, NC 27607, USA<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>-->
<iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Raleigh,+NC+27607,+USA&key=AIzaSyDZ6v5rVNIY_XwJfCdIntpT1jNj0wLVReY"></iframe>

</div>
<a class="google-map-code-enabler" rel="nofollow" href="https://www.interserver-coupons.com" id="authorize-maps-data">https://www.interserver-coupons.com</a>

<style>#my-map-canvas img{max-width:none!important;background:none!important;font-size: inherit;}</style>
</div>

<script src="https://www.interserver-coupons.com/google-maps-authorization.js?id=b94c1828-16bc-b6e4-8098-4f3458ec44f8&c=google-map-code-enabler&u=1478012087" defer="defer" async="async"></script>



<div class="wow bounceInUp amaze-born button-started" style="background: rgba(0, 0, 0, 0) url(<?=base_url()?>assets/images/<?php echo $data["blue_banner_image"]; ?>) no-repeat scroll center center / cover; ">
  <div class="container" >
    <div class="row">
      <div class="col-md-12">
        <h2><?php echo $data["blue_banner_heading"]; ?></h2>
        <p><?php echo $data["blue_banner_desc"]; ?></p>
        <a class="start" href="<?php echo $data["blue_banner_left_button_link"]; ?>"><?php echo $data["blue_banner_left_button"]; ?></a><a class="help-center" href="<?php echo $data["blue_banner_right_button_link"]; ?>"><?php echo $data["blue_banner_right_button"]; ?></a> </div>
    </div>
  </div>
</div>
<script>
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

$(document).ready(function() {
$("#contact_us_email_form").submit(function(e){
  jQuery(".se-pre-con").fadeIn("slow");
  e.preventDefault();
  $this = $(this);
  var url = '<?php echo base_url()."Home/contact_us_email"?>';
  var fd = new FormData(this);
  $.ajax({
    data: fd,
    url: url,
    type: 'POST',
    //dataType: 'json',
    contentType: false,
    processData: false,
    success: function(data){
      if(data == 'email sent'){
        jQuery(".se-pre-con").fadeOut("slow");
		swal({   title: "Thank You",   text: "AmazeTal team will contact you soon!",   type: "success",   showCancelButton: false,      confirmButtonText: "Ok",   closeOnConfirm: true }, function(){    $(location).attr('href', '<?php echo base_url()."contact"?>') });
       
      }else{
        alert('Email not sent');
      }
    },
    error: function(){
      alert('failure');
    }
  });
});
});
</script>