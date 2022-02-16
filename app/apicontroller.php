<?php

echo '<pre>';
$get = $_GET;
class CovidStatus {

  private $endpoint = null;
  private $params = null;

  public function __construct($endpoint, $params){
    $this->endpoint = $endpoint;
    $this->params = $params;
  }
  
  public function request($endpoint, $params = array()){

    $curl = curl_init();
    $url = 'https://api.covid19api.com/' .$endpoint. '?';

    // Query String = Data format. 
    //?from=2020-03-01T00:00:00Z&to=2020-04-01T00:00:00Z

    //from=2021-01-01&to=2021-10-10
    if(is_array($params)){
      foreach($params as $param => $value){
        if(empty($params)) continue;
        $url .= $param.'='.urlencode($value).'T00:00:00Z&';
      }
    }

    $url = substr($url, 0, -1);

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true
    ));

    $res = curl_exec($curl);
    curl_close($curl);

    return json_decode($res, true);
  }

  public function getTotalCountry(){
    $data = $this->request('country/'.$this->endpoint);

    if(empty($data) && !is_array($data)){
        return false;
    }
    return end($data);
  }

  public function getDeath(){
    $data = $this->request('country/'.$this->endpoint, $this->params);
    $deaths = [];

    foreach($data as $key){
      $deaths[] = $key['Deaths'];
    }
    return $deaths;
  }
  //function worldwide
  #/summary?from=2020-03-01T00:00:00Z&to=2020-04-01T00:00:00Z
  
}

//variaveis testes
#$parametro = $_GET;
// $country = 'brazil';
// $covidStatus = new CovidStatus($country, $parametro);
// $total = $covidStatus->getTotalCountry();
// print_r($total);

// $deaths = $covidStatus->getDeath();
// #$total = $covidStatus->getTotalCountry();
// foreach($deaths as $death){
//   echo $death.'<br>';
// }
echo '<br>';





?>