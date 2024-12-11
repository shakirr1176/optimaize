<?php


namespace App\Macros;

use Illuminate\Database\Eloquent\Builder;

class Search
{
    private Builder $builder;
    private array $searchableColumns;
    private ?string $term;
    private bool $strict;
    private mixed $operator;

    public function __construct(Builder $builder, array $searchableColumns, string $term = null, bool $strict = false, $operator = '=')
    {
        $this->builder = $builder;
        $this->searchableColumns = $searchableColumns;
        $this->term = $term;
        $this->strict = $strict;
        $this->operator = $operator;
    }

    public function execute(): Builder
    {
        if (empty($this->searchableColumns) || empty($this->term)) {
            return $this->builder;
        }

        $this->builder->where(function ($query) {
            if (isset($this->searchableColumns['original'])) {
                foreach ($this->searchableColumns['original'] as $searchableColumn) {
                    foreach ($this->convertSearchTermToArray($this->term) as $termPart) {
                        if ($this->strict) {
                            $query->orWhere($searchableColumn, $this->operator, $termPart);
                        } else {
                            $query->orWhere($searchableColumn, 'like', '%' . $termPart . '%');
                        }
                    }
                }
            }

            if (isset($this->searchableColumns['relations'])) {
                foreach ($this->searchableColumns['relations'] as $relation => $relationColumns) {
                    $query->orWhereHas($relation, function ($relationQuery) use ($relationColumns) {
                        $relationQuery->where(function ($query) use ($relationColumns) {
                            foreach ($relationColumns as $relationColumn) {
                                foreach ($this->convertSearchTermToArray($this->term) as $termPart) {
                                    if ($this->strict) {
                                        $query->orWhere($relationColumn, $this->operator, $termPart);
                                    } else {
                                        $query->orWhere($relationColumn, 'like', '%' . $termPart . '%');
                                    }
                                }
                            }
                        });
                    });
                }
            }
        });

        return $this->builder;
    }

    private function convertSearchTermToArray($term): array
    {
        $reservedSymbols = ['-', '+', '<', '>', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);
        return explode(' ', $term);
    }
}
