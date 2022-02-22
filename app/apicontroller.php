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

  public function averageWeeks(){
    $data = $this->request('dayone/country/'.$this->endpoint);

    $return = [];
    $dates = [];

    $param = 'Confirmed';

    $start = 0;
    $limit = 14;

    for($q=0;$q < count($data); $q++){

      for($w=0;$w < $limit; $w++){

        if (!isset($data[$start])) break;

        $return[$q][$w]['Date'] = substr($data[$start]['Date'], 0, 10);
        $return[$q][$w][$param] = $data[$start][$param];
        $start++;
        
      }
    }



    foreach($return as $key){
      
      echo $key[0]['Confirmed'].'<br>';

      
    }
    
  }
  //function worldwide
  #/summary?from=2020-03-01T00:00:00Z&to=2020-04-01T00:00:00Z
  
}

//variaveis testes
// foreach($deaths as $death){
//   echo $death.'<br>';
// }





?>