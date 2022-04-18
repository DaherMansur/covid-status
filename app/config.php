<?php 

    require "app/apicontroller.php";

    $params = [];

    $country = isset($_GET['country']) ? $_GET['country'] : 'brazil';

    if(isset($_GET['from'])){
        $params['from'] = $_GET['from'];

        if(!isset($_GET['to']) || empty($_GET['to'])){
            $date = date('Y-m-d');
            $params['to'] = $date;
        } else {
            $params['to'] = $_GET['to'];
        }
    }
    $covidStatus = new CovidStatus($country, $params);
    
    

?>