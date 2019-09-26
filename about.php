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
        <a name="advantages"></a>
        <?php include($COMPONENTS_PATH . "benefits.php") ?>
        <?php include($COMPONENTS_PATH . "howitworks.php") ?>

        <div id="divhow" style="background-color: #eff3f4;">                
            <h2 class="h2reverse">In the future...</h2>

            <div style="display: block; max-width:750px; text-align: center; margin: 0px auto;">
                <p class="project-facts" style="text-align:center;">
                    ... we want to turn discovery into an open and collaborative process. 
                    By sharing the results of our discoveries, we can save valuable time and build on top of each other's knowledge.
                    Watch the video below to find out what this could look like:
                </p>
                <div style="padding:56.25% 0 0 0;position:relative; text-align: center; margin: 20px auto;">
                    <iframe src="https://player.vimeo.com/video/188647919" style="position:absolute;top:0;left:0;width:100%;height:100%; max-width:800px;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                </div>
                <p class="project-facts" style="text-align:center;"> In order to realize our vision we propose to fund Open Knowledge Maps in a collective effort. <a class="underline" href="supporting-membership">We invite organizations to become supporting members</a>.

                </p>

                <p class="try-now" style="text-align: center; margin:30px 0 0;">
                    <a target="_blank" class="donate-now" href="supporting-membership">Support us</a>
                </p>    
            </div>
        </div>

        <!-- this stream is STATIC -->
        <?php
        $COMMENT_TITLE = "What our users say";
        $COMMENT_IMAGES_URL = "./img/comments/";
        include($COMPONENTS_PATH . 'commentstream.php');
        ?>

        <?php include($COMPONENTS_PATH . "moreinfo.php") ?>
        <?php include($COMPONENTS_PATH . "newsletter.php") ?>
        <?php include($COMPONENTS_PATH . 'footer.php'); ?>
