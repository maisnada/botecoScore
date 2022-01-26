<?php

namespace BotecoScore\Service;

use BotecoScore\Model\Torneio;
use BotecoScore\Infra\Api\ApiProxy;
use BotecoScore\Infra\Repository\FlashScore\TorneioRepository;
use BotecoScore\Infra\Repository\FlashScore\EstatisticaRepository;

class TorneioService
{

    /**@return Torneio[] */
    public function listaDeTorneiosAoVivo(): array
    {
        $api = new ApiProxy();

        $torneioRepository = new TorneioRepository($api);

        /**@var  Torneio[] $torneios*/
        return $torneioRepository->listaDeTorneiosAoVivo();
    }

    public function proximosEventos(): array
    {
        $api = new ApiProxy();

        $torneioRepository = new TorneioRepository($api);

        /**@var  Torneio[] $torneios*/
        return $torneioRepository->proximosEventos();
    }


    public function getById(string $id): Torneio|null
    {
        $api = new ApiProxy();

        $torneioRepository = new TorneioRepository($api);

        return $torneioRepository->getById($id);
    }
}
