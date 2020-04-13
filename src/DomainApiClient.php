<?php

namespace Vooyd\DomainApiClient;

use GuzzleHttp\Client;
use Vooyd\DomainApiClient\Interfaces\ApiRequestInterface;
use Vooyd\DomainApiClient\Interfaces\ApiResponseInterface;

class DomainApiClient
{
    private Client $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => config('domain.base_uri'),
            'timeout' => config('domain.timeout'),
        ]);
    }

    public function sendRequest(ApiRequestInterface $apiRequest): ApiResponseInterface
    {
       $response = $this->httpClient->post($apiRequest->getEndPoint(), [
            'form_params' => $apiRequest->getRequestParameters()
        ]);

       return $apiRequest->getResponseObject($response->getBody()->getContents());
    }
}
