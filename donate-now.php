<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php $title = "Make a donation - Open Knowledge Maps"; ?>
        <?php include($COMPONENTS_PATH . 'head_bootstrap.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_standard.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_headstart.php') ?>
    </head>

    <body class="about-page">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>

        <div id="about-page">
            <div class="background2">
                <div class="team">
                    <h2 style="color:#f29e00;">Your Support Matters!</h2>
                    <p>Together with you we can change the way we discover research! Here's how you can help and create a lasting impact.</p>
                </div>
            </div>
            <div style="font-size: 18px; max-width:1200px; margin:0px auto 0; background-color: white; padding: 2%;
                 -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
                 box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
                 ">

                <div class="donation-image" style="display:inline-block; max-width:25%; margin-right:30px; vertical-align:middle;">
                    <a  target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XVK3PKWWDWXHA&source=url">
                        <img src="./img/donation-banner.png"></a>
                </div>

                <div style="display:inline-block; max-width:70%; vertical-align:middle;">
                    <p>As a charitable non-profit organization, <b>we depend on donations.</b>
                        Only a tiny portion of our users give. 
                    </p>

                    <p><b>If everyone gave <span id="currency-donation">€3</span>, 
                            we could run Open Knowledge Maps for a full year.</b></p>

                    <p>Open Knowledge Maps is the world’s largest visual search engine for scientific knowledge. 
                        Our open, ad-free service is used by hundreds of thousands of people. But we do not want 
                        to stop there: our goal is to develop Open Knowledge Maps <a class="underline" target="_blank" href="https://vimeo.com/188647919">into a collaborative system</a>, 
                        so that we can all build on top of each others’ knowledge.</p>
                    <!--<p>Just imagine, how useful it 
                        would be if you could get the insights of all the people, who already have an overview 
                        of the topic you are researching. <a class="underline" target="_blank" href="https://vimeo.com/188647919">Watch this video</a> to find out more about our vision of collaborative editing.
                    </p>-->

                    <p>We hope that you’ll think about how useful it is to be able to discover scientific knowledge. Not only for select few, but everyone on 
                        the planet. <b>The price of a coffee is all it takes!</b>

                    </p>

                    <p>
                        <b><i class="fa fa-heart" aria-hidden="true"></i> Thank you.</b><br>Peter, Maxi and Chris from the Open Knowledge Maps board.
                    </p>

                </div>

            </div>

            <p class="try-now" style="text-align: center; margin:30px 0 0;">
                <a target="_blank" class="donate-now" style="" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XVK3PKWWDWXHA&source=url">Donate now</a>
                <a target="_blank" href="http://eepurl.com/dOQynj" class="close" style="margin-top: 30px;font-size: 14px; float:none; display: block; margin-left:30px; text-decoration: underline;">Remind me later!</a>
            </p>

            <div style="text-align: center; margin-top: 30px;">
                <p style="text-align: center;">
                    <b>Payment:</b> Your donation will be securely processed <a  class="underline" target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XVK3PKWWDWXHA&source=url">via Paypal</a>. You do not need a Paypal account to make a donation. 
                </p>

                <p style="text-align: center;">
                    <b>Receipts:</b> If you want to receive a receipt for your donation, please send us an e-mail with your name and address to donations@openknowledgemaps.org
                </p>
            </div>
        </div>

        <?php include($COMPONENTS_PATH . 'donation-purposes.php') ?>
        <?php include($COMPONENTS_PATH . 'footer_base.php'); ?>