<!-- Мой вариант на основе лекции -->

<?php

$curl = curl_init();

$request = [
    $_POST['user_name']." ".$_POST['user_second_name']." ".$_POST['user_last_name']
];

$url = 'https://cleaner.dadata.ru/api/v1/clean/name';

$token = $_POST['token'];
$secret = $_POST['secret'];

curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => false, 
    CURLOPT_POST => true,
    CURLOPT_HEADER => false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $url, 
    CURLOPT_POSTFIELDS => json_encode($request),
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Token ' . $token,
        'X-Secret: '. $secret
    ]
));

$result = curl_exec($curl);
curl_close($curl);

echo '<pre>';
var_dump(json_decode($result, associative:1));
echo '</pre>';