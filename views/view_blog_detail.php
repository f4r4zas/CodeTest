<style>
@media (max-width: 768px) {
.profilepicarea {
    display:none;
}
}

.rightsidearea li {
    margin-bottom: 10px;
}

.rightsidearea .contdetails p.author {
    display: inline-block;
    font-size: 10px;
    color: #807b7b;
    width: 92px;
    margin: 0;
    vertical-align: top;
}

.rightsidearea .contdetails p.time {
    line-height: inherit;
    float: none;
    vertical-align: top;
    margin: 0;
    display: inline-block;
}
    
#blog.inner .main-wrapper .blogbox h3 {
    color: #fff;
}
.inner p {
    font-size: 14px;
}

.blogger .contentdescp {
    width: 72%;
}
.blogger .contentinfo p {
    width: auto;
    font-size: 14px;
}

.rightsidearea .contdetails p.time {
    max-width: 50px;
    /*line-height: 15px;*/
}
#blog.inner .main-wrapper h2 {
    color: #252525;
    font-family: proxima-nova, roboto;
    font-size: 1.25em;
    text-align: left;
    text-transform: uppercase;
}

#blog.inner .main-wrapper h3 {
    color: #252525;
    font-family: proxima-nova, roboto;
    font-size: 1.2em;
    text-align: left;
    text-transform: uppercase;
}

.recommandedsec li span.increment, .popularsec li span.increment {
    background-color: #ff4624;
    color: #fff;
    border-radius: 60px;
    padding: 0px 11px;
    position: absolute;
    left: -14px;
    font-size: 12px;
    top: 16px;
    width: inherit;
    height: inherit;
}

.recommandedsec li span, .popularsec li span {
    display: inline-block;
    width: 63px;
    height: 63px;
    vertical-align: top;
    background-position: center center;
    background-size: cover;
}
</style>
<body id="blog" class="myBlog main-content inner">
<div class="main-wrapper">


<!---End main Wrapper-->
<?php /*echo "<pre>";
print_r($blog_full_post[0]);
echo "</pre>";*/?>




<div class="customblog">
<?php if(!empty($blog_full_post[0]->banner_image)){?>
<div class="blogbanner" style="background-image: url(<?php echo base_url().'assets/images/'. $blog_full_post[0]->banner_image;?>);">

</div>
<?php } ?>

<div class="Blogmaininner">




<div class="container" style="margin-top: 35px;">



<div class="bloginnercontent" style="float: none;">

<div class="blogleftin">
<div class="col-md-2 fixit sidebar wow fadeInLeft">
<div class="profilepicarea">
<img width="90" height="90" src="<?php echo (!empty($blog_full_post[0]->author_img)?'/assets/images/'.$blog_full_post[0]->author_img:'/assets/images/iconpic1.png');?>">
<h3 style="text-align: right;"><?php echo (!empty($blog_full_post[0]->author_name)?$blog_full_post[0]->author_name:'Admin');?></h3>
<h5><?php echo date('F jS, Y',strtotime($blog_full_post[0]->datecreated));?></h5>
</div>

</div>
</div>

<div class="blogcenterin">
<div class="col-md-7 wow fadeInUp">

<div class="blogcontentarea">
<h1 style="margin-top: 0; line-height: 25px; font-size: 1.8em;"><?php echo isset($blog_full_post[0]->blog_heading) ?  $blog_full_post[0]->blog_heading : "";?></h1>
<!--Upper Share Box-->
<div class="uppersharebox wow fadeInUp" style="text-align: left; margin-bottom: 30px;">
<?php $blogPostUrl = base_url().'blog/'.$blog_full_post[0]->slug;
$encoded = urlencode($blogPostUrl);?>

