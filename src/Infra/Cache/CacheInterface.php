<?php

namespace BotecoScore\Infra\Cache;

interface CacheInterface
{
    public function save(string $key, string $value, int $ttlInSeconds = 36000): void;

    public function get(string $key): ?string;

    public function delete(string|array $vars): int;

    public function isCached(string $key): bool;
}
