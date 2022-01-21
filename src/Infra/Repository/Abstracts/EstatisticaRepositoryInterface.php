<?php

namespace BotecoScore\Infra\Repository\Abstracts;

use BotecoScore\Model\Partida;
use BotecoScore\Model\Estatistica;

interface EstatisticaRepositoryInterface
{
    public function getByPartida(Partida $partida): void;

    public function getById(string $id): ?Estatistica;
}