<a href="javascript:void(0)" class="icon-fb" onclick="javascript:genericSocialShare('http://www.facebook.com/sharer.php?u=<?php echo $encoded;?>')" title="Facebook Share"><img src="<?php echo base_url().'assets/images/';?>fb.png"/></a>
        <a href="javascript:void(0)" onclick="javascript:genericSocialShare('https://plus.google.com/share?url=<?php echo $encoded;?>')" class="icon-gplus" title="Google Plus Share"><img src="<?php echo base_url().'assets/images/';?>gp.png"/></a>
        <a href="javascript:void(0)" class="icon-tw" onclick="javascript:genericSocialShare('http://twitter.com/share?text=<?php echo $blog_full_post[0]->blog_heading;?>&url=<?php echo $encoded;?>')" title="Twitter Share"><img src="<?php echo base_url().'assets/images/';?>tw.png"/></a>
        <a href="javascript:void(0)" class="icon-linked_in" onclick="javascript:genericSocialShare('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $encoded;?>')" title="LinkedIn Share"><img src="<?php echo base_url().'assets/images/';?>in.png"/></a>
        <a href="javascript:void(0)" class="icon-linked_in" onclick="javascript:genericSocialShare('http://pinterest.com/pin/create/button/?url=<?php echo $encoded;?>&media={<?php echo urlencode(base_url().'/assets/images/'.$blog_full_post[0]->blog_image);?>}')" title="Pinterest Share"><img src="<?php echo base_url().'assets/images/';?>pin.png"/></a>
        <a href="javascript:void(0)" class="icon-linked_in" onclick="javascript:genericSocialShare('http://www.stumbleupon.com/badge/?url=<?php echo $encoded;?>')" title="StumbleUpon Share"><img src="<?php echo base_url().'assets/images/';?>su.png"/></a>
        <a href="javascript:void(0)" class="icon-linked_in" onclick="javascript:genericSocialShare('http://www.reddit.com/submit?url=<?php echo $encoded;?>')" title="Reddit Share"><img src="<?php echo base_url().'assets/images/';?>rt.png"/></a>
        <a href="javascript:void(0)" class="icon-linked_in" onclick="javascript:genericSocialShare('mailto:?subject=I wanted you to see this site&amp;body=Check out this site <?php echo $blogPostUrl;?>.')" title="E-Mail Share"><img src="<?php echo base_url().'assets/images/';?>mail.png"/></a>
</div>
<!--Upper Share Box-->
<!--<img src="<?php echo base_url().'/assets/images/'.$blog_full_post[0]->blog_image?>" style="margin-bottom: 20px; border-radius: 5px;"/>-->
<?php echo isset($blog_full_post[0]->blog_content) ?  $blog_full_post[0]->blog_content : "";?>
</div>







<div class="subscribemail">

<h2>Subscribe to blog via email</h2>
<span style="width: 100%; display: block; text-align: center; font-size: 12px; color:red;" id="newsletter_email_error"></span>
<div class="subup">
<input type="email" name="email" id="newsletter_email" placeholder="Email Address">
<a id="newsletter_btn" href="#">Subscribe</a>    
</div>    

</div>






</div>

</div>

<div class="blogrightin">
<div class="col-md-3 fixit sidebar wow fadeInRight">

<div class="rightsidearea">

<div class="recommandedsec">
<h4>Recommended</h4>

<ul>
<?php foreach($blog_recommended_post as $row):?>
<li>
<!--<img src="<?php //echo base_url().'/assets/images/'.$row->blog_image?>"/>-->
<span style="background-image: url('<?php echo base_url().'/assets/images/'.$row->blog_image?>');"></span>
<div class="contdetails">
<p class="title"><a href="<?php echo base_url().'blogFullPost/'.$row->id?>"><?php echo isset($row->blog_heading) ?  substr($row->blog_heading,0,35) : "";?></a></p>
<p class="author"><?php echo (!empty($row->author_name)?substr($row->author_name,0,12):'Admin');?></p>
<p class="time"><?php echo date('j M, y',strtotime($row->datecreated));?></p>
</div>        
</li>
<?php endforeach;?>
</ul>
</div>


<div class="popularsec">
<h4>Most Popular</h4>

<ul>
<?php foreach($blog_popular_post as $row):?>
<li>
<span class="increment"><?php echo (!empty($row->popular_order)?$row->popular_order:'0');?></span>
<!--<img src="<?php //echo base_url().'/assets/images/'.$row->blog_image?>"/>-->
<span style="background-image: url('<?php echo base_url().'/assets/images/'.$row->blog_image?>');"></span>
<div class="contdetails">
<p class="title"><a href="<?php echo base_url().'blogFullPost/'.$row->id?>"><?php echo isset($row->blog_heading) ?  substr($row->blog_heading,0,35) : "";?></a></p>
<p class="author"><?php echo (!empty($row->author_name)?substr($row->author_name,0,12):'Admin');?></p>
<p class="time"><?php echo date('j M, y',strtotime($row->datecreated));?></p>
</div>        
</li>

<?php endforeach;?>


</ul>
</div>

</div>

</div>
</div>











<div class="ppin">
</div>

</div>

</div>

</div>



<?php if(!empty($blog_featured_post)):?>
<div class="blogpicsectionarea" style="width: 100%; background: none;">

<div class="col-md-6" style="float: none; margin: 0 auto;">

