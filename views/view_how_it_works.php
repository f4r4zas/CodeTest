
<?php

$data = array();

if(!empty($db_table)){
    foreach($db_table[0] as $key => $row){
        $data[$key] = $row;
    }
}
//print_r($data);

?>
<script>
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });
</script>
<body id="finish-profile" class="how-it-works inner">
<!-- Loader -->
<div class="se-pre-con"></div>
<!-- Ends -->
<div class="main-wrapper" style="background: rgba(0, 0, 0, 0) url(<?php echo base_url(); ?>assets/images/<?php echo $data["how_image"]; ?>) no-repeat scroll center top / cover;
    background-attachment: fixed;">
    <div class="talent">
        <div class="container">
            <div class="text-center">
                <h2><?php echo $data["how_title"]; ?></h2>
                <p><?php echo $data["how_desc"]; ?></p>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-9 bhoechie-tab-container">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                        <div class="list-group" id="side-menu">
                            <a href="#" class="list-group-item active text-center">
                                <img src="<?php echo base_url(); ?>assets/images/cand-icons.png" alt="" />Candidates</a>
                            <a href="#" class="list-group-item text-center">
                                <img src="<?php echo base_url(); ?>assets/images/emp-work-cand.png" alt="" />Employers</a>
                            <a href="#" class="list-group-item text-center">
                                <img src="<?php echo base_url(); ?>assets/images/expert-icon.png" alt="" />Experts</a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">

                        <!-- Basic Info -->
                        <div class="bhoechie-tab-content active">
                            <div class="progress-1"><span>Candidates</span></div>
                            <div class="row">
                                <div class="cold-md-12">
                                    <div class="it-works-icon">
                                        <i class="fa <?php echo $data["cand_sec_1_image"]; ?>" aria-hidden="true"></i>
                                    </div>
                                    <div class="my-text">
                                        <h3><?php echo $data["cand_sec_1_title"] ?></h3>
                                        <p><?php echo $data["cand_sec_1_desc"]; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="cold-md-12">
                                    <div class="it-works-icon">
                                        <i class="fa <?php echo $data["cand_sec_2_image"]; ?>" aria-hidden="true"></i>
                                    </div>
                                    <div class="my-text">
                                        <h3><?php echo $data["cand_sec_2_title"] ?></h3>
                                        <p><?php echo $data["cand_sec_2_desc"]; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="cold-md-12">
                                    <div class="it-works-icon">
                                        <i class="fa <?php echo $data["cand_sec_3_image"]; ?>" aria-hidden="true"></i>
                                    </div>
                                    <div class="my-text">
                                        <h3><?php echo $data["cand_sec_3_title"] ?></h3>
                                        <p><?php echo $data["cand_sec_3_desc"]; ?></p>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="cold-md-12">
                                    <div class="it-works-icon">
                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                    </div>
                                    <div class="my-text">
                                        <h3><?php echo $data["cand_sec_4_title"] ?></h3>
                                        <p><?php echo $data["cand_sec_4_desc"]; ?></p>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="cold-md-12">
                                    <div class="it-works-icon">
                                        <i class="fa <?php echo $data["cand_sec_5_image"]; ?>" aria-hidden="true"></i>
                                    </div>
                                    <div class="my-text">
                                        <h3><?php echo $data["cand_sec_5_title"] ?></h3>
                                        <p><?php echo $data["cand_sec_5_desc"]; ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Employer -->
                        <div class="bhoechie-tab-content emp-work">
                            <div class="progress-1"> <span>Employers</span></div>
                            <div class="row">
                                <div class="cold-md-12">
                                    <div class="it-works-icon">
                                        <i class="fa <?php echo $data["emp_sec_1_image"]; ?>" aria-hidden="true"></i>
                                    </div>
                                    <div class="my-text">
                                        <h3><?php echo $data["emp_sec_1_title"] ?></h3>
                                        <p><?php echo $data["emp_sec_1_desc"]; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="cold-md-12">
                                    <div class="it-works-icon">
                                        <i class="fa <?php echo $data["emp_sec_2_image"]; ?>" aria-hidden="true"></i>
                                    </div>
                                    <div class="my-text">
                                        <h3><?php echo $data["emp_sec_2_title"] ?></h3>
                                        <p><?php echo $data["emp_sec_2_desc"]; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="cold-md-12">
                                    <div class="it-works-icon">
                                        <i class="fa <?php echo $data["emp_sec_3_image"]; ?>" aria-hidden="true"></i>
                                    </div>
                                    <div class="my-text">
                                        <h3><?php echo $data["emp_sec_3_title"] ?></h3>
                                        <p><?php echo $data["emp_sec_3_desc"]; ?></p>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="cold-md-12">
                                    <div class="it-works-icon">
                                        <i class="fa <?php echo $data["emp_sec_4_image"]; ?>" aria-hidden="true"></i>
                                    </div>
                                    <div class="my-text">
                                        <h3><?php echo $data["emp_sec_4_title"] ?></h3>
                                        <p><?php echo $data["emp_sec_4_desc"]; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Experts -->
                        <div class="bhoechie-tab-content work-expert">
                            <div class="progress-1"> <span>Experts</span></div>
                            <div class="row">
                                <div class="cold-md-12">
                                    <div class="it-works-icon">
                                        <i class="fa <?php echo $data["exp_sec_1_image"]; ?>" aria-hidden="true"></i>
                                    </div>
                                    <div class="my-text">
                                        <h3><?php echo $data["exp_sec_1_title"] ?></h3>
                                        <p><?php echo $data["exp_sec_1_desc"]; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="cold-md-12">
                                    <div class="it-works-icon">
                                        <i class="fa <?php echo $data["exp_sec_2_image"]; ?>" aria-hidden="true"></i>
                                    </div>
                                    <div class="my-text">
                                        <h3><?php echo $data["exp_sec_2_title"] ?></h3>
                                        <p><?php echo $data["exp_sec_2_desc"]; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="cold-md-12">
                                    <div class="it-works-icon">
                                        <i class="fa <?php echo $data["exp_sec_3_image"]; ?>" aria-hidden="true"></i>
                                    </div>
                                    <div class="my-text">
                                        <h3><?php echo $data["exp_sec_3_title"] ?></h3>
                                        <p><?php echo $data["exp_sec_3_desc"]; ?></p></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="cold-md-12">
                                    <div class="it-works-icon">
                                        <i class="fa <?php echo $data["exp_sec_4_image"]; ?>" aria-hidden="true"></i>
                                    </div>
                                    <div class="my-text">
                                        <h3><?php echo $data["exp_sec_4_title"] ?></h3>
                                        <p><?php echo $data["exp_sec_4_desc"]; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End main Wrapper -->

<script>
    function open_div(div_id){
        $(""+div_id).toggle('slow');
    }
</script>
<script>
    function close_div(div_id){
        $(""+div_id).toggle('fast');
    }
</script>
<script>
    $(document).ready(function() {
        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });
    });
	
	$(function(){
	
        var stickyHeaderTop = $('#side-menu').offset().top;
		// var port_offset = $('#ach').offset().top + 180;
        $(window).scroll(function(){
			console.log($(window).scrollTop());
                if( $(window).scrollTop() > stickyHeaderTop ) {
					
					$('#side-menu').css({position: 'fixed', top: '0px', width: '23%'});
					if($(window).scrollTop() > 1182){
						$('#side-menu').css({'top': -($(window).scrollTop() - 1182) +'px'});
					}
                      /*  $('#sticky').css('display', 'block');*/
                } else {
                        $('#side-menu').css({position: 'static', top: '0px', width: '100%'});
                       /* $('#sticky').css('display', 'none');*/
                }
        });
  });
  
	
	
</script>
</body>
