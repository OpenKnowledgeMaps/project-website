<script>
    var search_term_focus = true;
</script>
<div class="topheader"></div>    
<?php include ($COMPONENTS_PATH . "covis_banner_small.php"); ?>
<?php //include ($COMPONENTS_PATH . "donation_banner.php"); ?>
<?php include ($COMPONENTS_PATH . "browser_unsupported_banner.php"); ?>

<div class="search-box">
        <div class="background2">
            <div class="team">
                <h2>Map a research topic <sup style="color:white;">beta</sup></h2>
                <p>Get an overview - Find papers - Identify relevant concepts</p>
            </div>

    <form id="searchform" action="#" method="POST" class="mittig2" target="_blank">
        <div style="text-align: left;">
            <p class="library">
                <label class="radio-inline"><input type="radio" name="optradio" value="pubmed" <?php if ($default_lib == "pubmed") echo 'checked="checked"'; ?> <?php if ($PUBMED_DOWN == true) echo 'disabled'; ?>>
                    <span class="bold"<?php if ($PUBMED_DOWN == true) echo 'greyed_out'; ?>">PubMed</span> <span class="<?php if ($PUBMED_DOWN == true) echo 'greyed_out'; ?>">(life sciences)</span>
                    <?php if ($PUBMED_DOWN == true) echo ' <span class="error-message"> Undergoing downtime - please try again later!</span>'; ?>
                    <!--<a href="#" data-toggle="popover" title="PubMed" data-content="Comprises more 
                                            than 26 million citations for biomedical literature from MEDLINE, life science 
                                            journals, and online books. Citations may include links to full-text content from 
                                            PubMed Central and publisher web sites."><i class="fa fa-info-circle source-info" aria-hidden="true"></i></a>--></label>
                
            <?php if($DOAJ_FALLBACK): ?>
                <label class="radio-inline"><input type="radio" name="optradio" value="doaj" <?php if ($default_lib == "doaj") echo 'checked="checked"'; ?>>
                <span class="bold">DOAJ</span> (all disciplines, only open access)</label>
            <?php endif; ?>
                
                <label class="radio-inline"><input type="radio" name="optradio" value="base" 
                    <?php if ($default_lib == "base") echo 'checked="checked"'; ?> <?php if ($BASE_DOWN == true) echo 'disabled'; ?>
                >
                    <span class="bold <?php if ($BASE_DOWN == true) echo 'greyed_out'; ?>">BASE</span> <span class="<?php if ($BASE_DOWN == true) echo 'greyed_out'; ?>">(all disciplines)</span>
                    <?php if ($BASE_DOWN == true) echo ' <span class="error-message"> Undergoing downtime - please try again later!</span>'; ?>
                        <!--<a href="#" data-toggle="popover" title="Bielefeld Academic Search Engine 
                                              (BASE)" data-content="Provides access to over 100 million documents from 
                                              more than 5,200 content sources in all disciplines."><i class="fa fa-info-circle source-info" aria-hidden="true"></i></a>--></label>
            </p>
            
            <!--<p class="library">
                <span class="library-choice">Refine your search:</span></p>-->
            <div id="filter-container"></div>
            
            <!--<label for="q">Search term:</label> -->
            <!--<div class="bg-div">-->
            
                <span id="base-language-selector-container" style="display:none"></span>
                    <input type="text" name="q" size="89" required class="text-field" 
                        id="searchterm" placeholder="Enter your search term" spellcheck="true">
                    <button type="submit" class="submit-btn">GO</button>

            <!--</div>-->
            <!--<div class="filter-btn" style="display: inline-block"><a href="#" id="submit-btn" class="frontend-btn">Submit</a></div>-->
        </div>
            <p class="try-out-maps">Try out: 
                <span class="map-examples base">
                    <a class="underline" target="_blank" href="./map/530133cf1768e6606f63c641a1a96768">digital education</a>
                    <a class="underline" target="_blank" href="./map/aa9750e49a9e9139baf2ff37af17a8c4">"climate change impact"</a> 
                </span>
                <span class="map-examples pubmed" style="display:none">
                    <a class="underline" target="_blank" href="./map/9c13731dc8cd3de25b4eb29cd8c55244">covid-19</a> 
                    <a class="underline" target="_blank" href="./map/96a8f56b533aac696e9f3ea67713ed0a">"climate change"</a>
                </span>
            </p>
    </form>

        </div>
    <p style="text-align:center; margin-top: 30px;"><a class="newsletter2" href="about">What is Open Knowledge Maps?</a><p>
        </div>

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
                    search_options.select_multi('.dropdown_multi_' + entry.id, entry.name, entry.width, config.options)
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

                // if languages are set in options do the populate here
                if (config.options.languages !== undefined) {
                    populateLanguageSelector();
                } else {
                    clearLanguageSelector();
                }
            }

            var bringLanguageCodeToTop = function (code) {
                var languageIdx = config.options.languages.findIndex(function (language) { 
                    return language.code == code;
                })

                if (languageIdx !== -1) {
                    var language = config.options.languages[languageIdx]
                    config.options.languages.splice(languageIdx, 1);
                    config.options.languages.unshift(language)
                }
            }

            var populateLanguageSelector = function () {
                var select = d3.select("#base-language-selector-container")
                    .insert('select', "#input-container")
                    .attr("id", "lang_id")
                    .style("width", "350px")
                    .style("overflow", "auto")
                    .attr("class", "dropdown_multi_language_selector")
                    .style("vertical-align", "top")
                    .attr("name","lang_id")
                
                // set "all languages" option
                select.append("option")
                    .attr("value", "all")
                    .text("All Languages")

                // find corresponding 3 char language code of browser language
                var browserLang = search_options.get639_2Frombcp47(window.navigator.language);

                // move browser to top of language list
                if (browserLang !== null) {
                    bringLanguageCodeToTop(browserLang);
                }

                // move english to the very top above browser language
                bringLanguageCodeToTop("eng");

                config.options.languages.forEach(function (option) {
                    var current_option = select
                            .append("option")
                            .attr("value", option.code)
                            .text( option.lang_in_eng + " (" + option.lang_in_lang + ")");

                })

                $(function () { $('.dropdown_multi_language_selector').multiselect({
                    allSelectedText: "All "
                        , nonSelectedText: "No "
                        , nSelectedText: "Selected Language"
                        , buttonWidth: ''
                        , numberDisplayed: 2
                        , maxHeight: 230
                        , enableFiltering: true
                        , enableCaseInsensitiveFiltering: true
                } ); } )
            }

            var clearLanguageSelector = function () {
                $("#base-language-selector-container").html('')
            }

            var config = {};

            $(document).ready(function () {
                $('[data-toggle="popover"]').popover({trigger: "hover", placement: "top"}); 
                
                var changeLibrary = function () {
                    config.service = $("input[name='optradio']:checked").val();
                    //var radio_val = $(this).val();
                    //config.service = radio_val;
                    $("#searchform").attr("action", "search?service=" + config.service);

                    search_options.user_defined_date = false;
                    $("#filter-container").html("");
                    
                    $(".map-examples").css("display", "none");
                    $(".map-examples." + config.service).css("display", "inline-block");

                    chooseOptions();


                }; 
                
                $("input[name='optradio']").change(changeLibrary);

                chooseOptions();

                $("#searchform").attr("action", "search?service=" + config.service);
                
                changeLibrary();
                
                if (search_term_focus) {
                    document.getElementById("searchterm").focus({preventScroll: true});
                }
            })
            
            $("#searchform").submit(function (e) {
                var ua = window.navigator.userAgent;
                var iOS = !!ua.match(/iPad/i) || !!ua.match(/iPhone/i);
                var webkit = !!ua.match(/WebKit/i);
                var iOSSafari = iOS && webkit && !ua.match(/CriOS/i);
                
                if(iOSSafari) {
                    $("#searchform").attr("target", "");
                }
                
                if (!(browser === "Firefox" || browser === "Safari" || browser === "Chrome")) {
                    let alert_message = 'You are using an unsupported browser.'
                                        + ' We strongly suggest to switch to one of the supported browsers'
                                        + ' before continuing. Otherwise, the search may not work as expected.'
                                        + '\n\nSupported browsers are the latest versions of Edge, Firefox, Chrome, Safari, and Opera.'
                                        + '\n\nDo you still want to continue?';
                    if (!confirm(alert_message)) {
                        $("#searchform").attr("target", "");
                        e.preventDefault();
                    }
                }
                
            })
            
        </script>