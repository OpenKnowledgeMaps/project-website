<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php $title = "Open Knowledge Maps - A visual interface to the world&#39;s scientific knowledge"; ?>
        <?php include($COMPONENTS_PATH . 'head_bootstrap.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_standard.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_headstart.php') ?>

    </head>
    <body id="home">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>

        <?php
        $default_lib = "base";
        if (isset($_GET["lib"])) {
            $default_lib = $_GET["lib"];
        }
        ?>

        <a name="top"></a>
        <a style="padding-top:160px;" name="search"></a>
                     <?php include($COMPONENTS_PATH . 'search-box.php') ?>

        
        <span class="anchor" id="okmmission"></span>

        <?php include($COMPONENTS_PATH . 'mission.php') ?>


        <span class="anchor" id="feedback"></span>

        <?php
        $TIMELINE_ID = "733358003295035393";
        $FEEBDACK_TITLE = "What our users say";
        include($COMPONENTS_PATH . 'twitterstream.php')
        ?>

        <span class="anchor" id="supportus"></span>

        <?php include($COMPONENTS_PATH . 'supportus.php') ?>
        <?php include($COMPONENTS_PATH . 'newsletter.php') ?>






        <script type="text/javascript">

            var search_options;

            var chooseOptions = function () {
                search_options = SearchOptions;

                switch (config.service) {
                    case "plos":
                        config.options = options_plos;
                        break;

                    case "pubmed":
                        config.options = options_pubmed;
                        break;

                    case "doaj":
                        config.options = options_doaj;
                        break;

                    case "base":
                        config.options = options_base;
                        break;

                    default:
                        config.options = options_doaj;
                }

                search_options.init("#filter-container", config.options);

                config.options.dropdowns.forEach(function (entry) {
                    if (typeof entry.width === "undefined") {
                        entry.width = "110px";
                    }
                    search_options.select_multi('.dropdown_multi_' + entry.id, entry.name, entry.width)
                })

                var valueExists = function (key, value) {
                    var find = config.options.dropdowns.filter(
                            function (data) {
                                return data[key] == value
                            }
                    );

                    return (find.length > 0) ? (true) : (false);
                }
                if (valueExists("id", "time_range")) {
                    if (config.service === "pubmed") {
                        search_options.addDatePickerFromTo("#from", "#to", "any-time", "1809-01-01");
                    } else if (config.service === "base") {
                        search_options.addDatePickerFromTo("#from", "#to", "any-time", "1665-01-01");
                    } else {
                        search_options.addDatePickerFromTo("#from", "#to", "any-time", "1809-01-01");
                    }
                } else if (valueExists("id", "year_range")) {
                    search_options.setDateRangeFromPreset("#from", "#to", "any-time-years", "1809");
                }
            }

            var config = {};

            $(document).ready(function () {
                $('[data-toggle="popover"]').popover({trigger: "hover", placement: "top"});

                config.service = $("input[name='optradio']:checked").val();
                $("input[name='optradio']").change(function () {
                    var radio_val = $(this).val();
                    config.service = radio_val;
                    $("#searchform").attr("action", "search?service=" + config.service);

                    search_options.user_defined_date = false;
                    $("#filter-container").html("");

                    chooseOptions();


                });

                chooseOptions();

                $("#searchform").attr("action", "search?service=" + config.service);
            })
        </script>


        <?php include($COMPONENTS_PATH . 'footer.php'); ?>
