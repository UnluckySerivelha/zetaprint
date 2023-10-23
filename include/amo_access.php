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

$dataToken = file_get_contents(__DIR__ . '/' . $token_file);
$dataToken = json_decode($dataToken, true);

if ($dataToken["endTokenTime"] < time()) {

    $link = "https://$subdomain.amocrm.ru/oauth2/access_token";

    $data = [
        'client_id'     => $client_id,
        'client_secret' => $client_secret,
        'grant_type'    => 'refresh_token',
        'refresh_token' => $dataToken["refresh_token"],
        'redirect_uri'  => $redirect_uri,
    ];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-oAuth-client/1.0');
    curl_setopt($curl, CURLOPT_URL, $link);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
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
    echo '<pre>';
    echo 'sent data:';
    print_r($data);
    echo '</pre>';
    echo '<pre>';
    echo 'received data:';
    print_r($out);
    echo '</pre>';
    if ($code < 200 || $code > 204) {
        $message = $_SERVER['SERVER_NAME'] . ': AmoCRM token update error | amo_access.php';
        sendMessage(398496269, $message, "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");
        die();
    } else {
//        $message = $_SERVER['SERVER_NAME'] . ': AmoCRM token auto updated | amo_access.php';
        sendMessage(398496269, $message, "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");
    }

    $response = json_decode($out, true);

    $arrParamsAmo = [
        "access_token"  => $response['access_token'],
        "refresh_token" => $response['refresh_token'],
        "token_type"    => $response['token_type'],
        "expires_in"    => $response['expires_in'],
        "endTokenTime"  => $response['expires_in'] + time(),
    ];

    echo '<pre>';
    print_r($arrParamsAmo);
    echo '</pre>';

    $arrParamsAmo = json_encode($arrParamsAmo);

    $f = fopen($token_file, 'w');
    fwrite($f, $arrParamsAmo);
    fclose($f);

    $access_token = $response['access_token'];
    sendMessage(398496269, $message, "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");

    //log file
    $date = date("Y-m-d H:i:s");
    $filePath = __DIR__ . '/update_token/' . $date . '.txt';
    $fp2 = fopen($filePath, "w");
    $log_data = [
        'sent'=>$data,
        'response'=>$response,
    ];
    fwrite($fp2, print_r($log_data, true));
    fclose($fp2);
} else {
    $access_token = $dataToken["access_token"];
    $message = $_SERVER['SERVER_NAME'] . ': AmoCRM token doesn\'t expired | amo_access.php';
//    sendMessage(398496269, $message, "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");
}