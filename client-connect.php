<?php

$host = "http://api.example.com/ping";

$privateKey = '593fe6ed77014f9507761028801aa376f141916bd26b1b3f0271b5ec3135b989';

$time = time();
$id = 1;

$data = ['name' => 'bob'];
$message = buildMessage($time, $id, $data);
var_dump($message);

$hash = hash_hmac('sha256', $message, $privateKey);
$headers = ['API-ID: ' . $id, 'API-TIME: ' . $time, 'API-HASH: ' . $hash];


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

$result = curl_exec($ch);
if ($result === FALSE) {
	echo "Curl Error: " . curl_error($ch);
} else {
	//print_r(curl_getinfo($ch));	
	echo "Response: " . $result; 
}

curl_close($ch);


function buildMessage($time, $id, array $data) {
	return $time . $id . implode($data);
}

?>
