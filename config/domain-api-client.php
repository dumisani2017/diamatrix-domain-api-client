<?php

return [
    'apiKey' => ENV('DOMAINS_API_KEY'),
    'base_uri' => ENV('DOMAIN_BASE_URL', 'https://api-v3.domains.co.za/api/domain/domain/'),
    'timeout' => ENV('DOMAINS_API_TIME_OUT', 2.0),
    'ns1' => ENV('FIRST_NAME_SERVER'),
    'ns2' => ENV('SECOND_NAME_SERVER'),
];
