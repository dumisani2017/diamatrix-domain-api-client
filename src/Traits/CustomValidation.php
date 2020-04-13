<?php

namespace Vooyd\DomainApiClient\Traits;

use Vooyd\DomainApiClient\Exceptions\MissingParameterException;

trait CustomValidation
{
    public function validate(array $required, array $inputs): void
    {
        $result = array_diff($required, array_keys($inputs));

       if (!empty($result)) {
           throw new MissingParameterException($result);
       }
    }
}
