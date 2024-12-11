<?php

namespace App\Providers;

use App\Macros\BulkUpdate;
use App\Macros\Search;
use App\Macros\ToggleStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class EloquentServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Builder::macro('bulkUpdate', function (array $attributes) {
            /**
             * @var $this Builder
             */
            return with(new BulkUpdate($this, $attributes))->execute();
        });

        Builder::macro('toggleStatus', function (string $attribute = 'is_active') {
            /**
             * @var $this Builder
             */
            return with(new ToggleStatus($this, $attribute))->execute();
        });

        Builder::macro('isActive', function (string $attribute = 'is_active') {
            /**
             * @var $this Builder
             */
            return $this->where($attribute, ACTIVE);
        });

        Builder::macro('search', function (array $searchableColumns, string $term = null, bool $strict = false, $operator = '=') {
            /**
             * @var $this Builder
             */
            return with(new Search($this, $searchableColumns, $term, $strict, $operator))->execute();
        });
    }
}
