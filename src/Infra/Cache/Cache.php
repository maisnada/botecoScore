<?php

namespace BotecoScore\Infra\Cache;

use Predis\Client;
use BotecoScore\Infra\Cache\CacheInterface;

class Cache implements CacheInterface
{
    private Client $client;

    public function __construct()
    {
        $this->client = ConnectionFactory::getConnection();
    }

    public function save(string $key, string $value, int $ttlInSeconds = 36000): void
    {
        $this->client->set($key, $value);

        $this->client->expire($key, $ttlInSeconds);
    }

    public function get(string $key): ?string
    {
        return $this->client->get($key);
    }

    public function delete(array|string $vars): int
    {
        return $this->client->del($vars);
    }

    public function isCached(string $key): bool
    {

        if ($this->get($key)) {

            return true;
        }

        return false;
    }
}
