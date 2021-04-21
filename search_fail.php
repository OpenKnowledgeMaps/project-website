<?php include 'config.php' ?>
<!DOCTYPE HTML>

<html lang="en">

    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php $title = "Over Capacity - Open Knowledge Maps"; ?>
        <?php
        include($COMPONENTS_PATH . 'head_standard.php');
        ?>

        <style>
            .ui-widget-header {
                background: #e55137;
                border: 1px solid #DDDDDD;
                color: #333333;
                font-weight: bold;
            }
        </style>

    </head>

    <body>

        <?php include($COMPONENTS_PATH . 'header.php'); ?>

        <a name="top"></a>

        <a style="padding-top:160px;" name="search"></a>

        <div class="background-lamp failgif" style="text-align: center;">

            <div id="progress" class="mittig">

                <h3 class="visualize" style="color: #e55137;">Sorry, we are over capacity!</h3>

                <p id="status" style="text-align: center;">We are in the process of resolving the performance issues - please 
                    try again in a few minutes.
                </p>

            </div>
        </div>

        <?php
        include($COMPONENTS_PATH . 'newsletter.php');
        include($COMPONENTS_PATH . 'footer_base.php');
        ?>