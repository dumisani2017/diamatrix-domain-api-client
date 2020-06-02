# DiaMatrix Domain Api Client

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require vooyd/diamatrix-domain-api-client
```

## Usage
The purpose of this section is to help developers undestand the inputs required when creating a request and the output to be expected when you get a response from the API. This document has five requests that can be made as well as their expected responses. 

Lets get started.

1. CheckDomain.php  

To Check avalability of a domain provide the name of the domain you seek to validate on the constructor. 

Request

```bash
public function __construct(string $domain)

```

Response

```bash
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
```
2. DomainsList

To list all the domains in your reseller account. 

Request
``` bash

    protected string $endpoint = 'domainList';
    protected int $startPoint;
    protected ?string $filter;
    protected string $order;
    protected string $sortBy;
    protected int $limit;
````

Response

You will get a list of all the domains in your reseller account and the information associated to each domain such as Domain name, Contact name, the status of the domain, created date and expry date and a true value if the domain has an auto renew option.

```bash
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
```

3. RenewDomain

To renew an existing domain from your reseller account instantaneously. 

Request

```bash
public function __construct(string $domain)
```
Response

```bash
 public function __construct(string $content)
 {
        $contentObj = json_decode($content);

        $this->responseCode = $contentObj->intReturnCode;
        $this->responseMessage = $contentObj->strMessage;
        $this->domain = $contentObj->strDomainName;
        $this->expires_at = $contentObj->intExDate;

        $this->reseller = new Reseller(
            $contentObj->objReseller->username,
            $contentObj->objReseller->balance,
            $contentObj->objReseller->accountType,
            $contentObj->objReseller->lowBalance
        );
}   
```
Your response will contain the new expiry date on the response and the domain name.

4. RegisterDomain

To register a new domain on your reseller account. 

Request

```bash
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
```
Provide an array of the required fields to the RegisterDomain class object. 

Response
```bash
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

```
Returns domain information such as the domain name, creation dare and Expiry date. 

Hope this information is useful for you to start using this client-API. Enjoy!

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [Aubrey Hlungwane][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/vooyd/diamatrix-domain-api-client.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/vooyd/diamatrix-domain-api-client.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/vooyd/diamatrix-domain-api-client/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/vooyd/diamatrix-domain-api-client
[link-downloads]: https://packagist.org/packages/vooyd/diamatrix-domain-api-client
[link-travis]: https://travis-ci.org/vooyd/diamatrix-domain-api-client
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/vooyd
[link-contributors]: ../../contributors
