<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php $title = "About - Open Knowledge Maps"; ?>
        <?php include($COMPONENTS_PATH . 'head_bootstrap.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_standard.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_headstart.php') ?>
    </head>

    <body class="about-page">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>

        <div id="about-page">
            <div class="background2">
                <div class="team">
                    <p>Our Community</p>
                    <p>is helping us to improve our service. Together we are changing the way we discover research.
                    You can also help us shape open knowledge maps by <a class="underline" href="#enthusiast-program">becoming an enthusiast</a>.</p>
                </div>
            </div>
        </div>
        <?php
        $TIMELINE_ID = "733358003295035393";
        $FEEBDACK_TITLE = "What our users say";
        include($COMPONENTS_PATH . 'twitterstream.php');
        ?>
        <div id="team">
            <div class="background2 bg2">
                <div class="team">
                    <p>Our Enthusiasts</p>
                    <p>are spreading the word in events and workshops around the world and collect valuable feedback. 
                        </p>
                </div>
            </div>

            <div class="advisorsdiv">

                <div id="members">

                    <div class="member">
                        <a target="_blank" href=""><img class="hoverlink" src="./img/enthusiasts/x.png" alt=""></a>
                        <ul>
                            <li class="name">Name</li>
                            <li class="job-title">Short description</li>
                        </ul>

                        <ul class="contact-member">
                            <li><a class="contact-icon" target="_blank" href=""><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            <li><a class="contact-icon" target="_blank" href=""><i class="fa fa-link" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                    
                </div> 


            </div>


            <?php include($COMPONENTS_PATH . "become-enthusiast.php") ?>
            <?php include($COMPONENTS_PATH . "newsletter.php") ?>
            <?php include($COMPONENTS_PATH . 'footer_base.php'); ?>