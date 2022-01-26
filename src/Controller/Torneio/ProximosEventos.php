<?php

namespace BotecoScore\Controller\Torneio;

use Nyholm\Psr7\Response;
use BotecoScore\Helpers\RenderHtml;
use BotecoScore\Service\TorneioService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ProximosEventos implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $torneioService = new TorneioService();

        $torneios = $torneioService->proximosEventos();

        $html = RenderHtml::render(
            'torneios/proximosEventos.php',
            [
                'titulo' => 'Próximos partidas',
                'torneios' => $torneios
            ]
        );

        return new Response(200, [], $html);
    }
}
