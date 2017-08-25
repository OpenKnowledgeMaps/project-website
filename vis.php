<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php
        $id = (isset($_GET['id']))?($_GET['id']):("zika");
        
        $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https:' : 'http:';
        
        $context_json = curl_get_contents($protocol . $HEADSTART_URL . "server/services/getContext.php?vis_id=$id");
        $context = json_decode($context_json);

        $query =($context->query == null)?("zika"):($context->query);

        $credit = "";

        $service_name = "";
        
        $service = (substr($context->service, 0, 4) == "PLOS")?("plos"):($context->service);

        if ($service == "plos") {
            $credit = '<a href="http://github.com/ropensci/rplos" target="_blank">rplos</a>. Content and metadata retrieved from <a href="https://www.plos.org/publications/journals/" target="_blank">Public Library of Science Journals</a>';
            echo '<script type="text/javascript" src="./js/data-config_plos.js"></script>';
            $service_name = "PLOS";
            $description = '<a href="https://www.plos.org/publications/journals/" target="_blank">PLOS</a> is a nonprofit Open Access publisher providing access to more than 850,000 articles.';
        } else if ($service === "pubmed") {
            $credit = '<a href="https://github.com/ropensci/rentrez " target="_blank ">rentrez</a>. All content retrieved from <a href="http://www.ncbi.nlm.nih.gov/pubmed " target="_blank ">PubMed</a>.';
            echo '<script type="text/javascript" src="./js/data-config_pubmed.js"></script>';
            $service_name = "PubMed";
            $description = '<a href="http://www.ncbi.nlm.nih.gov/pubmed" target="_blank ">PubMed</a> comprises more '
                    . 'than 26 million citations for biomedical literature from MEDLINE, life science journals, and online books.';
        } else if ($service === "doaj") {
            $credit = '<a href="https://github.com/ropenscilabs/jaod " target="_blank ">jaod</a>. All content retrieved from <a href="http://doaj.org " target="_blank ">DOAJ</a>.';
            echo '<script type="text/javascript" src="./js/data-config_doaj.js"></script>';
            $service_name = "DOAJ";
            $description = '<a href="http://doaj.org " target="_blank ">DOAJ</a> provides access to over 2.3 million articles from more than 9,200 open access journals in all disciplines.';
        } else if ($service === "base") {
            $credit = '<a href="https://github.com/ropenscilabs/rbace" target="_blank ">rbace</a>. All content retrieved from <a href="http://base-search.net" target="_blank ">BASE</a>.';
            echo '<script type="text/javascript" src="./js/data-config_base.js"></script>';
            $service_name = "BASE";
            $description = '<a href="http://base-search.net" target="_blank ">BASE</a> provides access to over 100 million documents from '
                    . 'more than 5,200 content sources in all disciplines.';
        }
        
        $override_labels = array(
            "title" => "Overview of $service_name articles for $query - Open Knowledge Maps"
            , "app-name" => "Open Knowledge Maps"
            , "description" => ""
            , "url" => "https://openknowledgemaps.org"
            , "twitter-type" => "summary_large_image"
            , "twitter-image" => "$SNAPSHOT_PATH$id.png"
            , "fb-image" => "$SNAPSHOT_PATH$id.png"
        );

        include($COMPONENTS_PATH . 'head_bootstrap.php');
        include($COMPONENTS_PATH . 'head_standard.php');
        ?>

        <script>
            var intro = {
            title: "What's this?",
                    body: '<div class="description-headstart" style="max-width: 1000px"><div id="whatsthis-page">            <p class="wtp">This <strong><span style="color:#e55137">beta</span> version of Open Knowledge Maps</strong> presents you with a topical overview of research on                <strong><?php echo $query; ?></strong> based on 100 papers taken from <strong><?php echo $service_name ?></strong>.                 <?php echo $description; ?></p>                <p class="wtp">We use text similarity to create a knowledge map. The algorithm groups those papers together                 that have many words in common. This Open Knowledge Map is intended to help you with:</p>            <div class="benefits">                <div class="benefit-point">                    <p class="icon"><img src="./img/benefits-OKM/overview.png">                    </p>                     <p class="icon-description"><strong>Get an overview of a research topic & find attached research papers:</strong> knowledge maps                         provide an instant overview of a topic by showing the main areas at a glance,                         and papers related to each area. This makes it possible to easily identify useful,                         pertinent information. Simply zoom into the area of your interest and start reading attached papers.                    </p>                </div>                                <div class="benefit-point">                    <p class="icon"><img src="./img/benefits-OKM/concepts.png">                    <p class="icon-description">                        <strong>Identify relevant concepts:</strong> one of the most difficult tasks when you are new in a research field                         is to learn the “language” of the field. Open Knowledge Maps makes it easier for you by                         labeling research areas with relevant concepts.                    </p>                </div>                <div class="benefit-point">                    <p class="icon"><img src="./img/benefits-OKM/irrelevant.png">                    </p>                    <p class="icon-description"><strong>Separate the wheat from the chaff:</strong> we cluster similar papers together.                         This makes it easier to identify relevant content when you are searching for an ambiguous term,                         or when you would like to identify content from a single discipline in a multidisciplinary field.                    </p>                </div>                <div class="benefit-point">                    <p class="icon"><img src="./img/benefits-OKM/open-content.png">                    <p class="icon-description">                        <strong>Find open content:</strong> our knowledge maps include both closed and open access papers. However we highlight open access papers -                         and the majority of those papers can be read from within the interface. And if not,                         the fulltext is only a click away.                    </p>                </div>            </div>                            <p class="wtp"><strong style="font-size: 18px;">We need your feedback!</strong><br>Open Knowledge Maps is made by a team of volunteers. We are continously improving this openly available service for you.                 In order to do so, we need your help, please send us your feedback at <a style="text-decoration: underline;" href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a></p>        </div></div>'
            }
        </script>
    </head>

    <body class="vis">
        <?php include ($COMPONENTS_PATH . "header_search.php"); ?>

        <div style="padding-top:70px;">

            <?php
            require_once $LIB_PATH . 'MobileDetect/Mobile_Detect.php';
            $detect = new Mobile_Detect;
            if ($detect->isMobile()):
            ?>

            <script>
                //Enable overflow on mobile so you can pinch and zoom
                $(document).ready(function () {
                    $(".overflow-vis").css("overflow-y", "visible");
                })
            </script>

                <div class="alert alert-warning" id="mobile-warning">

                    <a href="#" class="close" data-dismiss="alert">&times;</a>

                    Open Knowledge Maps isn't optimized for mobile usage yet. We are working on a better mobile experience; in the meantime, you may encounter some rough edges.

                </div>
            
            <?php else: ?>
            
                <div class="alert alert-warning" id="desktop-warning">

                    <a href="#" class="close" data-dismiss="alert">&times;</a>

                    Welcome to the <span style="color:#e55137">beta</span> version of Open Knowledge Maps. For more information on this map, please 
                    <a href="#info_modal" data-type="text" data-toggle="modal" class="underline">click here</a>.

                </div>
            
            <?php endif ?>

            <div class="overflow-vis">
               <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">

                    <div class="sharebutton"><a class="a2a_button_twitter"></a></div>
                    <div class="sharebutton"><a class="a2a_button_facebook"></a></div>
                    <div class="sharebutton"><a class="a2a_dd" href="https://www.addtoany.com/share"></a></div>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
                <!-- AddToAny END -->
                
                <div id="visualization" style="background-color:white;"></div>
                
            </div>
            
            <script src="js/search_options.js"></script>  
            <script>
                var div_height = ($(document).height() < 750) ? (750) : ($(document).height());
                $("#visualization").css("height", div_height + "px")

                        data_config.server_url = "<?php echo $HEADSTART_URL ?>server/";
                data_config.intro = intro;
                //data_config.title = '<?php echo 'Overview of <span id="search-term-unique">' . $query . '</span> based on <span id="num_articles"></span> ' . $service_name . ' articles'; ?>';
                data_config.files = [{
                    title: <?php echo json_encode($query) ?>,
                    file: <?php echo json_encode($_GET['id']) ?>
                }]
                
                data_config.options = options_<?php echo $service ?>.dropdowns;
            </script>
            <script type="text/javascript" src="<?php echo $HEADSTART_URL ?>dist/headstart.js"></script>
            <script type="text/javascript">
                headstart.start();
            </script>

            <div class="builtwith">Created on <?php echo (new DateTime($context->timestamp))->format('j M Y \a\t H:i') ?> 
                with <a href="http://github.com/pkraker/Headstart" target="_blank">Headstart</a> and <?php echo $credit ?>
            </div>
            <div id="faulty-map"><a href="faq#faq-faulty-map" target="_blank">Not what you expected?</a>
            </div>
        </div>
        <link rel="stylesheet" href="<?php echo $HEADSTART_URL ?>dist/headstart.css">
        <link rel="stylesheet" href="./css/main.css">


        <?php
        include($COMPONENTS_PATH . 'supportus.php');
        include($COMPONENTS_PATH . 'newsletter.php');
        //include($COMPONENTS_PATH . 'newsletter.php');
        include($COMPONENTS_PATH . 'footer.php');
        ?>

<?php
    function curl_get_contents($url) {
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      $data = curl_exec($ch);
      curl_close($ch);
      return $data;
    }
?>
