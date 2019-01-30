<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php $title = "Your donation- Open Knowledge Maps"; ?>
        <?php include($COMPONENTS_PATH . 'head_bootstrap.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_standard.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_headstart.php') ?>
    </head>

    <body class="thankyou-page">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>
        <script>
            setCookie("hide_donation_banner_permanent", 1, 45);
        </script>

        <div id="about-page">
            
            <div class="background2">
                <div class="team">
                    <p style="text-align:center;"><img src="./img/donationthankyou2.gif"></p>
                    <h2 style="color:#E55137;">Thank you for your support!</h2>
                    <p>To stay up-to-date on our activities, you can also <a target="_blank" class="underline" href="http://eepurl.com/dvQeGP">sign up for our newsletter</a>.
                        If you want to receive a receipt for your donation, please send us an 
                        e-mail with your name and address to <br>
                        <a  class="underline" target="_blank" href="mailto:donations@openknowledgemaps.org">donations@openknowledgemaps.org</a>.
                    </p>
                    <p style="margin-top: 20px;">
                        With your donation you are helping people from all around 
                        the world to discover scientific knowledge:
                    </p>
                </div>
            </div>

            <div class="thank-you-desktop" style="text-align: center;">
                <img class="shadow" src="./img/thankyou-donation.jpg">
            </div>

            <div class="thank-you-mobile">
                <img class="shadow" src="./img/thankyou-donation-mobile.jpg">
            </div>

        </div>

        <?php include($COMPONENTS_PATH . 'footer_base.php'); ?>