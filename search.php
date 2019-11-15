<?php include 'config.php' ?>
<!DOCTYPE HTML>

<html lang="en">

    <head>
        <base href="<?php echo $SITE_URL ?>">
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
        <script type="text/javascript" src="./js/search_string.js"></script>
        <script type="text/javascript">
<?php
$post_array = $_POST;
$date = new DateTime();
$post_array["today"] = $date->format('Y-m-d');

$post_data = json_encode($post_array);

echo "var post_data = " . $post_data . ";\n";
?>

            var script = "";
            var vis_page = "";
            var service = "<?php echo $_GET["service"] ?>";

            var tick_interval = 1;
            var tick_increment = 2;
            var milliseconds = 500;

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
                    break;

                case "base":
                    script = "searchBASE.php";
                    milliseconds = 750;
                    break;

                default:
                    script = "searchDOAJ.php"
            }

            $.ajax({
                url: "<?php echo $HEADSTART_URL ?>server/services/" + script,
                type: "POST",
                data: post_data,
                dataType: "json",
                timeout: 90000,

            })

                    .done(function (output) {

                        if (output.status == "success") {

                            $("#progressbar").progressbar("option", "value", 100);
                            window.clearTimeout(progessbar_timeout);
                            window.location.replace("map/" + output.id);

                        } else {
                            let search_string = "";

                            try {
                                search_string = getServiceSearchString(post_data, service);
                            } catch(e) {
                                console.log("An error ocurred when creating the search string");
                            }

                            window.sessionStorage.setItem( 'status', 'insufficient_results' );
                            window.sessionStorage.setItem( 'q', post_data['q'] );
                            window.sessionStorage.setItem( 'from', post_data['from'] );
                            window.sessionStorage.setItem( 'to', post_data['to'] );

                            $("#progress").html("Sorry! We could not create a map for your search term. Most likely there were not enough results."
                                    + ((search_string !== "")
                                        ?("<br> You can <a href=\"" + search_string + "\" target=\"_blank\">check out your search on " + ((service === "base") ? ("BASE") : ("PubMed")) + "</a> or <a href=\"index.php\">go back and try again.</a>")
                                        :("<br> Please <a href=\"index.php\">go back and try again.</a>"))
                                    + "<br><br>If you think that there is something wrong with our site, please let us know at <br><a href=\"mailto:info@openknowledgemaps.org\">info@openknowledgemaps.org</a>");

                        }

                    })

                    .fail(function (xhr, status, error) {

                        console.log("error");

                        $("#progress").html("Sorry! Something went wrong. Please <a href=\"index.php\">try again</a> in a few minutes. <br><br>If the error persists, please let us know at <a href=\"mailto:info@openknowledgemaps.org\">info@openknowledgemaps.org</a>.");

                    })

        </script>


    </head>

    <body class="about-page search-waiting-page">

        <?php include($COMPONENTS_PATH . 'header_light.php'); ?>

        <a name="top"></a>

        <a style="padding-top:160px;" name="search"></a>

        <div class="background-lamp gif">
             <?php include ($COMPONENTS_PATH . "browser_unsupported_banner.php"); ?>

            <div id="progress" class="mittig">
                <h3 class="visualize">Your knowledge map for <span class="progressbar-search-query"><?php echo(htmlspecialchars( $_POST['q'] )) ?></span> is being created!</h3>

                <div id="progressbar"></div>

                <p id="status">Please be patient, this takes about 20 seconds.
                </p>

            </div>

        </div>

        <div id="discover" style="margin-top:-75px;">
            <?php include($COMPONENTS_PATH . "benefitssearch.php") ?>

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

        </script>
