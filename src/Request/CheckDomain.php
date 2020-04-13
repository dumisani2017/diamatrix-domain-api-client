<?php

namespace Vooyd\DomainApiClient\Request;

use Vooyd\DomainApiClient\Interfaces\ApiRequestInterface;
use Vooyd\DomainApiClient\Responses\CheckDomainResponse;

class CheckDomain extends AbstractRequest
{
    private string $sid;
    private string $tld;
    private string $endpoint = '';

    public function __construct(string $domain)
    {
        parent::__construct();

        $this->sid = $domain;
        $this->tld = $domain;
    }

    public function getEndPoint(): string
    {
        return $this->endpoint;
    }

    public function getResponseObject(string $contents): ApiRequestInterface
    {
        return new CheckDomainResponse();
    }
}
