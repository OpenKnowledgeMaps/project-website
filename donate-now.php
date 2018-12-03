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

    <body class="donation-page">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>

        <div id="about-page">

            <div class="background2">
                <div class="team">
                    <h2 style="color:#f29e00;">Your Support Matters!</h2>
                    <p>Together with you we can change the way we discover research! 
                        Here's how you can help and create a lasting impact.
                    </p>
                </div>
            </div>

            <div class="desktop-donation-banner2">

                <div class="donation-image-mobile">
                    <a  target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XVK3PKWWDWXHA&source=url">
                        <img src="./img/donation-banner-mobile.png">
                    </a>
                </div>

                <div class="donation-image">
                    <a  target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XVK3PKWWDWXHA&source=url">
                        <img src="./img/donation-banner.png">
                    </a>
                </div>

                <div class="donation-text">
                    <p>As a charitable non-profit organization, <b>we depend on donations.</b>
                    </p>

                    <p><b>If every user gave 
                            <span id="currency-donation">€3</span>, 
                            we could run Open Knowledge Maps for a full year.</b>
                    </p>

                    <p>Open Knowledge Maps is the world's largest visual search engine for scientific knowledge. 
                        Our open, ad-free service is used by hundreds of thousands of people. But we do not want 
                        to stop there: our goal is to develop Open Knowledge Maps 
                        <a class="underline" target="_blank" href="https://vimeo.com/188647919">into a collaborative system</a>, 
                        so that we can all build on top of each others' knowledge.
                    </p>

                    <p>We hope that you'll consider how useful it is to be able to discover scientific knowledge. 
                        Not only for a select few, but for everyone on the planet.  <b>The price of a coffee is all it takes!</b>
                    </p>

                    <p>
                        <b><i class="fa fa-heart" aria-hidden="true"></i> Thank you.</b>
                        <br>Peter, Maxi and Chris from the Open Knowledge Maps board.
                    </p>
                    
                    
                </div>

            </div>

            <p class="try-now" style="text-align: center; margin:30px 0 0;">
                <a target="_blank" class="donate-now" style="" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XVK3PKWWDWXHA&source=url">Donate now</a>
                <a target="_blank" href="http://eepurl.com/dOQynj" class="close" style="margin-top: 30px;font-size: 14px; float:none; display: block; margin-left:0px; text-decoration: underline;">Remind me later!</a>
            </p>

            <div class="additional-info">
                <p>
                    <b>Payment:</b> Your donation will be securely processed 
                    <a  class="underline" target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XVK3PKWWDWXHA&source=url">via Paypal</a>. You do not need a Paypal account to make a donation. 
                    <br>You can also make a donation to our bank account directly: Account holder: Open Knowledge Maps, IBAN: AT96 2011 1829 6959 9500, BIC: GIBAATWWXXX
                </p>

                <p>
                    <b>Receipts:</b> If you want to receive a receipt for your donation, please send us an 
                    e-mail with your name and address to 
                    <a  class="underline" target="_blank" href="mailto:donations@openknowledgemaps.org">donations@openknowledgemaps.org</a>
                </p>
            </div>

        </div>

        <?php include($COMPONENTS_PATH . 'donation-purposes.php'); ?>
        <?php include($COMPONENTS_PATH . 'donation-pass-it-on.php'); ?>
        <?php include($COMPONENTS_PATH . 'footer_base.php'); ?>