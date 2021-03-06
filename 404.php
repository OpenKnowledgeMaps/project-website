<?php include 'config.php' ?>
<!DOCTYPE HTML>

<html lang="en">

    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php $title = "Not Found - Open Knowledge Maps"; ?>
        <?php include $COMPONENTS_PATH . "head_standard.php" ?>
        
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

                <h3 class="visualize">404 Not found</h3>

                <p style="text-align: center;">We couldn't find the page you were looking for.</p>

                <p style="text-align: center;"><br>You can access our content from the menu above. If you think that there is something wrong with our site, please e-mail us at <a href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a></p>

                <p class="try-now" style="text-align: center; margin:30px 0 0;">
                    <a class="donate-now" href="index">Create a knowledge map</a>
                </p>

            </div>

        </div>

        <?php include($COMPONENTS_PATH . 'footer_base.php'); ?>