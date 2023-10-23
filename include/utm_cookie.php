<?
$keys = array('utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term', 'yclid', 'utm_referrer', 'roistat', 'referrer', 'openstat_service', 'openstat_campaign', 'openstat_ad', 'openstat_source', 'from', 'gclientid', 'gclientid', '_ym_uid', '_ym_counter', 'gclid', 'fbclid');

foreach ($keys as $row) {
    if (!empty($_GET[$row])) {
        $value = strval($_GET[$row]);
        $value = stripslashes($value);
        $value = htmlspecialchars_decode($value, ENT_QUOTES);
        $value = strip_tags($value);
        $value = htmlspecialchars($value, ENT_QUOTES);
        setcookie($row, $value);
    }
}
?>