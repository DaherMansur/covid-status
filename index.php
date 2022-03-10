<?php 

    $country = 'brazil';
    require "app/config.php";

    $average = $covidStatus->averageWeeks('Confirmed');
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
</head>

<body>
    <div class="container grid template-1">
        <aside class="nav">
            <div id="nav-head">
                <button id="btn_">C</button>

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
            <div class="head-content flex column">
                <div id="graph-1"></div>
                <div class="graph-descript">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
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
                    enabled: false
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

    <script src="public/js/script.js"></script>
</body>

</html>