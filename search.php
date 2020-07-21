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
                    , reason: "Most likely there were not enough results for your search query: <strong>add actual query here</strong>."
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
                    , reason: "Please <a href=\"index.php\">try again</a> in a few minutes."
                    , remedy: "If the error persists, please let us know at <a href=\"mailto:info@openknowledgemaps.org\">info@openknowledgemaps.org</a>."
                    
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
            
        
            // Everything related to the request to the server
            
            function getPostData(post_data, field, type) {
                if(!(field in post_data) || post_data[field] === 'undefined') {
                    switch (type) {
                        case "string":
                            return "";
                         
                        case "array":
                            return [];
                        
                        case "int":
                            return -1;
                            
                        default:
                            return "";
                    }
                }
                
                return(post_data[field]);               
            }
            
            function fallbackCheck() {
                
                // Do not start fallback check if an error occurred
                if(error_occurred) {
                    return;
                }
                
                $.getJSON("<?php echo $HEADSTART_URL ?>server/services/getLastVersion.php?vis_id=" + unique_id,
                            function(output) {
                                if (output.status === "success") {
                                    search_aborted = true;
                                    redirectToMap(unique_id);
                                }
                            });
            }
            
            function clearFallbackInterval () {
                if(typeof check_fallback_interval !== 'undefined' 
                        && check_fallback_interval !== null) {
                    window.clearInterval(check_fallback_interval);
                } else {
                    console.log("Fallback interval not defined");
                }
            }
            
            // An error occurred
            function errorOccurred() {
                error_occurred = true;
                console.log("An error occurred while creating the map");
                clearFallbackInterval();
                $("#active_state").addClass("nodisplay");
                $("#error_state").removeClass("nodisplay")
            }
            
            function redirectToMap(id) {
                $("#progressbar").progressbar("option", "value", 100);
                window.clearTimeout(progessbar_timeout);
                window.location.replace("map/" + id);
            }
                        
            var getSearchTermShort = function (search_term) {
                return search_term.length > max_length_search_term_short 
                            ? search_term.substr(0, max_length_search_term_short) + "..." 
                            : search_term;
            }
            
            function writeSearchTerm(search_term_short) {
                $('#search_term').text(search_term_short);
            }
            
            function executeSearchRequest(script, post_data, service) {
                $.ajax({
                        url: "<?php echo $HEADSTART_URL ?>server/services/" + script,
                        type: "POST",
                        data: post_data,
                        dataType: "json",
                        timeout: 120000,

                    })

                    .done(function (output) {

                        if (output.status == "success") {

                            redirectToMap(output.id);

                        } else {
                            errorOccurred();

                            let search_string = "";
                            
                            try {
                                search_string = unboxPostData(post_data, service);
                            } catch(e) {
                                console.log("An error ocurred when creating the search string");
                            }
                            
                            let current_error_texts = error_texts.not_enough_results;
                            
                            setErrorTitle(current_error_texts.title);
                            setErrorReason(current_error_texts.reason);
                            if(output.hasOwnProperty("reason") && output.reason.length > 0) {
                                let list_array = (Array.isArray(output.reason)) 
                                                    ? output.reason
                                                    : [output.reason];
                                
                                let list_array_translated = [];
                                for (let item of list_array) {
                                    if(error_code_translation.hasOwnProperty(item)) {
                                        list_array_translated.push(error_code_translation[item]);
                                    } else {
                                        console.log("Unrecognized error code: " + item);
                                    }
                                }
                                setErrorRemedy(current_error_texts.remedy, list_array_translated)
                            }
                            if(search_string !== "") {
                                setErrorMoreInfo(current_error_texts.more_info);
                                $("#more-info-link_na").attr("href", search_string);
                                $("#more-info-link_service").text((service === "base") ? ("BASE") : ("PubMed"))
                            }
                            setErrorContact(current_error_texts.contact)
                        }

                    })

                    .fail(function (xhr, status, error) {
                        
                        //do not carry out if request is aborted
                        if(search_aborted)
                            return;
                        
                        errorOccurred();
 
                        if(xhr.status === 0) {
                            setErrorTexts(error_texts.connection_error);
                        } else {
                            setErrorTexts(error_texts.server_error);
                        }

                    })
            
            }
            
            function redirectToIndex() {
                setErrorTexts(error_texts.no_post_data);
                window.setTimeout(function() { window.location = "index"; }, 10000);
                
            }
            
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
            var search_term = getPostData(post_data, "q", "string").replace(/[\\]/g, "");
            var search_term_short = getSearchTermShort(search_term);

            writeSearchTerm(search_term_short);

            executeSearchRequest(script, post_data, service);

            var check_fallback_interval = null;
            var check_fallback_timeout = 
                            window.setTimeout(function () {
                                check_fallback_interval = window.setInterval(fallbackCheck, 4000);
                            }, 10000);
        
            // Everything related to error messaging apart from translating 
            // error descriptions/possible reasons
            
            function setErrorTexts(text_object) {
                if(text_object.hasOwnProperty("title")) {
                    setErrorTitle(text_object.title);
                }
                if(text_object.hasOwnProperty("reason")) {
                    setErrorReason(text_object.reason);
                }
                if(text_object.hasOwnProperty("remedy")) {
                    setErrorMoreInfo(text_object.remedy);
                }
                if(text_object.hasOwnProperty("more_info")) {
                    setErrorMoreInfo(text_object.more_info);
                }
                if(text_object.hasOwnProperty("title")) {
                    setErrorContact(text_object.contact);
                }
            }
            
            function setErrorTitle(html_string) {
                writeErrorFieldHTML("error-title", html_string);
            }
            
            function setErrorReason(html_string) {
                writeErrorFieldHTML("error-reason", html_string);
            }
            
            function setErrorRemedy(html_string, list_array) {
                writeErrorFieldList("error-remedy", list_array, html_string);
            }
            
            function setErrorMoreInfo(html_string) {
                writeErrorFieldHTML("error-more-info", html_string);
            }
            
            function setErrorContact(html_string) {
                writeErrorFieldHTML("error-contact", html_string);
            }
            
            function writeErrorFieldHTML(field, html_string) {
                $("#" + field).html(html_string);
            }
            
            function writeErrorFieldText(field, text_string) {
                $("#" + field).text(text_string);
            }
            
            function writeErrorFieldList(field, list_array, text) {
                if(typeof text !== "undefined" && text !== null) {
                   $("#" + field).append($("<p>", { html: text }))
                }
                
                if(typeof list_array !== "undefined" && list_array !== null) {
                    let list_id = field + "_list";
                    $("#" + field).append($("<ul>", { id: list_id }))
                    for (let item of list_array) {
                        $("#" + list_id).append($("<li>", { text: item }))
                    }
                }
            }
            
            function unboxPostData(post_data, service) {
                if (service === "base") {
                    var base_search_string = "https://base-search.net/Search/Results?"
                            + ((getPostData(post_data, "sorting", "string") === "most-recent") ? ("sort=dcyear_sort+desc&") : (""))
                            + "refid=okmaps&type0[]=all&lookfor0[]=" + getPostData(post_data, "q", "string")
                            + "&type0[]=tit&lookfor0[]=&type0[]=aut&lookfor0[]=&type0[]=subj&lookfor0[]=&type0[]=url&lookfor0[]=&offset=10&ling=0&type0[]=country"
                            + "&lookfor0[]=&daterange=year&yearfrom=" + getPostData(post_data, "from", "string").substr(0, 4) + "&yearto=" + getPostData(post_data, "to", "string").substr(0, 4)
                            + "&type1[]=doctype" + createDoctypeString(getPostData(post_data, "document_types", "array"), service)
                            + "&allrights=all&type2[]=rights&lookfor2[]=CC-*&lookfor2[]=CC-BY&lookfor2[]=CC-BY-SA&lookfor2[]=CC-BY-ND&lookfor2[]=CC-BY-NC&lookfor2[]=CC-BY-NC-SA&lookfor2[]=CC-BY-NC-ND&lookfor2[]=PD&lookfor2[]=CC0&lookfor2[]=PDM&type3[]=access&lookfor3[]=1&lookfor3[]=0&lookfor3[]=2&name=&join=AND&bool0[]=AND&bool1[]=OR&bool2[]=OR&bool3[]=OR&newsearch=1";

                    return base_search_string;
                } else if (service === "pubmed") {

                    var pubmed_string = "https://www.ncbi.nlm.nih.gov/pubmed?"
                            + "term=((" + getPostData(post_data, "q", "string") + "%20AND%20(%22"
                            + getPostData(post_data, "from", "string") + "%22%5BDate%20-%20Publication%5D%20%3A%20%22" + getPostData(post_data, "to", "string") + "%22%5BDate%20-%20Publication%5D))"
                            + "%20AND%20((" + createDoctypeString(getPostData(post_data, "article_types", "array"), service) + "))";

                    return pubmed_string;
                }

            }

            function createDoctypeString(doctypes, service) {
                var doctypes_string = "";
                doctypes.forEach(function (doctype) {
                    if (service === "base")
                        doctypes_string += "&lookfor1[]=" + doctype;
                    else if (service === "pubmed")
                        doctypes_string += "%22" + doctype + "%22%5BPublication%20Type%5D%20OR";

                });
                return doctypes_string;
            }
            
        </script>
                                                
        <script>
            // Everything related to the progress bar apart from global settings

            function tick_function() {

                var value = $("#progressbar").progressbar("option", "value");
                value += tick_increment;
                $("#progressbar").progressbar("option", "value", value);
                progessbar_timeout = window.setTimeout(tick_function, tick_interval * milliseconds_progressbar);

                if (value >= 100) {
                    $("#status").html("<span style='color:red'>Creating your visualization takes longer than expected. Please stay tuned!</span>")
                    $("#progressbar").progressbar("value", 5);
                }

            };
            
            const tick_interval = 1;
            const tick_increment = 2;
            
            $("#progressbar").progressbar();
            $("#progressbar").progressbar("value", 2);
                       
            var progessbar_timeout = window.setTimeout(tick_function, tick_interval * milliseconds_progressbar);
           
        </script>
                                                