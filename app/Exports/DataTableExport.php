<?php

namespace App\Exports;

use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DataTableExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public $queryBuilder;
    public $heading;

    public function __construct($queryBuilder, $heading = [])
    {
        $this->queryBuilder = $queryBuilder;
        $this->heading = $heading;
    }

    public function query()
    {
        return $this->queryBuilder;
    }

    public function headings(): array
    {
        return $this->heading['headers'];
    }

    public function map($row): array
    {
        $columns = Arr::only($row->getOriginal(), $this->heading['original']);
        if (isset($this->heading['relations'])) {
            foreach ($row->getRelations() as $relationName => $relationModel) {
                if ($relationModel) {
                    // dump($relationModel->getOriginal(), $this->heading['relations'][$relationName]);
                    $relationColumns = Arr::only($relationModel->getOriginal(), $this->heading['relations'][$relationName]);
                    foreach ($relationColumns as $relationColumn => $relationValue) {
                        if (array_key_exists($relationColumn, $columns)) {
                            $columns[$relationName.'.'.$relationColumn] = $relationValue;
                        }else {
                            $columns[$relationColumn] = $relationValue;
                        }
                    }
                    // $columns = array_merge($columns, $relationColumns);
                }

            }
        }

        // dd($columns);
        return array_merge(array_flip($this->heading['columns']), $columns);
    }
}
