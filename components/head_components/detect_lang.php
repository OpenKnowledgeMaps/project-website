<?php
$available_languages = array("en", "de");
$default_language = "en";

function prefered_language($available_languages, $http_accept_language) {
    global $default_language;
    $available_languages = array_flip($available_languages);
    $langs = array();
    preg_match_all('~([\w-]+)(?:[^,\d]+([\d.]+))?~', strtolower($http_accept_language), $matches, PREG_SET_ORDER);
    foreach ($matches as $match) {
        list($a, $b) = explode('-', $match[1]) + array('', '');
        $value = isset($match[2]) ? (float) $match[2] : 1.0;
        if (isset($available_languages[$match[1]])) {
            $langs[$match[1]] = $value;
            continue;
        }
        if (isset($available_languages[$a])) {
            $langs[$a] = $value - 0.1;
        }
    }
    if ($langs) {
        arsort($langs);
        return key($langs);
    } else {
        return $default_language;
    }
}

$BROWSER_LANG = $default_language;
if(isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])) {
    $BROWSER_LANG = prefered_language($available_languages, strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"]));
}
?>
