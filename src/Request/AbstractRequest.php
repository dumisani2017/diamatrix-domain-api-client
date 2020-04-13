<?php

namespace Vooyd\DomainApiClient\Request;

use Vooyd\DomainApiClient\Interfaces\ApiRequestInterface;

abstract class AbstractRequest implements ApiRequestInterface
{
    protected string $key;

    protected array $paramsBlackList = [
        'paramsBlackList',
        'endpoint'
    ];

    public function __construct()
    {
        $this->key = config('domain.apiKey');
    }

    public function getRequestParameters(): array
    {
        $reflector = new \ReflectionObject($this);
        $params = [];

        foreach ($reflector->getProperties() as $property) {
            if (!in_array($property->name, $this->paramsBlackList)) {
                $params[$property->name] =  $this->{$property->name};
            }
        }

        return $params;
    }
}
