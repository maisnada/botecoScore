<?php

namespace BotecoScore\Infra\Api;


use Exception;

use RuntimeException;
use GuzzleHttp\Client;
use BotecoScore\Infra\Api\ApiInterface;

class FlashScore implements ApiInterface
{
    private string $baseUrl = 'https://flashscore.p.rapidapi.com/v1';
    private array $header = [
        'x-rapidapi-host' => 'flashscore.p.rapidapi.com',
        'x-rapidapi-key' => 'e66299dea8msha5cf24ed0fd8edbp1db7e4jsn68c78ac2a5d7'
    ];

    public function __construct()
    {
    }

    public function sendRequest(string $method = "GET", string $resource, array $param = array()): ?string
    {
        $clientHttp = new Client();

        $data = [
            "headers" => $this->header,
            "query" => $param,
            "http_errors" => false
        ];

        $response = $clientHttp->request($method, "{$this->baseUrl}/{$resource}", $data);

        if ($response->getStatusCode() !== 200) {

            throw new Exception($response->getBody());
        }

        return $response->getBody();
    }
}
