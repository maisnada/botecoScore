<?php

namespace BotecoScore\Controller;

use Nyholm\Psr7\Response;
use BotecoScore\Helpers\RenderHtml;
use BotecoScore\Service\EventoService;
use BotecoScore\Service\TorneioService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Home implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $torneioService = new TorneioService();

        $torneios = $torneioService->listaDeTorneiosAoVivo();

        $html = RenderHtml::render(
            'torneios/listaDeTorneiosAoVivo.php',
            [
                'titulo' => 'Torneios ao vivo',
                'torneios' => $torneios
            ]
        );

        return new Response(200, [], $html);
    }
}
