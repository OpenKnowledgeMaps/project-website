<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'config.php';

// Returns parameter or false in case of error/filter failure
function getParam($param, $where = INPUT_GET, $sanitizer = FILTER_SANITIZE_STRING
                    , $return_empty_string_error = false) {
    $return_param = filter_input($where, $param, $sanitizer);
    
    return ($return_param === null || $return_param === false)
            ? ($return_empty_string_error)?(""):(false)
            : $return_param;
}

// This fixes a bug in iOS Safari where an inactive tab would forget the post 
// parameters - usually when the user opens a different tab while waiting for
// a map to be created.
$service = getParam("service", INPUT_GET, FILTER_SANITIZE_STRING, true);
$id_param = getParam("id");

if(isset($_SESSION['post']) && isset($_SESSION['post'][$id_param]) && isset($_SESSION['post'][$id_param]["unique_id"]) 
        && $_SESSION['post'][$id_param]["unique_id"] === $id_param) {
    $_POST = $_SESSION['post'][$id_param];
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

$unique_id = "";
$dirty_query = "";

if(!empty($_POST)) {
    $post_array = $_POST;
    $dirty_query = $post_array["q"];
    
    if(!isset($post_array["unique_id"])) {
        $query = addslashes(trim(strtolower(strip_tags($dirty_query))));
        
        $date = new DateTime();
        $post_array["today"] = $date->format('Y-m-d');

        $params_array = array();
        switch ($service) {
            case "base":
                $params_array = array("from", "to", "document_types", "sorting", "min_descsize");
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
        $_SESSION['post'][$unique_id] = $post_array;
    } else {
        $unique_id = $post_array["unique_id"];
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
            #progressbar .ui-widget-header {
                background: #e55137;
                border: 1px solid #DDDDDD;
                color: #333333;
                font-weight: bold;
            }
        </style>
        <script src="./js/search.js"></script>
        <script>
            <?php
                if(isset($post_data)) {
                    echo "var post_data = " . $post_data . ";\n";
                }
                
            ?>
        </script>
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

                    <p id="status" class="animated-ellipsis">Please be patient, this takes around 20 seconds.<br>
                        While you are waiting, find out how the knowledge map is being created below.
                    </p>
                </div>
                
                <!-- screen when knowledge map has failed -->
                <div id="error_state" class="search_error_state nodisplay" style="text-align: left !important;">
                    <h3 class="waiting-title" id="error-title" style="color: #e55137;"></h3>
                    <p id="error-reason"></p>
                    <p id="error-remedy"></p>
                    <p id="error-more-info"></p>
                    
                    <div id="new_search_form" class="noresults-search-form nodisplay">
                        <h3 class="waiting-title">Have another try!</h3>
                        <script>
                            var search_term_focus = true;
                            var show_filters = true;
                        </script>
                        <?php
                            $default_lib = $service;
                            $search_query = htmlspecialchars(stripslashes($dirty_query));
                            include($COMPONENTS_PATH . 'search-form.php') 
                        ?>
                        <script>
                            $("#searchform").attr("target", "");
                        </script>  
                    </div>
                    
                    <p id="error-contact"></p>
                    <p class="try-now" style="text-align: left !important; margin:30px 0 0;">
                        <a id="error-resolution" class="donate-now nodisplay"></a>
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
                    , reason: 'Most likely there were not enough results for <strong id="search_term_fail"></strong> with the selected search options.'
                    , remedy: "<strong>Here are some tips to improve your query:</strong>"
                    , more_info: 'Alternatively you can <a class="underline" id="more-info-link_na" target="_blank">check out results for your search query on <span id="more-info-link_service"></span></a>. For more information about our service please <a class="underline" href="https://openknowledgemaps.org/faq">see our FAQs</a>.'
                    , contact: 'If you think that there is something wrong with our service, please let us know at <a class="underline" href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>. Please include the search query in your message.'
                    , "resolution": "Try again"
                    , "resolution_link": "index"
                },
                connection_error: {
                    title: "Connection lost"
                    , reason: "It seems that your Internet is unavailable or the connection was reset."
                    , remedy: 'Please check your Internet settings and try again by <a class="underline" style="cursor:pointer" onClick="window.location.reload();">refreshing this page</a>.'
                    , "resolution": "Refresh this page"
                    , "resolution_link": "javascript:location.reload()"
                    
                },
                server_error: {
                    title: "Whoops! An unexpected error occurred."
                    , reason: 'Unfortunately we don’t know what went wrong. We apologize for the inconvenience. Please <a class="underline" href="index.php">try again</a> in a few minutes.'
                    , remedy: 'If the error persists, please let us know at <a class="underline" href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>. We will investigate the issue further.'
                    , "resolution": "Try again"
                    , "resolution_link": "index"
                    
                },
                no_post_data: {
                    title: "Ooops! You should not be here..."
                    , reason: 'We apologize for this slight detour. You will be redirected to <a class="underline" href="index">our search page</a> in 10 seconds.'
                    , contact: 'For more information about our service please <a class="underline" href="https://openknowledgemaps.org/faq">see our FAQs</a>. If you think that there is something wrong with our service, please let us know at <a class="underline" href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>'
                    , "resolution": "Go to search page"
                    , "resolution_link": "index"
                    
                },
                timeout: {
                    title: "We didn't anticipate this taking so long - unfortunately your request timed out."
                    , reason: "It might be that too many people are currently creating knowledge maps. You may also have lost your Internet connection."
                    , remedy: 'In any case, we recommend to check your Internet settings and try again by <a class="underline" style="cursor:pointer" onClick="window.location.reload();">refreshing this page</a>.'
                    , contact: 'For more information about our service please <a class="underline" href="https://openknowledgemaps.org/faq">see our FAQs</a>. If you think that there is something wrong with our service, please let us know at <a class="underline" href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>'
                    , "resolution": "Refresh this page"
                    , "resolution_link": "javascript:location.reload()"
                    
                },
                pubmed_api_fail: {
                    title: "An unexpected error occurred while retrieving data from PubMed"
                    , reason: "The PubMed API is currently experiencing problems. We have logged the error and will investigate the issue."
                    , remedy: 'Please <a class="underline" style="cursor:pointer" onClick="window.location.reload();">try again</a> in a few minutes or <a class="underline" style="cursor:pointer" href="index">use the BASE integration</a>, which also covers the articles indexed in PubMed.'
                    , contact: 'For more information about our service please <a class="underline" href="https://openknowledgemaps.org/faq">see our FAQs</a>. If you think that there is something wrong with our service, please let us know at <a class="underline" href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>'
                    , "resolution": "Try again"
                    , "resolution_link": "javascript:location.reload()"
                    
                },
            }
            
            //Set JavaScript values influenced by PHP & error code translations
            const error_code_translation = {
                        'timeframe too short': 'Increase the custom time range'
                        , 'query length': 'Try a shorter query'
                        , 'too specific': 'Try keywords instead of long phrases'
                        , 'typo': 'Check if you have a typo in your query'
            };
            
            const error_always_add = [
                'typo'
            ];
            
            var service = "<?php echo $service ?>";
            var unique_id = "<?php echo (isset($unique_id)?($unique_id):("")) ?>";
            
            //If the page is called without any data or the ID is missing, redirect to index page
            if(typeof post_data === "undefined" || unique_id === "") {
                errorOccurred();
                redirectToIndex();
                throw new Error("No post data or ID missing");
            }
            
            const params = new URLSearchParams(location.search);
            params.set('id', unique_id);
            window.history.replaceState({}, '', `${location.pathname}?${params}`);

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

            writeSearchTerm('search_term', search_term_short, search_term);

            executeSearchRequest("<?php echo $HEADSTART_URL ?>server/services/" + script, post_data, service, search_term_short, search_term);

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
                                                