<div class="mainheading">
<h2 style="text-align: center;">Featured Blogs</h2>
</div>
<?php foreach($blog_featured_post as $row):?>
<div class="blogbox">
 <a href="<?php echo base_url().'blogFullPost/'.$row->id?>"><img src="<?php echo base_url().'/assets/images/'.$row->blog_image?>"></a>
 <h3 style="top: 10vh;"><?php echo isset($row->blog_heading) ?  substr($row->blog_heading,0,30) : "";?></h3>

</div>

<?php endforeach;?>



</div>    

<!--<div class="col-md-6">


<div class="mainheading">
<h2>Hot Deals</h2>
</div>

<div class="blogbox">
 <img src="/assets/images/vecpic5.jpg">
 <h3>Free Download: Arciform Typeface</h3>

</div>

<div class="blogbox">
 <img src="/assets/images/vecpic6.jpg">
 <h3>Free Download: Arciform Typeface</h3>

</div>

<div class="blogbox">
 <img src="/assets/images/vecpic7.jpg">
 <h3>Free Download: Arciform Typeface</h3>

</div>

<div class="blogbox">
 <img src="/assets/images/vecpic8.jpg">
 <h3>Free Download: Arciform Typeface</h3>

</div>



</div>-->


</div>
<?php endif;?>


<div class="blogger">
<div class="container">
<div class="contentinfo">
<img width="90" height="90" src="<?php echo (!empty($blog_full_post[0]->author_img)?'/assets/images/'.$blog_full_post[0]->author_img:'/assets/images/iconpic1.png');?>" >
<div class="contentdescp">
<h1>By <?php echo (!empty($blog_full_post[0]->author_name)?$blog_full_post[0]->author_name:'Admin');?></h1>
<p> <?php echo (!empty($blog_full_post[0]->author_desc)?$blog_full_post[0]->author_desc:'');?> </p>
</div>
</div>
</div>
</div>






</div>


</body>
    <script type="text/javascript" async >
	function genericSocialShare(url){
		window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
		return true;
	}




$(function () {
    var sidebar = $('.sidebar');
    var top = sidebar.offset().top - parseFloat(sidebar.css('margin-top'));

    $(window).scroll(function (event) {
      var y = $(this).scrollTop();
      if (y >= top) {
        sidebar.addClass('fixed');
      } else {
        sidebar.removeClass('fixed');
      }
    });

var team = $('.blogleftin').offset().top;
var purana = $('.ppin').offset().top;
$(window).on( 'scroll', function(){
        if ($(window).scrollTop() >= team) {
            $('.blogleftin').addClass('fixedit');
            $('.blogcenterin').addClass('fixedinit');
            $('.blogrightin').addClass('fixedupup');
            
            
        }



         else {
            $('.blogleftin').removeClass('fixedit');
            $('.blogcenterin').removeClass('fixedinit');
            $('.blogrightin').removeClass('fixedupup');
        }
    });



/*  var $scrollingDiv = $(".blogleftin .col-md-2");
 
    $(window).scroll(function(){      
      $scrollingDiv
        .stop()
        .animate({"marginTop": ($(window).scrollTop() + 3) + "px"}, "slow" );      
    });*/


/*var purana = $('.ppin').offset().top;

$(window).on( 'scroll', function(){
        if ($(window).scrollTop() >= purana) {
            $('.blogleftin').removeClass('fixedit');
        } else {
            $('.blogleftin').removeClass('fixedit');
        }
  });*/


});

$("#newsletter_btn").click(function(e){
    e.preventDefault();
    $("#newsletter_email_error").html("");

       var newsletter_email = $("#newsletter_email").val();
       var formData = new FormData();
		formData.append('newsletter_email', newsletter_email);
		
		  url = "<?php echo site_url('Home/newsletter_signup')?>";
		  $.ajax({
		  url: url,
		  type: "POST",
		  data: formData,
		  processData: false,
          contentType: false,
          beforeSend: function() {
                $('.se-pre-con').fadeIn();
            },
		  success: function (data) {
		       $('.se-pre-con').fadeOut();
               var data_msg=$.parseJSON(data);
		      $.each( data_msg.Error_Mess, function( key, value )
                {
                  $("#newsletter_email_error").html(value);
                });
		     
              
              if($("#newsletter_email_error").html() == ""){
			     swal("Newsletter Subscription","You have successfully subscribed for blog newsletter","success");
              }
		  },
		  error: function (jqXHR, textStatus, errorThrown) {
		      $("#newsletter_email_error").html("");
		      $('.se-pre-con').fadeOut();
			alert('Error subscription please try again.');
            location.reload();
		  }
		});
                   
});

	</script>