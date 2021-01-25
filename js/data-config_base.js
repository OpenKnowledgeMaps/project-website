var data_config = {
    tag: "visualization",
    mode: "search_repos",

    service: "base",

    bubble_min_scale: 1,
    bubble_max_scale: 1,
    paper_min_scale: 1,
    paper_max_scale: 1,

    title: "",
    base_unit: "citations",
    use_area_uri: true,
    show_multiples: false,
    show_dropdown: false,
    preview_type: "pdf",
    sort_options: ["relevance", "title", "authors", "year"],
    is_force_areas: true,
    language: "eng_pubmed",
    area_force_alpha: 0.02,
    show_list: true,
    content_based: true,
    url_prefix: "https://www.base-search.net/Record/",

    show_context: true,
    create_title_from_context: true,
    context_most_relevant_tooltip: true,

    embed_modal: true,
    share_modal: true,

    doi_outlink: true,
    filter_menu_dropdown: true,
    sort_menu_dropdown: true,
    filter_options: ["all", "open_access"],
	show_keywords: true,

    is_evaluation: true,
    evaluation_service: ["matomo"],

    use_hypothesis: true,

    faqs_button: true,
    faqs_url: "https://openknowledgemaps.org/faq",

    highlight_query_terms: true,
    show_loading_screen: true

};
