<?php

namespace Naxon\NovaFieldSortable;

use Laravel\Nova\Fields\Field;
use Naxon\NovaFieldSortable\Exceptions\MethodNotSupported;

class Sortable extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-field-sortable';

    public $showOnIndex = true;
    public $showOnDetail = true;
    public $showOnCreation = false;
    public $showOnUpdate = false;

    public function hideFromDetail($callback = true)
    {
        static::throwMethodNotSupportedException(__METHOD__);
    }

    public function hideWhenCreating($callback = true)
    {
        static::throwMethodNotSupportedException(__METHOD__);
    }

    public function hideWhenUpdating($callback = true)
    {
        static::throwMethodNotSupportedException(__METHOD__);
    }

    public function showOnDetail($callback = true)
    {
        static::throwMethodNotSupportedException(__METHOD__);
    }

    public function showOnCreating($callback = true)
    {
        static::throwMethodNotSupportedException(__METHOD__);
    }

    public function showOnUpdating($callback = true)
    {
        static::throwMethodNotSupportedException(__METHOD__);
    }

    public function onlyOnDetail()
    {
        static::throwMethodNotSupportedException(__METHOD__);
    }

    public function onlyOnForms()
    {
        static::throwMethodNotSupportedException(__METHOD__);
    }

    public function exceptOnForms()
    {
        static::throwMethodNotSupportedException(__METHOD__);
    }

    private static function throwMethodNotSupportedException(string $method): void
    {
        throw new MethodNotSupported(explode('::', $method)[1] ?? $method);
    }
}
