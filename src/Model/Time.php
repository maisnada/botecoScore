<?php

namespace BotecoScore\Model;

class Time
{
    private string $id;
    private string $nomeCompleto;
    private string $escudo;

    public function __construct(string $id, string $nomeCompleto, string $escudo)
    {

        $this->id = $id;
        $this->nomeCompleto = $nomeCompleto;
        $this->escudo = $escudo;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getNomeCompleto(): string
    {
        return $this->nomeCompleto;
    }

    public function getEscudo(): string
    {
        return $this->escudo;
    }
}
