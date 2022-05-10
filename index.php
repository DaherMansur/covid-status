<?php
    $country = 'brazil';
    require "app/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/public/images/favicon.png">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <title>Covid Status</title>

</head>

<body class="color-2">
    <header class="flex row row-center column-center color-1">
        <div id="darkModeButton"><img src="/public/images/darkMode.png" alt="modo escuro" id="darkModeButtonImg"></div>
        <a href="">
            <img src="/public/images/logo.png" alt="logo covid status" />
        </a>
    </header>

    <main class="container margin-auto">
        <section class="flex row column-center wrap color-2 space-between">
            <div class="flex column" id="menuBtn">
                <div class="flex row column-center">
                    <img src="/public/images/dropdown.png" alt="menu" class="marg-right-sm" id="dropdown">
                    <?php foreach($countrySelect as $key) { ?>
                        <div class="flex row-center column-center main-wrapper" id="nav-countries"><img src="/public/images/flags/<?=$key['ISO2'] ?>.png" alt=""></div>
                        <h1 class="text-color-2 marg-left"><?= $key['Country'] ?></h1>
                    <?php } ?>
                </div>
                <nav>
                    <?php foreach ($countries as $key) { ?>
                        <a href="?country=<?= $key['Slug'] ?>">
                            <div id="hover-nav" class="flex column-center space-between">
                                <div>
                                    <ul>
                                        <li>
                                            <div class="flex row-center column-center main-wrapper">
                                                <img src="public/images/flags/<?= $key['ISO2'] ?>.png" alt="" width="100%">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <ul>
                                        <li>
                                            <p class="text-color-2"><?= $key['Country'] ?></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </nav>
            </div>
        
            <div class="flex row space-between wrap text-color-2">
                <div class="flex row column-center">
                    <h2>Total de casos:</h2>
                    <p class="marg-left-sm"><?= $totalCountry['Confirmed']; ?></p>
                </div>
                <div class="flex row marg-left column-center">
                    <h2>Total de mortes:</h2>
                    <p class="marg-left-sm"><?= $totalCountry['Deaths']; ?></p>
                </div>
                <div class="flex row marg-left column-center">
                    <h2>Casos ativos:</h2>
                    <p class="marg-left-sm"><?= $totalCountry['Active']; ?></p>
                </div>
            </div>
            
        </section>
        <section class="flex column">
            <div id="graph-1"></div>
            <div class="graph-descript text-color-2">
                <p>O gráfico demonstra a evolução dos casos de Covid-19 em todo o país, levando em consideração cada caso confirmado por dia desde o início do ano de 2020</p>
            </div>
        </section>
        <section class="flex column">
            <div id="graph-2"></div>
            <div class="graph-descript text-color-2">
                <p>Este gráfico apresenta a média de casos confirmados de Covid-19 num intervalo estipulado de sete dias</p>
            </div>
        </section>
        <section class="flex column">
            <div id="graph-3"></div>
            <div class="graph-descript text-color-2">
                <p>O gráfico apresenta o número de pessoas testadas positivas para COVID-19 e que vieram a óbito por dia</p>
            </div>
        </section>
        <section class="flex column">
            <div id="graph-4"></div>
            <div class="graph-descript text-color-2">
                <p>Este gráfico apresenta a média de pessoas testadas positivas para COVID-19 e que vieram a óbito num intervalo estipulado de sete dias</p>
            </div>
        </section>
    </main>

    <footer class="flex column column-center row-center color-1 text-color-1">
        <p>All Data is sourced from Johns Hopkins CSSE</p>
        <p>Daher Mansur (Front-End Dev) - Rodrigo Dalfré (Back end - Dev)</p>
    </footer>


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('graph-1', {
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Novos casos confirmados por dia'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                    'Selecione a área para dar zoom' : 'Pinch the chart to zoom in'
            },
            xAxis: {
                type: ''
            },
            yAxis: {
                title: {
                    text: 'Novos casos'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[1]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[1]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                type: 'area',
                name: 'casos',
                data: [<?php foreach ($newCasesConfirmed as $key) {
                            echo '[' . json_encode($key['Date']) . ',' . json_encode($key['Confirmed']) . '],';
                        } ?>]
            }]
        });
        Highcharts.chart('graph-2', {
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Média de casos por semana'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                    'Selecione a área para dar zoom' : 'Pinch the chart to zoom in'
            },
            xAxis: {
                type: ''
            },
            yAxis: {
                title: {
                    text: 'Média de casos'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[1]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[1]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                type: 'area',
                name: 'casos',
                data: [<?php foreach ($avgConfirmed as $key) {
                            echo '[' . json_encode($key['Date']) . ',' . json_encode($key['Confirmed']) . '],';
                        } ?>]
            }]
        });

        Highcharts.chart('graph-3', {
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Mortes confirmadas por dia'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                    'Selecione a área para dar zoom' : 'Pinch the chart to zoom in'
            },
            xAxis: {
                type: ''
            },
            yAxis: {
                title: {
                    text: 'Mortes'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[1]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[1]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                type: 'area',
                name: 'Mortes',
                data: [<?php foreach ($newCasesDeaths as $key) {
                            echo '[' . json_encode($key['Date']) . ',' . json_encode($key['Deaths']) . '],';
                        } ?>]
            }]
        });

        Highcharts.chart('graph-4', {
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Média de mortes confirmadas por semana'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                    'Selecione a área para dar zoom' : 'Pinch the chart to zoom in'
            },
            xAxis: {
                type: ''
            },
            yAxis: {
                title: {
                    text: 'Mortes'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[1]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[1]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                type: 'area',
                name: 'Mortes',
                data: [<?php foreach ($avgDeaths as $key) {
                            echo '[' . json_encode($key['Date']) . ',' . json_encode($key['Deaths']) . '],';
                        } ?>]
            }]
        });
    </script>
    <script src="public/js/script.js"></script>
</body>

</html>