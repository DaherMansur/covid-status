<?php

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

    //from=2021-01-01&to=2021-10-21
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

  public function getCountry(){
    $data = $this->request('countries');

    if(empty($data) && !is_array($data)){
      return false;
    }

    $response = array_column($data, 'Country');
    sort($response);
    return $response;
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
  public function averageWeeks($param){
    $data = $this->request('dayone/country/'.$this->endpoint);

    // $param = 'Confirmed'; //Deaths, Confirmed. (Parametro na function)

    $return = [];
    $start = 0;
    for($q=0;$q < count($data); $q++){

      for($w=0;$w < 7; $w++){
        if (!isset($data[$start])) break;

        $return[$q][$w]['Date'] = substr($data[$start]['Date'], 0, 10);
        $return[$q][$w][$param] = $data[$start][$param];
        $start++;
      }
    }

    $response = [];
    foreach($return as $key){
      
      //AverangeCases 
      $cases = array_column($key, $param);
      $averageCases = (end($cases) - $cases[0]) / count($cases);

      $average = ceil($averageCases);
      
      //Date
      $dateList = array_column($key, 'Date');

      $current = date('d/M', strtotime($dateList[0]));
      $end = date('d/M', strtotime(end($dateList)));

      $currentYear = date('Y', strtotime($dateList[0]));
      $endYear = date('Y', strtotime(end($dateList)));
      
      if($currentYear !== $endYear){
        $date = $current.'/'.$currentYear. ' - ' . $end.'/'.$endYear;
      } else {
        $date = $current. ' - '. $end;
      }

      $response[] = [
        'Date' => $date,
        $param => $average
      ];
    }  
    return $response;
  }
  
  public function newCases(){
    $data = $this->request('dayone/country/'.$this->endpoint);

    $param = 'Confirmed'; //Deaths, Confirmed

    $return = [];
    $start = 0;
    for($q=0;$q < count($data); $q++){
      if (!isset($data[$start])) break;

      $return[$q][$param] = $data[$start][$param] - $data[$start-1][$param];
      $return[$q]['Date'] = substr($data[$start]['Date'], 0, 10);
      $start++;

    }
    
    echo '<pre>';
    print_r($return);

  }
  //function worldwide
  #/summary?from=2020-03-01T00:00:00Z&to=2020-04-01T00:00:00Z
  
}
$covidStatus = new CovidStatus('brazil', '');
$newCases = $covidStatus->newCases();
//variaveis testes
// foreach($deaths as $death){
//   echo $death.'<br>';
// }





?>