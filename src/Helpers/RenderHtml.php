<?php

namespace BotecoScore\Helpers;

class RenderHtml
{

    public static function render(string $caminhoTemplate, array $dados): string
    {
        extract($dados);

        ob_start();

        require __DIR__ . '/../../view/' . $caminhoTemplate;

        $html = ob_get_clean();

        return $html;
    }
}
