<?php
define('APP_ENVIROMENT', 'live'); // sandbox or live
if(APP_ENVIROMENT == 'sandbox'){
    $apiUrl = "https://cybqa.pesapal.com/pesapalv3/api/Auth/RequestToken"; // Sandbox URL
    $consumerKey = "qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW";
    $consumerSecret = "osGQ364R49cXKeOYSpaOnT++rHs==";
}elseif(APP_ENVIROMENT == 'live'){
    $apiUrl = "https://pay.pesapal.com/v3/api/Auth/RequestToken"; // Live URL
    $consumerKey = "YZ+GAXagwzaFhpnGLStAfUyzt7aKQle2";
    $consumerSecret = "g8HaRhWxuYrTcYOWNm0CunTvFPs=";
}else{
    echo "Invalid APP_ENVIROMENT";
    exit;
}
$headers = [
    "Accept: application/json",
    "Content-Type: application/json"
];
$data = [
    "consumer_key" => $consumerKey,
    "consumer_secret" => $consumerSecret
];
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
$data = json_decode($response);

$token = $data->token; 

