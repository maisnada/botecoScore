<?php

namespace BotecoScore\Infra\Api;

use BotecoScore\Infra\Api\ApiInterface;
use Exception;
use GuzzleHttp\Client;
use RuntimeException;


class FlashScore implements ApiInterface
{
    private string $baseUrl;
    private array $header;

    public function __construct()
    {

        $this->baseUrl = getenv('BASE_URL');
        $this->header = [
            'x-rapidapi-host' => getenv('HOST_HEADER'),
            'x-rapidapi-key' => getenv('KEY_HEADER')
        ];
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
