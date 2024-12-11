<?php


namespace App\Macros;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class BulkUpdate
{
    private Builder $builder;
    private array $attributes;

    public function __construct(Builder $builder, array $attributes)
    {
        $this->builder = $builder;
        $this->attributes = $attributes;
    }

    public function execute(): bool|int
    {
        if (empty($this->attributes)) {
            return false;
        }

        $table = $this->builder->getModel()->getTable();
        $sql = "UPDATE $table SET ";
        $updatableFieldSeparator = '';

        $updatableFields = $this->getUpdatableFields($this->attributes);

        if (empty($updatableFields)) {
            return false;
        }

        foreach ($updatableFields as $updatableField) {
            //for each updatable field
            $sql .= $updatableFieldSeparator;
            $sql .= "$updatableField = (CASE";
            foreach ($this->attributes as $i => $iValue) {
                if (!isset($iValue['fields'][$updatableField])) {
                    continue;
                }
                $sql .= " WHEN ";
                $conditionalSyntax = '';

                // for each condition
                foreach ($iValue['conditions'] as $conditionalKey => $conditionalValue) {
                    if (is_array($conditionalValue)) {
                        $sql .= $conditionalSyntax . "$conditionalKey $conditionalValue[0] $conditionalValue[1]";
                    } else {
                        $sql .= $conditionalSyntax . "$conditionalKey='$conditionalValue'";
                    }
                    $conditionalSyntax = ' AND ';
                }

                $updatableFieldValue = $this->attributes[$i]['fields'][$updatableField];

                if (is_array($updatableFieldValue)) {
                    if ($updatableFieldValue[0] === 'increment') {
                        $sql .= " THEN $updatableField + $updatableFieldValue[1]";
                    } elseif ($updatableFieldValue[0] === 'decrement') {
                        $sql .= " THEN $updatableField - $updatableFieldValue[1]";
                    } else {
                        $sql .= " THEN $updatableFieldValue[1]";
                    }
                } else {
                    $sql .= " THEN '$updatableFieldValue'";
                }
            }
            $sql .= " ELSE $updatableField END) ";
            $updatableFieldSeparator = ', ';
        }

        $conditionalClause = "WHERE ";
        $conditionalFieldSeparator = '(';

        foreach ($this->attributes as $value) {
            $innerSeparator = '';
            $conditionalClause .= $conditionalFieldSeparator;
            foreach ($value['conditions'] as $conditionalKey => $conditionalValue) {
                if (is_array($conditionalValue)) {
                    $conditionalClause .= $innerSeparator . "$conditionalKey $conditionalValue[0] $conditionalValue[1]";
                } else {
                    $conditionalClause .= $innerSeparator . "$conditionalKey='$conditionalValue'";
                }
                $innerSeparator = ' AND ';
            }
            $conditionalClause .= ')';
            $conditionalFieldSeparator = ' OR (';
        }
        $sql .= $conditionalClause;

        return DB::update($sql);
    }

    private function getUpdatableFields($values): array|bool
    {
        foreach ($values as $value) {
            if (count(array_intersect_key($value['fields'], $value['conditions'])) >= 2) {
                return false;
            }

        }

        $fields = array_merge(...array_column($values, 'fields'));
        $conditions = array_merge(...array_column($values, 'conditions'));

        $fields = array_keys($fields);
        $conditions = array_keys($conditions);
        $commonFields = array_intersect($fields, $conditions);
        if (count($commonFields) >= 1) {
            $fields = array_merge(array_diff($fields, $commonFields), $commonFields);
        }
        return $fields;
    }
}
