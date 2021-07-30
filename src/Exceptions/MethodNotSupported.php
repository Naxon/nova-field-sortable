<?php

namespace Naxon\NovaFieldSortable\Exceptions;

use Exception;

class MethodNotSupported extends Exception
{
    public function __construct(string $method)
    {
        parent::__construct("Method {$method} is not supported in Sortable fields. Sortable fields can be displayed only in index views.");
    }
}
