<?php

namespace BotecoScore\Model;

class Placar
{

    private int $pontosDaCasa;
    private int $pontosDoVisitante;

    public function __construct()
    {
        $this->pontosDaCasa = 0;
        $this->pontosDoVisitante = 0;
    }

    public function addPontoParaCasa(int $ponto): void
    {
        $this->pontosDaCasa += $ponto;
    }

    public function getPontoDaCasa(): int
    {
        return $this->pontosDaCasa;
    }

    public function addPontoParaVisitante(int $ponto): void
    {
        $this->pontosDoVisitante += $ponto;
    }

    public function getPontoDoVisitante(): int
    {
        return $this->pontosDoVisitante;
    }

    public function __toString(): string
    {
        return "{$this->pontosDaCasa} : {$this->pontosDoVisitante}";
    }
}
