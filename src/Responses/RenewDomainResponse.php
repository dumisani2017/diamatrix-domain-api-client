<?php

namespace Vooyd\DomainApiClient\Responses;

class RenewDomainResponse extends AbstractResponse
{
    public string $domain;

    public int $expires_at;

    public function __construct(string $content)
    {
        $contentObj = json_decode($content);

        $this->responseCode = $contentObj->intReturnCode;
        $this->responseMessage = $contentObj->strMessage;
        $this->domain = $contentObj->strDomainName;
        $this->expires_at = $contentObj->intExDate;
    }
}
