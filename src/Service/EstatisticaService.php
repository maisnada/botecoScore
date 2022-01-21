<?php

namespace BotecoScore\Service;

use BotecoScore\Model\Partida;
use BotecoScore\Model\Estatistica;
use BotecoScore\Infra\Api\ApiProxy;
use BotecoScore\Infra\Repository\FlashScore\EstatisticaRepository;

class EstatisticaService
{
    /**@return Estatistica */
    public function getByPartida(Partida $partida): void
    {
        $api = new ApiProxy();

        $estatisticaRepository = new EstatisticaRepository($api);

        $estatisticaRepository->getByPartida($partida);
    }

    public function getById(string $id): ?Estatistica
    {
        $api = new ApiProxy();

        $estatisticaRepository = new EstatisticaRepository($api);

        return $estatisticaRepository->getById($id);
    }
}
