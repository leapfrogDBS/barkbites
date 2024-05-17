<?php
/**
* Template Name: Discount Signup 
* @package barkbites
*/

get_header();
?>

	<main id="primary" class="site-main policy-template">
        <div class="container space-y-6 text-center">

        <h1 class="heading-one">New Cusomer Discount!</h1>

        <h2 class="heading-two">15% off entire order!</h2>
        <p class="text-lg">Minimum spend of £10 applies.</p>

        <div class="flex items-center justify-center">
            <div id="mc_embed_shell">
                <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css" rel="stylesheet" type="text/css">
            <style type="text/css">
                    #mc_embed_signup{background:#fff; false;clear:left; font:14px Helvetica,Arial,sans-serif; width: 600px;}
                    /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                    We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
            </style>
            <div id="mc_embed_signup">
                <form action="https://leapfrogdbs.us20.list-manage.com/subscribe/post?u=e92500706a7c2cec505da7c52&amp;id=ce14a816b4&amp;f_id=000f00eaf0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                    <div id="mc_embed_signup_scroll"><h2></h2>
                        <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                        <div class="mc-field-group"><label for="mce-FNAME">First Name </label><input type="text" name="FNAME" class=" text" id="mce-FNAME" value=""></div><div class="mc-field-group"><label for="mce-EMAIL">Email Address <span class="asterisk">*</span></label><input type="email" name="EMAIL" class="required email" id="mce-EMAIL" value="" required=""></div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display: none;"></div>
                        <div class="response" id="mce-success-response" style="display: none;"></div>
                    </div><div aria-hidden="true" style="position: absolute; left: -5000px;"><input type="text" name="b_e92500706a7c2cec505da7c52_ce14a816b4" tabindex="-1" value=""></div><div class="clear"><input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Give me my Discount"></div>
                </div>
            </form>
            </div>
            <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script><script type="text/javascript">(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='MMERGE5';ftypes[5]='text';fnames[6]='MMERGE6';ftypes[6]='text';fnames[7]='MMERGE7';ftypes[7]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script></div>
        </div>

        <h4 class="heading-four">Discount code will be emailed to your inbox</h4>

        </div>
	</main><!-- #main -->

<?php
get_footer();

