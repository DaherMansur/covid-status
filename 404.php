<?php
require "app/config.php";
$countries = $covidStatus->notFound(); //Listagem de países que existem valores
/* echo ('<pre>');
print_r($countries); */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="/public/images/favicon.png">
    <link rel="stylesheet" href="public/css/style.css">

    <title>Covid Status - 404</title>
</head>

<body>
    <main id="main404" class="flex column column-center row-center">
        <div><img src="/public/images/404.png" alt="404 - not found" id="img404"></div>
        <div class="marg-top-sm">
            <h1 class="text-color-4">Data not found</h1>
        </div>
        <div id="cardArea" class="flex row space-between">
            <?php foreach ($countries as $key => $value) { ?>
                <div class="card404">
                    <div class="cardFlag margin-auto"><?php echo ('<img src="./public/images/flags/' . $countries[$key]['ISO2'] . '.png" />') ?></div>
                    <h2 class="text-color-3"><?php echo $countries[$key]['Country'] ?></h2>
                    <div>
                        <ul class="text-color-3">
                            <li>Confirmed cases: <br/><div class="text-color-4"><?php echo $countries[$key]['Confirmed']; ?></div></li>
                            <li>Active cases: <br/><div class="text-color-4"><?php echo $countries[$key]['Active']; ?></div></li>
                            <li>Deaths: <br/><div class="text-color-4"><?php echo $countries[$key]['Deaths']; ?></div></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
    <script src="public/js/script.js"></script>
</body>

</html>