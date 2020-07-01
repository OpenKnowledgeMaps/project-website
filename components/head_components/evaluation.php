<script>
    function recordAction(category, action, id) {
        //matomo
        if(typeof _paq !== "undefined") {
            _paq.push(['trackEvent', category, action, id]);
        }
        //gtag.js
        if(typeof gtag === "function") {
            gtag('event', action, {
              'event_category': category,
              'event_label': id
            });
        //analytics.js
        } else if (typeof ga === "function") {
          ga('send', 'event', category, action, id);
        }  
    }
    
    // Set to the same value as the web property used on the site
    var gaProperty = '<?php echo $GA_CODE; ?>';
    // Disable tracking if the opt-out cookie exists.
    var disableStr = 'ga-disable-' + gaProperty;
    if (document.cookie.indexOf(disableStr + '=true') > -1) {
        window[disableStr] = true;
    }
    // Opt-out function
    function gaOptout() {
        document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
        window[disableStr] = true;
        alert('Google Analytics opt-out successful');
    }
</script>

<?php if ($GA_ENABLED): ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $GA_CODE; ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '<?php echo $GA_CODE; ?>');
    </script>
<?php endif; ?>
    
<?php 
    if ($PIWIK_ENABLED) {
        
        $piwik_site_id = 
            (isset($PIWIK_SITE_ID) && $PIWIK_SITE_ID !== null)
            ? ($PIWIK_SITE_ID)
            : ("1"); ?>

    <!-- Matomo -->
    <script type="text/javascript">
        var _paq = _paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function () {
            var u = "<?php echo $SITE_URL . $PIWIK_PATH ?>";
            _paq.push(['setTrackerUrl', u + 'piwik.php']);
            _paq.push(['setSiteId', '<?php echo $piwik_site_id ?>']);
            var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
            g.type = 'text/javascript';
            g.async = true;
            g.defer = true;
            g.src = u + 'piwik.js';
            s.parentNode.insertBefore(g, s);
        })();
    </script>
    <noscript><p><img src="//openknowledgemaps.org/piwik_stats/piwik.php?idsite=1&rec=1" style="border:0;" alt="" /></p></noscript>
    <!-- End Matomo Code -->

<?php }; ?>

