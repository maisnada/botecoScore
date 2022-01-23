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
    <!-- 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&family=Cabin+Sketch:wght@700&family=Roboto:wght@300&display=swap" rel="stylesheet">
 -->

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <div class="container">

        <div class="jumbotron jumbotron banner" style="margin-top: 20px; margin-bottom: 0;">
            <div class="container">
                <h1 class="display-4 "><a href="/" style="text-decoration: none; color: #000;">BotecoScore</a></h1>
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