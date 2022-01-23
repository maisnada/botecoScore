<?php

$nome = 'BotecoScore';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- v1.0.0 -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BotecoScore</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&family=Cabin+Sketch:wght@700&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #DCDCDC;
        }

        .hide {

            display: none;
        }

        .show {

            display: ;
        }

        .banner {

            background-image: url(../../assets/img/backgroudjumb.jpg);
            background-position: center top;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-color: #464646;

        }

        h1 {
            font-family: 'Cabin Sketch', cursive;
        }

        h2 {
            font-family: 'Allerta Stencil', sans-serif;
            font-size: 2.5em;
            margin-top: 30px;

        }

        h3 {
            font-family: 'Allerta Stencil', sans-serif;
            font-size: 1.8em;
        }

        .titulo {
            background-color: #000;
            color: #fff;
            padding: 5px 0 8px 0;
            margin-top: 30px;

        }

        .detalhe {
            background-color: #fff;
            color: #000;
            padding: 4px 4px;
            font-size: .7em;
            margin-top: 5px;
        }

        p {
            font-size: 1.2em;
        }

        .partida {
            padding: 30px 0 0 0;
            border-bottom: 1px dotted #000;
        }

        .placar {
            font-family: 'Cabin Sketch', cursive;
        }

        .placar p {
            font-size: 5em;
            margin: 0;
        }

        .secao {

            margin: 20px 0 20px 0;
        }

        /* Small devices (landscape phones, 576px and up) */
        @media (min-width: 576px) {}

        /* Medium devices (tablets, 768px and up) */
        @media (min-width: 768px) {

            .titulo {
                padding: 5px 0;
            }

            .detalhe {
                padding: 4px 4px;
                font-size: .8em;
                margin-top: 10px;
            }

            .partida {
                padding: 30px 0;

            }

            .secao {

                margin: 35px 0 30px 0;
            }
        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 992px) {}

        /* X-Large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {}

        /* XX-Large devices (larger desktops, 1400px and up) */
        @media (min-width: 1400px) {}
    </style>

</head>

<body>

    <div class="container">

        <div class="jumbotron jumbotron banner" style="margin-top: 20px; margin-bottom: 0;">
            <div class="container">
                <h1 class="display-4 "><a href="/home" style="text-decoration: none; color: #000;">BotecoScore</a></h1>
            </div>
        </div>

        <?php

        if (isset($_SESSION['mensagem'])) : ?>

            <div class="alert alert-<?= $_SESSION['tipoMensagem']; ?>">

                <?= $_SESSION['mensagem']; ?>

            </div>

        <?php

            unset($_SESSION['tipoMensagem']);
            unset($_SESSION['mensagem']);

        endif;
        ?>


        <div class="row">
            <!-- sm -->
            <div class="col-12 d-block d-md-none">
                <h2>
                    <?= $titulo ?>
                </h2>
            </div>

            <!-- md -->
            <div class="col-md-12 d-none d-md-block text-center">
                <h2>
                    <?= $titulo ?>
                </h2>
            </div>

        </div>