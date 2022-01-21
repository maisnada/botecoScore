<?php

namespace BotecoScore\Model;

use BotecoScore\Model\Time;
use BotecoScore\Model\Placar;

class Partida
{
    private string $id;
    private int $data;
    private Time $timeDaCasa;
    private Time $timeVisitante;
    private string $tempo;
    private Placar $placar;
    private ?Estatistica $estatistica;
    private string $status;

    public function __construct(string $id, int $data, Time $timeDaCasa, Time $timeVisitante, string $tempo, string $status)
    {
        $this->id = $id;
        $this->data = $data;
        $this->timeDaCasa = $timeDaCasa;
        $this->timeVisitante = $timeVisitante;
        $this->tempo = $tempo;
        $this->placar = new Placar();
        $this->status = $status;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getData(): int
    {
        return $this->data;
    }

    public function getTimeDaCasa(): Time
    {
        return $this->timeDaCasa;
    }

    public function getTimeVisitante(): Time
    {
        return $this->timeVisitante;
    }

    public function getTempo(): string
    {
        return $this->tempo;
    }

    public function getPlacar(): Placar
    {
        return $this->placar;
    }

    public function setEstatistica(?Estatistica $estatistica)
    {
        $this->estatistica = $estatistica;
    }

    public function getEstatistica(): ?Estatistica
    {
        return $this->estatistica;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
