<p align="center">
    <a href="https://laraframe.codemen.org" target="_blank">
        <img src="https://laraframe.codemen.org/storage/images/logo-sm.png" width="80" alt="Laraframe">
    </a>
</p>

## Laraframe

-   [Datatable](#datatable)
    -   [Table column fields definition](#table-column-fields-definition)
    -   [Display callable function](#display_callable_function)
    -   [Relation columns calling](#relation-columns-calling)
    -   [Columns can be linkable](#columns-can-be-linkable)
    -   [DataTable Filter Buttons](#datatable-filter-buttons)
    -   [Button type text to icon](#button-type-text-to-icon)
    -   [DataTable Action links options](#datatable-action-links-options)
    -   [Extra options for pagination and search](#extra-options-for-pagination-and-search)
-   [DataTable index blade](#datatable-index-blade)
    -   [DataTable index blade manual manage](#datatable-index-blade-manual-manage)
    -   [DataTable index blade modal section](#datatable-index-blade-modal-section)
-   [JS file use cases in blade file](#js-file-use-cases-in-blade-file)

    -   [crud-process.js](#crud-processjs)
    -   [select-drop-down.js](#select-drop-downjs)
    -   [file-upload.js](#file-uploadjs)

-   [Confirmation modal popup](#confirmation-modal-popup)
-   [Role and permission](#role-and-permission)

    -   [Configurable routes](#configurable-routes)
    -   [Role based routes](#role-based-routes)
    -   [Avoidable unverified routes](#avoidable-unverified-routes)
    -   [Avoidable suspended routes](#avoidable-suspended-routes)
    -   [Global routes](#global-routes)

-   [Sidebar Navigation](#sidebar-navigation)

-   [Application settings](#application-settings)
    -   [field_type](#field_type)
    -   [field_value](#field_value)
    -   [field_label](#field_label)
    -   [validation](#validation)
    -   [default](#default)
    -   [height and width](#height-and-width)

## datatable

#### Table column fields definition

```php
$dataTableFields = [
    [
        'label' => __('Table column label'),
        'label_class' => 'text-center',
        'field_name' => 'column_1',
        'data_class' => 'capitalize text-center',
        'downloadable' => true,
        'searchable' => true,
        'relation_name' => 'relation_1'
        'filterable' => true,
        'filter_data' => [
            'value_1' => 'Show 1',
            'value_2' => 'Show 2',
        ],
        'display_callable_function' => [
            'name' => 'callable_function'
        ],
    ],
    // other table columns
];
```

-   `label` use for table column header.
-   `label_class` use for if the table column header needs any additional class.
-   `field_name` use for database column name.
-   `data_class` use for if the table column data cell needs any additional class
-   `downloadable` use for `PDF` or `csv` files download, by default it's `false`.
-   `searchable` use for filed value for search, by default it's `false`.
-   `filterable` use for column filtering, by default it's false, if we define true then we have to add `filter_data`, and it should be a `array`.
-   `display_callable_function` use for don't want to as it is from the database, we want to show modified data. by default it's use the `field_name`. if we need additional column in callable function we can [add those fields](#display_callable_function)

#### display_callable_function

```php
'field_name' => 'column_1',
'display_callable_function' => [
    'name' => 'test_user_data',
    'extra_params' => [
        'additional_column_2',
        'additional_column_3',
        'relation_1.additional_column_4'
    ],
]
```

-   By default `column_1` column name already in callable helper function params.
-   Additionally we add `additional_column_2`, `additional_column_3`, and also `relation_1.additional_column_4` column, the `relation_1.additional_column_4` came from relation `relation_1` and the field.
-   Always remember in extra params after `relation name` in last should be the name of `column name`. like `relation_1.relation_2.additional_column_1`.
-   `NB:` If we don't need extra params then we can avoid `extra_params`.

#### Relation columns calling

```php
$dataTableFields = [
    [
        'label' => __('Table column label'),
        'field_name' => 'column_1'
        'relation_name' => 'relation_1'
    ],
    // other table columns
];
```

-   `relation_name` use for only when we want to show a field form the belongsTo or HasOne relation.
-   Also we can add chain relations with `.` like `relation_1.relation_2` or `relation_1.relation_2.relation_3`.

#### Columns can be linkable

```php
$dataTableFields = [
    [
        'label' => __('Table column label'),
        'field_name' => 'column_1'
        'linkable' => true,
        'link_data' => [
            'route_name' => 'route-name',
        ],
    ],
    // other table columns
];
```

-   We can easily make columns into link with adding `linkable` and `link_data`. by default it will add route params as table `id`.
-   We can change the default behaviors.

```php
$dataTableFields = [
    [
        'label' => __('Table column label'),
        'field_name' => 'column_1'
        'linkable' => true,
        'link_data' => [
            'route_name' => 'route-name',
            'primary_key' => 'other_field_from_table',
            'target' => '_self',
        ],
    ],
    // other table columns
];
```

-   We can change `primary_key` with other fields form table.
-   Also we can change the hyperlink attribute `target` `_self` to `_blank`. by default its `_self`.

```php
$dataTableFields = [
    [
        'label' => __('Table column label'),
        'field_name' => 'column_1'
        'linkable' => true,
        'link_data' => [
            'route_name' => 'route-name',
            'route_params' => [
                'param_1' => 'table_column_name',
                'param_2' => 'relation_1.relation_column_name',
            ],
        ],
    ],
    // other table columns
];
```

-   Now we can add route params by adding `route_params`.
-   We need to pass a params value to the route by a `relation` so we can not pass that by `primary_key`. we can pass this `route_params`.
-   And also we can pass multiple params by `route_params`.
-   `NB:` When we use `route_params` then `primary_key` will not useable.

#### DataTable Filter Buttons

```php
$dataTableFilterButtons = [
    [
        'name' => __('Add New'),
        'has_permission' => has_permission('route_name'),
        'btn_class' => 'tailwind_classes addModalButton',
    ],
    // other filter buttons
];
```

-   Filter button is use for hyperlink or we can use this for open modal by passing `class` like `addModalButton` and handel with `JS`.
-   `has_permission` is stands for check if the user has permission for that route.
-   `btn_class` The tailwind classes to apply to the button.

```php
$dataTableFilterButtons = [
    [
        'name' => __('Add New'),
        'has_permission' => has_permission('route_name'),
        'url' => route('route_name'),
        'target' => '_self',
    ],
    // other filter buttons
];
```

-   We also have additional thinks like `url`, `target`, `btn_type_icon`.
-   `url` will be use for redirect another page.
-   `target` is using for `_self` or `_blank`.

#### Button type text to icon

```php
$dataTableFilterButtons = [
    [
        'name' => __('Add New'),
        'has_permission' => has_permission('route_name'),
        'url' => route('route_name'),
        'target' => '_self',
        'btn_type_icon' => false
    ],
    // other filter buttons
];
```

-   If we want to change button text into icon we can simply pass `btn_type_icon` is true.

#### DataTable Action links options

```php
$dataTableActionLinks = [
    [
        'name' => 'heroicon-s-pencil',
        'tooltip' => __('Text which show on tooltip'),
        'route_name' => 'route_name',
        'link_class' => 'editModalButton tailwind_classes',
        "primary_key" => "id",
        "target" => "_self",
    ]
    // other action links
];
```

-   Action button is use for hyperlink or we can use this for open modal by passing `class` like `editModalButton` and handel with `JS`.
-   `primary_key` by default table `id`, if we need then we can change the column.
-   we can change `target` `_self` into `_blank`.
-   In action `route_name` already checked `has_permission`, if user doesn't has permission then icon button will be unaccessible.

##### Action `route params`

```php
$dataTableActionLinks = [
    [
        'name' => 'heroicon-s-eye', // heroicon name
        'tooltip' => __('Text which show on tooltip'),
        'route_name' => 'route_name',
        'route_params' => [
            'param_1' => 'table_column_name',
            'param_2' => 'relation_1.relation_column_name',
        ],
        'link_class' => 'tailwind_classes',
    ]
    // other action links
];

Route::get('url/{param_1}/{param_2}', [Controller::class, 'method'])
    ->name('route_name');
```

-   We can pass singe or multiple `route_params`.
-   `NB:` If we use `route_params` then `primary_key` will be not working anymore.

##### Action button adding `condition`

```php
$dataTableActionLinks = [
    [
        'name' => 'heroicon-s-pencil',
        'tooltip' => __('Text which show on tooltip'),
        'route_name' => 'route_name',
        'link_class' => 'editModalButton tailwind_classes',
        'conditions' => [
            ['table_column_1', '==', 'condition_value_1'],
            ['table_column_2', '!=', 'condition_value_2'],
        ]
    ],
    // other action links
];
```

-   We can add `conditions` for routes, if condition match then action button will appear.

##### Action button adding `confirmation` popup

```php
$dataTableActionLinks = [
    [
        'name' => 'heroicon-s-trash',
        'tooltip' => __('Text which show on tooltip'),
        'route_name' => 'route_name',
        'link_class' => 'tailwind_classes',
        'confirmation' => true,
        'confirmation_data' => [
            'title' => __('message which flash on confirmation popup box'),
            'method' => 'DELETE',
        ],
    ]
    // other action links
];
```

-   If any action button need `confirmation` we can add this, and we can pass `confirmation_data` with `title` and `method`.
-   The `method` by default is `POST`. and the `title` is empty.

```php
use App\Services\DataTableService;

$queryBuilder = Model::with(['relation_1', 'relation_2']);
$data = app(DataTableService::class)
    ->withFields($dataTableFields)
    ->withFilterButtons($dataTableFilterButtons)
    ->withActionLinks($dataTableActionLinks)
    ->create($queryBuilder);
```

-   If we have any relation field to show then we should have `with` method.
    to pass relations.
-   `withFields()` is for table columns array.
-   `withFilterButtons()` is for filter section buttons array.
-   `withActionLinks()` is for action links array.
-   And finally `create()` is for query builder.

#### Extra options for `pagination` and `search`

```php
$data = app(DataTableService::class)
    ->withFields($dataTableFields)
    ->withFilterButtons($dataTableFilterButtons)
    ->withActionLinks($dataTableActionLinks)
    ->withPageOptions(['show_per_page_options' => true])
    ->withSearchFields()
    ->withSearchConditions()
    ->create($queryBuilder);
```

-   We can pass a `array` in `withPageOptions()` with `show_per_page_options` `true` for show par page options like 10, 25, 50, 100.
-   `withSearchFields()` is work when we defile `searchable` in `$dataTableFields` array. it will in table search section a dropdown for those fields. and if we select any filed it search will be only in that filed.
-   `withSearchConditions()` is show a dropdown on search section `Exact` or `Similar` search.

##### DataTable `withPageOptions`

```php
$data = app(DataTableService::class)
    ->withFields($dataTableFields)
    ->withFilterButtons($dataTableFilterButtons)
    ->withActionLinks($dataTableActionLinks)
    ->withPageOptions([
        'per_page' => 100,
        'show_per_page_options' => false,
        'per_page_options' => [
            100,
            250,
            500,
            1000,
        ]
    ])
    ->create($queryBuilder);
```

-   We can pass `array` in `withPageOptions()` with `per_page` and `show_per_page_options` `true` for `per_page_options` like 100, 250, 500, 1000.
-   We can change all of those values.

## DataTable index blade

```php
// In controller
public function index(){
    $queryBuilder = Model::query();
    $data['all_data'] = app(DataTableService::class)
        ->withFields($dataTableFields)
        ->withFilterButtons($dataTableFilterButtons)
        ->withActionLinks($dataTableActionLinks)
        ->create($queryBuilder);
    $data['title'] = __('Title');
    return view('blade-file-name', $data);
}
```

```html
<!-- in blade for datatable -->
<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ $title }}</x-breadcrumb>
    </x-section>

    <x-datatable :data="$all_data"></x-datatable>

    <x-section name="scripts">
        <script src="{{ Vite::js('table.js') }}"></script>
    </x-section>
</x-app-layout>
```

-   In blade file we need to pass `:data` in `x-datatable`, it will readyz full table.
-   And also have to pass `table.js` on script.

## DataTable index blade manual manage

```php
// In controller
public function index(){
    $queryBuilder = Model::query();
    $data['all_data'] = app(DataTableService::class)
        ->withFields($dataTableFields)
        ->withFilterButtons($dataTableFilterButtons)
        ->withActionLinks($dataTableActionLinks)
        ->create($queryBuilder);
    $data['title'] = __('Title');
    return view('blade-file-name', $data);
}
```

```html
<!-- in blade for datatable -->
<x-app-layout>
    <!-- breadcrumb and title sections -->

    <!-- for filter and search section with buttons -->
    <x-datatable.filter :data="$all_data">
        <x-slot name="buttons">
            @foreach ($all_data->filterButtons as $filterButton) @if
            ($filterButton['has_permission'])
            <a href="{{ $filterButton['url'] }}">
                {{ $filterButton['name'] }}
            </a>
            @endif @endforeach
        </x-slot>
    </x-datatable.filter>

    <!-- start implementing table -->
    <table>
        <thead>
            <!-- th tags -->
            <!-- action th tag -->
        </thead>
        <tbody>
            <tr>
                @foreach ($all_data as $item)
                <!-- td tags -->
                <!-- action td tag start -->
                <x-datatable.actions
                    :data="$all_data"
                    :rowData="$item"
                ></x-datatable.actions>
                <!-- action td tag end -->
                @endforeach
            </tr>
        </tbody>
    </table>
    <!-- end implementing table -->

    <x-datatable.pagination
        :paginationData="$all_data"
    ></x-datatable.pagination>
    <x-section name="scripts">
        <script src="{{ Vite::js('table.js') }}"></script>
    </x-section>
</x-app-layout>
```

-   If we need filter and search section we can use `x-datatable.filter`.
-   `x-datatable.actions` has all the logic for action links. And we need to pass `:data="$all_data" :rowData="$item"`
-   `x-datatable.pagination` has all the logic for pagination. And we need to pass `:paginationData="$all_data"`

## DataTable index blade modal section

```html
<!-- in blade for datatable -->
<x-app-layout>
    <!-- breadcrumb and title sections -->

    <!-- dataTable data show sections -->

    <!-- modal start  -->
    <x-modal class="addModal" title="{{ __('Create Modal') }}">
        <x-slot name="inputs">
            <!-- input components -->
        </x-slot>

        <x-slot name="button">
            <div class="px-2 w-full sm:w-1/2 mt-6 sm:mt-0">
                <x-forms.button
                    class="w-full bg-lara-blue font-semibold"
                    type="submit"
                    id="createSubmitBtn"
                >
                    {{ __('Create') }}
                </x-forms.button>
            </div>
        </x-slot>
    </x-modal>

    <x-modal class="editModal" title="{{ __('Update Modal') }}">
        <x-slot name="inputs">
            <!-- input components -->
        </x-slot>

        <x-slot name="button">
            <div class="px-2 w-full sm:w-1/2 mt-6 sm:mt-0">
                <x-forms.button
                    class="w-full bg-lara-blue font-semibold"
                    type="submit"
                    id="updateSubmitBtn"
                >
                    {{ __('Update') }}
                </x-forms.button>
            </div>
        </x-slot>
    </x-modal>
    <!-- modal end  -->

    <x-section name="scripts">
        <script src="{{ Vite::js('crud-process.js') }}"></script>
        <script>
            let updateId;

            document
                .querySelector("#createSubmitBtn")
                .addEventListener("click", function (e) {
                    e.preventDefault();
                    let form = document.querySelector(".addModal").children[0];
                    let route = "{{ route('route_name') }}";
                    let method = "POST";

                    submit(route, form, method);
                });

            window.addEventListener("click", (e) => {
                if (e.target.classList.contains("editModalButton")) {
                    updateId = e.target.getAttribute("data-form-id");
                    let route = e.target.getAttribute("href");
                    let form = document.querySelector(".editModal").children[0];
                    let data = fetchData(route, form);
                }
            });

            document
                .querySelector("#updateSubmitBtn")
                .addEventListener("click", function (e) {
                    e.preventDefault();
                    let form = document.querySelector(".editModal").children[0];
                    let route =
                        "{{ route('route_name', ':updateId') }}".replace(
                            ":updateId",
                            updateId
                        );
                    let method = "PUT";

                    submit(route, form, method);
                });
        </script>
    </x-section>
</x-app-layout>
```

-   For modal with `crud-process.js` and input components we can validate the form inputs by backend validation.
-   `NB:` If we add `extra modal` then we need to manage `hidden` `class` from `extra modal`.

## JS file use cases in blade file

## crud-process.js

```html
<script src="{{ Vite::js('crud-process.js') }}"></script>
```

-   `crud-process.js` has method like `submit`, `fetchData` for submit and get data.
-   For `fetchData` method `fetchData(route, form, relations = ['relation_1'])` for get data. route and form is required. if we have data to put in the form relation then we need to pass `relations` array.
-   If we don't have data to put in the form relation then we don't need to pass `relations` array.
-   For `submit` method `submit(url, form, method)` all parameter are required.

## select-drop-down.js

```html
<script src="{{ Vite::js('select-drop-down.js') }}"></script>
```

-   If we are use select input component filed we have to use `select-drop-down.js`.

## file-upload.js

```html
<script src="{{ Vite::js('file-upload.js') }}"></script>
```

-   If we are use file input component `x-forms.image` filed we have to use `file-upload.js`.

## Confirmation modal popup

```html
<a
    class="confirmation"
    href="url"
    target="_self"
    data-form-id="1"
    data-alert="Are you sure?"
    data-form-method="DELETE"
    >Delete</a
>
```

-   For confirmation modal popup we use `confirmation` class in `a tag`. and add `data-form-id` and `data-form-method` and `data-alert` for message.
-   `data-form-id` should be `unique` for multiple confirmation modal popup.

## Role and permission

-   We have a configurable role and permission system in our application. In `permission.php` on `config folder`.

## Configurable routes

```php
return [
    'configurable_routes' => [
        'admin_section' => [
            'feature_a_managements' => [
                'reader_access' => [
                    'route.index',
                    'route.show',
                ],
                'creation_access' => [
                    'route.create',
                    'route.store'
                ],
                'modifier_access' => [
                    'route.edit',
                    'route.update',
                ],
                'deletion_access' => [
                    'route.destroy'
                ],
            ],
            // other feature managements route
        ],

        // other sections like user_section
    ],

    // other route sections like role_based_routes
];
```

-   We have a configurable routes system in our application. In `permission.php`.
-   `configurable_routes` we can pass `sections` like `admin_section`, `user_section`.
-   Under the section like `admin_section` we can pass `feature_managements`.
-   And `feature_managements` we have to pass `reader_access`, `creation_access`, `modifier_access`, `deletion_access`.
-   If we need only reader access then we can pass `reader_access` in `feature_managements`. ignore other `access` like `creation_access`, `modifier_access`, `deletion_access`.

## Role based routes

```php
use App\Enums\RoleEnum;

return [
    // configurable routes

    'role_based_routes' => [
        RoleEnum::SYSTEM_ADMIN->value => [
            'dashboard' => [
                'reader_access' => [
                    'route.dashboard',
                ],
            ]
        ],
        RoleEnum::USER->value => []
    ],
    // other route sections
];
```

-   In our role based routes we can handel specific roles like `SYSTEM_ADMIN` and `USER` or `OTHER_ROLES`.
-   `Only` that `specific roles based user` can access the routes.
-   And we can pass `reader_access` or `creation_access` or `modifier_access` or `deletion_access` inside this array. in our need.

## Avoidable unverified routes

```php
return [
    // configurable routes

    // role based routes

    'avoidable_unverified_routes' => [
        'logout',
        'profile.index',
        // other route names
    ],
    // other route sections
];
```

-   If the `user` is unverified then user can access those routes.

## Avoidable suspended routes

```php
return [
    // other route sections

    'avoidable_suspended_routes' => [
        'logout',
        'profile.index',
        // other route names
    ],
];
```

-   If the `user` is suspended then user can access those routes.

## Global routes

```php
return [
    // other route sections

    'global_routes' => [
        'logout',
        'profile.index',
        // other route names
    ],
];
```

-   A user with `every role` can access those routes.

## Sidebar Navigation

```php
return [
    [
        "title" => "Dashbaord",
        "route_name" => "route.dashboard",
        "icon" => "heroicon-o-squares-2x2",
    ],
    [
        "title" => "Application Control",
        "icon" => "heroicon-o-adjustments-horizontal",
        "children" => [
            [
                "title" => "Application Setting",
                "route_name" => "route.settings.index",
            ],
            [
                "title" => "Role Management",
                "route_name" => "route.roles.index",
            ],
            [
                "title" => "Language Management",
                "children" => [
                    [
                        "title" => "Language List",
                        "route_name" => "route.languages.index",
                    ],
                    [
                        "title" => "Language Setting",
                        "route_name" => "route.languages.settings",
                    ]
                ],
            ],
            [
                "title" => "Logs",
                "route_name" => "route.logs.index",
            ],
        ]
    ],

    // other routes
];
```

-   after adding permission we have to add `routes` on `navigation.php` in config folder.
-   we can add single `route` like `dashboard`.
-   if we need to add `multiple routes` then we can add `children` key in a the `array`.
-   we can add `nested children` inside `array` with `children` key.

## Application Settings

```php
return [
    'configurations' => [
        'preference' => [
            'sub-settings' => [
                'general' => [
                    'registration_active_status' => [
                        'field_type' => 'radio',
                        'field_value' => 'active_status',
                        'field_label' => 'Allow Registration',
                    ],
                    'default_role_to_register' => [
                        'field_type' => 'select',
                        'field_value' => 'get_user_roles',
                        'field_label' => 'Default registration role',
                    ],
                    'require_email_verification' => [
                        'field_type' => 'radio',
                        'field_value' => 'active_status',
                        'field_label' => 'Require Email Verification',
                    ],
                    'support_email' => [
                        'field_type' => 'text',
                        'validation' => 'required|email',
                        'field_label' => 'Support Email',
                    ],
                ],
                // other settings
            ],
            // other sections
        ],
        // other configurations
    ]
];
```

-   We can manage `Application Setting` in `settings.php` in config folder.
-   We can add fields or settings or sections.
-   In every input field must have `field_type`, `field_value`, `field_label`.
-   we can addionally add `validation`, `default`, `height`, `width`, for input field.

## field_type

-   We have 5 types of fields.
-   `text`, `textarea`, `radio`, `select`, `image`

## field_value

-   `field_value` is use as a `input` field `name`.
-   When we call `settings('field_value')` then we will get the value of `field_value`.

## field_label

-   `field_label` is use as a `input` field `label`.

## validation

-   `validation` is use as a `input` field `validation`.
-   `validation` has `required`, `numeric`, `integer`,`digit`, `email`, `boolean`, `image`, `array`, `size:value`, `min:value`, `max:value`, `in:value1,value2,value3`.

## default
-   `default` is use as a `input` field `default` value.

## height and width
-   `height` and `width` is use only for `image` field `height` and `width` for image show.
