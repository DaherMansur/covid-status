<?php


$curl = curl_init();
$url = 'https://api.covid19api.com/country/brazil/status/confirmed';

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true
));

$res = curl_exec($curl);

curl_close($curl);

$response = json_decode($res, true);
echo '<pre>';

#Criar class, criar requisição do que é necessário

foreach($response as $key){
  echo $key['Cases'].'<br>';
}




?>