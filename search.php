<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'config.php';
?>
<!DOCTYPE HTML>

<html lang="en">

    <head>
        <base href="<?php echo $SITE_URL ?>">
        <meta name="robots" content="noindex">
        <?php
        $title = "Search - Open Knowledge Maps";
        include($COMPONENTS_PATH . 'head_bootstrap.php');
        include($COMPONENTS_PATH . 'head_standard.php');
        include($COMPONENTS_PATH . 'head_headstart.php');
        ?>
        <script src="./js/waiting_page_options.js"></script>
    </head>

    <body class="about-page search-waiting-page">
        
        

        <?php include($COMPONENTS_PATH . 'header_light.php'); ?>

        <a name="top"></a>

        <a style="padding-top:160px;" name="search"></a>

        <div class="background-lamp" style="background-color: #eff3f4 !important;">
             <?php include ($COMPONENTS_PATH . "browser_unsupported_banner.php"); ?>
             <?php
                $params_arrays = array(
                    "base" => array("from", "to", "document_types", "sorting", "min_descsize")
                    , "pubmed" => array("from", "to", "sorting", "article_types")
                );
           
                include ($SEARCH_FLOW_PATH . "inc/waiting-page.php") 
             ?>
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