<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php
        $id_get = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
        $id = ($id_get !== false && $id_get !== null && $id_get !== "") ? ($id_get) : ("zika");

        $protocol = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https:' : 'http:';
        
        $custom_title = filter_input(INPUT_GET, "custom_title", FILTER_SANITIZE_STRING);
        $has_custom_title = ($custom_title !== false && $custom_title !== null)?(true):(false);
        
        $embed_get = filter_input(INPUT_GET, "embed", FILTER_VALIDATE_BOOLEAN);
        $is_embed = ($embed_get !== null)?($embed_get):(false);
        
        $canonical_url = "$protocol//openknowledgemaps.org/map/$id" 
                . (($has_custom_title)?(urlencode("custom_title=" . $custom_title)):(""));

        $context_json = curl_get_contents($protocol . $HEADSTART_URL . "server/services/getContext.php?vis_id=$id");
        $context = json_decode($context_json);

        $query = (isset($context) && $context->query !== null) ? ($context->query) : ("zika");
        $query = preg_replace("/\\\\\"/", "&quot;", $query);
        $query = preg_replace("/\\\'/", "&apos;", $query);
        
        $citation = "Open Knowledge Maps (" . (new DateTime($context->timestamp))->format('Y') . "). Overview of research on " . mb_strimwidth(($has_custom_title)?($custom_title):($query), 0, 100, "[..]") .". " 
    . "Retrieved from " . '<a href="' . $canonical_url . '">' . $canonical_url . '</a>'
    . " [" . date ("d M Y") . "].";

        $credit = "";

        $service_name = "";

        $service = (isset($context) && substr($context->service, 0, 4) !== "PLOS") ? ($context->service) : ("plos");
        
        $query_description = ($has_custom_title)?("This map has a custom title and was created using the following query: <b>$query</b>"):('');
        
        if ($service == "plos") {
            $credit = '<a href="http://github.com/ropensci/rplos" target="_blank">rplos</a>. Content and metadata retrieved from <a href="https://www.plos.org/publications/journals/" target="_blank">Public Library of Science Journals</a>';
            echo '<script type="text/javascript" src="./js/data-config_plos.js"></script>';
            $service_name = "PLOS";
            $description = '<a href="https://www.plos.org/publications/journals/" target="_blank">PLOS</a> is a nonprofit Open Access publisher providing access to more than 850,000 articles.';
        } else if ($service === "pubmed") {
            $credit = '<a href="https://github.com/ropensci/rentrez " target="_blank ">rentrez</a>. All content retrieved from <a href="http://www.ncbi.nlm.nih.gov/pubmed " target="_blank ">PubMed</a>.';
            echo '<script type="text/javascript" src="./js/data-config_pubmed.js"></script>';
            $service_name = "PubMed";
            $description = '<a class="underline" href="http://www.ncbi.nlm.nih.gov/pubmed" target="_blank ">PubMed</a> comprises more '
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
            $description = '<a class="underline" href="http://base-search.net" target="_blank ">BASE</a> provides access to over 100 million documents from '
                    . 'more than 5,200 content sources in all disciplines.';
        }

        $override_labels = array(
            "tweet-text" => "Check out this visual overview of research on " . (($has_custom_title)?($custom_title):($query)) . " by @OK_Maps!"
            , "title" => "Overview of research on " . (($has_custom_title)?($custom_title):($query)) . " - Open Knowledge Maps"
            , "app-name" => "Open Knowledge Maps"
            , "description" => "Get an overview of " . (($has_custom_title)?($custom_title):($query)) . ", find relevant papers, and identify important concepts."
            , "twitter-type" => "summary_large_image"
            , "twitter-image" => "$protocol$SNAPSHOT_PATH$id.png"
            , "fb-image" => "$protocol$SNAPSHOT_PATH$id.png"
        );

        include($COMPONENTS_PATH . 'head_bootstrap.php');
        include($COMPONENTS_PATH . 'head_standard.php');
        include($COMPONENTS_PATH . 'vis_intro.php');
        ?>
    </head>

    <body class="vis">
        <?php if (!$is_embed): ?>
        
            <?php include ($COMPONENTS_PATH . "header.php"); ?>

        <div class="topheader"></div>

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
                <?php endif; ?>
            <?php
                include ($COMPONENTS_PATH . "browser_unsupported_banner.php");
                include ($COMPONENTS_PATH . "vis_beta_banner.php"); 
                
            ?>
       <?php endif; ?>
       <script src="js/search_options.js"></script>
       <script>
           var fit_to_page = false;
       </script>
       
       <?php include ($SEARCH_FLOW_PATH . "inc/knowledge-map.php") ?>
       
       <link rel="stylesheet" href="./css/main.css">
       <script>
            data_config.intro = intro;
            <?php if ($service == "plos"): ?>
                data_config.title = '<?php echo 'Overview of <span id="search-term-unique">' . $query . '</span> based on <span id="num_articles"></span> ' . $service_name . ' articles'; ?>';
            <?php endif ?>
            data_config.files = [{
            title: <?php echo json_encode($query) ?>,
                    file: <?php echo json_encode($id) ?>
            }]

            data_config.options = search_flow_config.search_options.filter_options.options_<?php echo $service ?>.dropdowns;
            data_config.server_url = "<?php echo $headstart_path ?>server/";
       </script>
       <?php if ($is_embed): ?>
           <script>
               data_config.canonical_url = "<?php echo $canonical_url; ?>";
           </script>
       <?php else: ?>

            <?php include ($COMPONENTS_PATH . "vis_context_info.php"); ?>

            <div style="border-top: 0px solid #cacfd3; padding: 50px 20px;">
                <p class="try-now" style="text-align: center; margin:0px 0 0;">
                    <a target="_blank" class="donate-now" href="index">Create a new knowledge map</a>
                </p>
            </div>
            
            <div class="desktop-img"><?php include($COMPONENTS_PATH . 'integrations-v2.php') ?></div>
            <div class="mobile-img"><?php include($COMPONENTS_PATH . 'integrations.php') ?></div>
            <?php
            //include($COMPONENTS_PATH . 'supportus.php');
            //include($COMPONENTS_PATH . 'donation-section.php');
            include($COMPONENTS_PATH . 'footer_base.php');
            ?>

        <?php endif; ?>  

        <?php include ($COMPONENTS_PATH . "vis_additional_functions.php"); ?>
        
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