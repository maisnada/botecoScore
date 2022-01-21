<?php

namespace BotecoScore\Infra\Repository\Abstracts;

use BotecoScore\Model\Torneio;

interface TorneioRepositoryInterface
{
    /**@return Torneio[] */
    public function listaDeTorneiosAoVivo(): array;

    /**@return Torneio[] */
    public function listaDeTorneiosDoDia(): array;

    public function getById(string $id): Torneio|null;
}
