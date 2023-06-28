<?php

$curlHandle = curl_init('http://10.112.70.1');
curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $_POST);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);

$curlResponse = curl_exec($curlHandle);
curl_close($curlHandle);

header("Location: proxy.php");