<?php

namespace BotecoScore\Infra\Cache;

use Dotenv\Dotenv;
use Predis\Client;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
$dotenv->load();

class ConnectionFactory
{
    public static function getConnection(): Client
    {

        return new Client([
            'host' => $_ENV['REDIS_HOST'],
            'port' => $_ENV['REDIS_PORT'],
            'password' => $_ENV['REDIS_PASSWORD'],
        ]);
    }
}
