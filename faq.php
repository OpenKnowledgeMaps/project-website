<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php
        $title = "FAQs - Open Knowledge Maps";
        include($COMPONENTS_PATH . 'head_standard.php');
        ?>

    </head>
    <body class="faq-page faqx">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>


        <div id="news">

            <div class="headerimage"><img src="./img/faq-mobil.png"></div>
            <div class="background2">
                <div class="team">
                    <h2>FAQs</h2>
                    <p>Answers to the most frequently asked questions about Open Knowledge Maps.</p>
                </div>
            </div>

            <div style="max-width:100%;">
                <a id="faq-most-relevant" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q1</span> How do you define "most relevant" when you are talking about most relevant papers?
                    </p>

                    <p>At the moment, we are using the relevance ranking provided by - 
                        depending on your choice - either the 

                        <a class="underline pointer" data-toggle="popover" title="PubMed" data-content="Comprises more 
                           than 29 million citations for biomedical literature from MEDLINE, life science 
                           journals, and online books. Citations may include links to full-text content from 
                           PubMed Central and publisher web sites.">PubMed</a> API or the <a class="underline pointer" data-toggle="popover" title="Bielefeld Academic Search Engine 
                           (BASE)" data-content="Provides access to over 140 million documents from 
                           more than 7,100 content sources in all disciplines.">BASE</a> API. 
                        Both of them mainly use text similarity between your query and the article metadata to determine the relevance. PubMed has a detailed <a class="underline" href="https://www.ncbi.nlm.nih.gov/books/NBK3827/#pubmedhelp.Computation_of_Weighted_Relev" target="_blank">
                            description of their relevance ranking</a>. BASE uses Lucene (via Solr), which describe their ranking as well <a class="underline" href="http://lucene.apache.org/core/6_4_2/core/org/apache/lucene/search/package-summary.html#scoring" target="_blank">on this page</a>. 
                    </p>
                </div>

                <a id="faq-top-100" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q2</span> Why are you only using the top 100 papers to create the map?
                    </p>

                    <p>We want to keep the number of papers to a manageable amount. 
                        100 papers are already 10 times more content than is presented on a standard search results page.
                        Nevertheless, we are investigating how to enable the exploration of larger amounts of content, 
                        while keeping <a class="underline" href="https://en.wikipedia.org/wiki/Cognitive_load" target="_blank">cognitive load</a> to a minimum.
                        At the moment, you can drill deeper into a topic by providing a more specific search query.
                        One way to do this is to expand your query with the topic of a sub-area.
                    </p>

                    <p>In addition to cognitive considerations, there are also technical limitations. Most data providers either impose a limit on how many items can be retrieved or considerably slow down larger queries. In order to give you more content in a single knowledge map, we would have to build our own index first. This is on our roadmap, but due to the significant development and maintenance effort involved, we are still <a class="underline" href="#faq-funding">seeking funding for it</a>.
                    </p>
                </div>

                <a id="faq-papers-missing" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q3</span> Why are there important papers missing in my map?
                    </p>

                    <p>At the moment, we are using the <a href="#faq-top-100" class="underline">top 100 papers</a> from the selected data source to create the map.
                        While this is already 10 times more content than is presented on a standard search results page, we may still miss important 
                        papers due to this restriction. In addition, we can only use papers that have an abstract - otherwise we do not have enough content
                        for our <a href="#faq-automatic-analysis" class="underline">automatic analysis</a>.
                        <br>In the future, we hope to overcome this problem by including more papers in a map 
                        and by enabling users to <a target="_blank" class="underline" href="https://vimeo.com/188647919">manually add papers to automatically created maps</a>.
                        In the meantime, please let us know of cases of major omissions via <a class="underline" href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>.
                    </p>
                </div>

                <a id="faq-waiting-time" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q4</span> Why does it take up to 30 seconds to create a knowledge map?
                    </p>

                    <p>While you wait, each query is processed live: first, it is sent to the selected data provider (either PubMed or BASE), which returns the most relevant results for it. This process takes around 15 seconds. Then, we analyse this data to create a knowledge map for it, which takes another 15 seconds. 
                        We are committed to reduce loading times, but this would most certainly mean that we need to create our own index. This is on our roadmap, but due to the significant development and maintenance effort involved, we are still <a class="underline" href="#faq-funding">seeking funding for it</a>.
                    </p>
                </div>

                <a id="faq-research-quality" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q5</span> How do you ensure the quality of the research included in a knowledge map?
                    </p>

                    <p>We use only trusted data providers such as BASE, PubMed and OpenAIRE. These providers carefully review the data sources to make sure that they only include academic content. However, even with the most careful review, mistakes can occur. If you find content on Open Knowledge Maps that you deem unscientific, please contact us at <a class="underline" href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>.
                    </p>
                </div>

                <a id="faq-automatic-analysis" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q6</span> Are the maps generated based on full text analysis or on metadata analysis?
                    </p>
                    <p>The grouping of papers is based on article metadata. Currently, we use titles, abstracts, authors, 
                        journals, and subject keywords to create a word co-occurrence matrix between articles. On top of this
                        matrix, we perform clustering and ordination algorithms. 
                        The labels for the sub-areas (bubbles) are generated from the subject keywords of the articles in this area. 
                        In cases where they are missing from the metadata, we approximate them from abstract and title.
                        More information can be found in <a class="underline" href="http://0277.ch/ojs/index.php/cdrs_0277/article/view/157/355" target="_blank">this article</a>.
                    </p>
                </div>

                <a id="faq-area-titles" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q7.1</span> How are the area titles created?
                    </p>

                    <p>
                        Area titles are created from subject keywords of documents that have been assigned to the same area. We select those keywords and phrases that appear frequently in one area, and seldom in other areas.
                    </p>

                    <p>This happens in three steps:</p>

                    <ul class="faq-bullet-list">
                        <li>First we collect single keywords and phrases with a length of up to three words for each area (e.g. “mitigation” or “climate change adaptation”).</li>
                        <li>Then we score keywords and phrases according to how frequently they occur in one area compared to other areas (extractive summarization with a bag-of-words TF-IDF algorithm).</li>
                        <li>Finally, we select the top three keywords or phrases for each area.</li>
                    </ul>

                    <p>In many cases, subject keywords are missing in a paper’s metadata, and we infer them from titles and abstracts. In addition we perform smaller tasks, for example we remove stopwords, or we try to identify the correct upper- and lower-casing for abbreviations.
                    </p>
                </div>

                <a id="faq-area-titles-languages" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q7.2</span> Why are area titles sometimes in different languages?
                    </p>

                    <p>
                        In some cases, area titles can be multilingual, when there are papers in different languages in the knowledge map or when keywords are provided in more than one language. This is a difficult problem that is made even more challenging by poor metadata quality: at the moment, we only have correct language metadata for a minority of documents.
                    </p>

                    <p>
                        As part of the EU-funded project TRIPLE, we are working on better solutions for these cases, including the ability to select, which language(s) you would like to restrict your knowledge map to. Stay tuned, we will keep you updated on our progress via <a class="underline" href="getintouch">our news channels</a>.
                    </p>
                </div>

                <a id="faq-automatic-analysis" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q8.1</span> What does the placement of the areas (bubbles) and the papers mean?
                    </p>

                    <p>
                        In general, the placement of areas (bubbles) can be interpreted as follows:
                    </p>

                    <ul class="faq-bullet-list">
                        <li>Closeness of areas implies subject similarity. The closer two areas, the closer they are subject-wise. 
                            The overlap of two areas implies strong subject similarity, but it does not mean that the two areas share common papers.
                            Papers are always assigned to a single area only.
                        </li>

                        <li>Centrality of areas implies subject similarity with the rest of the map, not importance. 
                            The closer an area is to the center, the closer it is subject-wise to all the other areas in the map.
                        </li>
                    </ul>

                    <p>
                        Nevertheless, the placement of the areas should only be taken as an indication as the map is untangled in the beginning to
                        improve readability.
                        The placement of papers within an area has no specific meaning, 
                        as they are moved around significantly during the initial arrangement of the map to avoid overlap.
                        More information can be found in <a class="underline" href="https://arxiv.org/abs/1412.6462" target="_blank">this article</a>.
                    </p>
                </div>

                <a id="faq-size-areas-papers" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q8.2</span> What determines the size of the areas and the papers?
                    </p>

                    <p>
                        The calculation of the size of areas and papers differs between data integrations.
                    </p>

                    <p>
                        <b>In our PubMed integration</b>, the size of a paper is determined by the citation count of the paper. The more citations a paper has received, the larger it is.
                    </p>

                    <p>
                        The size of an area is determined by the sum of the citations that the papers in this area have received. The citation metrics are provided by PubMed. 
                    </p>

                    <p>
                        <b>In our BASE integration</b>, the size of an area is determined by the number of documents it contains. The more papers there are in an area, the larger it is. 
                    </p>

                    <p>
                        All papers are of the same size. There are no additional metrics available in BASE to provide a specific size for each paper. 
                    </p>
                </div>

                <a id="faq-faulty-map" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q9</span> Why does the overview visualization work better for some research topics than others?
                    </p>
                    <p>
                        The visualization depends on the search results that we get for a given query.
                        If there are for example not enough articles on the topic, or if the metadata quality is low, this will impact the visualization.
                        We have a number of routines in place to improve your chances of getting a useful map, but we do not always succeed.
                        If you come across a map that needs improvement, we'd love to hear from you at <a class="underline" href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>.
                    </p>
                </div>

                <a id="faq-cite-okmaps" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q10</span> How should I cite Open Knowledge Maps?
                    </p>
                    <ul class="faq-bullet-list">
                        <li>To cite an individual map, please use the citation provided underneath each map.</li> 
                        <li>To cite the open source software Head Start, please see the read-me <a href="https://github.com/OpenKnowledgeMaps/Headstart#citation" target="_blank" class="underline"> on Github</a>. It also includes relevant research papers.</li> 
                        <li>To reference the website and the search, please use the following citation:
                            <br>
                            <span class="citation">Open Knowledge Maps (2019). Open Knowledge Maps: A Visual Interface to the World's Scientific Knowledge. 
                                <a href="https://openknowledgemaps.org" target="_blank" class="underline">https://openknowledgemaps.org</a></span>
                    </ul>
                </div>

                <a id="faq-info-background" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q11</span> Where can I find more information on the background of Open Knowledge Maps?
                    </p>

                    <p>Please see <a href="https://github.com/OpenKnowledgeMaps/Headstart#Background" target="_blank" class="underline"> our Github page</a> for a list of relevant research papers and project reports.
                    </p>
                </div>

                <a id="faq-source-inclusion" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q12</span> How can I include my repository / data source on Open Knowledge Maps?
                    </p>

                    <p>
                        Open Knowledge Maps uses <a class="underline pointer" data-toggle="popover" title="Bielefeld Academic Search Engine 
                                                    (BASE)" data-content="Provides access to over 140 million documents from 
                                                    more than 7,100 content sources in all disciplines.">BASE</a> as its main data source. 
                        You can check if your data source is already indexed by BASE <a href="https://www.base-search.net/about/en/suggest.php" class="underline" target="blank">on this page</a>. 
                        If not, you can suggest it as a new source <a href="https://www.base-search.net/about/en/suggest_form.php?mainpage=suggest.php" class="underline" target="_blank">using this form</a>.
                    </p>

                    <p>To get included in <a class="underline pointer" data-toggle="popover" title="PubMed" data-content="Comprises more 
                                             than 29 million citations for biomedical literature from MEDLINE, life science 
                                             journals, and online books. Citations may include links to full-text content from 
                                             PubMed Central and publisher web sites.">PubMed</a>, check if your journal is already included using information 
                        <a href="https://www.nlm.nih.gov/bsd/serfile_addedinfo.html" class="underline" target="_blank">on this page</a>. If not, you can suggest it as a new title for MEDLINE
                        <a href="https://wwwcf.nlm.nih.gov/lstrc/lstrcform/med/index.html" class="underline" target="_blank">on this page</a>.
                    </p>
                </div>

                <a id="faq-okmaps" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q13</span> How did Open Knowledge Maps come about?
                    </p>

                    <p>Open Knowledge Maps was founded by Peter Kraker in 2015. 
                        Peter had worked on knowledge domain visualizations in his PhD and developed the first version of 
                        <a class="underline" target="_blank" href="https://github.com/OpenKnowledgeMaps/Headstart">the  open source visualization framework Headstart</a> out of frustration with the existing discovery tools for scientific knowledge.
                        In January 2016, Peter posted a <a class="underline" href="https://science20.wordpress.com/2016/01/27/call-for-collaborators-open-science-prize-project-on-open-discovery/" target="_blank">Call for Collaborators</a> 
                        on his blog, which brought a first team of volunteers together. Since 2016 Open Knowledge Maps is a <a class="underline" href="imprint">registered non-profit organization</a>. 
                    </p>
                </div>

                <a id="faq-custom-solution" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q14</span> Can I use Open Knowledge Maps to visualize my own collection(s)?
                    </p>

                    <p>
                        Absolutely! Open Knowledge Maps is based on the open source software 
                        <a class="underline" href="https://github.com/OpenKnowledgeMaps/Headstart" target="_blank">Head Start</a>, which is able to create knowledge maps from a wide variety of data, including text, metadata and references. 
                        If you have a collection that you would like to visualize with Open Knowledge Maps, check out 
                        <a class="underline" href="https://github.com/OpenKnowledgeMaps/Headstart#getting-started" target="_blank">our docs</a> to get started.
                        If you are interested in a collaboration project <a class="underline" href="projects">check out our present and past collaboration projects</a> and learn more about how we can work together. 
                        Get in touch with your project proposal ideas at <a class="underline" href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>.
                    </p>
                </div>

                <a id="faq-funding" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q15</span> How is Open Knowledge Maps funded?
                    </p>

                    <p>
                        We are a charitable non-profit organization run by a group of dedicated team members and volunteers. We propose to fund Open Knowledge Maps in a collective effort. Organizations are invited to <a class="underline" href="supporting-membership">become supporting members</a> and co-create the platform with us. 
                        If your organization is interested to become a supporting member please get in touch with founder Peter Kraker at: 
                        <a class="underline" href="mailto:info@openknowledgemaps.org">pkraker@openknowledgemaps.org</a>
                    </p>

                    <p>We are also seeking third-party funding for <a class="underline" href="https://github.com/OpenKnowledgeMaps/open-discovery/blob/master/roadmap.md" target="_blank">our roadmap</a> to realize the full potential of the idea.
                        If you are interested in funding specific efforts, please contact us on <a class="underline" href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>.
                    </p>

                    <p>You can also help sustain Open Knowledge Maps by <a class="underline" href="donate-now"> making a donation</a>.
                    </p>
                </div>

                <a id="faq-contribution" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q16</span> How can I contribute?
                    </p>

                    <p>
                        <a class="underline" href="donate-now">You can contribute in a number of ways</a>: 
                        we love to hear <a class="underline" href="getintouch">your feedback and ideas</a> as this helps us to improve 
                        Open Knowledge Maps. If you like the project, please spread the word as far as you can.<br>
                        <!--We are also looking for open source programmers. If you know your way around PHP, R, or JavaScript and would be able to spare
                        a few hours a week to work with a team of friendly people, 
                        let us know via <a class="underline" href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>-->
                    </p>

                    <p>
                        You can also help sustain Open Knowledge Maps by <a class="underline" href="donate-now"> making a donation</a>.
                    </p>
                </div>

                <a id="faq-introduction-training" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q17</span> I would like to introduce Open Knowledge Maps to my peers. Do you have any materials available?
                    </p>
                    <p>
                        We do! 
                        <a class="underline" href="community#training-materials">Check out our training and promotional materials</a> 
                        including presentations in English and Spanish and a How-To for running an Open Knowledge Maps workshop.
                    </p>
                </div>

                <a id="faq-increase-visibility" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q18</span> How do I increase the visibility of my research online?
                    </p>

                    <p>
                        We have created a workshop for this topic entitled "Academic SEO". You can find a recording of this workshop <a class="underline" target="_blank" href="https://www.youtube.com/watch?v=kjKZxZmEXAU" target="_blank">on Youtube</a>. 
                        We have also published the presentation including speaker notes and a short introduction <a class="underline" href="https://openknowledgemaps.org/community#training-materials" target="_blank">in our training materials</a>.
                    </p>
                </div>

                <a id="faq-collaboration-availability" class="anchor"></a>
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q19</span> Are you available for collaborations and joint projects?
                    </p>

                    <p>
                        Yes! 
                        <a class="underline" href="projects">Check out our present and past collaboration projects</a> and learn more about how we can work together. 
                    </p>
                </div>

                <p class="faq">
                    You couldn't find an answer to your question? <a class="underline" href="getintouch">Get in touch</a> 
                    and we will get back to you as soon as we can.
                </p>

            </div>

        </div>
        <span class="anchor" id="newslettersignup"></span>
        <?php include($COMPONENTS_PATH . 'newsletter.php'); ?>
        <?php include($COMPONENTS_PATH . 'footer.php'); ?>
