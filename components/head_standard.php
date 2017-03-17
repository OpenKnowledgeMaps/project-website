<title>
<?php 
    $DEFAULT_TITLE = "Open Knowledge Maps - A visual interface to the world&#39;s scientific knowledge";
    if($title != null) {
        echo $title; 
    } else {
        $title = $DEFAULT_TITLE;
        echo $title;
    }        
?>
</title>

<meta http-equiv="content-type" content="text/html; charset=utf-8" >
<meta http-equiv="content-style-type" content="text/css" >
<meta http-equiv="content-language" content="en" >
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="follow" >
<meta name="revisit-after" content="1 month" >
<meta name="distribution" content="global">
<meta name="author" content="Peter Kraker" >
<meta name="publisher" content="Peter Kraker" >
<meta name="keywords" content="knowldege visualization, open knowledge, open science" >

<!-- FAVICONS -->
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=vMr4Eywprz">
<link rel="icon" type="image/png" href="/favicon-32x32.png?v=vMr4Eywprz" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-16x16.png?v=vMr4Eywprz" sizes="16x16">
<link rel="manifest" href="/manifest.json?v=vMr4Eywprz">
<link rel="mask-icon" href="/safari-pinned-tab.svg?v=vMr4Eywprz" color="#2d3e52">
<link rel="shortcut icon" href="/favicon.ico?v=vMr4Eywprz">
<meta name="apple-mobile-web-app-title" content="Open Knowledge Maps">
<meta name="application-name" content="Open Knowledge Maps">
<meta name="theme-color" content="#ffffff">

<meta name="description" content="We are building a visual interface to the world&#39;s scientific knowledge to change the way we discover research." >

<!-- TWITTER CARD -->

<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@OK_Maps" />
<meta name="twitter:title" content="<?php echo $title; ?>" />
<meta name="twitter:description" content="We are building a visual interface to the world&#39;s scientific knowledge to change the way we discover research." />
<meta name="twitter:image" content="http://openknowledgemaps.org/img/card.png" />

<!-- OPEN GRAPH OG -->
<meta property="og:description" content="We are building a visual interface to the world&#39;s scientific 
      knowledge to change the way we discover research. For more updates 
      follow us on http://twitter.com/OK_Maps"/>
<meta property="og:url" content="http://openknowledgemaps.org"/>
<meta property="og:image" content="http://openknowledgemaps.org/img/cardfb.png"/>
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="Open Knowledge Maps"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >
<link rel="stylesheet" href="./css/main.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:800,300,400' rel='stylesheet' type='text/css'>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>


<?php if ($PIWIK_ENABLED) { ?>
    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
      // tracker methods like "setCustomDimension" should be called before "trackPageView"
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="<?php echo $SITE_URL . $PIWIK_PATH; ?>";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', '1']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <!-- End Piwik Code -->
<?php }; ?>