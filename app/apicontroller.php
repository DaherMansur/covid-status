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

    if(is_array($params)){
      foreach($params as $param => $value){
        if(empty($params)) continue;
        $url .= $param.'='.urlencode($value).'T00:00:00Z&';
      }
    }

    $url = substr($url, 0, -1);

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '', //Informa ao servidor quais tipos de codificação ele aceitará 
      CURLOPT_MAXREDIRS => 10, //Escolher a quantidade de redirecionamentos 
      CURLOPT_TIMEOUT => 0, //Segundos limite para execução do cURL
      CURLOPT_FOLLOWLOCATION => true, //Segue a localização
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    ));

    $res = curl_exec($curl);
    curl_close($curl);

    return json_decode($res, true);
  }

  public function getCountry($param = null){
    $data = $this->request('countries');

    if(empty($data) || !is_array($data)){
      return false;
    }
    
    if($param == 'all'){
      array_multisort($data);
      return $data;
    } 
    
    $slug = array_column($data, 'Slug');
    $slugValue = array_search($this->endpoint, $slug);
    
    $response = [];
    foreach($data as $key){
      $response[0] = $data[$slugValue];
    }
    return $response;
  } 

  public function getTotalCountry($country = null){

    $country = !$country ? $this->endpoint : $country;  
    $data = $this->request('total/country/'.$country);

    if(empty($data) || !is_array($data)){
      return false;
    }

    $confirmed = array_column($data, 'Confirmed');
    $deaths = array_column($data, 'Deaths');
    $active = array_column($data, 'Active');

    $response = [];
    
    for($q = 0; $q < 3; $q++){
      switch($q){
        case 0:
          $num = end($confirmed);
          $case = 'Confirmed';
          break;
        case 1:
          $num = end($deaths);
          $case = 'Deaths';
          break;
        case 2: 
          $num = end($active);
          $case = 'Active';
          break;
      }

      $c = number_format($num, 0, 0, '.');
      if(strlen($num) < 6) $response[$case] = $num; // Menos de 10mil
      elseif(strlen($num) >= 6 && strlen($num) < 7) $response[$case] = substr($c, 0, 3).'K'; //Mil
      elseif(strlen($num) >= 7 && strlen($num) <= 9) $response[$case] = substr($c, 0, 4).'M'; //Milhão
      elseif(strlen($num) >= 10) $response[$case] = substr($c, 0, 4).'B'; //Bilhão
    }
    return $response;
  }
  
  public function averageWeeks($status){
    $data = $this->request('total/country/'.$this->endpoint, $this->params);

    $return = [];
    $start = 0;
    for($q=0;$q < count($data); $q++){

      for($w=0;$w < 7; $w++){
        if (!isset($data[$start])) break;

        $return[$q][$w]['Date'] = substr($data[$start]['Date'], 0, 10);
        $return[$q][$w][$status] = $data[$start][$status];
        $start++;
      }
    }

    $response = [];
    foreach($return as $key){
      
      //AverangeCases 
      $cases = array_column($key, $status);
      $averageCases = abs(end($cases) - $cases[0]) / count($cases);

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
        $status => $average
      ];
    }  
    return $response;
  }
  
  public function newCases($status){
    $data = $this->request('total/country/'.$this->endpoint, $this->params);

    $response = [];
    $start = 1;
    for($q=1;$q < count($data); $q++){
      if (!isset($data[$start])) break;

      $value = abs($data[$start][$status]) - abs($data[$start-1][$status]);
      $date = substr($data[$start]['Date'], 0, 10);
      /*
        Há correções de dados na API,
        então para deixar mais condizentes com a realidade
        valores corrigidos terão seus valores igual a 0 
      */
      if ($value < 0) $value = 0;

      $response[$q][$status] = $value;
      $response[$q]['Date'] = $date;
      $start++;
    }
    return $response;
  }
  
  public function notFound(){
    $data = $this->request('countries');

    $total = count($data) - 1;
    $slug = array_column($data, 'Slug');
    
    $response = [];
    $randomCache = [];
    for($q = 0; $q < 4; $q++){
      $random = mt_rand(0, $total);

      //Se acaso o valor for repetido
      if(in_array($random, $randomCache)){
        unset($randomCache[$q]);
        $q--;
        continue;
      }
      $randomCache[$q] = $random;
      
      $country = $this->getTotalCountry($slug[$random]);
      //Se acaso o valor não exisitr
      if(!$country){ 
        $q--;
        continue;
      }

      $response[] = array_merge($data[$random], $country);
    }
    return $response;
  }
}

?>