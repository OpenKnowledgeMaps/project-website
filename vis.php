<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php
        include($COMPONENTS_PATH . 'search_options.php');
        include($SEARCH_FLOW_PATH . 'inc/visualization-header.php');
        ?>
        
        <?php if (!isset($context)): ?>
            <script>
                window.location.replace("http://openknowledgemaps.org/404");
            </script>
        <?php endif; ?>
        
        <?php
              
        //TODO: Move canonical URL and citation creation completely to search flow at some point
        $canonical_url = "$protocol//openknowledgemaps.org/map/$id" 
        . (($has_custom_title)?(urlencode("custom_title=" . $custom_title)):(""));
        
        $citation = "Open Knowledge Maps (" . $publication_year . "). Overview of research on " . mb_strimwidth(($has_custom_title)?($custom_title):($query), 0, 100, "[..]") .". " 
. "Retrieved from " . '<a href="' . $canonical_url . '">' . $canonical_url . '</a>'
. " [" . date ("d M Y") . "].";
        
        $credit = "";
        $service_name = "";

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
                include ($SEARCH_FLOW_PATH . "inc/banner-browser-unsupported.php");
                include($SEARCH_FLOW_PATH . 'inc/banner-mobile.php');
                
            ?>
       <?php endif; ?>
       <script>
           var fit_to_page = false;
       </script>
       
       <?php include ($SEARCH_FLOW_PATH . "inc/visualization.php") ?>
       
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
            data_config.server_url = "<?php echo $headstart_path ?>server/";
       </script>
       <?php if ($is_embed): ?>
           <script>
               data_config.canonical_url = "<?php echo $canonical_url; ?>";
           </script>
       <?php else: ?>
           <?php 
                $builtwith_string = 'Created on '
                   . (new DateTime($timestamp))->format('j M Y \a\t H:i') 
                   .' with <a href="https://github.com/OpenKnowledgeMaps/Headstart" target="_blank">Headstart</a> and '
                   . $credit;
                
                include ($SEARCH_FLOW_PATH . "inc/context-builtwith.php");
                include ($SEARCH_FLOW_PATH . "inc/context-citation.php");
                include ($COMPONENTS_PATH . "vis_context_info.php");
            
            ?>
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