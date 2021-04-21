<?php
$has_search_form = (isset($contains_search_form) && $contains_search_form);

include "head_components/detect_lang.php";

$default_labels = array(
    "title" => "Open Knowledge Maps - A visual interface to the world&#39;s scientific knowledge"
    , "app-name" => "Open Knowledge Maps"
    , "description" => "Our Goal is to revolutionize discovery of scientific knowledge. We are building a visual interface that dramatically increases the visibility of research findings for science and society alike. We are a non-profit organization and we believe that a better way to explore and discover scientific knowledge will benefit us all."
    , "tweet-text" => "Check out Open Knowledge Maps"
    , "url" => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
    , "twitter-type" => "summary_large_image"
    , "twitter-image" => "https://openknowledgemaps.org/img/card.png"
    , "fb-image" => "https://openknowledgemaps.org/img/cardfb.png"
);

include "head_components/meta_tags.php";
include "head_components/favicons.php";
?>

<link rel="stylesheet" href="<?php echo $LIB_PATH ?>bootstrap.min.css">

<?php
include "head_components/cookieconsent.php";
?>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>

<?php if(!$has_search_form): ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo $LIB_PATH ?>font-awesome.min.css" >
    <script src="<?php echo $LIB_PATH ?>bootstrap.min.js"></script>
<?php else: ?>
    <?php include($SEARCH_FLOW_PATH . 'inc/shared/head-search-form.php'); ?>
<?php endif; ?>

<link rel="stylesheet" href="./css/main.css?v=2021-03-26">

<?php if($has_search_form): ?>
    <link rel="stylesheet" href="./css/options.css">

    <script>
        var pubmed_down = <?php echo (isset($PUBMED_DOWN) && $PUBMED_DOWN === true)?("true"):("false") ?>;
        var base_down = <?php echo (isset($BASE_DOWN) && $BASE_DOWN === true)?("true"):("false") ?>;

        var lib_from_param = "<?php echo(isset($_GET['lib'])?($_GET['lib']):("null")); ?>";
    </script>
<?php endif; ?>

<?php include "head_components/evaluation.php"; ?>
   
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({trigger: "hover", placement: "right"});
    });
</script>