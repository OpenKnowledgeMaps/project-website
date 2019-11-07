<link rel="stylesheet" type="text/css" href="./lib/cookieconsent.min.css" />
<script src="./lib/cookieconsent.min.js"></script>
<script>

<?php if ($BROWSER_LANG === "de") { ?>
        let cookie_message = 'Der Datenschutz bei Concept Graph fällt unter die gemeinsame Verantwortlichkeit von Open Knowledge Maps und Know-Center.  Um Concept Graph evaluieren und verbessern zu können, werden pseudonymisiert Daten über Ihr Nutzungsverhalten (Clicks) gesammelt. Zu diesem Zweck verwenden wir auch Cookies, um auf mehrfache Zugriffe des gleichen Benutzers schließen zu können. Wenn Sie fortfahren, nehmen wir an, dass Sie mit der Datenerhebung und Verwendung von Cookies auf dieser Webseite einverstanden sind. Weitere Informationen entnehmen Sie bitte der ';
        let cookie_link = "Datenschutzerklärung für Concept Graph";
        let cookie_button = "Alles klar!";
        let cookie_href = "https://openknowledgemaps.org/datenschutz-conceptgraph";
<?php } else { ?>
        let cookie_message = 'Concept Graph falls under the Joint Data Controllership of Open Knowledge Maps and Know-Center. To evaluate and improve Concept Graph, we collect pseudonymised usage data (clicks). For the same purpose, we also use cookies to detect multiple visits by the same user. By your continued use of Concept Graph you accept such data collection and cookie use. For more information, please see the ';
        let cookie_link = "privacy policy for Concept Graph";
        let cookie_button = "Got it!";
        let cookie_href = "https://openknowledgemaps.org/privacy-conceptgraph";
<?php }; ?>
    function clearCookies (names) {
      var i = 0, namesLength = names.length;
      for (i; i < namesLength; i += 1) {
        document.cookie = names[i] + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
      }
    }
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
              "name": "privacy-graphvis",
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
