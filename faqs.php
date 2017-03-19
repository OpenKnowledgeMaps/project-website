<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php $title = "FAQ - Open Knowledge Maps"; ?>
        <?php include($COMPONENTS_PATH . 'head_bootstrap.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_standard.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_headstart.php') ?>

    </head>
    <body class="faq-page">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>


        <div id="news">  

            <div class="background2">
                <div class="team">
                    <p>FAQ</p>
                    <p>Answers to the most frequently asked questions about Open Knowledge Maps.</p>
                </div>
            </div>

            <div style="max-width:100%;">

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q1</span> How do you define "most relevant" when you are talking about most relevant papers?
                    </p>
                    <p>At the moment, we are using the relevance ranking provided by - 
                        depending on your choice - either the PubMed API or the BASE API. 
                        Both of them mainly use text similarity between your query and the article metadata to determine the relevance. PubMed has a detailed <a href="https://www.ncbi.nlm.nih.gov/books/NBK3827/#pubmedhelp.Computation_of_Weighted_Relev" target="_blank">
                            description of their relevance ranking</a>. BASE uses Lucene (via Solr), which describe their ranking as well <a href="http://lucene.apache.org/core/6_4_2/core/org/apache/lucene/search/package-summary.html#scoring" target="_blank">on this page</a>. 
                    </p>
                </div>

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q2</span> Why are you only using the top 100 papers to create the map?
                    </p>
                    <p>We want to keep the number of papers to a manageable amount. 
                        100 papers are already 10 times more content than is presented on a standard search results page.
                        Nevertheless, we are investigating on how to enable the exploration of larger amounts of content, 
                        while keeping <a href="https://en.wikipedia.org/wiki/Cognitive_load" target="_blank">cognitive load</a> to a minimum.
                        At the moment, you can drill deeper into a topic by providing a more specific search query.
                        One way to do this is to expand your query with the topic of a sub-area.
                    </p>
                </div>

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q3</span> Are the maps generated based on full text analysis or on metadata analysis?
                    </p>
                    <p>The grouping of papers is based on article metadata. Currently, we use titles, abstracts, authors, 
                        journals, and subject keywords to create a word co-occurrence matrix between articles. On top of this
                        matrix, we perform clustering and ordination algorithms. 
                        The labels for the sub-areas (bubbles) are generated from the subject keywords of the articles in this area. 
                        In cases where they are missing from the metadata, we approximate them from abstract and title.
                        More information can be found in <a href="http://0277.ch/ojs/index.php/cdrs_0277/article/view/157/355" target="_blank">this article</a>.
                    </p>
                </div>

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q4</span> Why does the overview visualization work better for some research topics than others?
                    </p>
                    <p>The visualization depends on the search results that we get for a given query.
                        If there are for example not enough articles on the topic, or if the metadata quality is low, this will impact the visualization.
                        We have a number of routines in place to improve your chances of getting a useful map, but we do not always succeed.
                        If you come across a map that needs improvement, we'd love to hear from you at <a href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>.
                    </p>
                </div>

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q5</span> How did Open Knowledge Maps come about?
                    </p>
                    <p>Open Knowledge Maps was founded by Peter Kraker in 2015. 
                        Peter had worked on knowledge domain visualizations in his PhD and developed the first version of 
                        <a href="https://github.com/OpenKnowledgeMaps/Headstart">the  open source visualization framework Headstart</a> out of frustration with the existing discovery tools for scientific knowledge.
                        In January 2016, Peter posted a <a href="https://science20.wordpress.com/2016/01/27/call-for-collaborators-open-science-prize-project-on-open-discovery/" target="_blank">Call for Collaborators</a> 
                        on his blog, which brought a first team of volunteers together.
                    </p>
                </div>

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q6</span> How is Open Knowledge Maps funded?
                    </p>
                    <p>
                        We are a group of volunteers. 
                        Currently, we are looking for funding for <a href="https://github.com/OpenKnowledgeMaps/open-discovery/blob/master/roadmap.md" target="_blank">our roadmap</a> to realize the full potential of the idea.
                        If you are interested in funding this effort, please contact us on <a href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>.

                    </p>
                </div>

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q7</span> How can I contribute?
                    </p>
                    <p>
                        You can contribute in a number of ways: 
                        we love to hear <a class="underline" href="#contact">your feedback and ideas</a> as this helps us to improve 
                        Open Knowledge Maps. If you like the project, please spread the word as far as you can :) <br>
                        We are also looking for open source programmers. If you know your way around PHP, R, or JavaScript and would be able to spare
                        a few hours a week to work with a team of friendly people, 
                        let us know via <a href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>. 


                    </p>
                </div>

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q8</span> Are you available for collaborations and joint projects?
                    </p>
                    <p>
                        No doubt! Just drop us a line on <a href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>

                    </p>
                </div>

                <p class="faq">
                    You couldn't find an answer to your question? Get in touch and we will get back to you as soon as we can.
                </p>

            </div>

        </div>




        <?php include($COMPONENTS_PATH . 'footer.php'); ?>