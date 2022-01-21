<?php

namespace BotecoScore\Controller\Evento;

use BotecoScore\Helpers\RenderHtml;
use Nyholm\Psr7\Response;
use BotecoScore\Service\EventoService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Resumo implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $queryString = $request->getQueryParams();

        $id = $queryString['id'];

        $s = new EventoService();

        $evento = $s->getById($id);

        $html = RenderHtml::render(
            'eventos/resumo.php',
            [
                'titulo' => 'Resumo',
                'evento' => $evento
            ]
        );

        return new Response(200, [], $html);
    }
}
