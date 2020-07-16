<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'config.php' 

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

        <script type="text/javascript">
<?php
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

    echo "var post_data = " . $post_data . ";\n";
    echo 'var unique_id = "' . $unique_id . '";';
}
?>
    
            var script = "";
            var vis_page = "";
            var service = "<?php echo (isset($_GET["service"])?($_GET["service"]):("")) ?>";

            var tick_interval = 1;
            var tick_increment = 2;
            var milliseconds = 500;
            
            var search_request = null;
            var search_aborted = false;

            switch (service) {
                case "doaj":
                    script = "searchDOAJ.php";
                    break;

                case "plos":
                    script = "searchPLOS.php";
                    milliseconds = 600;
                    break;

                case "pubmed":
                    script = "searchPubmed.php";
                    milliseconds = 800;
                    break;

                case "base":
                    script = "searchBASE.php";
                    milliseconds = 800;
                    break;

                default:
                    script = "searchDOAJ.php"
            }

            search_request = 
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
                            clearFallbackInterval();
                            
                            let search_string = "";
                            
                            try {
                                search_string = unboxPostData(post_data, service);
                            } catch(e) {
                                console.log("An error ocurred when creating the search string");
                            }

                            $("#progress").html("Sorry! We could not create a knowledge map for your search term. Most likely there were not enough results."
                                    + ((search_string !== "")
                                        ?("<br> You can <a href=\"" + search_string + "\" target=\"_blank\">check out your search on " + ((service === "base") ? ("BASE") : ("PubMed")) + "</a> or <a href=\"index.php\">go back and try again.</a>")
                                        :("<br> Please <a href=\"index.php\">go back and try again.</a>"))
                                    + "<br><br>If you think that there is something wrong with our site, please let us know at <br><a href=\"mailto:info@openknowledgemaps.org\">info@openknowledgemaps.org</a>");

                        }

                    })

                    .fail(function (xhr, status, error) {
                        
                        //do not carry out if request is aborted
                        if(search_aborted)
                            return;
                        
                        clearFallbackInterval();

                        console.log("error");
                        if(xhr.status === 0) {
                            $("#progress")
                                    .html('Error connecting to the server. It seems that you have lost your Internet connection or the connection was reset. You can try again by <a class="underline" style="cursor:pointer" onClick="window.location.reload();">refreshing this page</a>.');
                        } else {
                            $("#progress").html("Sorry! Something went wrong. Please <a href=\"index.php\">try again</a> in a few minutes. <br><br>If the error persists, please let us know at <a href=\"mailto:info@openknowledgemaps.org\">info@openknowledgemaps.org</a>.");
                        }

                    })
                    
            function fallbackCheck() {
                $.getJSON("<?php echo $HEADSTART_URL ?>server/services/getLastVersion.php?vis_id=" + unique_id,
                            function(output) {
                                if (output.status === "success") {
                                    search_aborted = true;
                                    redirectToMap(unique_id);
                                }
                            });
            }
            
            function clearFallbackInterval () {
                if(check_fallback_interval !== null) {
                    window.clearInterval(check_fallback_interval);
                }
            }
            
            function redirectToIndex() {
                clearFallbackInterval();
                $("#progress")
                        .html('Your search request did not contain any data. Please use the search box on the <a class="underline" href="index">index page</a> to search/create a map. You will be redirected there in 10 seconds.<br><br>If you think that there is something wrong with our site, please let us know at <br><a href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>');
                window.setTimeout(function() { window.location = "index"; }, 10000);
                
            }
            
            function redirectToMap(id) {
                $("#progressbar").progressbar("option", "value", 100);
                window.clearTimeout(progessbar_timeout);
                window.location.replace("map/" + id);
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


    </head>

    <body class="about-page search-waiting-page">

        <?php include($COMPONENTS_PATH . 'header_light.php'); ?>

        <a name="top"></a>

        <a style="padding-top:160px;" name="search"></a>

        <div class="background-lamp gif">
             <?php include ($COMPONENTS_PATH . "browser_unsupported_banner.php"); ?>

            <div id="progress" class="mittig">
                <h3 class="visualize">Your knowledge map is being created!</h3>

                <div id="progressbar"></div>

                <p id="status" class="animated-ellipsis">Please be patient, this takes about 20 seconds.
                </p>

            </div>

        </div>

        <div id="discover" style="margin-top:-75px;">
            
            <!-- this stream is STATIC -->
        <?php
        $COMMENT_TITLE = "What our users say";
        $COMMENT_IMAGES_URL = "./img/comments/";
        include($COMPONENTS_PATH . 'commentstream.php');
        ?>
            
        </div>

        <script type="text/javascript">

            $("#progressbar").progressbar();
            $("#progressbar").progressbar("value", 2);

            var tick_function = function () {

                var value = $("#progressbar").progressbar("option", "value");

                value += tick_increment;

                $("#progressbar").progressbar("option", "value", value);

                progessbar_timeout = window.setTimeout(tick_function, tick_interval * milliseconds);

                if (value >= 100) {

                    $("#status").html("<span style='color:red'>Creating your visualization takes longer than expected. Please stay tuned!</span>")

                    $("#progressbar").progressbar("value", 5);

                }

            };

            var progessbar_timeout = window.setTimeout(tick_function, tick_interval * milliseconds);
            var check_fallback_interval = null;
            var check_fallback_timeout = 
                window.setTimeout(function () {
                                    check_fallback_interval = window.setInterval(fallbackCheck, 4000);
                                }, 10000);
                                
            $(document).ready(function() {
                if(typeof post_data === "undefined") {
                    redirectToIndex();
                }
            })

        </script>