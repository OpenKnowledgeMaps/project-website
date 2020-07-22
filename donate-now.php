<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php
        $override_labels = array(
            "title" => "Make a donation - Open Knowledge Maps"
            , "app-name" => "Open Knowledge Maps"
            , "description" => "Support Open Knowledge Maps, the world’s largest visual search engine for scientific knowledge! As a charitable non-profit, OKMaps depends on donations. With your help, we can keep Open Knowledge Maps online and support its further development!"
            , "tweet-text" => "Support Open Knowledge Maps, the world’s largest visual search engine for scientific knowledge! As a charitable non-profit, OKMaps depends on donations. With your help, we can keep Open Knowledge Maps online and support its further development!"
            , "url" => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
            , "twitter-type" => "summary"
            , "twitter-image" => "https://openknowledgemaps.org/img/donation-twittercard.png"
            , "fb-image" => "https://openknowledgemaps.org/img/donation-fbcard.png"
        );
        ?>
        <?php include($COMPONENTS_PATH . 'head_bootstrap.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_standard.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_headstart.php') ?>
        <?php include($COMPONENTS_PATH . 'head_detect_country.php') ?>
    </head>

    <body class="donation-page">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>

        <div id="about-page" style="padding-bottom: 0px;">

            <div class="background2">
                <div class="team">
                    <h2 style="color:#f29e00;">Your Support Matters!</h2>
                    <p>Together with you we can change the way we discover research! 
                        Here's how you can help and create a lasting impact.
                    </p>
                </div>
            </div>

            <div id="divhow" style="text-align:center;">

                <a href="<?php echo $PAYPAL_URL ?>" target="_blank">
                    <img class="membership-img" style="vertical-align: top;" src="./img/donation-banner.png" alt='Open Knowledge Maps is community owned'>
                </a>

                <div class="member-text" style="vertical-align: top;">

                    <p class="project-facts">
                        Dear supporter,
                    </p>
                    <p class="project-facts">As a charitable non-profit organization, we depend on donations.
                        <b>If every user gave 
                            <span id="currency-donation"><?php echo (($CURRENCY_CODE === "USD") ? ("$") : ("€")); ?>3</span>, 
                            we could run Open Knowledge Maps for a full year.</b>
                    </p>

                    <p class="project-facts">
                        Open Knowledge Maps is the world's largest visual search engine for scientific knowledge. 
                        Our open, ad-free service is used by hundreds of thousands of people.
                        We hope that you'll consider how useful it is to be able to discover scientific knowledge. 
                        Not only for a select few, but for everyone on the planet. <!--<b>The price of a coffee is all it takes!</b>-->
                    </p>

                    <p class="project-facts">
                        <b><i class="fa fa-heart" aria-hidden="true"></i> Thank you.</b>
                        <br>Peter, Maxi and Chris from the Open Knowledge Maps board
                    </p>

                </div>

                <p class="try-now" style="text-align: center; margin:30px 0 0;">
                    <a target="_blank" class="donate-now" style="" href="<?php echo $PAYPAL_URL ?>">Donate now</a>
                    <a target="_blank" href="http://eepurl.com/dOQynj" id="remind-me-later" class="close" style="margin-top: 30px;font-size: 14px; float:none; display: block; margin-left:0px; text-decoration: underline;">Remind me later!</a>
                </p>

                <div class="additional-info">
                    <p>
                        <b>Payment:</b> Your donation will be securely processed 
                        <a  class="underline" target="_blank" href="<?php echo $PAYPAL_URL ?>">via Paypal</a>. You do not need a Paypal account to make a donation. 
                        <br>You can also make a donation to our bank account directly: Account holder: Open Knowledge Maps, IBAN: AT69 2011 1829 6959 9501, BIC: GIBAATWWXXX
                    </p>

                    <p>
                        <b>Receipts:</b> If you want to receive a receipt for your donation, please send us an 
                        e-mail with your name and address to 
                        <a  class="underline" target="_blank" href="mailto:donations@openknowledgemaps.org">donations@openknowledgemaps.org</a>
                    </p>
                </div>

            </div>
        </div>

        <?php include($COMPONENTS_PATH . 'donation-purposes.php'); ?>
        <?php include($COMPONENTS_PATH . 'donation-alternatives.php'); ?>

        <script>
            $("donation-image-mobile, .donation-image, .donate-now").on("click", function (event) {
                recordAction("Donation", "click-paypal", event.target.className);
            });

            $("#remind-me-later").on("click", function (event) {
                recordAction("Donation", "click-reminder", event.target.className);
            });

            $(".share-button").on("click", function (event) {
                recordAction("Donation", "click-share", event.target.className);
            });

        </script>

        <?php include($COMPONENTS_PATH . 'footer_base.php'); ?>