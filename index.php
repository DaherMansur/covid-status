<?php 

    $country = 'brazil';
    require "app/config.php";

    $average = $covidStatus->averageWeeks('Confirmed');
    echo '<pre>';
    foreach ($average as $key){
        echo '['.json_encode($key['Date']).','.json_encode($key['Confirmed']).'],' ;
    }
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
    <script src="public/js/script.js"></script>
    <title>Covid Status</title>
</head>

<body>
    <div class="container grid template-1">
        <aside class="nav">
            <div id="nav-head">
                <button onclick="bgcolor()">Tema</button>

            </div>
            <a href="#">
                <div class="button-1">
                    <div class="country">
                        <ul>
                            <li>Brazil</li>
                        </ul>
                    </div>
                    <div class="country-nmbrs">
                        <ul>
                            <li>99999</li>
                        </ul>
                    </div>
                </div>
            </a>
        </aside>
        <header class="head">
            <h1>Covid Status</h1>
        </header>
        <main class="grid container-main center">
            <div class="head-content flex">
                <div id="graph-1"></div>
            </div>
            <div class="content"></div>
            <div class="content"></div>
            <div class="content"></div>
            <div class="content"></div>
            <div class="content"></div>
            <div class="content"></div>
        </main>
        <footer>
            <p>references and credits ~</p>
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
                    enabled: true
                }
            }
        },

        series: [{
            data: [<?php foreach($average as $key){
                echo '['.json_encode($key['Date']).','.json_encode($key['Confirmed']).'],'; 
            } ?>]
        }]
        
    });
    </script>

</body>

</html>