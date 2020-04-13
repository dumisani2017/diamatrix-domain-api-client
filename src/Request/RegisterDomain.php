<?php

namespace Vooyd\DomainApiClient\Request;

use Vooyd\DomainApiClient\Responses\RegisterDomainResponse;
use Vooyd\DomainApiClient\Traits\CustomValidation;
use Vooyd\DomainApiClient\Interfaces\ApiResponseInterface;

class RegisterDomain extends AbstractRequest
{
    use CustomValidation;

    protected $required = [
        'domain',
        'registrantName',
        'registrantEmail',
        'registrantContactNumber',
        'registrantAddress1',
        'registrantAddress2',
        'registrantPostalCode',
        'registrantCountry',
        'registrantCompany',
        'registrantCity',
        'registrantProvince',
    ];

    protected $endpoint = 'create';

    protected string $registrantName;

    protected string $registrantEmail;

    protected string $registrantContactNumber;

    protected string $registrantAddress1;

    protected string $registrantAddress2;

    protected string $registrantPostalCode;

    protected string $registrantCountry;

    protected string $registrantCompany;

    protected string $registrantCity;

    protected string $registrantProvince;

    protected string $ns1;

    protected string $ns2;

    public function __construct(array $inputs)
    {
        parent::__construct();

        $this->validate($this->required, $inputs);

        $domain = $inputs['domain'];
        $sidPosition = strpos($domain, '.');

        $this->sld = substr($domain, 0, $sidPosition);
        $this->tld = substr($domain, $sidPosition + 1);
        $this->ns1 = config('domain.ns1');
        $this->ns2 = config('domain.ns2');

        $this->fill($inputs);

        $this->paramsBlackList[] = 'required';
    }

    public function getResponseObject(string $content): ApiResponseInterface
    {
        return new RegisterDomainResponse($content);
    }
}
