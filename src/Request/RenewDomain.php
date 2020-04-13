<?php

namespace Vooyd\DomainApiClient\Request;

use Vooyd\DomainApiClient\Responses\RenewDomainResponse;
use Vooyd\DomainApiClient\Interfaces\ApiResponseInterface;

class RenewDomain extends AbstractRequest
{
    protected string $sld;
    protected string $tld;
    protected string $endpoint = 'renew';

    public function __construct(string $domain)
    {
        parent::__construct();

        $sidPosition = strpos($domain, '.');

        $this->sld = substr($domain, 0, $sidPosition);
        $this->tld = substr($domain, $sidPosition + 1);
    }

    public function getResponseObject(string $content): ApiResponseInterface
    {
        return new RenewDomainResponse($content);
    }
}
