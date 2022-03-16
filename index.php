<?php

$country = 'brazil';
require "app/config.php";

#from=2021-01-01&to=2021-10-21
$avgConfirmed = $covidStatus->averageWeeks('Confirmed'); //Media semanal (Confirmados)
$avgDeaths = $covidStatus->averageWeeks('Deaths'); //Media semanal (Mortes)

$countries = $covidStatus->getCountry(); //Lista de países(nome, slug, IO)
$totalCountry = $covidStatus->getTotalCountry(); //Listagem total de país

$newCasesConfirmed = $covidStatus->newCases('Confirmed'); //Novos casos confirmados(perDay)
$newCasesDeaths = $covidStatus->newCases('Deaths'); //Novas mortes confirmadas(perDay)

$date = date('Y-m-d', strtotime('-3 month'));


/* foreach ($average as $key){
        echo '['.json_encode($key['Date']).','.json_encode($key['Confirmed']).'],' ;
    } */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <?php
    /*  header("refresh:1"); */
    ?>
    <!-- Highcharts.js -->
    <!--     <script src="https://code.highcharts.com/highcharts.js"></script> -->
    <title>Covid Status</title>

    <script>
        

        

    </script>

</head>

<body>
    <div class="container grid template-1">
        <aside class="nav">
            <div id="nav-head" class="text-color">
                <h3>Ajude a diminuir o contágio!</h3>
                <div class="prev">
                    <div class="prev-ico"><img src="/public/images/covid-icons/Patient.png" alt=""></div>
                    <div class="prev-text">Use máscara sempre que possível, principalmente em locais fechados</div>                    
                </div>
                <div class="prev">
                    <div class="prev-text">Fique em casa se você estiver indisposto</div>
                    <div class="prev-ico"><img src="/public/images/covid-icons/home.png" alt=""></div>               
                </div>
                <div class="prev">
                    <div class="prev-ico"><img src="/public/images/covid-icons/hands.png" alt=""></div>
                    <div class="prev-text">Lave as mãos com frequência usando sabão ou alcool gel</div>                    
                </div>
                <div class="prev">
                    <div class="prev-text">Mantenha uma distância segura de outras pessoas, mesmo que não pareçam doentes</div>  
                    <div class="prev-ico"><img src="/public/images/covid-icons/distance.png" alt=""></div>                 
                </div>
                <div class="prev">
                    <div class="prev-ico"><img src="/public/images/covid-icons/hospital.png" alt=""></div>
                    <div class="prev-text">Caso apresente tosse, febre alta, falta de ar procure atendimento médico e ligue com antecedência para o posto de saúde, UPA ou pronto-socorro</div>                    
                </div>

            </div>

            <nav>
                <?php foreach ($countries as $key) { ?>
                    <a href="?country=<?= $key['Slug'] ?>">
                        <div class="button-1">
                            <div class="country">
                                <ul>
                                    <li><p class="text-color"><?= $key['Country'] ?></p></li>
                                </ul>
                            </div>
                            <div class="country-nmbrs">
                                <ul>
                                    <li>
                                        <img src="public/images/flags/<?= $key['ISO2'] ?>.png" alt="" width="30px">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </nav>
        </aside>
        <header class="head">
            <h1>Covid Status</h1>
            <button id="btn_">C</button>
            <button id="dateTime" value="<?= $date ?>" >3 Months</button>
        </header>
        <main class="grid container-main center">
            <div class="head-content flex column">
                <div id="graph-1"></div>
                <div class="graph-descript">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
            </div>
            <div class="head-content flex column">
                <div id="graph-2"></div>
                <div class="graph-descript">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
            </div>
            <div class="content"></div>
            <div class="content"></div>
            <div class="content"></div>
            <div class="content"></div>
        </main>
        <footer>
            <p class="text-color">references and credits ~</p>
        </footer>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('graph-1', {
            xAxis: {

            },

            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: false
                    }
                }
            },

            series: [{
                data: [<?php foreach ($avgConfirmed as $key) {
                            echo '[' . json_encode($key['Date']) . ',' . json_encode($key['Confirmed']) . '],';
                        } ?>]
            }]
        })
        Highcharts.chart('graph-2', {
            xAxis: {

            },

            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: false
                    }
                }
            },

            series: [{
                data: [<?php foreach ($avgDeaths as $key) {
                            echo '[' . json_encode($key['Date']) . ',' . json_encode($key['Deaths']) . '],';
                        } ?>]
            }]
        })
    </script>

    <script>

        const dateTime = document.querySelector('#dateTime')
        dateTime.addEventListener('click', () => {
            
            let country = '<?= $country ?>'
            let date = '<?= $date ?>'

            window.location.href = "?country="+country+"&from="+date
        })
    </script>

    <script src="public/js/script.js"></script>
</body>

</html>