<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php $title = "Projects - Open Knowledge Maps"; ?>
        <?php include($COMPONENTS_PATH . 'head_bootstrap.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_standard.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_headstart.php') ?>
    </head>

    <body class="projects-page">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>

        <div id="team">
            <div class="background2 bg2">
                <div class="team">
                    <h2 style="color: #2d3e52;">Projects</h2>
                    <p>At Open Knowledge Maps, our aim is to improve the visibility of scientific knowledge. 
                        That’s why we partner with organizations that share our goals to develop innovative projects.
                        <br><br>Check out our present and past projects below and learn more about how we can work together.
                        <!--<a class="underline" href="./getintouch">Get in touch</a>.</p>-->
                </div>
            </div>
        </div>

        <?php include($COMPONENTS_PATH . "project-examples.php"); ?>
        <?php
        $COMMENT_TITLE = "What our project partners say";
        $COMMENT_IMAGES_URL = "./img/project-partners/partner-statements/";
        include($COMPONENTS_PATH . 'commentstream.php');
        ?>            
        <?php include($COMPONENTS_PATH . "project-work-with-us.php"); ?>
        <?php include($COMPONENTS_PATH . "project-team.php"); ?>
        <?php include($COMPONENTS_PATH . "newsletter.php"); ?>
        <?php include($COMPONENTS_PATH . 'footer_base.php'); ?>