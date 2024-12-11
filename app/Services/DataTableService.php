<?php

namespace App\Services;

use App\Exports\DataTableExport;
use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RuntimeException;

class DataTableService
{
    public const FIELD_PROPERTIES = [
        'label' => '',
        'label_class' => '',
        'field_name' => '',
        'data_class' => '',
        'display_callable_function' => [
            'name' => '',
            'extra_params' => [],
        ],
        'sortable' => false,
        'searchable' => false,
        'downloadable' => false,
        'filterable' => false,
        'filter_data' => [],
        'visibility' => true,
        'relation_name' => '',
        'linkable' => false,
        'link_data' => [
            'route_name' => '',
            "route_params" => [],
            'primary_key' => 'id',
            'target' => '_self',
        ],
    ];
    public const FILTER_PROPERTIES = [
        "name" => "",
        "has_permission" => false,
        "url" => "javascript:;",
        "target" => "_self",
        "btn_class" => "",
        "btn_type_icon" => false
    ];
    public const SEARCH_PROPERTIES = [
        "name" => "",
        "has_permission" => false,
        "url" => "javascript:;",
        "target" => "_self",
        "btn_class" => "",
        "btn_type_icon" => false
    ];
    public const ACTION_PROPERTIES = [
        "name" => "",
        "route_name" => "",
        "route_params" => [],
        "primary_key" => "id",
        "target" => "_self",
        "link_class" => "",
        "conditions" => [],
        "confirmation" => false,
        "confirmation_data" => [
            "title" => "",
            "method" => "POST",
        ],
        'tooltip' => ''
    ];

    public Request $request;
    protected array $pageOptions;
    protected array $sortableFields = [];
    protected array $filterFields = [];
    protected array $headings = [];
    protected array $appends = [];
    protected string $dateFilterColumn = '';
    protected bool $showDownloadButton = false;
    protected array $datatableFields = [];
    protected array $filterButtons = [];
    protected array $searchButtons = [];
    protected array $actionLinks = [];
    protected bool $enableWithQueryString = false;
    protected array $searchOptions = [];
    protected array $searchConditions = [];
    protected array $searchFields = [];

    public function __construct(Request $request)
    {
        $this->pageOptions = [
            'name' => 'p',
            'per_page' => 10,
            'each_side' => 2,
            'show_per_page_options' => false,
            'per_page_options' => [
                10,
                25,
                50,
                100,
                250,
                500,
            ],
        ];

        $this->searchOptions = [
            'show_searchable_columns' => false,
            'show_search_conditions' => false,
        ];

        $this->searchConditions = [
            'similar' => __('Similar'),
            'exact' => __('Exact'),
        ];

        $this->request = $request;
    }


