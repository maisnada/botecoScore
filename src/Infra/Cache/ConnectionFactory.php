<?php

namespace BotecoScore\Infra\Cache;

use Predis\Client;

class ConnectionFactory
{
    public static function getConnection(): Client
    {

        return new Client([
            'host' => getenv('REDIS_HOST'),
            'port' => getenv('REDIS_PORT'),
            'password' => getenv('REDIS_PASSWORD'),
        ]);
    }
}
