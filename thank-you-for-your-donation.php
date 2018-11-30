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

    <body class="about-page">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>
        <script>
            setCookie("hide_donation_banner_permanent", 1, 45);
         </script>

        <div id="about-page">
            <div class="background2">
                <div class="team">
                    <h2 style="color:#f29e00;">Thank you for your support!</h2>
                    <p>To stay up-to-date on our activities, you can also <a target="_blank" class="underline" href="http://eepurl.com/dvQeGP">sign up for our newsletter</a>.
                        With your donation you are helping people from all around the world to discover scientific knowledge.
                    </p>
                </div>
            </div>
        </div>

        <?php
        $TIMELINE_ID = "733358003295035393";
        $FEEBDACK_TITLE = "What our users say";
        include($COMPONENTS_PATH . 'twitterstream.php')
        ?>
        <?php include($COMPONENTS_PATH . 'footer_base.php'); ?>