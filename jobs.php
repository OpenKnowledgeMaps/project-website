<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php $title = "Jobs - Open Knowledge Maps"; ?>
        <?php include($COMPONENTS_PATH . 'head_standard.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_headstart.php') ?>

    </head>
    <body class="updates">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>

        <div id="news"> 
            <div class="background2">
                <div class="team">
                    <h2 style="color: #2d3e52;">Jobs</h2>
                    <p>Do you want to join our friendly team in Vienna? We are looking forward to your application. 
                    </p>
                </div>
            </div>
            <div style="max-width:100%;">

                <div class="faq">
                    <p style="text-align:center;">
                       At present there are no vacancies. 
                    </p>
                </div>
            </div>
        </div>
        <?php include($COMPONENTS_PATH . 'newsletter.php'); ?>

        <?php include($COMPONENTS_PATH . 'footer_base.php'); ?>