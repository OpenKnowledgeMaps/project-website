<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'config.php';

// This fixes a bug in iOS Safari where an inactive tab would forget the post 
// parameters - usually when the user opens a different tab while waiting for
// a map to be created.
if(isset($_POST["q"])) {
    $_SESSION['post'] = $_POST;
} else if(isset($_SESSION['post'])) {
    $_POST = $_SESSION['post'];
}

function packParamsJSON($params_array, $post_params) {

    if($params_array === null) {
        return null;
    }

    $output_array = array();

    foreach ($params_array as $entry) {
        $current_params = $post_params[$entry];
        $output_array[$entry] = $current_params;
    }

    return json_encode($output_array);
}

function createID($string_array) {
    $string_to_hash = implode(" ", $string_array);
    return md5($string_to_hash);
}

if(!empty($_POST)) {
    $post_array = $_POST;
    
    if(!isset($post_array["unique_id"])) {
        $dirty_query = $post_array["q"];
        $query = addslashes(trim(strtolower(strip_tags($dirty_query))));
        
        $date = new DateTime();
        $post_array["today"] = $date->format('Y-m-d');
        
        $service_get = filter_input(INPUT_GET, "service", FILTER_SANITIZE_STRING);
        $service = ($service_get !== false && $service_get !== null) ? ($service_get) : ("");
        $params_array = array();
        switch ($service) {
            case "base":
                $params_array = array("from", "to", "document_types", "sorting");
                break;
            
            case "pubmed":
                $params_array = array("from", "to", "sorting");
                if(isset($post_array["article_types"])) {
                    $params_array[] = "article_types";
                }
                break;
            
            case "doaj":
                $params_array = array("from", "to", "today", "sorting");
                break;
            
            case "plos":
                $params_array = array("article_types", "journals", "from", "to", "sorting");
                break;
        }

        $params_json = packParamsJSON($params_array, $post_array);
        $unique_id = createID(array($query, $params_json));

        $post_array["q"] = $query;
        $post_array["unique_id"] = $unique_id;
    }
    
    $post_data = json_encode($post_array);
}
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

        <style>
            .ui-widget-header {
                background: #e55137;
                border: 1px solid #DDDDDD;
                color: #333333;
                font-weight: bold;
            }
        </style>
        <script src="./js/search.js"></script>
    </head>

    <body class="about-page search-waiting-page">

        <?php include($COMPONENTS_PATH . 'header_light.php'); ?>

        <a name="top"></a>

        <a style="padding-top:160px;" name="search"></a>

        <div class="background-lamp" style="background-color: #eff3f4 !important;">
             <?php include ($COMPONENTS_PATH . "browser_unsupported_banner.php"); ?>

            <div id="progress" class="mittig">
                <!-- screen while knowledge map is loading -->
                <div id="active_state" class="search_active_state" style="text-align: center;">

                    <h3 class="waiting-title2">Your knowledge map on <strong id="search_term"></strong> is being created!</h3>

                    <div id="progressbar"></div>

                    <p id="status" class="animated-ellipsis">Please be patient, this can take up to 20 seconds.<br>
                        While you are waiting, find out how the knowledge map is being created below.
                    </p>
                </div>
                
                <!-- screen when knowledge map has failed -->
                <div id="error_state" class="search_error_state nodisplay" style="text-align: left !important;">
                    <h3 class="waiting-title" id="error-title" style="color: #e55137;"></h3>
                    <p id="error-reason"></p>
                    <p id="error-remedy"></p>
                    <p id="error-more-info"></p>
                    <p id="error-contact"></p>
                    <p class="try-now" style="text-align: left !important; margin:30px 0 0;">
                    <a class="donate-now" href="index">Try again / Refresh this page</a>
                </p>
                </div>

            </div>
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
        
        <script>
            const error_texts = {
                not_enough_results: {
                    title: "Sorry! We could not create a knowledge map."
                    , reason: 'Most likely there were not enough results for your search query: <strong id="search_term_fail"></strong>'
                    , remedy: "<strong>Here are some tips to improve your query:</strong>"
                    , more_info: 'Alternatively you can <a id="more-info-link_na" target="_blank">check out results for your search query on <span id="more-info-link_service"></span></a>'
                    , contact: 'If you think that there is something wrong with our service, please let us know at <br><a href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>. Make sure you include the search query in your message.'
                },
                connection_error: {
                    title: "Error connecting to the server."
                    , reason: "It seems that you have lost your Internet connection or the connection was reset."
                    , remedy: 'You can try again by <a class="underline" style="cursor:pointer" onClick="window.location.reload();">refreshing this page</a>.'
                    
                },
                server_error: {
                    title: "Sorry! Something went wrong."
                    , reason: 'Please <a href="index.php">try again</a> in a few minutes.'
                    , remedy: 'If the error persists, please let us know at <a href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>.'
                    
                },
                no_post_data: {
                    title: "Oooups! You should not be here..."
                    , reason: 'Sorry about that. You will be redirected to <a class="underline" href="index">our service</a> in 10 seconds.'
                    , contact: 'If you think that there is something wrong with our service, please let us know at <br><a href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>'
                    
                }
            }
            
            //Set JavaScript values influenced by PHP & error code translations
            const error_code_translation = {
                        'timeframe too short': 'Increase your time range'
                        , 'query length': 'Shorten your query'
                        , 'too specific': 'Try more general search terms'
                        , 'typo': 'Check if you have a typo in your query'
            }
            
            <?php
                if(isset($post_data)) {
                    echo "var post_data = " . $post_data . ";\n";
                }
                
                if(isset($unique_id)) {
                    echo 'var unique_id = "' . $unique_id . '";';
                }
                
                $service_get = filter_input(INPUT_GET, "service", FILTER_SANITIZE_STRING);
                $service = (isset($service_get)?($service_get):(""))
                
            ?>
            
            var service = "<?php echo $service ?>";
            
            //If the page is called without any data, redirect to index page
            if(typeof post_data === "undefined") {
                errorOccurred();
                redirectToIndex();
            }

            var script = "";
            var vis_page = "";
            var milliseconds_progressbar = 500;

            var search_aborted = false;
            var error_occurred = false;

            switch (service) {
                case "doaj":
                    script = "searchDOAJ.php";
                    break;

                case "plos":
                    script = "searchPLOS.php";
                    milliseconds_progressbar = 600;
                    break;

                case "pubmed":
                    script = "searchPubmed.php";
                    milliseconds_progressbar = 800;
                    break;

                case "base":
                    script = "searchBASE.php";
                    milliseconds_progressbar = 800;
                    break;

                default:
                    script = "searchDOAJ.php"
            }

            const max_length_search_term_short = 115;
            let search_term = getPostData(post_data, "q", "string").replace(/[\\]/g, "");
            let search_term_short = getSearchTermShort(search_term);

            writeSearchTerm('search_term', search_term_short);

            executeSearchRequest("<?php echo $HEADSTART_URL ?>server/services/" + script, post_data, service, search_term_short);

            var check_fallback_interval = null;
            var check_fallback_timeout = 
                            window.setTimeout(function () {
                                check_fallback_interval = window.setInterval(fallbackCheck, 4000
                                , "<?php echo $HEADSTART_URL ?>server/services/getLastVersion.php?vis_id="
                                , unique_id);
                            }, 10000);
                            
            const tick_interval = 1;
            const tick_increment = 2;

            $("#progressbar").progressbar();
            $("#progressbar").progressbar("value", 2);

            var progessbar_timeout = window.setTimeout(tick_function, tick_interval * milliseconds_progressbar);
           
        </script>
                                                