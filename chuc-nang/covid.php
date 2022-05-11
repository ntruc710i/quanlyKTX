<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.buigiabao.net:2096/moh/data",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);



curl_close($curl);
$response = json_decode($response,true);
