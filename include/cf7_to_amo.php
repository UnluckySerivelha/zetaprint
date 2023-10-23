<?php

//add_action( 'wpcf7_mail_sent', 'action_function_name_8315' );
//function action_function_name_8315( $contact_form ){
//    $submission = WPCF7_Submission::get_instance();
//
//    if ( $submission ) {
//        $posted_data = $submission->get_posted_data();
//        $objData = serialize( $posted_data);
//        $fp = fopen('../cf7_log.txt', 'a');
//        fwrite($fp, 'test123' . PHP_EOL);
//        fclose($fp);
//        $fp = fopen('cf7_log.txt', 'a');
//        fwrite($fp, 'test123' . PHP_EOL);
//        fclose($fp);
//        // handle the data here e.g. submit to CRM
//    }
//}


function addNoteForCreatedLead($id, $text, $access_token, $subdomain)
{
//    require 'amo_access.php';
    $method = "/api/v4/leads/notes";

    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $access_token,
    ];

    $data = [
        [
            "entity_id" => $id,
            "note_type" => "common",
            "params" => [
                "text" => $text
            ]
        ]
    ];
    $date = date("Y-m-d H:i:s");
    $fp = fopen(dirname(__FILE__) . '/curl_log_' . $date . '.txt', 'w');
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl, CURLOPT_URL, "https://$subdomain.amocrm.ru" . $method);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_STDERR, $fp);
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
        $message = $_SERVER['SERVER_NAME'] . ': ' . "Error $code. " . (isset($errors[$code]) ? $errors[$code] : 'Undefined error');
        sendMessage(398496269, $message, "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");
    }

    $amo_response = json_decode($out, true);
}

add_action("wpcf7_before_send_mail", "wpcf7_disablemail");

function get_amo_contact_by_phone($phone, $subdomain, $access_token)
{
    $phone = intval(preg_replace('/[^0-9]+/', '', $phone), 10);
    $method = "/api/v4/contacts";
    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $access_token,
    ];

    $get = [
        'filter' => [
            'query' => $phone,
        ]
    ];
    $date = date("Y-m-d H:i:s");
    $fp = fopen(dirname(__FILE__) . '/curl_log_' . $date . '.txt', 'w');

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
    curl_setopt($curl, CURLOPT_STDERR, $fp);
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
        $message = $_SERVER['SERVER_NAME'] . ': ' . "Error $code. " . (isset($errors[$code]) ? $errors[$code] : 'Undefined error');
        sendMessage(398496269, $message, "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");
    }
    $amo_response = json_decode($out, true);

    $date = date("Y-m-d H:i:s");
    $filePath = __DIR__ . '/phones/' . $date . '.txt';
    $fp2 = fopen($filePath, "w");
    $log_data = [
        'method'=>$method,
        'data'=>$get,
        'access_token'=>$access_token,
        'phone'=> $phone,
        'amo_response'=> $amo_response,
    ];
    fwrite($fp2, print_r($log_data, true));
    fclose($fp2);

    if (isset($amo_response['_embedded']['contacts'][0])) {
        return $amo_response['_embedded']['contacts'][0]['id'];
    } else {
        return false;
    }
}

function add_unsorted($data, $subdomain, $access_token)
{
    $method = "/api/v4/leads/unsorted/forms";

    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $access_token,
    ];
    $date = date("Y-m-d H:i:s");
    $fp = fopen(dirname(__FILE__) . '/curl_log_' . $date . '.txt', 'w');

    $filePath = __DIR__ . '/log2.txt';
    $fp2 = fopen($filePath, "w");
    fwrite($fp2, json_encode($data));
    fclose($fp2);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl, CURLOPT_URL, "https://$subdomain.amocrm.ru" . $method);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_VERBOSE, 1);
    curl_setopt($curl, CURLOPT_STDERR, $fp);
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

    $date = date("Y-m-d H:i:s");
    $filePath = __DIR__ . '/phones/' . $date . '.txt';
    $fp2 = fopen($filePath, "w");
    $log_data = [
        'method'=>$method,
        'data'=>$data,
        'access_token'=>$access_token,
        'amo_response'=> $out,
    ];
    fwrite($fp2, print_r($log_data, true));
    fclose($fp2);

    if ($code < 200 || $code > 204) {
        error_log("Error $code. " . (isset($errors[$code]) ? $errors[$code] : 'Undefined error'));
        $message = $_SERVER['SERVER_NAME'] . ': AmoCRM error';
        sendMessage(398496269, $message, "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");
    }
    $amo_response = json_decode($out, true);
    return $amo_response;
}

