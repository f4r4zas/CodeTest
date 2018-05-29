<?php   $ci =&get_instance();
$this->load->model('Get_db','', TRUE);
$all_details = $this->Get_db->get_details_all("static_footer");

?>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
	 <h4 class="editable_w section_6_1" >ABOUT US</h4><p class="editable_w section_6_1" ><?php echo $all_details[0]->footer_about; ?></p>

         </div>
      <div class="contact-us col-md-3">
	  <h4 class="editable_w section_6_2">CONTACT US</h4>
        <p class="editable_w section_6_2"><?php echo $all_details[0]->footer_title; ?></p>
        <a class="editable_w section_6_2" href="tel:<?php echo $all_details[0]->footer_contact_no; ?>" title="Contact"><?php echo $all_details[0]->footer_contact_no; ?></a>
		<a class="editable_w section_6_2" href="mailto:<?php echo $all_details[0]->footer_email; ?>" title="Email"><?php echo $all_details[0]->footer_email; ?></a>

	</div>
      <div class="font-icons col-md-3">
        <h4>FOLLOW US</h4>
        <a href="<?php echo $all_details[0]->footer_facebook; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="<?php echo $all_details[0]->footer_twitter; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> <a href="<?php echo $all_details[0]->footer_instagram; ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a> <a href="<?php echo $all_details[0]->footer_google; ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </div>
    </div>
    <div class="footer-menu">
      <div class="row">
        <div class="col-md-12">
          <ul>
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="<?php echo base_url();?>about">About us</a></li>
            <li><a href="<?php echo base_url();?>team">Team</a></li>
            <!--<li><a href="<?php echo base_url();?>home/job_search">Search jobs</a></li>-->
            <li><a href="<?php echo base_url();?>press">Press</a></li>
            <li><a href="<?php echo base_url();?>terms-condition">Terms & Conditions</a></li>
            <li><a href="<?php echo base_url();?>privacy">Privacy Policy</a></li>
            <li><a href="<?php echo base_url();?>copyright">Copyright</a></li>
            <li><a href="<?php echo base_url();?>contact">Contact us</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright">
    <p>All Rights Reserved © 2017 <a target="_blank" href="<?php echo base_url();?>">AmazeTal</a></p>
  </div>
</footer>
<div class="se-pre-con"></div>

<script src="<?php echo base_url();?>assets/js/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="<?php echo base_url();?>assets/js/inview.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url();?>assets/js/pi.counter.js"></script>
<script src="<?php echo base_url();?>assets/js/pi.init.counter.js"></script>

<script>
 jQuery(window).load(function () {
  $(".fp-player").next("a").remove();

    //setTimeout(function () {
        $(".se-pre-con").css("display", "none");
    //}, 500);

});
    $(document).ready(function(){
	$("#owl-demo").owlCarousel({
      navigation : true,
      paginationSpeed : 1000,
      singleItem : true,
	 //Autoplay
    autoPlay :10000,
	loop: true,
	touchDrag  : true,
     mouseDrag  : true

      });
    });
    </script>
