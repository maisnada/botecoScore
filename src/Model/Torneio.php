<?php

namespace BotecoScore\Model;

use BotecoScore\Model\Partida;

class Torneio
{

    private string $id;
    private string $nomeCompleto;
    private string $nomeAbreviado;
    private string $pais;
    /**@var Partida[] $partidas */
    private array $partidas = [];
    private int $totalDePartidas = 0;
    private string $estagio;
    private string $temporada;
    private string $logo;

    public function __construct(string $id, string $nomeCompleto, string $nomeAbreviado, string $pais, string $estagio, string $temporada, string $logo)
    {
        $this->id = $id;
        $this->nomeCompleto = $nomeCompleto;
        $this->nomeAbreviado = $nomeAbreviado;
        $this->pais = $pais;
        $this->estagio = $estagio;
        $this->temporada = $temporada;
        $this->logo = $logo;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getNomeCompleto(): string
    {
        return $this->nomeCompleto;
    }

    public function getNomeAbreviado(): string
    {
        return $this->nomeAbreviado;
    }

    public function getPais(): string
    {
        return $this->pais;
    }

    /**@return Partida[] */
    public function getPartidas(): array
    {

        return $this->partidas;
    }

    public function addPartida(Partida $partida)
    {

        $this->partidas[] = $partida;

        $this->totalDePartidas += 1;
    }

    public function getTotalDePartidas(): int
    {
        return $this->totalDePartidas;
    }
    public function getEstagio(): string
    {
        return $this->estagio;
    }

    public function getTemporada(): string
    {
        return $this->temporada;
    }

    public function getLogo(): string
    {
        return $this->logo;
    }
}
