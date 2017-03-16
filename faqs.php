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

                <div style="max-width:50%; margin:0px auto 30px;">
                    <p style="font-weight: bold; font-size: 18px; color: #2D3E52;">
                        <span style="font-size:30px; font-weight: bold; color: #e55137;">Q1</span> How do you define most relevant?</p>
                    <p style="font-size: 18px;">At the moment, we are using the relevance ranking provided by - 
                        depending on your choice - either the DOAJ API or the PubMed API. 
                        Both of them mainly use text similarity. PubMed has a detailed <a class="underline" href="https://www.ncbi.nlm.nih.gov/books/NBK3827/#pubmedhelp.Computation_of_Weighted_Relev" target="_blank">
                            description of their relevance ranking.</a>
                    </p>
                </div>


                <p style="max-width:50%; margin:0px auto;font-size: 18px;">
                    <a class="underline" href="#contact">Get in touch</a> if you have any more questions.
                </p>

            </div>

        </div>




        <?php include($COMPONENTS_PATH . 'footer.php'); ?>