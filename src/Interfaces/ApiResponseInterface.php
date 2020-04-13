<?php

namespace Vooyd\DomainApiClient\Interfaces;

/**
 * Interface ApiResponseInterface
 * @package Vooyd\DomainApiClient\Interfaces
 */
interface ApiResponseInterface
{
    public function getResponseCode(): int;
    public function getResponseMessage(): string;
    public function toArray(): array;
}
