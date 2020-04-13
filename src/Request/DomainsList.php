<?php

namespace Vooyd\DomainApiClient\Request;

use Vooyd\DomainApiClient\Responses\DomainsListResponse;
use Vooyd\DomainApiClient\Interfaces\ApiResponseInterface;

class DomainsList extends AbstractRequest
{
    protected string $endpoint = 'domainList';
    protected int $startPoint;
    protected ?string $filter;
    protected string $order;
    protected string $sortBy;
    protected int $limit;

    /**
     * DomainsList constructor.
     * @param int $startPoint
     * @param string $filter
     * @param string $order
     * @param string $sortBy
     * @param int $limit
     */
    public function __construct(
        ?string $filter,
        int $startPoint,
        string $order,
        string $sortBy,
        int $limit
    ) {

        parent::__construct();

        $this->startPoint = $startPoint;
        $this->filter = $filter;
        $this->order = $order;
        $this->sortBy = $sortBy;
        $this->limit = $limit;
    }

    public function getResponseObject(string $content): ApiResponseInterface
    {
        return new DomainsListResponse($content);
    }
}
