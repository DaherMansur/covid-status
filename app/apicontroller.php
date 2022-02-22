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

    $start = 0;
    $limit = 7;

    for($q=0;$q < count($data); $q++){

      for($w=0;$w < 7; $w++){

        if($data[$start] === null){
          $start=0;
          break;
        } 

        $return[$q][$w] = $data[$start];
        $start++;
      }
    }
    print_r($return);



    #print_r($data);
    #substr($key['Date'], 0, 10),
    foreach($data as $key){
      #$dateFormat = substr($key['Date'], 0, 10);

      
      // $dates[] = [
      //       'Date' => substr($key['Date'], 0, 10),
      //       'Confirmed' => $key['Confirmed']
      // ];
      
    }


    #print_r($dates);
    #print_r($data);
    // foreach($data as $key){
    //   $dates[] = [
    //     'Date' => substr($data[$key]['Date'], 0, 10),
    //     'Deaths' => $data[$key]['Deaths']
    //   ];
    // }

    // foreach($dates as $date){
      
    // }
    
    return $dates;
  }
  //function worldwide
  #/summary?from=2020-03-01T00:00:00Z&to=2020-04-01T00:00:00Z
  
}

//variaveis testes
// foreach($deaths as $death){
//   echo $death.'<br>';
// }





?>