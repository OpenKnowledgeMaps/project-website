<div class="menu">

    <!-- Menu icon -->
    <div class="icon-close">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>

    <!-- Mobile Menu -->
    <ul>
        <a href="index"><li>Search</li></a>
        <a href="about"><li>About</li></a>
        <!--<li><a href="index#discover">Discover Maps</a></li>-->

        <a href="team"><li>Team</li></a>
        <a href="community"><li>Community</li></a>
        <a href="news"><li>News</li></a>
        <a href="faq"><li>FAQs</li></a>
        <a href="getintouch"><li>Get in touch</li></a>
        <a href="donate-now" style="color: #f29e00;"><li><i class="fa fa-heart" aria-hidden="true"></i> Support us</li></a>
        <!--<a href="index#supportus" style="color: #E55137;"><li><i class="fa fa-heart" aria-hidden="true"></i> Support us</li></a>-->
    </ul>
</div>

<div class="icon-menu">
    <span class="awesome">&#xf0c9;</span> MENU
</div>
<div class="imglogo"><a href="index"><img src="./img/logo-okmaps.png"></a></div>
<ul class="description">

    <li id="logo"><a href="index">Open Knowledge Maps</a></li>
    <li>A visual interface to the world's scientific knowledge</li>
</ul>

<ul class="nav_top">
    
    <li><a href="index">Search</a></li>
    <li><a href="about">About</a></li>
    <li><a href="team">Team</a></li>
    <li><a href="community">Community</a></li>
    <li><a href="news">News</a></li>
    <li><a href="faq">FAQs</a></li>
    <li><a href="getintouch">Get in touch</a></li>
    <li class="donation-menu-entry"><a class="donation-button" href="donate-now"><i class="fa fa-heart" aria-hidden="true"></i> 
            Support us</a></li>
    <!--<li><a class="newsletter" href="index#supportus"><i class="fa fa-heart" aria-hidden="true"></i> 
            Support us</a></li>-->
</ul>

<script type="text/javascript">
    $(document).ready(function () {
        $(".nav_top > li > a").each(function(key, item) {
           if(item.href.substr(item.href.lastIndexOf('/') + 1) === location.pathname.substr(location.pathname.lastIndexOf('/') + 1)) {
               $(this).addClass("underline-menu");
           } 
        });
    });
</script>