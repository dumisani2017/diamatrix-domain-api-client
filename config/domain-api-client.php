<?php

return [
    'apiKey' => ENV('DOMAINS_API_KEY'),
    'base_uri' => ENV('DOMAIN_BASE_URL', 'https://api-v3.domains.co.za/api/domain/'),
    'timeout' => ENV('DOMAINS_API_TIME_OUT', 2.0)
];
