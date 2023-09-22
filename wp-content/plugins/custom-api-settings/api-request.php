<?php
$api_key = get_option('api_key', 'a74f0a6d-780f-4c4e-b600-5af9eb1e6775');

$url = "https://dummy.restapiexample.com/api/v1/employees?api_key=$api_key";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

if ($response) {
    $weather_data = json_decode($response, true);
}
?>
