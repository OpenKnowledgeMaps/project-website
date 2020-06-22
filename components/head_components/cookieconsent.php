<link rel="stylesheet" type="text/css" href="<?php echo $LIB_PATH ?>cookieconsent.min.css" />
<script src="<?php echo $LIB_PATH ?>cookieconsent.min.js"></script>
<script>

<?php if ($BROWSER_LANG === "de") { ?>
        let cookie_message = '<strong>Wir haben unsere <a href="./datenschutz" target="_blank" class="underline">Datenschutzerklärung</a> um den Videodienst Vimeo und den Filesharingdienst Google Drive erweitert</strong>. Wir verwenden Cookies, um unsere Webseite für Sie möglichst benutzerfreundlich zu gestalten. Wenn Sie fortfahren, nehmen wir an, dass Sie mit der Verwendung von Cookies auf dieser Webseite einverstanden sind. Weitere Informationen entnehmen Sie bitte ';
        let cookie_link = "unserer Datenschutzerklärung.";
        let cookie_button = "Alles klar!";
        let cookie_href = "https://openknowledgemaps.org/datenschutz";
<?php } else { ?>
        let cookie_message = '<strong>We have updated our <a href="./privacy" target="_blank" class="underline">privacy policy</a></strong> to include the video hosting service Vimeo and the file sharing service Google Drive. We use cookies to improve your experience. By your continued use of this site you accept such use. For more information, please see ';
        let cookie_link = "our privacy policy.";
        let cookie_button = "Got it!";
        let cookie_href = "https://openknowledgemaps.org/privacy";
<?php }; ?>
    function clearCookies (names) {
      var i = 0, namesLength = names.length;
      for (i; i < namesLength; i += 1) {
        document.cookie = names[i] + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
      }
    }
    clearCookies(["cookieconsent_status", "priv-update-2018-10", "priv-update-2018-12"]);
    var cookie_domain = "<?php echo $COOKIE_DOMAIN ?>";
    window.addEventListener("load", function () {
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#eff3f4",
                    "text": "#2D3E52"
                },
                "button": {
                    "background": "#2D3E52",
                    "text": "#ffffff"
                }
            },
            "position": "bottom",
            "theme": "classic",
            "content": {
                "message": cookie_message,
                "dismiss": cookie_button,
                "link": cookie_link,
                "href": cookie_href
            },
            "cookie": {
              "name": "priv-update-2019-10",
              "domain": cookie_domain
            }
        })
    });
    
    function getCookie(name) {
        var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
        return v ? v[2] : null;
    }
    
    function setCookie(name, value, days) {
        var d = new Date;
        d.setTime(d.getTime() + 24*60*60*1000*days);
        document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString();
    }
</script>