<script>
$(document).ready(function(){
    //rotation speed and timer
   var speed = 10000;
    var run = setInterval(rotate, speed);
    var slide_can = $('.slide_can');
    var container_can = $('.slides-can ul');
    var elm = container_can.find(':first-child').prop("tagName");
    var item_width = container_can.width();
    var previous = 'prev'; //id of previous button
    var next = 'next'; //id of next button

    slide_can.width(item_width); //set the slides to the correct pixel width
    container_can.parent().width(item_width);
    container_can.width(slide_can.length * item_width); //set the slides container_can to the correct total width
    container_can.find(elm + ':first').before(container_can.find(elm + ':last'));
    resetSlides_can();


    //if user clicked on prev button

    $('.buttons-can a').click(function (e) {
        //slide the item

        if (container_can.is(':animated')) {
            return false;
        }
        if (e.target.id == previous) {
            container_can.stop().animate({
                'left': 0
            }, 1500, function () {
                container_can.find(elm + ':first').before(container_can.find(elm + ':last'));
                resetSlides_can();
            });
        }

        if (e.target.id == next) {
            container_can.stop().animate({
                'left': item_width * -2
            }, 1500, function () {
                container_can.find(elm + ':last').after(container_can.find(elm + ':first'));
                resetSlides_can();
            });
        }

        //cancel the link behavior
        return false;

    });

    //if mouse hover, pause the auto rotation, otherwise rotate it
    container_can.parent().mouseenter(function () {
        clearInterval(run);
    }).mouseleave(function () {
        run = setInterval(rotate, speed);
    });


    function resetSlides_can() {
        //and adjust the container_can so current is in the frame
        container_can.css({
            'left': -1 * item_width
        });
    }

	//slider for employee

	  var speed = 10000;
    var run_emp = setInterval(rotate, speed);
    var slide_emp = $('.slide-emp');
    var container_emp = $('.slides-emp ul');
    var elm = container_emp.find(':first-child').prop("tagName");

    var item_width_emp = $("#carousel").width()-160;
    var previous = 'prev'; //id of previous button
    var next_a = 'next-a'; //id of next button
    slide_emp.width(item_width_emp); //set the slides to the correct pixel width
    container_emp.parent().width(item_width_emp);
    container_emp.width(slide_emp.length * item_width_emp); //set the slides container_emp to the correct total width
    container_emp.find(elm + ':first').before(container_emp.find(elm + ':last'));
    resetSlides_emp();


    //if user clicked on prev button

    $('.buttons_emp a').click(function (e) {
        //slide the item

        if (container_emp.is(':animated')) {
            return false;
        }
        if (e.target.id == previous) {
            container_emp.stop().animate({
                'left': 0
            }, 1500, function () {
                container_emp.find(elm + ':first').before(container_emp.find(elm + ':last'));
                resetSlides_emp();
            });
        }

        if (e.target.id == next_a) {
            container_emp.stop().animate({
                'left': item_width_emp * -2
            }, 1500, function () {
                container_emp.find(elm + ':last').after(container_emp.find(elm + ':first'));
                resetSlides_emp();
            });
        }

        //cancel the link behavior
        return false;

    });

    //if mouse hover, pause the auto rotation, otherwise rotate it
    container_emp.parent().mouseenter(function () {
        clearInterval(run_emp);
    }).mouseleave(function () {
        run_emp = setInterval(rotate, speed);
    });


    function resetSlides_emp() {
        //and adjust the container_emp so current is in the frame
        container_emp.css({
            'left': -1 * item_width_emp
        });
            }


	//slider for expert
    var speed = 10000;
    var run_exp = setInterval(rotate, speed);
    var slide_exp = $('.slide-exp');
    var container_exp = $('.slides-exp ul');
    var elm = container_exp.find(':first-child').prop("tagName");
    var item_width_exp = $("#carousel").width()-160;
    var previous = 'prev'; //id of previous button
    var next_b = 'next-b'; //id of next button
    slide_exp.width(item_width_exp); //set the slides to the correct pixel width
    container_exp.parent().width(item_width_exp);
    container_exp.width(slide_exp.length * item_width_exp); //set the slides container_exp to the correct total width
    container_exp.find(elm + ':first').before(container_exp.find(elm + ':last'));
    resetSlides_exp();


    //if user clicked on prev button

    $('.buttons_exp a').click(function (e) {
        //slide the item

        if (container_exp.is(':animated')) {
            return false;
        }
        if (e.target.id == previous) {
            container_exp.stop().animate({
                'left': 0
            }, 1500, function () {
                container_exp.find(elm + ':first').before(container_exp.find(elm + ':last'));
                resetSlides_exp();
            });
        }

        if (e.target.id == next_b) {
            container_exp.stop().animate({
                'left': item_width_exp * -2
            }, 1500, function () {
                container_exp.find(elm + ':last').after(container_exp.find(elm + ':first'));
                resetSlides_exp();
            });
        }

        //cancel the link behavior
        return false;

    });

    //if mouse hover, pause the auto rotation, otherwise rotate it
    container_exp.parent().mouseenter(function () {
        clearInterval(run_exp);
    }).mouseleave(function () {
        run_exp = setInterval(rotate, speed);
    });


    function resetSlides_exp() {
        //and adjust the container_exp so current is in the frame
        container_exp.css({
            'left': -1 * item_width_exp
        });
    }

});
//a simple function to click next link
//a timer will call this function, and the rotation will begin

function rotate() {

$('#next').click();
    $('#next-a').click();
    $('#next-b').click();
}
</script>
<script type="text/javascript">
<?php if(@$pageTitle != "Profile Completion"){ ?>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
<?php } ?>
</script>

<!-- Edit Content System -->



<script>
$(function() {
    $('marquee').mouseover(function() {
        this.stop();
    }).mouseout(function() {
         this.start();
    });

});
/*  $(document).ready(function() {
						ajax_cal_for_noti();
			 var callnotification = function(){
				 ajax_cal_for_noti();
			 }
				setInterval(callnotification,3500);
				function ajax_cal_for_noti(){
				  $.ajax({
				 type: "POST",
				 url: '<?=base_url()?>' + "Home_child/notiajax",
				 data: {notiajax: "notiajax"},
				 dataType: "text",
				 cache:false,
				 success:
					  function(data){
						return_data = JSON.parse(data);
						seen = return_data.seen;
						$('.noti_cnt').html(return_data.counter);
						$('#alnoti').html(return_data.notification);
						if(seen){
							// alert("true");
							 // $('.notify_button').popover({
								// html: true,
								// trigger: 'manual',
								// placement: 'bottom',
								// content: function () {
									// var $buttons = $('#notify_template').html();
									// return $buttons;
								// }
							// }).popover('toggle');
						}
						// console.log(return_data);
						// alert(data);  //as a debugging message.
					  }
				  });// you have missed this bracket
			 }


    });  */
    $('.flowplayer').find('a').attr('style','');
</script>
<script>

<?php if(@$pageTitle != "Profile Completion"){ ?>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88595922-1', 'auto');
  ga('send', 'pageview');
  <?php }?>

</script>
</body>
</html>