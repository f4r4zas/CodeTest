
<body id="blog" class="blog-detail main-content inner">
<div class="main-wrapper">
    <div class="container">
        <div class="blog-detail">
            <?php

            ?>
            <img class="det-img" src="<?php echo base_url().'assets/images/'. $press_full_post[0]->post_img;?>" alt=""/>
        </div>
        <h2><?php echo isset($press_full_post[0]->post_heading) ?  $press_full_post[0]->post_heading : "";?></h2>
        <h5><?php echo date('F jS, Y',strtotime($press_full_post[0]->post_created_on));?> by Admin</h5>
        <div>
            <?php echo isset($press_full_post[0]->post_text) ?  $press_full_post[0]->post_text : "";?>
        </div>

        <div class="fleft">
            <div class="post_social">
                <a href="javascript:void(0)" class="icon-fb" onclick="javascript:genericSocialShare('http://www.facebook.com/sharer.php?u=http%3A%2F%2Fwww.codexworld.com%2Fsocial-popup-page-scroll-using-jquery-css%2F')" title="Facebook Share"><img src="<?php echo base_url().'assets/images/';?>fb.png"/></a>
                <a href="javascript:void(0)" onclick="javascript:genericSocialShare('https://plus.google.com/share?url=http%3A%2F%2Fwww.codexworld.com%2Fsocial-popup-page-scroll-using-jquery-css%2F')" class="icon-gplus" title="Google Plus Share"><img src="<?php echo base_url().'assets/images/';?>gp.png"/></a>
                <a href="javascript:void(0)" class="icon-tw" onclick="javascript:genericSocialShare('http://twitter.com/share?text=Social popup on page scroll using jQuery and CSS&amp;url=http://www.codexworld.com/social-popup-page-scroll-using-jquery-css/')" title="Twitter Share"><img src="<?php echo base_url().'assets/images/';?>tw.png"/></a>
                <a href="javascript:void(0)" class="icon-linked_in" onclick="javascript:genericSocialShare('http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2Fwww.codexworld.com%2Fsocial-popup-page-scroll-using-jquery-css%2F')" title="LinkedIn Share"><img src="<?php echo base_url().'assets/images/';?>in.png"/></a>
                <a href="javascript:void(0)" class="icon-linked_in" onclick="javascript:genericSocialShare('http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.codexworld.com%2Fsocial-popup-page-scroll-using-jquery-css%2F&media={http%3A%2F%2Fwww.codexworld.com%2Fwp-content%2Fuploads%2F2014%2F11%2Fsocial-buttons-jquery-popup-dialog-codexworld.png}')" title="Pinterest Share"><img src="<?php echo base_url().'assets/images/';?>pin.png"/></a>
                <a href="javascript:void(0)" class="icon-linked_in" onclick="javascript:genericSocialShare('http://www.stumbleupon.com/badge/?url=http://www.codexworld.com/social-popup-page-scroll-using-jquery-css/')" title="StumbleUpon Share"><img src="<?php echo base_url().'assets/images/';?>su.png"/></a>
                <a href="javascript:void(0)" class="icon-linked_in" onclick="javascript:genericSocialShare('http://www.reddit.com/submit?url=http%3A%2F%2Fwww.codexworld.com%2Fsocial-popup-page-scroll-using-jquery-css%2F')" title="Reddit Share"><img src="<?php echo base_url().'assets/images/';?>rt.png"/></a>
                <a href="javascript:void(0)" class="icon-linked_in" onclick="javascript:genericSocialShare('mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://www.codexworld.com/social-popup-page-scroll-using-jquery-css/.')" title="E-Mail Share"><img src="<?php echo base_url().'assets/images/';?>mail.png"/></a>
            </div>
        </div>
    </div>

    <!---End main Wrapper-->

</body>
<script type="text/javascript" async >
    function genericSocialShare(url){
        window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
        return true;
    }
</script>