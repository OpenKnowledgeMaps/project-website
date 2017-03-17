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
    <body>

        <?php include($COMPONENTS_PATH . 'header.php'); ?>


        <div id="news">  

            <div class="background2">
                <div class="team">
                    <p>FAQ</p>
                    <p>Some of the most frequently asked questions about OK Maps.</p>
                </div>
            </div>

            <div style="max-width:100%;">

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q1</span> How do you define most relevant when you are talking about most relevant papers?
                    </p>
                    <p>At the moment, we are using the relevance ranking provided by - 
                        depending on your choice - either the PubMed API or the BASE API. 
                        Both of them mainly use text similarity. PubMed has a detailed <a class="underline" href="https://www.ncbi.nlm.nih.gov/books/NBK3827/#pubmedhelp.Computation_of_Weighted_Relev" target="_blank">
                            description of their relevance ranking</a>. BASE uses Lucene (via Solr), which describe their ranking as well <a href="http://lucene.apache.org/core/6_4_2/core/org/apache/lucene/search/package-summary.html#scoring" target="_blank">on this page</a>. 
                    </p>
                </div>
                
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q2</span> Why are you only using the top 100 papers?
                    </p>
                    <p>(please fill in answer)
                    </p>
                </div>
                
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q3</span> Is this based on full text analysis, abstract or titles?
                    </p>
                    <p>The grouping of papers is based on the subject keywords of papers. 
                        In cases where they are missing from the metadata, we approximate them from abstract and title.
                    </p>
                </div>
                
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q4</span> Is this based on full text analysis, abstract or titles?
                    </p>
                    <p>The grouping of papers is based on the subject keywords of papers. 
                        In cases where they are missing from the metadata, we approximate them from abstract and title.
                    </p>
                </div>
                
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q">Q4</span> What are the dependencies?
                    </p>
                    <p>We need to mention that the result depends on the meta data and how well that is done etc.
                    </p>
                </div>



                <p class="faq">
                    You couldn't find an answer to your question? <a class="underline" href="#contact">Get in touch</a> an we will get back to you as soon as we can.
                </p>

            </div>

        </div>




        <?php include($COMPONENTS_PATH . 'footer.php'); ?>