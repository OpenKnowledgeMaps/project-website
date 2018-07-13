<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php
        $id = (isset($_GET['id'])) ? ($_GET['id']) : ("zika");

        $protocol = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https:' : 'http:';
        
        $canonical_url = "$protocol//openknowledgemaps.org/map/$id";

        $context_json = curl_get_contents($protocol . $HEADSTART_URL . "server/services/getContext.php?vis_id=$id");
        $context = json_decode($context_json);

        $query = ($context->query == null) ? ("zika") : ($context->query);
        $query = preg_replace("/\\\\\"/", "&quot;", $query);

        $credit = "";

        $service_name = "";

        $service = (substr($context->service, 0, 4) == "PLOS") ? ("plos") : ($context->service);

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
            "tweet-text" => "Check out this visual overview of research on $query by @OK_Maps!"
            , "title" => "Overview of research on $query - Open Knowledge Maps"
            , "app-name" => "Open Knowledge Maps"
            , "description" => "Get an overview of $query, find relevant papers, and identify important concepts."
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
        <?php if (!isset($_GET['embed']) || $_GET['embed'] === 'false'): ?>
        
            <?php include ($COMPONENTS_PATH . "header.php"); ?>

        <div class="topheader"></div>

            <?php include ($COMPONENTS_PATH . "vis_beta_banner.php"); ?>
       <?php endif; ?>
            <div class="overflow-vis">
 
                <div id="visualization" style="background-color:white;"></div>

            </div>

            <script src="js/search_options.js"></script>  
            <script> 
                var calcDivHeight = function () {
                    
                    let height = $(window).height();
                    let width = $(window).width();
                    
                    if(height <= 670 || width < 904 || (width >= 985 && width  < 1070)) {
                        return 670;    
                    } else if (width >= 904 && width <= 984) {
                        return 670 + (width - 904);
                    } else if (width >= 1070 && width < 1400) {
                        return 670 + (width - 1070)/2;
                    } else if (width > 1400 && width < 1600) {
                        let calc_width = 835 + (width - 1400)
                        return (calc_width > 897)?(897):(calc_width);
                    }  else {
                        return $(window).height();
                    }
                }

                var div_height = calcDivHeight();

                <?php if (!isset($_GET['embed']) || $_GET['embed'] === 'false'): ?>
                    $(".overflow-vis").css("min-height", div_height + "px")
                    $("#visualization").css("min-height", div_height + "px")
                
                <?php endif ?>
                
                data_config.server_url = "<?php echo $HEADSTART_URL ?>server/";
                data_config.intro = intro;
            <?php if ($service == "plos"): ?>
                data_config.title = '<?php echo 'Overview of <span id="search-term-unique">' . $query . '</span> based on <span id="num_articles"></span> ' . $service_name . ' articles'; ?>';
            <?php endif ?>
                data_config.files = [{
                title: <?php echo json_encode($query) ?>,
                        file: <?php echo json_encode($id) ?>
                }]

                data_config.options = options_<?php echo $service ?>.dropdowns;
                                    
            </script>
            <script type="text/javascript" src="<?php echo $HEADSTART_URL ?>dist/headstart.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    headstart.start();
                })
                
            </script>
            
            <link rel="stylesheet" href="<?php echo $HEADSTART_URL ?>dist/headstart.css">
            <link rel="stylesheet" href="./css/main.css">
            
        <?php if (isset($_GET['embed']) && $_GET['embed'] === 'true'): ?>
            <script>
                data_config.credit_embed = true;
                data_config.canonical_url = "<?php echo $canonical_url; ?>";
            </script>

        <?php else: ?>

        <?php include ($COMPONENTS_PATH . "vis_context_info.php"); ?>


        <?php
        include($COMPONENTS_PATH . 'supportus.php');
        //include($COMPONENTS_PATH . 'newsletter.php');
        include($COMPONENTS_PATH . 'footer.php');
        ?>

        <?php endif ?>  

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