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
    
    //1.Fazer condição se acaso não existir os dados do país
    //1.1 colocar todos os 4 gráficos, se um der erro jogar para página erro 
    //2.Fazer 4 países random(cards)
    //2.1 Dar count nos countries e dar uma forma de adicionar os total
    //3 Redirecionar acaso clicado
    //4 tudo feito aqui no config

?>