<div class="col-md-12">

    <p class="secao">
        <span style="background-color: #fff; color: #000; padding: 6px 6px; font-weight: bold;"> <i class="fas fa-chart-line fa-lg"></i> Estatísticas da Partida
    </p>

    <?php if ($estatistica) : ?>

        <?php foreach ($estatistica->getValores()["Jogo"] as $data) : ?>

            <div class="row" style="margin-bottom: 20px;">

                <div class="col-md-12">

                    <p style="margin-bottom: 4px;"><?= $data["titulo"]; ?> <?= $data["titulo"] === 'Posse de bola' ? '(%)' : '' ?></p>

                    <div class="progress">

                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= $data["percentualTimeDaCasa"] ?>%" aria-valuenow="<?= $data["percentualTimeDaCasa"] ?>" aria-valuemin="0" aria-valuemax="<?= $data["total"] ?>"><?= $data["timeDaCasa"] ?></div>
                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $data["percentualVisitante"] ?>%" aria-valuenow="<?= $data["percentualVisitante"] ?>" aria-valuemin="0" aria-valuemax="<?= $data["total"] ?>"><?= $data["timeVisitante"] ?></div>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    <?php endif ?>

    <?php if (!$estatistica) : ?>

        <p style="margin-bottom: 10px;">Não disponíveis no momento ; [ ... Tente mais tarde!</p>

    <?php endif ?>

</div>