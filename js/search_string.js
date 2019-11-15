function getServiceSearchString(post_data, service) {
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
