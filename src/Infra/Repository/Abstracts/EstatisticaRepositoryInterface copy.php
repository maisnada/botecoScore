<?php

namespace BotecoScore\Infra\Repository\Abstracts;

use BotecoScore\Model\Partida;
use BotecoScore\Model\Estatistica;

interface PartidaRepositoryInterface
{
    public function getByPartida(Partida $partida): Estatistica;
}
