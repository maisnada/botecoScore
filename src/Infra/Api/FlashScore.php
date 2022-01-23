<?php

namespace BotecoScore\Infra\Api;

use BotecoScore\Infra\Api\ApiInterface;
use Dotenv\Dotenv;
use Exception;
use GuzzleHttp\Client;
use RuntimeException;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
$dotenv->load();

class FlashScore implements ApiInterface
{
    private string $baseUrl;
    private array $header;

    public function __construct()
    {

        $this->baseUrl = $_ENV['BASE_URL'];
        $this->header = [
            'x-rapidapi-host' => $_ENV['HOST_HEADER'],
            'x-rapidapi-key' => $_ENV['KEY_HEADER']
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
