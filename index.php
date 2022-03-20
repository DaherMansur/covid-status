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
    <link rel="icon" href="/public/images/favicon.png">
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

<body class="color-2">
    <header class="flex row row-center column-center color-1">
        <a href="">
            <img src="/public/images/logo.png" alt="Covid Status" />
        </a>
    </header>


    <main id="container" class="margin-auto">
        <section class="flex row column-center color-2 space-between">
            <div class="flex column">
                <div class="flex row column-center">
                    <div class="flex row-center column-center main-wrapper" id="nav-countries"><img src="/public/images/flags/br.png" alt=""></div>
                    <h1 class="text-color-2 marg-left">Brasil</h1>
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
            <div class="flex row space-between text-color-2">
                <div class="flex row column-center">
                    <h2>Total de casos:</h2>
                    <p class="marg-left-sm">9.999</p>
                </div>
                <div class="flex row marg-left column-center">
                    <h2>Total de mortes:</h2>
                    <p class="marg-left-sm">9.999</p>
                </div>
                <div class="flex row marg-left column-center">
                    <h2>Casos ativos:</h2>
                    <p class="marg-left-sm">9.999</p>
                </div>
            </div>
        </section>
        <section class="flex column">
            <div id="graph-1"></div>
            <div class="graph-descript text-color-2">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
        </section>
        <section class="flex column">
            <div id="graph-2"></div>
            <div class="graph-descript text-color-2">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
        </section>
        <section class="flex column">
            <div id="graph-3"></div>
            <div class="graph-descript text-color-2">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
        </section>
        <section class="flex column">
            <div id="graph-4"></div>
            <div class="graph-descript text-color-2">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
        </section>
    </main>

    <footer class="flex column column-center row-center color-1 text-color-1">
        <p>References and credits ~</p>
    </footer>



    <!-- <aside class="nav">
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

            <hr>

            <nav>
                <?php foreach ($countries as $key) { ?>
                    <a href="?country=<?= $key['Slug'] ?>">
                        <div class="button-1">
                            <div class="country">
                                <ul>
                                    <li>
                                        <p class="text-color"><?= $key['Country'] ?></p>
                                    </li>
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
        </aside> -->
    <!--   <header class="head">
            <h1>Covid Status</h1>
            <button id="btn_">C</button>
            <button id="dateTime" value="<?= $date ?>">3 Months</button>
        </header> -->
    <!-- <main class="grid container-main center">
            <div class="head-content flex column">
                <div id="graph-1"></div>
                <div class="graph-descript">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
            </div>
            <div class="head-content flex column">
                <div id="graph-2"></div>
                <div class="graph-descript">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
            </div>
            <div class="head-content column">
            <div id="graph-3"></div>
            <div class="graph-descript">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
            </div>
            <div class="head-content flex column">
                <div id="graph-4"></div>
                <div class="graph-descript">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
            </div>
        </main> -->

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

    <script>
        const dateTime = document.querySelector('#dateTime')
        dateTime.addEventListener('click', () => {

            let country = '<?= $country ?>'
            let date = '<?= $date ?>'

            window.location.href = "?country=" + country + "&from=" + date
        })
    </script>

    <script src="public/js/script.js"></script>
</body>

</html>