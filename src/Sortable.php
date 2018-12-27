<?php

namespace Naxon\NovaFieldSortable;

use Laravel\Nova\Fields\Field;

class Sortable extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-field-sortable';
    
    public function __construct()
    {
        $this->exceptOnForms();
    }
}
