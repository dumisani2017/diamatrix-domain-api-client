<?php

namespace Vooyd\DomainApiClient\Request;

use Vooyd\DomainApiClient\Interfaces\ApiRequestInterface;

abstract class AbstractRequest implements ApiRequestInterface
{
    protected string $key;

    public function __construct()
    {
        $this->key = config('domain.apiKey');
    }

    public function getRequestParameters(): array
    {

    }
}
