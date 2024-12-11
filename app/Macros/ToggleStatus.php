<?php


namespace App\Macros;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ToggleStatus
{
    private Builder $builder;
    private string $attribute;

    public function __construct(Builder $builder, string $attribute)
    {
        $this->builder = $builder;
        $this->attribute = $attribute;
    }
    public function execute(): bool|int
    {
        $bindings = $this->builder->getBindings();
        if(empty($bindings)) {
            $this->builder->getModel()->setAttribute(
                $this->attribute,
                !$this->builder->getModel()->getAttribute($this->attribute)
            );

            return $this->builder->getModel()->update();
        }
        return $this->builder->update([$this->attribute => DB::raw("NOT $this->attribute")]);
    }
}
