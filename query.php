<?php

$payload = [
    'start_date' => '2024-01-01',
    'end_date' => '2024-03-30'
];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.track.toggl.com/api/v9/me/time_entries?" . http_build_query($payload),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Authorization: Basic <my_api_key>"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Get HTTP response code

curl_close($curl);

if ($err) {
    echo "cURL Error: " . $err;
} elseif ($http_code != 200) {
    echo "HTTP Error: " . $http_code;
} else {
    echo $response;
}


?>
