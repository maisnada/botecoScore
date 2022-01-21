<?php

namespace BotecoScore\Infra\Repository\FlashScore;

use BotecoScore\Model\Time;
use BotecoScore\Helpers\Parse;
use BotecoScore\Helpers\Translate;
use BotecoScore\Model\Partida;
use BotecoScore\Model\Torneio;
use BotecoScore\Infra\Api\ApiInterface;
use BotecoScore\Infra\Repository\Abstracts\TorneioRepositoryInterface;
use BotecoScore\Model\TipoTempo;

class TorneioRepository implements TorneioRepositoryInterface
{
    private ApiInterface $api;

    public function __construct(ApiInterface $api)
    {
        $this->api = $api;
    }

    public function listaDeTorneiosAoVivo(): array
    {
        $query = [
            "sport_id" => 1,
            "timezone" => -3,
            "locale" => "pt_BR"
        ];

        $json = $this->api->sendRequest("GET", "events/live-list", $query);

        return $this->hydrateList($json);
    }

    public function listaDeTorneiosDoDia(): array
    {
        return [];
    }

    public function getById(string $id): Torneio|null
    {
        /*  $query = [
            "event_id" => $id,
            "locale" => "pt_BR"
        ];

        $json = $this->api->sendRequest("GET", "events/data", $query);

        return $this->hydrateObject($json); */
        return null;
    }

    private function hydrateList(string $json): array
    {

        $arr = Parse::jsonToArray($json);

        $torneios = [];

        foreach ($arr["DATA"] as $torneioData) {

            $torneio = new Torneio(
                $torneioData["TOURNAMENT_ID"],
                $torneioData["NAME"],
                $torneioData["SHORT_NAME"],
                $torneioData["COUNTRY_NAME"]
            );

            foreach ($torneioData["EVENTS"] as $partidaData) {

                $timeDaCasa = new Time(
                    $partidaData["HOME_PARTICIPANT_IDS"][0],
                    $partidaData["HOME_NAME"],
                    $partidaData["HOME_IMAGES"][0]
                );

                $timeVisitante = new Time(
                    $partidaData["AWAY_PARTICIPANT_IDS"][0],
                    $partidaData["AWAY_NAME"],
                    $partidaData["AWAY_IMAGES"][0]
                );

                $partida = new Partida(
                    $partidaData["EVENT_ID"],
                    $partidaData["START_TIME"],
                    $timeDaCasa,
                    $timeVisitante,
                    Translate::get($partidaData["STAGE"]),
                    Translate::get($partidaData["STAGE_TYPE"])
                );

                $partida->getPlacar()->addPontoParaCasa($partidaData["HOME_SCORE_CURRENT"]);
                $partida->getPlacar()->addPontoParaVisitante($partidaData["AWAY_SCORE_CURRENT"]);

                $torneio->addPartida($partida);
            }

            $torneios[] = $torneio;
        }

        return $torneios;
    }

    private function hydrateObject(string $json): Partida
    {

        $arr = Parse::jsonToArray($json);

        $partidaData = $arr["DATA"]["EVENT"];

        $timeDaCasa = new Time(
            $partidaData["HOME_PARTICIPANT_IDS"][0],
            $partidaData["HOME_NAME"],
            $partidaData["HOME_IMAGES"][0]
        );

        $timeVisitante = new Time(
            $partidaData["AWAY_PARTICIPANT_IDS"][0],
            $partidaData["AWAY_NAME"],
            $partidaData["AWAY_IMAGES"][0]
        );

        $partida = new Partida(
            $partidaData["EVENT_ID"],
            $partidaData["START_TIME"],
            $timeDaCasa,
            $timeVisitante,
            $partidaData["STAGE"],
            $partidaData["STAGE_TYPE"]
        );

        $partida->getPlacar()->addPontoParaCasa($partidaData["HOME_SCORE_CURRENT"]);
        $partida->getPlacar()->addPontoParaVisitante($partidaData["AWAY_SCORE_CURRENT"]);

        return $partida;
    }
}
