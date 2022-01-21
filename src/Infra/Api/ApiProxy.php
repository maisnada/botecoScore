<?php

namespace BotecoScore\Infra\Api;

use Exception;
use BotecoScore\Infra\Cache\Cache;
use BotecoScore\Infra\Api\FlashScore;
use BotecoScore\Infra\Api\ApiInterface;
use BotecoScore\Infra\Cache\CacheInterface;
use RuntimeException;

\Sentry\init(['dsn' => 'https://9b82b386b2df47ee9f2c88e73b49808a@o350034.ingest.sentry.io/6153379']);


class ApiProxy implements ApiInterface
{
    private ApiInterface $api;
    private CacheInterface $cache;

    public function __construct()
    {
        $this->api = new FlashScore();
        $this->cache = new Cache();
    }

    public function sendRequest(string $method = "GET", string $resource, array $param = array()): ?string
    {
        $keyResource = $resource;

        $keys = array_keys($param);

        foreach ($keys as $key) {

            if (str_contains($key, "_id") || $key === "id") {

                $keyResource = "{$resource}/{$param[$key]}";

                break;
            }
        }

        if ($this->cache->isCached($keyResource)) {

            // echo $keyResource . ' - Cache' . PHP_EOL;

            return $this->cache->get($keyResource);
        }

        try {

            $json = $this->api->sendRequest($method, $resource, $param);

            // echo $keyResource . ' - Req';

            $this->cache->save($keyResource, $json);

            return $json;
        } catch (Exception $e) {

            //throw new Exception("My first Sentry error!");

            return null;
        }
    }
}
