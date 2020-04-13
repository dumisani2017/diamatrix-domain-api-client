<?php

namespace Vooyd\DomainApiClient\Exceptions;

use Throwable;

class MissingParameterException extends \Exception
{
    public function __construct(array $inputs, int $code = 0, Throwable $previous = null)
    {
        $message = "The following fields are also required: [" . implode(', ', $inputs) . "]";
        parent::__construct($message, $code, $previous);
    }
}
