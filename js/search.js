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

function fallbackCheck(service_url, unique_id) {

    // Do not start fallback check if an error occurred
    if(error_occurred) {
        return;
    }

    $.getJSON(service_url + unique_id,
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

function stopAndResetProgressbar () {
    if(typeof progessbar_timeout !== 'undefined' 
            && progessbar_timeout !== null) {
        window.clearTimeout(progessbar_timeout);
        $("#progressbar").progressbar("option", "value", 0);
    } else {
        console.log("Progressbar timeout not defined");
    }
}

// An error occurred
function errorOccurred() {
    error_occurred = true;
    console.log("An error occurred while creating the map");
    stopAndResetProgressbar();
    clearFallbackInterval();
    $("#active_state").addClass("nodisplay");
    $("#error_state").removeClass("nodisplay");
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

function writeSearchTerm(id, search_term_short, search_term) {
    $('#' + id).text(search_term_short);
    $('#' + id).attr("title", search_term);
}

function executeSearchRequest(service_url, post_data, service, search_term_short, search_term) {
    $.ajax({
            url: service_url,
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
                
                let list_array = [];
                
                if(output.hasOwnProperty("reason") && output.reason.length > 0) {
                    list_array = (Array.isArray(output.reason)) 
                                        ? output.reason
                                        : [output.reason];
                }
                
                if (list_array.length > 0 && list_array[0] === "API error: requested metadata size") {
                    setErrorTexts(error_texts.pubmed_api_fail);
                    return;
                } else if(list_array.length === 0 || list_array[0] === "unexpected data processing error") {
                    setErrorTexts(error_texts.server_error);
                    return;
                }

                let current_error_texts = error_texts.not_enough_results;

                setErrorTitle(current_error_texts.title);
                setErrorReason(current_error_texts.reason);
                if(list_array.length > 0) {
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
                setErrorContact(current_error_texts.contact);
                writeSearchTerm("search_term_fail", search_term_short, search_term);
                setErrorResolution(current_error_texts.resolution, current_error_texts.resolution_link, true);
            }

        })

        .fail(function (xhr, status, error) {

            //do not carry out if request is aborted
            if(search_aborted)
                return;

            errorOccurred();

            if (status === "timeout") {
                setErrorTexts(error_texts.timeout);
            } else if(xhr.status === 0) {
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

// Everything related to error messaging apart from translating 
// error descriptions/possible reasons

function setErrorTexts(text_object, search_term_short, search_term) {
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
    if(typeof search_term_short !== "undefined" && search_term_short !== null
            && typeof search_term !== "undefined" && search_term !== null) {
        writeSearchTerm('search_term_fail', search_term_short, search_term);
    }
    
    if(text_object.hasOwnProperty("resolution") && text_object.hasOwnProperty("resolution_link")) {
        setErrorResolution(text_object.resolution, text_object.resolution_link);
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
function setErrorResolution(resolution, resolution_link, show_form) {
        if(typeof show_form !== "undefined" && show_form === true) {
            $("#new_search_form").show();
            if(search_term_focus) {
                document.getElementById("searchterm").focus({preventScroll: true});
            }
        } else {
            $("#error-resolution").removeClass("nodisplay")
            $("#error-resolution").text(resolution);
            $("#error-resolution").attr("href", resolution_link);
        }
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

