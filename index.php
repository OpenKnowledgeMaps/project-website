<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php
        $override_labels = array(
            "title" => "Open Knowledge Maps - A visual interface to the world&#39;s scientific knowledge"
            , "description" => "Start your literature search here: get an overview of a research topic, find relevant papers, and identify important concepts."
        );
        
        $contains_search_form = true;
        include($COMPONENTS_PATH . 'head_standard.php'); 
        include($COMPONENTS_PATH . 'search_options.php');
        ?>

    </head>
    <body id="home">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>

        <a name="top"></a>

        <a style="padding-top:160px;" name="search"></a>
        <?php include($COMPONENTS_PATH . 'search-box.php') ?>

        <span class="anchor" id="okmmission"></span>
        <?php include($COMPONENTS_PATH . 'mission.php') ?>

        <?php include($COMPONENTS_PATH . 'featuredin.php') ?>
        <div class="desktop-img"><?php include($COMPONENTS_PATH . 'integrations-v2.php') ?></div>
        <div class="mobile-img"><?php include($COMPONENTS_PATH . 'integrations.php') ?></div>

        <span class="anchor" id="feedback"></span>
        <!-- this stream is STATIC -->
        <?php
        $COMMENT_TITLE = "What our users say";
        $COMMENT_IMAGES_URL = "./img/comments/";
        include($COMPONENTS_PATH . 'commentstream.php');
        ?>

        <?php include($COMPONENTS_PATH . 'workshop-teaser.php') ?>
        <?php include($COMPONENTS_PATH . 'footer.php'); ?>