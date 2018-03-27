<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php $title = "About - Open Knowledge Maps"; ?>
        <?php include($COMPONENTS_PATH . 'head_bootstrap.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_standard.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_headstart.php') ?>
    </head>

    <body class="team-page community-page">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>

        <div id="team">
            <div class="background2 bg4">
                <div class="team">
                    <p>Our Community</p>
                    <p>We are driven by our community: only together can we change the way we discover research.
                        Do you also want to make a difference? Then consider <a class="underline whitelink" href="#enthusiast-program">becoming an enthusiast</a>! In any case, <a class="underline whitelink" href="./getintouch">get in touch</a>.</p>
                </div>
            </div>

        </div>


        <div class="background2 bg2">
            <div class="team">
                <p>Our Enthusiasts</p>
                <p>play a critical role in shaping Open Knowledge Maps. They are power users and ambassadors from all over the world, spreading the word in events and workshops and providing valuable feedback.</p>
            </div>


            <div class="advisorsdiv">

                <div id="members">

                    <div class="member">
                        <div class="memberimage">
                            <a target="_blank" href="https://refigure.org/"><img class="hoverlink" src="./img/enthusiasts/girija.png" alt="OK Maps Enthusiast"></a>
                        </div>
                        <ul>
                            <li class="name">Girija Goyal</li>
                            <li class="job-title">Co-founder</li>
                            <li class="organization">ReFigure.org</li>
                        </ul>
                    </div>

                    <div class="member">
                        <div class="memberimage">
                            <a target="_blank" href="https://twitter.com/ametodico"><img class="hoverlink" src="./img/enthusiasts/ricardo.png" alt="OK Maps Enthusiast"></a>
                        </div>
                        <ul>
                            <li class="name">Ricardo Hartley Belmar</li>
                            <li class="job-title">Academic</li>
                            <li class="organization">Universidad Central de Chile</li>
                        </ul>
                    </div>

                    <div class="member">
                        <div class="memberimage">
                            <a target="_blank" href="https://twitter.com/amiefairs"><img class="hoverlink" src="./img/enthusiasts/amie.png" alt="OK Maps Enthusiast"></a>
                        </div>
                        <ul>
                            <li class="name">Amie Fairs</li>
                            <li class="job-title">PhD candidate</li>
                            <li class="organization">Max Planck Institute for Psycholinguistics</li>
                        </ul>
                    </div>

                    <div class="member">
                        <div class="memberimage">
                            <a target="_blank" href="https://twitter.com/jermy_pee"><img class="hoverlink" src="./img/enthusiasts/jeremiah.png" alt="OK Maps Enthusiast"></a>
                        </div>
                        <ul>
                            <li class="name">Jeremiah Pietersen</li>
                            <li class="job-title">Digital Scholarship Specialist</li>
                            <li class="organization">University of Cape Town Libraries</li>
                        </ul>
                    </div>

                    <div class="member">
                        <div class="memberimage">
                            <a target="_blank" href="https://www.linkedin.com/in/maria-ines-plaza-schwarck-9825962/"><img class="hoverlink" src="./img/enthusiasts/mari.png" alt="OK Maps Enthusiast"></a>
                        </div>
                        <ul>
                            <li class="name">Mari Plaza</li>
                            <li class="job-title">Data Scientist</li>
                        </ul>
                    </div>


                    <div class="member">
                        <div class="memberimage">
                            <img src="./img/enthusiasts/benedikt.png" alt="OK Maps Enthusiast">
                        </div>
                        <ul>
                            <li class="name">Benedikt Fecher</li>
                            <li class="job-title">Program Director</li>
                            <li class="organization">Humboldt-Institut for Internet and Society</li>
                        </ul>
                    </div>

                </div> 
            </div>

            <?php
            $TIMELINE_ID = "733358003295035393";
            $FEEBDACK_TITLE = "What our enthusiasts say";
            include($COMPONENTS_PATH . 'twitterstream.php');
            ?>            
        </div>


        <?php include($COMPONENTS_PATH . "become-enthusiast.php") ?>
        <?php include($COMPONENTS_PATH . "newsletter.php") ?>
        <?php include($COMPONENTS_PATH . 'footer_base.php'); ?>