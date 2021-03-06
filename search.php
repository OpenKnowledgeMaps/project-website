<?php 
include 'config.php';
include ($SEARCH_FLOW_PATH . "inc/waiting-page/waiting-page-header.php");
?>
<!DOCTYPE HTML>

<html lang="en">

    <head>
        <base href="<?php echo $SITE_URL ?>">
        <meta name="robots" content="noindex">
        <?php
        $title = "Search - Open Knowledge Maps";
        $contains_search_form = true;
        include($COMPONENTS_PATH . 'head_standard.php'); 
        include($COMPONENTS_PATH . 'search_options.php')
        ?>
    </head>

    <body class="about-page search-waiting-page">
        
        

        <?php include($COMPONENTS_PATH . 'header_light.php'); ?>

        <a name="top"></a>

        <a style="padding-top:160px;" name="search"></a>

        <div class="background-lamp" style="background-color: #eff3f4 !important;">
             <?php include ($SEARCH_FLOW_PATH . "inc/shared/banner-browser-unsupported.php"); ?>
             <?php include ($SEARCH_FLOW_PATH . "inc/waiting-page/waiting-page.php") ?>
        </div>
        
         <?php include($COMPONENTS_PATH . "howitworks.php") ?>

        <div id="discover">
            <!-- this stream is STATIC -->
        <?php
        $COMMENT_TITLE = "What our users say";
        $COMMENT_IMAGES_URL = "./img/comments/";
        include($COMPONENTS_PATH . 'commentstream.php');
        ?>
        </div>                                  
