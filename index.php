<?php 
    // require_once "app/apicontroller.php";

    #echo '<pre>';

    #print_r($_GET);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="public/css/style.css">
    <?php
        header("refresh:1");
    ?>
    <!-- Highcharts.js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>      
    <script src="public/js/script.js"></script>
    <title>Covid Status</title>
</head>
<body>
    <aside>
        .
    </aside>
    <header>
    <div id="container"></div>
    </header>
    <main>
    </main>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('container', {
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true
            }
        }
    },

    series: [{
        data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
    }]
});
    </script>
    
</body>
</html>