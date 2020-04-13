<?php

namespace Vooyd\DomainApiClient\Structures;

class Domain
{
    public string $domainName;

    public string $contactName;

    public string $status;

    public string $eppStatus;

    public int $createdDate;

    public int $expiryDate;

    public bool $autorenew;

    public array $nameservers = [];

    /**
     * Domain constructor.
     * @param string $domainName
     * @param string $contactName
     * @param string $status
     * @param string $eppStatus
     * @param int $createdDate
     * @param int $expiryDate
     * @param bool $autorenew
     * @param array $nameservers
     */
    public function __construct(
        string $domainName,
        string $contactName,
        string $status,
        string $eppStatus,
        int $createdDate,
        int $expiryDate,
        bool $autorenew,
        array $nameservers
    ) {
        $this->domainName = $domainName;
        $this->contactName = $contactName;
        $this->status = $status;
        $this->eppStatus = $eppStatus;
        $this->createdDate = $createdDate;
        $this->expiryDate = $expiryDate;
        $this->autorenew = $autorenew;
        $this->nameservers = $nameservers;
    }
}
