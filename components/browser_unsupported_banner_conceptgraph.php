 <?php 
require_once $LIB_PATH . 'MobileDetect/Mobile_Detect.php';
$detect = new Mobile_Detect;
if ($detect->isMobile()):
?>

<div class="alert alert-warning" id="desktop-warning">

    <a class="close" data-dismiss="alert">&times;</a>

    Unfortunately, this prototype <strong>does not work on mobile</strong> yet. It was successfully tested 
    on desktops with the latest versions of <strong>Firefox and Chrome</strong>.

</div>

<?php else: ?>
<div class="alert alert-warning" id="desktop-warning" style="display:none">

    <a class="close" data-dismiss="alert">&times;</a>

    You are using <strong>an unsupported browser</strong>. This prototype was successfully tested 
    with the latest versions of <strong>Firefox and Chrome</strong>.
    We strongly suggest <strong>to switch to one of the supported browsers.</strong>

</div>
<script type="text/javascript" src="./lib/browser-detect.js"></script>
<script>
    var browser = BrowserDetect.browser;
    if (!(browser === "Firefox" || browser === "Safari" || browser === "Chrome")) {
            $("#desktop-warning").css("display", "block")
    }
</script>
<?php endif; ?>