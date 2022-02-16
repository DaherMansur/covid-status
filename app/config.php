<?php 

    require "../app/apicontroller.php";

    print_r($_GET);

    //Página principal
    $country = 'brazil';
    $params = [];

    if(isset($_GET['from'])){
        $params['from'] = $_GET['from'];

        if(!isset($_GET['to']) || empty($_GET['to'])){
            $date = date('Y-m-d');
            $params['to'] = $date;
        } else {
            $params['to'] = $_GET['to'];
        }
    }
    
    print_r($params);

    $country = isset($_GET['country']) ? $_GET['country'] : $country;

    $covidStatus = new CovidStatus($country, $params);
    $total = $covidStatus->getTotalCountry();
    print_r($total);
    #print_r($_GET);
    
?>