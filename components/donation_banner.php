<?php
require_once $LIB_PATH . 'MobileDetect/Mobile_Detect.php';
$detect = new Mobile_Detect;
if ($detect->isMobile()):
    ?>

    <script>
        //Enable overflow on mobile so you can pinch and zoom
        $(document).ready(function () {
            $(".overflow-vis").css("overflow-y", "visible");
        })
    </script>

    <div class="alert alert-warning" id="donation-banner">

        <a href="#" class="close" data-dismiss="alert">&times;</a>

        Welcome to the <span style="font-weight:bold;">beta version</span> of Open Knowledge Maps.
        <a href="#info_modal" data-type="text" data-toggle="modal" class="underline" style="font-weight:bold;">More info on this map</a>. 
        Note: the map isn't optimized for mobile yet, you may encounter some rough edges.

    </div>

<?php else: ?>
        <script>
            $(".donation-menu-entry").css("visibility", "hidden");
        </script>
        <div class="alert alert-warning" id="donation-banner" style="font-size: 18px; max-width:1600px; margin:0px auto 0; background-color: white; padding: 1%;
             -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
             box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
             ">
<div style="max-width:1200px; margin:0px auto 0;">
            <a href="#" class="close" data-dismiss="alert" style="color: black; font-size: 42px;">&times;</a>
            <!--<a href="" class="close" style="font-size: 14px;">Remind me later!</a>-->

            <div class="donation-image" style="display:inline-block; max-width:25%; vertical-align:top; margin-right:30px;">
                <a  target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XVK3PKWWDWXHA&source=url">
                    <img src="./img/donation-banner.png"></a>
            </div>

            <div style="display:inline-block; max-width:60%;">
                <p><b>To all our users in <span id="country-donation">country</span>,</b><br>
                    We’ll get straight to the point: today, we ask you to help Open Knowledge Maps.
                    As a charitable non-profit, we depend on donations. Only a tiny portion of our users give. 
                </p>

                <p><b>If everyone reading this gave <span id="CURRENCY-donation">€3</span>, 
                        we could run Open Knowledge Maps for a full year.</b></p>

                <p>Open Knowledge Maps is the largest visual search engine for scientific knowledge. Our open, ad-free service is used by hundreds 
                    of thousands of people around the world. With your help, we can not only keep Open Knowledge Maps online, but also develop it further.</p> 

                <p>We hope that you’ll think about how useful it is to be able to discover scientific knowledge. Not only for select few, but everyone on 
                    the planet. <b>The price of a coffee is all it takes!</b>
                    <br><b><i class="fa fa-heart" aria-hidden="true"></i> Thank you.</b> - Peter, Maxi and Chris from the Open Knowledge Maps board.
                </p>

                <p class="try-now" style="text-align:left; margin:20px 0 0;">
                    <a target="_blank" class="donate-now" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XVK3PKWWDWXHA&source=url">Donate now</a>
                    <a target="_blank" href="http://eepurl.com/dOQynj" class="close" style="font-size: 14px; float:none; display: inline-block; margin-left:30px; text-decoration: underline;">Remind me later!</a>
                </p>

            </div>

        </div>
    </div>
<?php endif ?>

<script>
    $('#donation-banner').on('close.bs.alert', function () {
        $(".donation-menu-entry").css("visibility", "visible");
    });
</script>

