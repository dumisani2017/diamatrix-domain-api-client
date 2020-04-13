<?php

namespace Vooyd\DomainApiClient\Responses;

use Vooyd\DomainApiClient\Structures\Domain;
use Vooyd\DomainApiClient\Structures\Reseller;

class DomainsListResponse extends AbstractResponse
{
    public int $total;

    public int $filterTotal;

    public int $returnedTotal;

    public Reseller $reseller;

    public array $domains = [];

    public function __construct(string $content)
    {
        $contentObj = json_decode($content);

        $this->responseCode = $contentObj->intReturnCode;
        $this->responseMessage = $contentObj->strMessage;
        $this->total = $contentObj->intTotal;
        $this->filterTotal = $contentObj->intFilterTotal;
        $this->returnedTotal = $contentObj->intReturnedTotal;

        foreach ($contentObj->arrDomains as $domain) {
            $this->domains[] = new Domain(
                $domain->strDomainName,
                $domain->contactName,
                $domain->status,
                $domain->eppStatus,
                $domain->createdDate,
                $domain->expiryDate,
                boolval($domain->autorenew),
                $domain->nameservers
            );
        }

        $this->reseller = new Reseller(
            $contentObj->objReseller->username,
            $contentObj->objReseller->balance,
            $contentObj->objReseller->accountType,
            $contentObj->objReseller->lowBalance
        );
    }
}
