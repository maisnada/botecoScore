<?php

namespace BotecoScore\Model;

class Estatistica
{
    private array $valores = [];

    public function addValor(string $titulo, string $timeDaCasa, string $timeVisitante, string $tempo): void
    {

        $total = intval($timeDaCasa) + intval($timeVisitante);

        if ($total !== 0) {

            $percentualTimeDaCasa = (intval($timeDaCasa) / intval($total)) * 100;

            $percentualVisitante = (intval($timeVisitante) / intval($total)) * 100;

            $this->valores["{$tempo}"][] = [
                "titulo" => $titulo,
                "timeDaCasa" => intval($timeDaCasa),
                "percentualTimeDaCasa" => $percentualTimeDaCasa,
                "timeVisitante" => intval($timeVisitante),
                "percentualVisitante" => $percentualVisitante,
                "total" => $total
            ];
        }
    }

    public function getValores(): array
    {
        return $this->valores;
    }
}
