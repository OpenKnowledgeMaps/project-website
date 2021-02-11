var search_options;
    
var updateOptions = function(post_data) {
    for (let post_field_key in post_data) {
        let post_field = post_data[post_field_key];
        for (let dropdown of config.options.dropdowns) {
            if(dropdown.id === post_field_key) {
                for (let dropdown_field of dropdown.fields) {
                    if(dropdown_field.id === post_field || (Array.isArray(post_field) && post_field.includes(dropdown_field.id))) {
                        dropdown_field.selected = true;
                        if(dropdown.id === "time_range" && dropdown_field.id === "user-defined") {
                            for(let input of dropdown_field.inputs) {
                                if(post_data.hasOwnProperty(input.id)) {
                                    input.text = post_data[input.id];
                                }
                            }
                        }
                    } else {
                        dropdown_field.selected = false;
                    }
                }
                break;
            }
        }
    }
}

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


    if(typeof post_data !== "undefined") {
        updateOptions(post_data);
    }
    search_options.init("#filter-container", config.options, true);

    config.options.dropdowns.forEach(function (entry) {
        if (typeof entry.width === "undefined") {
            entry.width = "110px";
        }
        search_options.select_multi('.dropdown_multi_' + entry.id, entry.name, entry.width, config.options)
    })

    var valueExists = function (key, value) {
        var find = config.options.dropdowns.filter(
                function (data) {
                    return data[key] === value;
                }
        );

        return (find.length > 0) ? (true) : (false);
    }
    
    var getFirstSelectedOption = function(id) {
        for(let dropdown of config.options.dropdowns) {
            if(dropdown.id === id && dropdown.hasOwnProperty("fields")) {
                for(let field of dropdown.fields) {
                    if (field.selected === true) {
                        return field.id;
                    }
                }
                return dropdown.fields[0].id;
            } else {
                return "";
            }
        }
    }
    
    var getInputDate = function(id) {
        for(let dropdown of config.options.dropdowns) {
            if(dropdown.id === "time_range") {
                for(let field of dropdown.fields) {
                    if (field.id === "user-defined") {
                        for(let input of field.inputs) {
                            if(input.id === id) {
                                return input.text;
                            }
                        }
                    }
                }
            }
        }
    }
    
    if (valueExists("id", "time_range")) {
        let value = getFirstSelectedOption("time_range");
        if(value !== "user-defined") {
            let start_date = (config.service === "base")?("1665-01-01"):("1809-01-01");
            search_options.addDatePickerFromTo("#from", "#to", value, start_date);
        } else {
            let start_date = getInputDate("from");
            let end_date = getInputDate("to");
            search_options.addDatePickerFromTo("#from", "#to", value, start_date, end_date, true);
        }
        
    } else if (valueExists("id", "year_range")) {
        let value = getFirstSelectedOption("time_range");
        
        if(value !== "user-defined") {
            let start_year = "1809";
            search_options.setDateRangeFromPreset("#from", "#to", value, start_year);
        } else {
            let start_year = getInputDate("from");
            let end_year = getInputDate("to");
            search_options.setDateRangeFromPreset("#from", "#to", value, start_year, end_year, true);
        }
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
    
    if(show_filters) {
        $("#filters").removeClass("frontend-hidden");
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


