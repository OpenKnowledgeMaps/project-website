<?php
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
include "head_components/cookieconsent.php";
?>

<link rel="stylesheet" href="<?php echo $LIB_PATH ?>font-awesome.min.css" >
<link rel="stylesheet" href="./css/main.css?v=sfec">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php include "head_components/evaluation.php"; ?>

