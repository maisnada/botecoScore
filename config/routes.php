<?php

use BotecoScore\Controller\Home;
use BotecoScore\Controller\Estatistica\Buscar;
use BotecoScore\Controller\Torneio\ProximosEventos;

return [
    '' => Home::class,
    '/estatistica' => Buscar::class,
    '/proximosEventos' => ProximosEventos::class,
];
