<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php include($COMPONENTS_PATH . 'head_bootstrap.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_standard.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_headstart.php') ?>

    </head>
    <body class="about-page">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>



        <div id="about-page">
            <div class="background2">
                <div class="team">
                    <p>Our Goal</p>
                    <p>is to revolutionize discovery of scientific knowledge. 
                        We are building a visual interface that dramatically increases the visibility of 
                        research findings for science and society alike. We believe that a better way to 
                        explore and discover scientific knowledge will benefit us all. </p>
                </div>
            </div>

        </div>

        <?php include($COMPONENTS_PATH . "benefits.php") ?>
        <?php include($COMPONENTS_PATH . "howitworks.php") ?>
        <?php include($COMPONENTS_PATH . "moreinfo.php") ?>
        <?php include($COMPONENTS_PATH . 'feedback.php'); ?>
        <?php include($COMPONENTS_PATH . 'footer.php'); ?>