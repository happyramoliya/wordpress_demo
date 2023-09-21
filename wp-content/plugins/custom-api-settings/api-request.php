<?php
$api_key = get_option('api_key', 'abcdef1234567890');

$url = "https://api.example.com/weather?api_key=$api_key&location=New+York";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
    