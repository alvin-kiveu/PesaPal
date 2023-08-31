<?php
header("Content-Type: application/json");
$pinCallbackResponse = file_get_contents('php://input');
$logFile = "pin.json";
$log = fopen($logFile, "a");
fwrite($log, $pinCallbackResponse);
fclose($log);