<!DOCTYPE HTML>
<html lang="en">
    <head>
        <?php include('head_bootstrap.php'); ?>
        <?php include('head_standard.php'); ?>
        <?php include('head_headstart.php') ?>

    </head>
    <body>

        <?php include('header.php'); ?>


        <a name="top"></a>
        <a style="padding-top:160px;" name="search"></a>

        <div class="background1">


            <form id="searchform" action="#" method="POST" class="mittig" target="_blank">
                <h2 class="visualize">Visualize a research topic <sup>beta</sup></h2>
                <p class="library">Choose a library:
                    <label class="radio-inline"><input type="radio" name="optradio" value="pubmed">
                        <a href="#" data-toggle="popover" title="PubMed" data-content="Comprises more than 26 million citations for biomedical literature from MEDLINE, life science journals, and online books. Citations may include links to full-text content from PubMed Central and publisher web sites.">PubMed</a></label>
                    <label class="radio-inline"><input type="radio" name="optradio" value="doaj" checked="checked">
                        <a href="#" data-toggle="popover" title="Directory of Open Access Journals (DOAJ)" data-content="Provides access to over 2.3 million articles from more than 9,200 open access journals in all disciplines.">Directory of Open Access Journals</a></label>
                </p>
                <!--<label for="q">Search term:</label> -->
                <!--<div class="bg-div">-->
                <input type="text" name="q" size="89" required class="text-field" placeholder="Enter a research topic or area, e.g. heart disease">
                <button type="submit" class="submit-btn">GO</button>
                <!--</div>-->
                <!--<div class="filter-btn" style="display: inline-block"><a href="#" id="submit-btn" class="frontend-btn">Submit</a></div>-->
                <div id="filter-container"></div>
            </form> 

        </div>



        <!--<div class="background2"></div>-->

        <div class="missionstatement">
            <p>It's time <br>to change the way <br>we discover research!</p>

        </div>
        <span class="anchor" id="okmmission"></span>
        <div id="mission">
            <h2 id="ourmission"> Our Mission</h2>



            <p><strong>We are creating a visual interface to the world's scientific knowledge</strong>
                that can be used by anyone in order to dramatically improve the discoverability of research results.
                <br><br>
                We are going to provide a large-scale system of open, interactive and interlinked knowledge maps
                spanning all fields of research. Around these maps, we will develop a space for collective knowledge organisation 
                and exploration, <strong>connecting researchers, students, librarians, journalists, practitioners and citizens.</strong>
                <br><br>
                <strong>For more information</strong>, see <a href="https://science20.wordpress.com/2016/05/11/its-time-to-change-the-way-we-discover-research/" style="text-decoration: underline;" target="_blank">Peter's post</a> where he describes his vision for revolutionizing discovery.
            </p>
        </div>



        <!--<div class="missionstatement">
            <p>Become an advisor on the project!</p>
            
        </div>-->

        <!--<span class="anchor" id="discover"></span>-->
        <!--<div class="background3"></div>-->

        <?php include("howitworks.php") ?>


        <span class="anchor" id="feedback"></span>

        <?php include("feedback.php") ?>

        <span class="anchor" id="newsletter"></span>

        <?php include("newsletter.php") ?>

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
                        break

                    default:
                        config.options = options_doaj;
                }
                
                search_options.init("#filter-container", config.options);

                config.options.dropdowns.forEach(function (entry) {
                    search_options.select_multi('.dropdown_multi_' + entry.id, entry.name)
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
                    search_options.addDatePickerFromTo("#from", "#to", "any-time");
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
                    $("#searchform").attr("action", "search.php?service=" + config.service);
                    
                    search_options.user_defined_date = false;
                    $("#filter-container").html("");

                    chooseOptions();
                    
                    
                });
               
                chooseOptions();

                $("#searchform").attr("action", "search.php?service=" + config.service);
            })
        </script>


        <?php include('footer.php'); ?>