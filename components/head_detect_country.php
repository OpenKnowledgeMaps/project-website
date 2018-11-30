<?php

require dirname(__FILE__) . '/../lib/MaxMind/MaxMind-DB-Reader-php/autoload.php';
use MaxMind\Db\Reader;
$databaseFile = dirname(__FILE__) . '/../lib/MaxMind/GeoLite2-Country.mmdb';
$reader = new MaxMind\Db\Reader($databaseFile);

function get_ip_address() {
    // check for shared internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }

    // check for IPs passing through proxies
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // check if multiple ips exist in var
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
            $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($iplist as $ip) {
                if (validate_ip($ip))
                    return $ip;
            }
        } else {
            if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];

    // return unreliable ip since all else failed
    return $_SERVER['REMOTE_ADDR'];
}

/**
 * Ensures an ip address is both a valid IP and does not fall within
 * a private network range.
 */
function validate_ip($ip) {
    if (strtolower($ip) === 'unknown')
        return false;

    // generate ipv4 network address
    $ip = ip2long($ip);

    // if the ip is set and not equivalent to 255.255.255.255
    if ($ip !== false && $ip !== -1) {
        // make sure to get unsigned long representation of ip
        // due to discrepancies between 32 and 64 bit OSes and
        // signed numbers (ints default to signed in PHP)
        $ip = sprintf('%u', $ip);
        // do private network range checking
        if ($ip >= 0 && $ip <= 50331647) return false;
        if ($ip >= 167772160 && $ip <= 184549375) return false;
        if ($ip >= 2130706432 && $ip <= 2147483647) return false;
        if ($ip >= 2851995648 && $ip <= 2852061183) return false;
        if ($ip >= 2886729728 && $ip <= 2887778303) return false;
        if ($ip >= 3221225984 && $ip <= 3221226239) return false;
        if ($ip >= 3232235520 && $ip <= 3232301055) return false;
        if ($ip >= 4294967040) return false;
    }
    return true;
}

$countries_with_prefix_the = array(
    "AE"
    , "AX"
    , "BS"
    , "CC"
    , "CD"
    , "CF"
    , "CG"
    , "CI"
    , "CK"
    , "CX"
    , "DO"
    , "EH"
    , "FK"
    , "GB"
    , "GS"
    , "IM"
    , "IO"
    , "KY"
    , "MH"
    , "MP"
    , "NL"
    , "PH"
    , "PS"
    , "SB"
    , "SC"
    , "TC"
    , "TF"
    , "UM"
    , "US"
    , "VA"
    , "VG"
    , "VI"
    , "AN"
);

$countries_with_prefix_The = array(
    "GM"
);

$ipAddress = get_ip_address();
try {
    $res = $reader->get($ipAddress);
    $country = $res["country"];
    if(in_array($country["iso_code"], $countries_with_prefix_the)) {
        $country_name_en = "the " . $country["names"]["en"];
    } else if(in_array($country["iso_code"], $countries_with_prefix_The)) {
        $country_name_en = "The " . $country["names"]["en"];
    } else {
        $country_name_en = $country["names"]["en"];
    }
    $COUNTRY = $country_name_en;
} catch (Exception $e) {
    $COUNTRY = null;
}
$reader->close();
?>
