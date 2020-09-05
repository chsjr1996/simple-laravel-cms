<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FieldValidationError extends Component
{
    /**
     * The field name
     *
     * @var string
     */
    public $field;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($field)
    {
        $this->field = $field;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.field-validation-error');
    }
}
