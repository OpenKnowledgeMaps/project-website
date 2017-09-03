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
                    <p>Get in Touch</p>
                    <p>We would love to hear from you! We are a non-profit organization run by a team of friendly volunteers.</p>
                </div>
            </div>

            <div style="max-width:100%;">

                <div class="faq">
                    <p class="faquestion">
                        <span class="awesome" id="question-Q">&#xf003;</span> Let us know what you think
                    </p>
                    <p>
                        In order to improve Open Knowledge Maps, we need your feedback. Send us an e-mail with features you would like to see and ideas on how we can improve your literature search.<br>
                        <a href="mailto:info@openknowledgemaps.org"> info@openknowledgemaps.org</a>
                    </p>
                </div>

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q" class="awesome">&#xf099;</span> Follow us on Twitter
                    </p>
                    <p>Get real-time updates, ask questions and send feedback.<br>
                        <a href="https://twitter.com/ok_maps" target="_blank">twitter.com/OK_Maps</a>
                    </p>
                </div>
                
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q" class="awesome">&#xf09a;</span> Like us on Facebook
                    </p>
                    <p>
                        <a href="https://www.facebook.com/OKMaps" target="_blank">facebook.com/OKMaps</a>
                    </p>
                </div>

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q" class="awesome">&#xf09b;</span> Fork us on Github
                    </p>
                    <p>
                        Check out our open source software and report issues & ideas for improvement.<br>
                        <a href="https://github.com/OpenKnowledgeMaps" target="_blank">github.com/OpenKnowledgeMaps</a>
                    </p>
                </div>

                <!--<div class="faq">
                    <p class="faquestion">
                        <span id="question-Q" class="awesome">&#xf27b;</span> Take part in our survey.
                    </p>
                    <p>
                    </p>
                </div>-->

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q" class="awesome">&#xf2b5;</span> Collaborate with us
                    </p>
                    <p>
                        If you have a collection that you would like to visualize with Open Knowledge Maps, contact us to set up a joint project.<br>
                        <a href="mailto:info@openknowledgemaps.org"> info@openknowledgemaps.org</a>
                    </p>
                </div>
                
                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q" class="awesome">&#xf155;</span> Fund our project
                    </p>
                    <p>
                        We are a non-profit organization currently looking for funding. 
                        Drop us a line if you are interested in changing the way we discover research!<br>
                        <a href="mailto:info@openknowledgemaps.org"> info@openknowledgemaps.org</a>
                    </p>
                </div>

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q" class="awesome">&#xf005;</span> Become a volunteer
                    </p>
                    <p>
                        We are also looking for open source programmers. If you know your way around PHP, R, 
                        or JavaScript and would be able to spare a few hours a week to work with a team of friendly volunteers, 
                        let us know via<br>
                        <a href="mailto:info@openknowledgemaps.org"> info@openknowledgemaps.org</a>
                    </p>
                </div>



            </div>

        </div>

        <?php include($COMPONENTS_PATH . 'newsletter.php'); ?>
        <?php include($COMPONENTS_PATH . 'footer.php'); ?>