<?php

echo '<pre>';
class CovidStatus {
  
  public function request($endpoint, $params = array()){

    $curl = curl_init();
    $url = 'https://api.covid19api.com/' .$endpoint. '?';

    // Query String = Data format. 
    //?from=2020-03-01T00:00:00Z&to=2020-04-01T00:00:00Z

    #Tratar isso mais tarde
    if(is_array($params)){
      foreach($params as $param => $value){
        if(empty($params)) continue;
        $url .= $param . urlencode($value);
      }
    }

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true
    ));

    $res = curl_exec($curl);
    curl_close($curl);

    return json_decode($res, true);
  }

  public function getTotal($endpoint){
    $data = $this->request($endpoint);

    if(empty($data) && !is_array($data)){
        return false;
    }
    return end($data);
  }

  public function getDeath($endpoint, $date = ''){
    $data = $this->request($endpoint, $date);
    $deaths = [];

    foreach($data as $key){
      $deaths[] = $key['Deaths'];
    }
    #print_r($data);
    print_r($deaths);
  }

}

$covidStatus = new CovidStatus();
$deaths = $covidStatus->getDeath('country/brazil');
#$total = $covidStatus->getTotal('country/brazil');
// print_r($deaths);

#echo 'Houve um total de: '. $total['Confirmed'];
echo '<br>';


?>