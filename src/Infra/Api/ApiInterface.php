<?php

namespace BotecoScore\Infra\Api;

interface ApiInterface
{
    public function sendRequest(string $method = "GET", string $resource, array $param = array()): ?string;
}