function add_lead($data, $subdomain, $access_token)
{
    $method = "/api/v4/leads";

    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $access_token,
    ];
    $date = date("Y-m-d H:i:s");
    $fp = fopen(dirname(__FILE__) . '/curl_log_' . $date . '.txt', 'w');
    $filePath = __DIR__ . '/leads/' . $date . '.txt';
    $fp2 = fopen($filePath, "w");
    $log_data = [
        'access_token'=>$access_token,
        'data'=> $data,
    ];
    fwrite($fp2, print_r($log_data, true));
    fclose($fp2);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl, CURLOPT_URL, "https://$subdomain.amocrm.ru" . $method);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_VERBOSE, 1);
    curl_setopt($curl, CURLOPT_STDERR, $fp);
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
        $message = $_SERVER['SERVER_NAME'] . ': ' . "Error $code. " . (isset($errors[$code]) ? $errors[$code] : 'Undefined error');
        sendMessage(398496269, $message, "5601328668:AAHTMspkXz6RVEGCuUIGP18D2JPtaBdSZhs");
    }

    $date = date("Y-m-d H:i:s");
    $filePath = __DIR__ . '/leads/' . $date . '.txt';
    $fp2 = fopen($filePath, "w");
    $log_data = [
        'method'=>$method,
        'data'=>$data,
        'access_token'=>$access_token,
        'amo_response'=> $out,
    ];
    fwrite($fp2, print_r($log_data, true));
    fclose($fp2);

    $amo_response = json_decode($out, true);
    return $amo_response;
}

