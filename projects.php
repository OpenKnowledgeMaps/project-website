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
                    <p>Projects</p>
                    <p>Open Knowledge Maps is a charitable non-profit.
                        At OKMaps our aim is to improve the visibility of scientific knowledge, that’s why we partner with organizations that 
                        share our goals to develop innovative projects. <a class="underline" href="./getintouch">Get in touch</a>.</p>
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