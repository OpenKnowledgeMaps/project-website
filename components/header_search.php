<header class="searchheader">
    
    <?php
            require_once $LIB_PATH . 'MobileDetect/Mobile_Detect.php';
            $detect = new Mobile_Detect;
            if ($detect->isMobile()):
        ?>



            <div class="alert alert-warning" id="mobile-warning">

                <a href="#" class="close" data-dismiss="alert">&times;</a>

                Open Knowledge Maps isn't optimized for mobile usage yet. We are working on a better mobile experience; in the meantime, you may encounter some rough edges.

            </div>

        <?php endif ?>

    <div class="menu">

        <!-- Menu icon -->
        <div class="icon-close">
            <img src="./img/close.png">
        </div>

        <!-- Menu -->
        <ul>
            <li><a href="index.php#search">Search</a></li>
            <li><a href="index.php#okmmission">Our Mission</a></li>
            <!--<li><a href="index.php#discover">Discover Maps</a></li>-->
            <li><a href="#contact">Get in touch</a></li>
            <li><a href="team.php#team">Team</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="index.php#newsletter">Newsletter</a></li>
        </ul>

    </div>

    <div class="icon-menu">
        MENU
    </div>

    <div class="imglogo"><a href="index.php"><img src="./img/logo-okmaps.png"></a></div>
    <ul class="description">
        <li id="logo"><a href="index.php">Open Knowledge Maps</a></li>
        <li>A visual interface to the world's scientific knowledge</li>
    </ul>

    <ul class="nav_top">
        <li>
            <a href="index.php#search">Search</a>
        </li>
        <li>
            <a href="index.php#okmmission">Our Mission</a>
        </li>
        <!--<li>
            <a href="index.php#discover">Discover Maps</a>
        </li>-->

        <li>
            <a href="team.php#team">Team</a>
        </li>

        <li>
                    <a href="news.php">News</a>
                </li>
                
        <li>
            <a href="#contact">Get in touch</a>
        </li>

        <li>
            <a class="newsletter" href="index.php#newsletter">Newsletter</a>
        </li>

    </ul>

</header>