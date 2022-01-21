<?php

namespace BotecoScore\Infra\Repository\FlashScore;

use BotecoScore\Helpers\Parse;
use BotecoScore\Model\Partida;
use BotecoScore\Model\Estatistica;
use BotecoScore\Infra\Api\ApiInterface;
use BotecoScore\Infra\Repository\Abstracts\EstatisticaRepositoryInterface;
use Exception;

class EstatisticaRepository implements EstatisticaRepositoryInterface
{

    private ApiInterface $api;

    public function __construct(ApiInterface $api)
    {
        $this->api = $api;
    }

    public function getByPartida(Partida $partida): void
    {
        $query = [
            "event_id" => $partida->getId(),
            "locale" => "pt_BR"
        ];

        $json = $this->api->sendRequest('GET', 'events/statistics', $query);

        if ($json) {

            $partida->setEstatistica($this->hydrateObject($json));
        }
    }

    public function getById(string $id): ?Estatistica
    {
        $query = [
            "event_id" => $id,
            "locale" => "pt_BR"
        ];

        $json = $this->api->sendRequest('GET', 'events/statistics', $query);

        if ($json) {

            return $this->hydrateObject($json);
        }

        return $json;
    }

    private function hydrateObject(string $json): Estatistica
    {
        $arr = Parse::jsonToArray($json);

        $estatisticasData = $arr["DATA"];

        $estatistica = new Estatistica();

        foreach ($estatisticasData as $estatisticaData) {

            $tempo = $estatisticaData["STAGE_NAME"];

            foreach ($estatisticaData["GROUPS"][0]["ITEMS"] as $itemData) {

                $estatistica->addValor(
                    $itemData["INCIDENT_NAME"],
                    $itemData["VALUE_HOME"],
                    $itemData["VALUE_AWAY"],
                    $tempo
                );
            }
        }

        return $estatistica;
    }
}
