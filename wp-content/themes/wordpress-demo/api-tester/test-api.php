<?php
$url = "https://dummy.restapiexample.com/api/v1/employees";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if ($response === false) {
    $error = curl_error($ch);
    echo "Error: $error";
} else {
    echo "Response: $response";
}

curl_close($ch);
?>
