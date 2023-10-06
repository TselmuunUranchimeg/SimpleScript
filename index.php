<?php
$timeout = 10; // Adjust timeout as needed

$url = 'https://www.tradingview.com/chart/?symbol=OANDA:EURUSD';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$page_content = curl_exec($ch);

$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Allow requests from any origin
header("Access-Control-Allow-Origin: *");

// Set appropriate content-type header
header("Content-Type: text/html");

// Output the page content and set the HTTP status
echo $http_status;
echo $page_content;

curl_close($ch);
?>
