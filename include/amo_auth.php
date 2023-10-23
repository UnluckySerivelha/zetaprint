<?php
require_once 'amo_config.php';
function sendMessage($chatID, $messaggio, $token)
{
    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
$link = "https://$subdomain.amocrm.ru/oauth2/access_token";

$data = [
    'client_id'     => $client_id,
    'client_secret' => $client_secret,
    'grant_type'    => 'authorization_code',
    'code'          => $code,
    'redirect_uri'  => $redirect_uri,
];

$curl = curl_init();
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
curl_setopt($curl,CURLOPT_URL, $link);
curl_setopt($curl,CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
curl_setopt($curl,CURLOPT_HEADER, false);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
$code = (int)$code;

$errors = [
    301 => 'Moved permanently.',
    400 => 'Wrong structure of the array of transmitted data, or invalid identifiers of custom fields.',
    401 => 'Not Authorized. There is no account information on the server. You need to make a request to another server on the transmitted IP.',
    403 => 'The account is blocked, for repeatedly exceeding the number of requests per second.',
    404 => 'Not found.',
    500 => 'Internal server error.',
    502 => 'Bad gateway.',
    503 => 'Service unavailable.'
];

if ($code < 200 || $code > 204) {
    $message = $_SERVER['SERVER_NAME'] . ': AmoCRM error | amo_auth.php';
    sendMessage(398496269, $message, "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");
    die( "Error $code. " . (isset($errors[$code]) ? $errors[$code] : 'Undefined error') );
} else {
    sendMessage(398496269, $_SERVER['SERVER_NAME'] . ': AmoCRM success | amo_auth.php', "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");
    sendMessage(398496269, 'amo_auth.php success response output:', "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");
    sendMessage(398496269, print_r(json_decode($out, true), true), "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");
}


$response = json_decode($out, true);

$arrParamsAmo = [
    "access_token"  => $response['access_token'],
    "refresh_token" => $response['refresh_token'],
    "token_type"    => $response['token_type'],
    "expires_in"    => $response['expires_in'],
    "endTokenTime"  => $response['expires_in'] + time(),
];

$arrParamsAmo = json_encode($arrParamsAmo);

$f = fopen($token_file, 'w');
fwrite($f, $arrParamsAmo);
fclose($f);

print_r($arrParamsAmo);