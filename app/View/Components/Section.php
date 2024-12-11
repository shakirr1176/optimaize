<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;

class Section extends Component
{
    public function render(): Closure
    {
        return static function ($componentData) {
            return <<<BLADE
                @section("{$componentData['attributes']->get('name')}")
                    {$componentData['slot']}
                @endsection
            BLADE;
        };
    }
}
