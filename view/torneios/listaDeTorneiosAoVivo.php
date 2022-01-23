<?php require __DIR__ . '/../header.php'; ?>


<div class="row">

    <div class="col-12">

        <?php foreach ($torneios as $torneio) : ?>

            <div class="row titulo">
                <!-- sm -->
                <div class="col-sm-12 d-block d-md-none">

                    <h3 style="margin:0; padding: 0;"><?= $torneio->getNomeAbreviado(); ?></h3>

                    <span class="detalhe"><i class="fas fa-chevron-right"></i> <?= $torneio->getPais(); ?>

                </div>

                <!-- md -->

                <div class="col-md-8 d-none d-md-block ">

                    <h3 style="margin:0; padding: 0;"><?= $torneio->getNomeAbreviado(); ?></h3>

                </div>

                <div class="col-md-4 d-none d-md-block text-right">

                    <span class="detalhe"><?= $torneio->getPais(); ?> <i class="fas fa-chevron-left"></i></span>

                </div>


            </div>

            <?php foreach ($torneio->getPartidas() as $index => $partida) : ?>

                <div class="partida <?= $index !== array_key_last($torneio->getPartidas()) ? 'quebra' : '' ?>">

                    <!-- partida -->
                    <div class="row">

                        <!-- sm -->
                        <div class="col-12 d-block d-md-none">

                            <div class="row">

                                <div class="col-6 ">
                                    <p style="margin-bottom: 4px;"><i class="fas fa-video fa-sm"></i> <?= $partida->getStatus(); ?></p>
                                    <p><i class="far fa-clock fa-sm"></i> <?= $partida->getTempo(); ?></p>
                                </div>
                                <div class="col-6 text-right">
                                    <p><i class="fas fa-chart-line fa-sm"></i> <a href="#" class="btn_estatistica" data-id="<?= $partida->getId(); ?>" title="Estatísticas">Estatísticas</a></p>

                                </div>
                            </div>

                        </div>

                        <!-- md -->
                        <div class="col-md-12 d-none d-md-block">

                            <span style="padding: 10px 20px 0 0;">

                                <p style="display: inline-block;"><i class="fas fa-video fa-lg"></i> <?= $partida->getStatus(); ?></p>

                            </span>

                            <span style="padding: 10px 20px 0 0;">

                                <p style="display: inline;"><i class="far fa-clock fa-lg"></i> <?= $partida->getTempo(); ?></p>

                            </span>

                            <span style="padding: 10px 20px 0 0;">
                                <p style="display: inline-block;"><i class="fas fa-chart-line fa-lg"></i> <a href="#" class="btn_estatistica" data-id="<?= $partida->getId(); ?>" title="Estatísticas">Estatística da Partida</a></p>
                            </span>

                        </div>

                    </div>

                    <div class="row text-center">

                        <!-- sm -->
                        <div class="col-5 d-block d-md-none" style="margin-top: 15px;">

                            <img src="<?= $partida->getTimeDaCasa()->getEscudo(); ?>" class="img-thumbnail" style="background: transparent;border: 0;" />
                            <p style="margin-top:5px; font-size: .9em;"><?= $partida->getTimeDaCasa()->getNomeCompleto(); ?></p>
                        </div>

                        <div class="col-2 d-block d-md-none placar" style="margin-top: 10px;">

                            <p style="margin-top: 15px">X</p>

                        </div>

                        <div class="col-5 d-block d-md-none" style="margin-top: 10px;">
                            <img src="<?= $partida->getTimeVisitante()->getEscudo(); ?>" class="img-thumbnail" style="background: transparent;border: 0;" />
                            <p style="margin-top:4px; font-size: .9em;"><?= $partida->getTimeVisitante()->getNomeCompleto(); ?></p>
                        </div>

                        <div class="col-5 d-block d-md-none placar" style="margin-top: 10px;">

                            <p><?= $partida->getPlacar()->getPontoDaCasa() ?></p>

                        </div>

                        <div class="col-2 d-block d-md-none placar" style="margin-top: 10px;">

                            <p></p>

                        </div>

                        <div class="col-5 d-block d-md-none placar" style="margin-top: 10px;">

                            <p><?= $partida->getPlacar()->getPontoDoVisitante() ?></p>

                        </div>

                        <!-- md -->
                        <div class="col-md-4 text-center d-none d-md-block" style="margin-top: 20px;">

                            <img src="<?= $partida->getTimeDaCasa()->getEscudo(); ?>" style="width:100px;" />

                            <p style="margin-bottom: 0;"><?= $partida->getTimeDaCasa()->getNomeCompleto(); ?></p>

                        </div>

                        <div class="col-md-4 d-none d-md-block text-center placar">

                            <p style="margin-top: 10px;"><?= $partida->getPlacar()->getPontoDaCasa() ?> x <?= $partida->getPlacar()->getPontoDoVisitante() ?></p>

                        </div>

                        <div class="col-md-4 d-none d-md-block text-center">

                            <img src="<?= $partida->getTimeVisitante()->getEscudo(); ?>" style="width:100px;" />
                            <p style="margin-bottom: 0;"><?= $partida->getTimeVisitante()->getNomeCompleto(); ?></p>

                        </div>
                    </div>




                    <!--   <div class="row" style="margin: 30px 0;">

                       

                    </div> -->

                    <div class="row hide" id="cam_load_<?= $partida->getId(); ?>">
                        <div class="col-md-12 text-center">
                            <img src="../../assets/img/loading.gif" style="width: 60px; margin-bottom: 15px;" />
                        </div>
                    </div>

                    <div class="row" style="" id="cam_estatisticas_<?= $partida->getId(); ?>"></div>

                </div>


            <?php endforeach; ?>

        <?php endforeach; ?>


    </div>


</div>

<?php require __DIR__ . '/../footer.php'; ?>