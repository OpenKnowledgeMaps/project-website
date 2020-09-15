<link rel="stylesheet" type="text/css" href="<?php echo $LIB_PATH ?>cookieconsent.min.css" />
<script src="<?php echo $LIB_PATH ?>cookieconsent.min.js"></script>
<script>

<?php if ($BROWSER_LANG === "de") { ?>
        let cookie_message = '<strong>Wir verwenden Cookies, die für den Betrieb dieser Webseite essentiell sind.</strong> Wenn Sie fortfahren, akzeptieren Sie die Verwendung von essentiellen Cookies auf dieser Webseite. Weitere Informationen entnehmen Sie bitte ';
        let cookie_link = "unserer Datenschutzerklärung.";
        let cookie_button = "Alles klar!";
        let cookie_href = "https://openknowledgemaps.org/datenschutz";
<?php } else { ?>
        let cookie_message = '<strong>We use cookies that are essential for the operation this website.</strong> By your continued use of this website, you accept the use of essential cookies. For more information, please see ';
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
    clearCookies(["cookieconsent_status", "priv-update-2018-10", "priv-update-2018-12",
                  "priv-update-2019-10", "cookie-msg-2020-06"]);
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
              "name": "cookie-msg-2020-09",
              "domain": cookie_domain,
              "sameSite": "Lax"
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
