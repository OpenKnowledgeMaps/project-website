var data_config = {
    tag: "visualization",
    mode: "search_repos",

    service: "doaj",
    
    bubble_min_scale: 1,
    bubble_max_scale: 1,
    paper_min_scale: 1.1,
    paper_max_scale: 1.1,

    title: "",
    base_unit: "citations",
    use_area_uri: true,
    show_multiples: false,
    show_dropdown: false,
    preview_type: "pdf",
    sort_options: ["relevance", "title", "authors", "year"],
    is_force_areas: true,
    language: "eng_pubmed",
    area_force_alpha: 0.015,
    show_list: true,
    content_based: true,
    url_prefix: "https://doaj.org/article/",
	
    show_context: true,
    create_title_from_context: true,
    
    faqs_button: true,
    faqs_url: "https://openknowledgemaps.org/faq",
};
