<?php
require_once 'head_detect_country.php';
?>

<div class="mobile-donation-banner">
    <p style="color:#f29e00; font-weight: 700; text-align: center;">Help sustain Open Knowledge Maps. The price of a coffee is all it takes!</p>

    <p class="try-now" style="text-align:center; margin:20px 0 0;">
        <a target="_blank" class="donate-now" href="donate-now">Make a donation</a>
        <a target="_blank" href="http://eepurl.com/dOQynj" id="remind-me-later" class="close" style="font-size: 12px; float:none; display: block; margin:20px 0 10px; text-decoration: underline;">Remind me later!</a>
    </p>
</div>


<script>
    $(".donation-menu-entry").css("visibility", "hidden");
</script>

<div class="alert alert-warning desktop-donation-banner" id="donation-banner">
    <div style="max-width:1200px; margin:0px auto 0;">
        <a href="#" class="close" data-dismiss="alert" style="color: black; font-size: 42px;">&times;</a>
        
        <div class="donation-image">
            <a  target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XVK3PKWWDWXHA&source=url">
                <img src="./img/donation-banner.png"></a>
        </div>

        <div class="donation-text">
            <p><b>To all our  
                    <?php if ($COUNTRY !== null): ?>    
                        users in <span id="country-donation"><?php echo $COUNTRY ?></span>,
                    <?php else: ?>
                        users,
                    <?php endif ?>
                </b><br>
                We’ll get straight to the point: today, we ask you to help Open Knowledge Maps.
                As a charitable non-profit, we depend on our community and on donations. 
            </p>

            <p><b>If everyone reading this gave <span id="CURRENCY-donation">€3</span>, 
                    we could run Open Knowledge Maps for a full year.</b>
            </p>

            <p>Open Knowledge Maps is the largest visual search engine for scientific knowledge. Our open, ad-free service is used by hundreds 
                of thousands of people around the world. With your help, we can not only keep Open Knowledge Maps online, 
                but also develop it further.
            </p> 

            <p>We hope that you’ll think about how useful it is to be able to discover scientific knowledge. 
                Not only for select few, but everyone on 
                the planet. <b>The price of a coffee is all it takes!</b>
                <br><b><i class="fa fa-heart" aria-hidden="true"></i> Thank you.
                </b> - Peter, Maxi and Chris from the Open Knowledge Maps board.
            </p>

            <p class="try-now" style="text-align:left; margin:20px 0 0;">
                <a target="_blank" class="donate-now" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XVK3PKWWDWXHA&source=url">Donate now</a>
                <a target="_blank" href="http://eepurl.com/dOQynj" id="remind-me-later" class="close" style="font-size: 14px; float:none; display: inline-block; margin-left:30px; text-decoration: underline;">Remind me later!</a>
            </p>
        </div>

    </div>
</div>

<script>
    $('#donation-banner').on('close.bs.alert', function () {
        $(".donation-menu-entry").css("visibility", "visible");
        if (getCookie("hide_donation_banner_temp") === null) {
            setCookie("hide_donation_banner_temp", 1, 2);
        } else {
            let num_displays = getCookie("hide_donation_banner_temp");
            setCookie("hide_donation_banner_temp", +num_displays + 1, 2);
        }
    });

    if (getCookie("hide_donation_banner_permanent") === null && getCookie("hide_donation_banner_temp") <= 2) {
        $("#donation-banner").show();
    } else {
        $(".donation-menu-entry").css("visibility", "visible");
    }

    $("#remind-me-later").on("click", function () {
        setCookie("hide_donation_banner_temp", 3, 2);
    })
</script>

