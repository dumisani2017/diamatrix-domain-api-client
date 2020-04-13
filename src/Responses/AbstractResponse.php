<?php

namespace Vooyd\DomainApiClient\Responses;

use Vooyd\DomainApiClient\Interfaces\ApiResponseInterface;

class AbstractResponse implements ApiResponseInterface
{
    public int $responseCode;

    public string $responseMessage;

    public function getResponseCode(): int
    {
        return $this->responseCode;
    }

    public function getResponseMessage(): string
    {
        return $this->responseMessage;
    }

    public function toArray(): array
    {
        return json_decode(json_encode($this), true);
    }
}
