<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        
        <?php
            $override_labels = array(
                "title" => "Projects - Open Knowledge Maps"
                , "description" => "We partner with organizations to develop innovative open science projects that make it easier for you to discover and benefit from scientific knowledge. In addition, these collaborations enable organizations to make their collections more accessible to their users."
            );
        ?>
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
                        We partner with funders, research organizations and infrastructures that share our goals to develop innovative open science projects.<br><br><a class="underline" href="getintouch">Get in touch</a>, if you are interested in such a collaboration. Currently, we are looking for dedicated funding for the workplan set out <a class="underline" href="https://github.com/OpenKnowledgeMaps/open-discovery/blob/master/roadmap.md#Workplan">in our roadmap</a>.</p>
                </div>
            </div>
        </div>

        <?php include($COMPONENTS_PATH . "project-examples.php"); ?>
        
        <?php
        //$COMMENT_TITLE = "What our project partners say";
        //$COMMENT_IMAGES_URL = "./img/project-partners/partner-statements/";
        //include($COMPONENTS_PATH . 'commentstream.php');
        ?>            
        <?php //include($COMPONENTS_PATH . "project-work-with-us.php"); ?>
        <?php //include($COMPONENTS_PATH . "project-team.php"); ?>
        <?php include($COMPONENTS_PATH . 'footer_base.php'); ?>