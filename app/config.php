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

    $totalCountry = $covidStatus->getTotalCountry(); //Listagem total de país
    $countrySelect = $covidStatus->getCountry(); //Lista apenas um país
    $countries = $covidStatus->getCountry('all'); //Listagem de países(nome, slug, IO)
    
    if(!$totalCountry || !$countrySelect){
        header('location: 404.php');
    }
    
    $avgConfirmed = $covidStatus->averageWeeks('Confirmed'); //Media semanal (Confirmados)
    $avgDeaths = $covidStatus->averageWeeks('Deaths'); //Media semanal (Mortes)

    $newCasesConfirmed = $covidStatus->newCases('Confirmed'); //Novos casos confirmados(perDay)
    $newCasesDeaths = $covidStatus->newCases('Deaths'); //Novas mortes confirmadas(perDay)

?>