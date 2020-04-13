<?php

namespace Vooyd\DomainApiClient\Structures;

class Reseller
{
    public string $username;

    public float $balance;

    public string $accountType;

    public bool $lowBalance;

    /**
     * Reseller constructor.
     * @param string $username
     * @param float $balance
     * @param string $accountType
     * @param bool $lowBalance
     */
    public function __construct(string $username, float $balance, string $accountType, bool $lowBalance)
    {
        $this->username = $username;
        $this->balance = $balance;
        $this->accountType = $accountType;
        $this->lowBalance = $lowBalance;
    }
}
