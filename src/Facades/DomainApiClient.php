<?php

namespace Vooyd\DomainApiClient\Facades;

use Illuminate\Support\Facades\Facade;

class DomainApiClient extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'domain-api-client';
    }
}
