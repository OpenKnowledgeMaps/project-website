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
        ?>
        <?php include($COMPONENTS_PATH . 'head_bootstrap.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_standard.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_headstart.php') ?>

    </head>
    <body id="home">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>

        <?php
        $default_lib = $DEFAULT_LIB;
        if (isset($_GET["lib"])) {
            $default_lib = $_GET["lib"];
        }
        ?>

        <a name="top"></a>

        <a style="padding-top:160px;" name="search"></a>
        <?php include($COMPONENTS_PATH . 'search-box.php') ?>


        <span class="anchor" id="okmmission"></span>

        <?php include($COMPONENTS_PATH . 'mission.php') ?>
        <?php include($COMPONENTS_PATH . 'featuredin.php') ?>



        <span class="anchor" id="feedback"></span>
        <?php include($COMPONENTS_PATH . 'integrations.php') ?>
        <!-- this stream is STATIC -->
        <?php
        $COMMENT_TITLE = "What our users say";
        $COMMENT_IMAGES_URL = "./img/comments/";
        include($COMPONENTS_PATH . 'commentstream.php');
        ?>

        <?php include($COMPONENTS_PATH . 'workshop-teaser.php') ?>
        <?php include($COMPONENTS_PATH . 'footer.php'); ?>