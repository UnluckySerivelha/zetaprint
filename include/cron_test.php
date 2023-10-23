<?php
function get_amo_contact_by_phone($phone)
{
    $phone = intval(preg_replace('/[^0-9]+/', '', $phone), 10);
    require 'amo_access.php';
    $method = "/api/v4/contacts";
//
    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $access_token,
    ];

    $get = [
        'filter' => [
            'query' => $phone,
        ]
    ];


//    sendMessage(398496269, "https://$subdomain.amocrm.ru" . $method . '?' . http_build_query($get), "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl, CURLOPT_URL, "https://$subdomain.amocrm.ru" . $method . '?' . http_build_query($get));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_VERBOSE, 1);
    $out = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
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
        error_log("Error $code. " . (isset($errors[$code]) ? $errors[$code] : 'Undefined error'));
        sendMessage(398496269, 'AMO DOESN\'T WORK', "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");
    } else {
//        sendMessage(398496269, 'success', "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");
    }
    $amo_response = json_decode($out, true);
    echo '<pre>';
    print_r($amo_response);
    echo '</pre>';
    return count($amo_response['_embedded']['contacts']) > 0;
}
echo get_amo_contact_by_phone(7991239999);
//var_dump();