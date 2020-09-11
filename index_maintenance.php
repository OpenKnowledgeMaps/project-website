<?php include 'config.php' ?>
<!DOCTYPE HTML>

<html lang="en">

    <head>
        <base href="<?php echo $SITE_URL ?>">
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



<?php include($COMPONENTS_PATH . 'header_light.php'); ?>





        <a name="top"></a>

        <a style="padding-top:160px;" name="search"></a>



        <div class="background-lamp failgif">



            <div id="progress" class="mittig">

                <h3 class="waitforit">Under maintenance</h3>

                <!--<div id="progressbar"></div>-->

                <p>We are updating Open Knowledge Maps - please try again in a few minutes.</p>

            </div>



        </div>

        
        <?php include($COMPONENTS_PATH . 'footer.php'); ?>