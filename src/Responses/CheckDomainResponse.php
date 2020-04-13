<?php

namespace Vooyd\DomainApiClient\Responses;

use Vooyd\DomainApiClient\Structures\Reseller;

class CheckDomainResponse extends AbstractResponse
{
    public bool $isAvailable;

    public int $maxRegTerm;

    public Reseller $reseller;

    public function __construct(string $content)
    {
        $contentObj = json_decode($content);

        $this->responseCode = $contentObj->intReturnCode;
        $this->responseMessage = $contentObj->strMessage;
        $this->isAvailable = $contentObj->isAvailable === "true";
        $this->maxRegTerm = $contentObj->intMaxRegTerm;

        $this->reseller = new Reseller(
            $contentObj->objReseller->username,
            $contentObj->objReseller->balance,
            $contentObj->objReseller->accountType,
            $contentObj->objReseller->lowBalance
        );
    }
}
