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
                    <h2 style="color: #2d3e52;">Our Goal</h2>
                    <p>is to revolutionize discovery of scientific knowledge. 
                        We are building a visual interface that dramatically increases the visibility of 
                        research findings for science and society alike. We are a non-profit organization and we believe that a better way to 
                        explore and discover scientific knowledge will benefit us all. </p>
                </div>
            </div>
        </div>

        <?php include($COMPONENTS_PATH . "benefits.php") ?>
        <?php include($COMPONENTS_PATH . "howitworks.php") ?>
        <?php
        $TWITTERSTREAM_TYPE = "timeline";
        $TIMELINE_ID = "733358003295035393";
        $FEEBDACK_TITLE = "What our users say";
        include($COMPONENTS_PATH . 'twitterstream.php');
        ?>
        <?php include($COMPONENTS_PATH . "moreinfo.php") ?>
        <?php include($COMPONENTS_PATH . "newsletter.php") ?>
        <?php include($COMPONENTS_PATH . 'footer.php'); ?>
