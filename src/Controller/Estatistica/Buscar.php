<?php

namespace BotecoScore\Controller\Estatistica;

use Nyholm\Psr7\Response;
use BotecoScore\Helpers\RenderHtml;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use BotecoScore\Service\EstatisticaService;

class Buscar implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $queryString = $request->getQueryParams();

        $id = $queryString['id'];

        $estatisticaService = new EstatisticaService();

        $estatistica = $estatisticaService->getById($id);

        $html = RenderHtml::render(
            'estatistica/buscar.php',
            [
                'estatistica' => $estatistica
            ]
        );

        return new Response(200, [], $html);
    }
}