function wpcf7_disablemail($wpcf7_data)
{
    $mail = $wpcf7_data->prop('mail');
//    print_r($mail);
    if ($mail) {

        $properties = $wpcf7_data->get_properties();
        $properties['mail']['recipient'] = $properties['mail']['recipient'] . ',info@zetaprint.ru,akaraulova@polovinkin.pro,anatoliwork@yandex.ru,ads@polovinkin.pro,tolkadigital@gmail.com';
        $wpcf7_data->set_properties($properties);

        require_once 'amo_access.php';
        $submission = WPCF7_Submission::get_instance();
        $posted_data = $submission->get_posted_data();

        $form_title = $wpcf7_data->title();
        $form_name = $posted_data['form_name'];

        $phone = $posted_data['user_phone'];
        $page_title = $posted_data['page_name'];
        $page_url = $posted_data['page_url'];

        if ($posted_data['user_name']) {
            $name = $posted_data['user_name'];
        } else {
            $name = $phone;
        }
        if ($posted_data['your-email']) {
            $email = $posted_data['your-email'];
        } else {
            $email = '';
        }

        $price = 0;
        $pipeline_id = 4513789;
        $status = 54992354;

        if ($_COOKIE['utm_source']) {
            $utm_source = $_COOKIE['utm_source'];
        } else {
            $utm_source = '';
        }
        if ($_COOKIE['utm_content']) {
            $utm_content = $_COOKIE['utm_content'];
        } else {
            $utm_content = '';
        }
        if ($_COOKIE['utm_medium']) {
            $utm_medium = $_COOKIE['utm_medium'];
        } else {
            $utm_medium = '';
        }
        if ($_COOKIE['utm_campaign']) {
            $utm_campaign = $_COOKIE['utm_campaign'];
        } else {
            $utm_campaign = '';
        }
        if ($_COOKIE['utm_term']) {
            $utm_term = $_COOKIE['utm_term'];
        } else {
            $utm_term = '';
        }
        if ($_COOKIE['utm_referrer']) {
            $utm_referrer = $_COOKIE['utm_referrer'];
        } else {
            $utm_referrer = '';
        }
        if ($_COOKIE['roistat']) {
            $roistat = $_COOKIE['roistat'];
        } else {
            $roistat = '';
        }
        if ($_COOKIE['referrer']) {
            $referrer = $_COOKIE['referrer'];
        } else {
            $referrer = '';
        }
        if ($_COOKIE['openstat_service']) {
            $openstat_service = $_COOKIE['openstat_service'];
        } else {
            $openstat_service = '';
        }
        if ($_COOKIE['openstat_campaign']) {
            $openstat_campaign = $_COOKIE['openstat_campaign'];
        } else {
            $openstat_campaign = '';
        }
        if ($_COOKIE['openstat_ad']) {
            $openstat_ad = $_COOKIE['openstat_ad'];
        } else {
            $openstat_ad = '';
        }
        if ($_COOKIE['openstat_source']) {
            $openstat_source = $_COOKIE['openstat_source'];
        } else {
            $openstat_source = '';
        }
        if ($_COOKIE['from']) {
            $from = $_COOKIE['from'];
        } else {
            $from = '';
        }
        if ($_COOKIE['gclientid']) {
            $gclientid = $_COOKIE['gclientid'];
        } else {
            $gclientid = '';
        }
        if ($_COOKIE['_ym_uid']) {
            $_ym_uid = $_COOKIE['_ym_uid'];
        } else {
            $_ym_uid = '';
        }
        if ($_COOKIE['_ym_counter']) {
            $_ym_counter = $_COOKIE['_ym_counter'];
        } else {
            $_ym_counter = '';
        }
        if ($_COOKIE['gclid']) {
            $gclid = $_COOKIE['gclid'];
        } else {
            $gclid = '';
        }
        if ($_COOKIE['yclid']) {
            $yclid = $_COOKIE['yclid'];
        } else {
            $yclid = '';
        }
        if ($_COOKIE['fbclid']) {
            $fbclid = $_COOKIE['fbclid'];
        } else {
            $fbclid = '';
        }

        $contact = get_amo_contact_by_phone($phone, $subdomain, $access_token);
        // Проверяем, есть ли контакт с этим номером телефона
        if (!$contact) {
            //если контакта нет, добавляем сделку в неразобранное

            $data = [
                [
                    "source_uid" => "zetaprint.ru",
                    "source_name" => "Сайт zetaprint.ru",
                    "created_at" => time(),
//                "name" => $phone,
//                "price" => $price,
                    "pipeline_id" => (int)$pipeline_id,
                    "metadata" => [
                        "form_id" => "form",
                        "form_name" => $form_name,
                        "form_page" => $page_title,
                        "ip" => $_SERVER['REMOTE_ADDR'],
                        "form_sent_at" => time(),
                        "referer" => $page_url,
                    ],
                    "_embedded" => [
                        "contacts" => [
                            [
                                "name" => $name,
                                "first_name" => $name,
                                "custom_fields_values" => [
                                    [
                                        "field_code" => "PHONE",
                                        "values" => [
                                            [
                                                "enum_code" => "WORK",
                                                "value" => $phone
                                            ]
                                        ]
                                    ],
                                ]
                            ]
                        ],
                        "leads" => [
                            [
                                [
                                    "name" => $name,
                                    "first_name" => $name,
                                    "custom_fields_values" => [
                                        [
                                            "field_code" => "PHONE",
                                            "values" => [
                                                [
                                                    "enum_code" => "WORK",
                                                    "value" => $phone
                                                ]
                                            ]
                                        ],
                                    ]
                                ],
                                "_embedded" => [
                                    "tags" => [
                                        [
                                            "id" => 212965
                                        ]
                                    ],
                                ]
                            ]
                        ],

                    ],

                ]
            ];


            if ($email != '') {
                array_push($data['_embedded']['leads'][0]['contacts']['custom_fields_values'], [
                    "field_code" => "EMAIL",
                    "values" => [
                        [
                            "enum_code" => "WORK",
                            "value" => $email
                        ]
                    ]
                ]);
            }


            $amo_response = add_unsorted($data, $subdomain, $access_token);

            //Проверяем, если создалась сделка, то добавляем примечание к ней
            if ($amo_response['_embedded']['unsorted'][0]['_embedded']['leads'][0]['id']) {
                $note_text = '';

                $square = 0;

                if ($form_name == "Калькулятор") {
                    $params = str_replace('<br>', PHP_EOL, $posted_data['params']);
                    $note_text = PHP_EOL . 'Калькулятор: ';
                    $note_text .= PHP_EOL . 'Параметры: ' . PHP_EOL . $params;
                    if ($posted_data['files']) {
                        $note_text .= PHP_EOL . 'Файлы: ';
                        foreach ($posted_data['files'] as $item) {
                            $note_text .= PHP_EOL . $item;
                        }
                    }
                } else if ($form_name == "Прислать файлы для расчета" && $posted_data['files']) {
                    $note_text = 'Заявка на расчет. Файлы: ' . $posted_data['files'];
                    foreach ($posted_data['files'] as $item) {
                        $note_text .= PHP_EOL . $item;
                    }
                } else if ($form_name == "Прислать техзадание" && $posted_data['files']) {
                    $note_text = 'Прислать техзадание. Файлы: ';
                    foreach ($posted_data['files'] as $item) {
                        $note_text .= PHP_EOL . $item;
                    }
                } else {
                    if ($form_name != "") {
                        $note_text = $form_name;
                    } else {

                    }
                }

                if ($note_text != '') {
                    addNoteForCreatedLead($amo_response['_embedded']['unsorted'][0]['_embedded']['leads'][0]['id'], $note_text, $access_token, $subdomain);
                }
            }
        } else {

            // Если контакт есть, то создаем сделку и прикрепляем имеющийся контакт
            $data = [
                [
                    "name" => $phone,
                    "price" => $price,
                    "pipeline_id" => (int)$pipeline_id,
                    "status_id" => (int)$status,
                    "_embedded" => [
                        "tags" => [
                            [
                                "id" => 212965
                            ]
                        ],
                        "contacts" => [
                            [
                                "id" => $contact
                            ]
                        ],
                        "custom_fields_values" => [
                            [
                                "field_code" => 'UTM_CONTENT',
                                "values" => [
                                    [
                                        "value" => $utm_content
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'UTM_MEDIUM',
                                "values" => [
                                    [
                                        "value" => $utm_medium
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'UTM_CAMPAIGN',
                                "values" => [
                                    [
                                        "value" => $utm_campaign
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'UTM_TERM',
                                "values" => [
                                    [
                                        "value" => $utm_term
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'UTM_REFERRER',
                                "values" => [
                                    [
                                        "value" => $utm_referrer
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'ROISTAT',
                                "values" => [
                                    [
                                        "value" => $roistat
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'REFERRER',
                                "values" => [
                                    [
                                        "value" => $referrer
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'OPENSTAT_SERVICE',
                                "values" => [
                                    [
                                        "value" => $openstat_service
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'OPENSTAT_CAMPAIGN',
                                "values" => [
                                    [
                                        "value" => $openstat_campaign
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'OPENSTAT_AD',
                                "values" => [
                                    [
                                        "value" => $openstat_ad
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'OPENSTAT_SOURCE',
                                "values" => [
                                    [
                                        "value" => $openstat_source
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'FROM',
                                "values" => [
                                    [
                                        "value" => $from
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'GCLIENTID',
                                "values" => [
                                    [
                                        "value" => $gclientid
                                    ]
                                ]
                            ],
                            [
                                "field_code" => '_YM_UID',
                                "values" => [
                                    [
                                        "value" => $_ym_uid
                                    ]
                                ]
                            ],
                            [
                                "field_code" => '_YM_COUNTER',
                                "values" => [
                                    [
                                        "value" => $_ym_counter
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'GCLID',
                                "values" => [
                                    [
                                        "value" => $gclid
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'YCLID',
                                "values" => [
                                    [
                                        "value" => $yclid
                                    ]
                                ]
                            ],
                            [
                                "field_code" => 'FBCLID',
                                "values" => [
                                    [
                                        "value" => $fbclid
                                    ]
                                ]
                            ],
                        ],

                    ],

                ]
            ];


            if ($email != '') {
                array_push($data['_embedded']['leads'][0]['contacts']['custom_fields_values'], [
                    "field_code" => "EMAIL",
                    "values" => [
                        [
                            "enum_code" => "WORK",
                            "value" => $email
                        ]
                    ]
                ]);
            }
            $amo_response = add_lead($data, $subdomain, $access_token);
            if ($amo_response['_embedded']['leads'][0]['id']) {
                $note_text = '';

                $square = 0;

                if ($form_name == "Калькулятор") {
                    $params = str_replace('<br>', PHP_EOL, $posted_data['params']);
                    $note_text = PHP_EOL . 'Калькулятор: ';
                    $note_text .= PHP_EOL . 'Параметры: ' . PHP_EOL . $params;
                    if ($posted_data['files']) {
                        $note_text .= PHP_EOL . 'Файлы: ';
                        foreach ($posted_data['files'] as $item) {
                            $note_text .= PHP_EOL . $item;
                        }
                    }
                } else if ($form_name == "Прислать файлы для расчета" && $posted_data['files']) {
                    $note_text = 'Заявка на расчет. Файлы: ' . $posted_data['files'];
                    foreach ($posted_data['files'] as $item) {
                        $note_text .= PHP_EOL . $item;
                    }
                } else if ($form_name == "Прислать техзадание" && $posted_data['files']) {
                    $note_text = 'Прислать техзадание. Файлы: ';
                    foreach ($posted_data['files'] as $item) {
                        $note_text .= PHP_EOL . $item;
                    }
                } else {
                    if ($form_name != "") {
                        $note_text = $form_name;
                    } else {

                    }
                }

                if ($note_text != '') {
                    addNoteForCreatedLead($amo_response['_embedded']['leads'][0]['id'], $note_text, $access_token, $subdomain);
                }
            }
        }
    }
}