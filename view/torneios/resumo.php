<?php require __DIR__ . '/../header.php'; ?>

<div class="row" style="">
    <div class="col-md-2" style="">
        <p>EP</p>
    </div>
    <div class="col-md-8">

        <div class="row imagemBeneficios" style="padding-top:20px; margin: 25px 0;">

            <div class="col-md-5 text-center">
                <div class="row">
                    <div class="col-md-2"><?= $evento->getPartida()->getStatus(); ?><br /><?= $evento->getStatus(); ?></div>
                    <div class="col-md-8">

                        <img src="<?= $evento->getPartida()->getTimeDaCasa()->getEscudo(); ?>" style="width:80px;" />

                        <p style="margin-top:5px"><?= $evento->getPartida()->getTimeDaCasa()->getNomeCompleto(); ?></p>

                    </div>
                    <div class="col-md-2" style="padding-top:32px;">
                        <h2 style="text-align: right;"><?= $evento->getPartida()->getPlacar()->getPontoDaCasa() ?></h2>
                    </div>
                </div>

            </div>

            <div class="col-md-2 text-center" style="padding-top:32px;">
                <h3>X</h3>
            </div>

            <div class="col-md-5 text-center">
                <div class="row">
                    <div class="col-md-2" style="padding-top:32px;">
                        <h2 style="text-align: left;"><?= $evento->getPartida()->getPlacar()->getPontoDoVisitante() ?></h2>
                    </div>
                    <div class="col-md-8">

                        <img src="<?= $evento->getPartida()->getTimeVisitante()->getEscudo(); ?>" style="width:80px;" />

                        <p style="margin-top:5px"><?= $evento->getPartida()->getTimeVisitante()->getNomeCompleto(); ?></p>

                    </div>
                    <div class="col-md-2">_</div>
                </div>

            </div>

        </div>

    </div>

    <div class="col-md-2" style="">
        <p>EP</p>
    </div>
</div>

<?php require __DIR__ . '/../footer.php'; ?>