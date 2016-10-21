<!DOCTYPE HTML>
<html lang="en">
    <head>
            <?php include ("head_standard.php"); ?>
    </head>

    <body>

        <?php include ("header_search.php"); ?>
        <!--<div id="empty" style="padding-top:70px;"></div>-->
        <div id="visualization" style="padding-top:78px; background-color:white;"></div>
        <?php
        $credit = "";

        $title = "";

        if (!isset($_GET['service'])) {
            echo '<script type="text/javascript" src="data-config_plos.js"></script>';
            $credit = '<a href="http://github.com/ropensci/rplos" target="_blank">rplos</a>. Content and metadata retrieved from <a href="https://www.plos.org/publications/journals/" target="_blank">Public Library of Science Journals</a>';

            $title = "PLOS";
        } else {
            if ($_GET['service'] === "plos") {
                $credit = '<a href="http://github.com/ropensci/rplos" target="_blank">rplos</a>. Content and metadata retrieved from <a href="https://www.plos.org/publications/journals/" target="_blank">Public Library of Science Journals</a>';
                echo '<script type="text/javascript" src="data-config_plos.js"></script>';
                $title = "PLOS";
            } else if ($_GET['service'] === "pubmed") {
                $credit = '<a href="https://github.com/ropensci/rentrez " target="_blank ">rentrez</a>. All content retrieved from <a href="http://www.ncbi.nlm.nih.gov/pubmed " target="_blank ">PubMed</a>';
                echo '<script type="text/javascript" src="data-config_pubmed.js"></script>';
                $title = "PubMed";
            } else if ($_GET['service'] === "doaj") {
                $credit = '<a href="https://github.com/ropenscilabs/jaod " target="_blank ">jaod</a>. All content retrieved from <a href="http://www.ncbi.nlm.nih.gov/pubmed " target="_blank ">DOAJ</a>.';
                echo '<script type="text/javascript" src="data-config_doaj.js"></script>';
                $title = "DOAJ";
            }
        }
        ?>
        <script>
            var div_height = ($(document).height() < 750) ? (750) : ($(document).height());
            $("#visualization").css("height", div_height + "px")

            data_config.server_url = "http://localhost/project-website/search/server/";
            data_config.title = '<?php echo 'Overview of <span id="num_articles"></span> ' . $title . ' articles for ' . json_encode($_GET['query']); ?>';
            data_config.files = [{
                    title: <?php echo json_encode($_GET['query']) ?>,
                    file: <?php echo json_encode($_GET['id']) ?>
                }]
        </script>
        <script type="text/javascript" src="search/dist/bundle.js"></script>
        
        <div style="text-align: right; margin: 20px 10px 10px 10px">Built with <a href="http://github.com/pkraker/Headstart" target="_blank">Headstart</a> and <?php echo $credit ?>
        </div>
        
        <link rel="stylesheet" href="./main.css">
        <?php include('footer.php'); ?>