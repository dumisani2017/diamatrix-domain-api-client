<?php

namespace Vooyd\DomainApiClient\Responses;

use Vooyd\DomainApiClient\Structures\Reseller;

class RegisterDomainResponse extends AbstractResponse
{
    public string $domain;

    public int $created_at;

    public int $expires_at;

    public function __construct(string $content)
    {
        $contentObj = json_decode($content);

        $this->responseCode = $contentObj->intReturnCode;
        $this->responseMessage = $contentObj->strMessage;
        $this->domain = $contentObj->strDomainName;
        $this->created_at = $contentObj->intCrDate;
        $this->expires_at = $contentObj->intExDate;

        $this->reseller = new Reseller(
            $contentObj->objReseller->username,
            $contentObj->objReseller->balance,
            $contentObj->objReseller->accountType,
            $contentObj->objReseller->lowBalance
        );
    }
}
