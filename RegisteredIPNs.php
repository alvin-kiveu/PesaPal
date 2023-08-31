<?php
include 'acesstoken.php';
if(APP_ENVIROMENT == 'sandbox'){
    $getIpnListUrl = "https://cybqa.pesapal.com/pesapalv3/api/URLSetup/GetIpnList";
}elseif(APP_ENVIROMENT == 'live'){
    $getIpnListUrl = "https://pay.pesapal.com/v3/api/URLSetup/GetIpnList";
}else{
    echo "Invalid APP_ENVIROMENT";
    exit;
}
$headers = array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Bearer $token"
);
$ch = curl_init($getIpnListUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
echo $response = curl_exec($ch);
$responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
