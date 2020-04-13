<?php

namespace Vooyd\DomainApiClient\Request;

use Vooyd\DomainApiClient\Interfaces\ApiRequestInterface;
use Vooyd\DomainApiClient\Interfaces\ApiResponseInterface;
use Vooyd\DomainApiClient\Responses\CheckDomainResponse;

class CheckDomain extends AbstractRequest
{
    protected string $sld;
    protected string $tld;
    protected string $endpoint = 'check';

    public function __construct(string $domain)
    {
        parent::__construct();

        $sidPosition = strpos($domain, '.');

        $this->sld = substr($domain, 0, $sidPosition);
        $this->tld = substr($domain, $sidPosition + 1);
    }

    public function getResponseObject(string $contents): ApiResponseInterface
    {
        return new CheckDomainResponse($contents);
    }
}
