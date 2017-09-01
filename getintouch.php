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
                    <p>We are a non-profit organization and we would love to hear from you!</p>
                </div>
            </div>

            <div style="max-width:100%;">

                <div class="faq">
                    <p class="faquestion">
                        <span class="awesome" id="question-Q">&#xf003;</span> Let us know what you think.
                    </p>
                    <p>
                        In order to improve our free service for you, we need your feedback. If you find issues or have ideas regarding new features, that could improve your experience: write us an E-Mail.<br>
                        <a href="mailto:info@openknowledgemaps.org"> info@openknowledgemaps.org</a>
                    </p>
                </div>

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q" class="awesome">&#xf099;</span> Follow us on Twitter.
                    </p>
                    <p>If you like the project, please spread the word as far as you can.<br>
                        <a href="https://twitter.com/ok_maps" target="_blank">twitter.com/OK_Maps</a>
                    </p>
                </div>

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q" class="awesome">&#xf09b;</span> Fork us on Github.
                    </p>
                    <p>
                        You can post issues or find out more about our open source software Headstart.<br>
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
                        <span id="question-Q" class="awesome">&#xf155;</span> Fund our project.
                    </p>
                    <p>
                        We are a non-profit organization currently looking for funding and joint projects. Drop us a line if you are interested!<br>
                        <a href="mailto:info@openknowledgemaps.org"> info@openknowledgemaps.org</a>
                    </p>
                </div>

                <div class="faq">
                    <p class="faquestion">
                        <span id="question-Q" class="awesome">&#xf005;</span> Become part of the Open Knowledge Maps team.
                    </p>
                    <p>
                        We are also looking for open source programmers. If you know your way around PHP, R, 
                        or JavaScript and would be able to spare a few hours a week to work with a team of friendly people, 
                        let us know via<br>
                        <a href="mailto:info@openknowledgemaps.org"> info@openknowledgemaps.org</a>
                    </p>
                </div>



            </div>

        </div>

        <?php include($COMPONENTS_PATH . 'newsletter.php'); ?>
        <?php include($COMPONENTS_PATH . 'footer.php'); ?>