    /**
     * @throws Exception
     */
    public function create($queryBuilder)
    {
        $perPage = $this->request->get($this->pageOptions['name'] . '-per-page', $this->pageOptions['per_page']);
        $frm = !is_array($this->request->get($this->pageOptions['name'] . '-frm')) ? $this->request->get($this->pageOptions['name'] . '-frm') : null;
        $to = !is_array($this->request->get($this->pageOptions['name'] . '-to')) ? $this->request->get($this->pageOptions['name'] . '-to') : null;

        $this->dateFilter($queryBuilder, $frm, $to);

        $this->filter($queryBuilder);

        $this->search($queryBuilder);
        $this->sort($queryBuilder);
        if ($this->request->isJson()) {
            $extension = $this->request->get('download', 'csv');
            $name = random_string() . '.' . datatable_downloadable_type($extension)['extension'];
            $file = Excel::raw(new DataTableExport($queryBuilder, $this->headings), constant('\Maatwebsite\Excel\Excel::' . strtoupper($extension)));
            response()
                ->json(['file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($file), 'name' => $name])
                ->send();
            return true;
        }

        if ($this->request->has($this->pageOptions['name'] . '-per-page')) {
            $this->appends[$this->pageOptions['name'] . '-per-page'] = $perPage;
            $this->pageOptions['per_page'] = $perPage;
        }

        $result = $queryBuilder->paginate($perPage, ['*'], $this->pageOptions['name'])->appends($this->appends);

        if ($this->enableWithQueryString) {
            $result->withQueryString();
        }

        $result->showDownloadButton = $this->showDownloadButton;
        $result->showDateFilter = $this->dateFilterColumn;
        $result->datatableFields = $this->datatableFields;
        $result->filterButtons = $this->filterButtons;
        $result->searchButtons = $this->searchButtons;
        $result->actionLinks = $this->actionLinks;
        $result->pageOptions = $this->pageOptions;
        $result->searchOptions = $this->searchOptions;
        $result->searchFields = $this->searchFields;
        $result->searchConditions = $this->searchConditions;

        return $result;
    }

    private function dateFilter($queryBuilder, $frm, $to): void
    {
        if ($this->dateFilterColumn) {
            $dateFilterColumn = explode('.', $this->dateFilterColumn);
            if (count($dateFilterColumn) > 1) {
                $relationName = implode('.', array_slice($dateFilterColumn, 0, -1));
                $queryBuilder->whereHas($relationName, function ($query) use ($dateFilterColumn, $frm, $to) {
                    $query->when($frm, function ($query) use ($dateFilterColumn, $frm) {
                        $query->whereDate(end($dateFilterColumn), '>=', $frm);
                    })
                        ->when($to, function ($query) use ($dateFilterColumn, $to) {
                            $query->whereDate(end($dateFilterColumn), '<=', $to);
                        });
                });
            } else {
                $dateFilterColumn = $queryBuilder->getModel()->getTable() . '.' . $this->dateFilterColumn;
                $queryBuilder->when($frm, function ($query) use ($dateFilterColumn, $frm) {
                    $query->whereDate($dateFilterColumn, '>=', $frm);
                })
                    ->when($to, function ($query) use ($dateFilterColumn, $to) {
                        $query->whereDate($dateFilterColumn, '<=', $to);
                    });
            }
        }
    }
    private function filter($queryBuilder): void
    {
        $filterRequest = $this->request->get($this->pageOptions['name'] . '-fltr');
        if (!empty($filterRequest)) {
            $filterRequest = array_intersect_key($filterRequest, $this->filterFields);
            if (!empty($this->filterFields) && is_array($filterRequest)) {
                $this->appends[$this->pageOptions['name'] . '-fltr'] = $filterRequest;
                foreach ($filterRequest as $fieldName => $value) {
                    if (!empty($this->filterFields[$fieldName]['relation_name'])) {
                        $relationName = implode('.', $this->filterFields[$fieldName]['relation_name']);
                        $queryBuilder->whereHas($relationName, function ($query) use ($fieldName, $value) {
                            $query->whereIn($fieldName, $value);
                        });
                    } else {
                        $queryBuilder->whereIn($fieldName, $value);
                    }
                }
            }
        }
    }

    private function search($queryBuilder): void
    {
        $isStrict = false;
        $searchTerm = $this->request->get($this->pageOptions['name'] . '-srch');
        $searchCondition = $this->request->get($this->pageOptions['name'] . '-srch-cond');
        $searchField = $this->request->get($this->pageOptions['name'] . '-srch-field');
        if (!array_key_exists($searchCondition, $this->searchConditions)) {
            $searchCondition = 'similar';
        }

        if (!array_key_exists($searchField, $this->searchFields)) {
            $searchField = 'all';
        }

        if ($searchTerm && count($this->searchFields) > 0) {
            $searchFields = [];
            foreach ($this->searchFields as $fieldName => $properties) {
                if ($searchField != 'all' && $fieldName != $searchField) {
                    continue;
                }

                if ($properties['relation_name']) {
                    if (is_array($properties['relation_name'])) {
                        $properties['relation_name'] = implode('.', $properties['relation_name']);
                    }

                    $searchFields['relations'][$properties['relation_name']][] = $fieldName;
                } else {
                    $searchFields['original'][] = $fieldName;
                }
            }

            $this->appends[$this->pageOptions['name'] . '-srch'] = $searchTerm;
            if ($searchCondition == 'exact' && $this->searchOptions['show_search_conditions']) {
                $this->appends[$this->pageOptions['name'] . '-srch-cond'] = $searchCondition;
                $isStrict = true;
            }

            $queryBuilder->search($searchFields, $searchTerm, $isStrict);
        }
    }

    private function sort($queryBuilder): void
    {
        $sortColumn = !is_array($this->request->get($this->pageOptions['name'] . '-sort-col')) ? $this->request->get($this->pageOptions['name'] . '-sort-col') : null;
        $sortOrder = !is_array($this->request->get($this->pageOptions['name'] . '-sort-ord')) ? $this->request->get($this->pageOptions['name'] . '-sort-ord') : null;

        if ($sortOrder === 'none') {
            return;
        }

        $validatedSortColumn = null;
        $relationNames = [];
        foreach ($this->sortableFields as $properties) {
            if ($sortColumn !== '' && $properties['field_name'] === $sortColumn) {
                $validatedSortColumn = $properties['field_name'];
                if ($properties['relation_name']) {
                    $relationNames = $properties['relation_name'];
                }
                break;
            }
        }

        $sort = strtolower($sortOrder);
        if (!empty($validatedSortColumn) && !empty($sort)) {
            $queryBuilder->getQuery()->orders = null;

            if (count($relationNames) == 1) {
                $relation = $queryBuilder->getRelation($relationNames[0]);
                $columnAs = $validatedSortColumn . "_ord";
                $queryBuilder->orderBy(
                    $relation->getModel()::select("$validatedSortColumn as $columnAs")
                        ->whereColumn($this->getRelationshipColumn($relation), $relation->getParent()
                            ->getTable() . '.' . $this->getRelationshipParentColumn($relation))
                        ->limit(1),
                    $sort
                );
            } else {
                $queryBuilder->orderBy($validatedSortColumn, $sort);
            }

            $this->appends[$this->pageOptions['name'] . '-sort-ord'] = $sortOrder;
            $this->appends[$this->pageOptions['name'] . '-sort-col'] = $sortColumn;
        }
    }

    private function getRelationshipColumn(Relation $relation): string
    {
        if ($relation instanceof HasOne) {
            return $relation->getForeignKeyName();
        }

        if ($relation instanceof BelongsTo) {
            return $relation->getOwnerKeyName();
        }

        return $relation->getModel()->getKeyName();
    }

    private function getRelationshipParentColumn(Relation $relation): string
    {
        if ($relation instanceof HasOne) {
            return $relation->getLocalKeyName();
        }

        if ($relation instanceof BelongsTo) {
            return $relation->getForeignKeyName();
        }

        return $relation->getParent()->getKeyName();
    }

    public function withFields(array $fields): DataTableService
    {
        foreach ($fields as $properties) {
            $newProperties = array_replace_recursive(self::FIELD_PROPERTIES, $properties);

            if (empty($newProperties['field_name']) ||  empty($newProperties['label'])) {
                throw new RuntimeException("Datatable field name and label can't be empty!");
            }

            if ($newProperties['relation_name']) {
                $newProperties['relation_name'] = explode('.', $newProperties['relation_name']);
            }

            if ($newProperties['filterable']) {
                if (!is_array($newProperties['filter_data'])) {
                    throw new RuntimeException("Datatable filter data must be an array. Wrong type given!");
                }

                $this->filterFields[$newProperties['field_name']] = [
                    "relation_name" => $newProperties['relation_name'],
                ];
            }
            if ($newProperties['sortable']) {
                if ($newProperties['relation_name'] && count($newProperties['relation_name']) > 1) {
                    throw new RuntimeException("Datatable nested relations sort is not supported");
                }

                $this->sortableFields[] = [
                    "field_name" => $newProperties['field_name'],
                    "relation_name" => $newProperties['relation_name'],
                ];
            }

            if ($newProperties['searchable']) {
                $this->searchFields[$newProperties['field_name']] = [
                    "relation_name" => $newProperties['relation_name'],
                    "label" => $newProperties['label'],
                ];
            }

            if ($newProperties['downloadable']) {
                $this->headings['columns'][] = $newProperties['field_name'];
                $this->headings['headers'][] = $newProperties['label'];
                if ($newProperties['relation_name']) {
                    $this->headings['relations'][$properties['relation_name']][] = $newProperties['field_name'];
                } else {
                    $this->headings['original'][] = $newProperties['field_name'];
                }
                $this->showDownloadButton = true;
            }

            $this->datatableFields[] = $newProperties;
        }

        return $this;
    }

    public function withFilterButtons(array $buttons): DataTableService
    {
        foreach ($buttons as $button) {
            $this->filterButtons[] = array_replace(self::FILTER_PROPERTIES, $button);
        }

        return $this;
    }

    public function withSearchButtons(array $buttons): DataTableService
    {
        foreach ($buttons as $button) {
            $this->searchButtons[] = array_replace(self::SEARCH_PROPERTIES, $button);
        }

        return $this;
    }

    public function withActionLinks(array $links): DataTableService
    {
        foreach ($links as $link) {
            $this->actionLinks[] = array_replace_recursive(self::ACTION_PROPERTIES, $link);
        }

        return $this;
    }

    public function withPageOptions(array $pageOptions): DataTableService
    {

        $this->pageOptions = array_replace_recursive($this->pageOptions, $pageOptions);
        if (!is_array($this->pageOptions['per_page_options'])) {
            throw new RuntimeException("Datatable per page options must be an array!");
        }

        return $this;
    }

    public function withSearchOptions(array $searchOptions): DataTableService
    {
        $this->searchOptions = array_replace_recursive($this->searchOptions, $searchOptions);
        return $this;
    }

    public function withDateFilter(string $fieldName = 'created_at'): DataTableService
    {
        $this->dateFilterColumn = $fieldName;
        return $this;
    }

    public function enableWithQueryString(): DataTableService
    {
        $this->enableWithQueryString = true;
        return $this;
    }
}
