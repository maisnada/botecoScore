<?php

namespace BotecoScore\Helpers;

class Parse
{
    public static function jsonToArray(string $json): array
    {

        return json_decode($json, true);
    }
}
