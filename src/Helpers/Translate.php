<?php

namespace BotecoScore\Helpers;

class Translate
{
    private static array $dicionary = [
        "FIRST_HALF" => "1° Tempo",
        "HALF_TIME" => "1° Tempo",
        "SECOND_HALF" => "2° Tempo",
        "LIVE" => "Ao vivo",
        "FINISHED" => "Finalizada",
        "SCHEDULED" => "Agendada",
        "POSTPONED" => "Adiado",
        "CANCELED" => "Cancelado"
    ];

    public static function get(string $word): string
    {

        if (array_key_exists($word, self::$dicionary)) {

            return self::$dicionary[$word];
        }

        return $word;
    }
}
