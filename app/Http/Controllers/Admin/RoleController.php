<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\View\View;
use App\Enums\ResponseTypeEnum;
use App\Enums\BooleanStatusEnum;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\RoleRequest;
use App\Services\DataTableService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RolePermissionRequest;


class RoleController extends Controller
{
    public function index(): View
    {
        $dataTableFields = [
            [
                'label' => __('Slug'),
                'field_name' => 'slug',
                'visibility' => false,
            ],
            [
                'label' => __('Name'),
                'field_name' => 'name',
                'data_class' => 'capitalize',
                'sortable' => true,
                'searchable' => true,
            ],
            [
                'label' => __('Status'),
                'field_name' => 'is_active',
                'label_class' => 'text-center',
                'data_class' => 'capitalize text-center',
                'display_callable_function' => [
                    'name' => 'display_active_status'
                ],
                'sortable' => true,
                'filterable' => true,
                'filter_data' => BooleanStatusEnum::getLabels(),
            ],
        ];

        $dataTableFilterButtons = [
            [
                'name' => __('Add New'),
                'has_permission' => has_permission('admin.roles.store'),
                'btn_class' => 'addModalButton'
            ]
        ];

        $dataTableActionLinks = [
            [
                'name' => 'heroicon-s-pencil',
                'tooltip' => __('Edit'),
                'route_name' => 'admin.roles.edit',
                'primary_key' => 'slug',
                'link_class' => 'bg-optm-purple',
            ],
            [
                'name' => 'heroicon-s-trash',
                'tooltip' => __('Delete'),
                'route_name' => 'admin.roles.destroy',
                'link_class' => 'bg-danger hover:bg-red-600',
                'primary_key' => 'slug',
                'confirmation' => true,
                'confirmation_data' => [
                    'title' => __('Are you sure?'),
                    'method' => 'DELETE',
                ],
            ],
        ];

        $queryBuilder = Role::orderByDesc('created_at');
        $data['roles'] = app(DataTableService::class)
            ->withFields($dataTableFields)
            ->withFilterButtons($dataTableFilterButtons)
            ->withActionLinks($dataTableActionLinks)
            ->create($queryBuilder);
        $data['title'] = __('Role Management');
        $data['defaultRoles'] = config('commonconfig.fixed_roles');
        if (!is_array($data['defaultRoles'])) {
            $data['defaultRoles'] = [];
        }
        return view('admin.roles.index', $data);
    }

    public function create(): View
    {
        $data['title'] = __('Add New Role');

        return view('admin.roles.create', $data);
    }

    public function store(RoleRequest $request): JsonResponse
    {
        $parameters = [
            'name' => $request->name,
        ];

        if (!Role::create($parameters)) {
            return $this->sendJsonErrorResponse(__('Failed to create role.'));
        }
        return $this->sendJsonSuccessResponse(__('Roles has been created successfully.'));
    }

    public function edit(Role $role): View
    {
        $data['role'] = $role;
        $routeGroup = [
            'reader_access' => [],
            'creation_access' => [],
            'modifier_access' => [],
            'deletion_access' => [],
        ];

        $configurableRoutes = config('permissions.configurable_routes');
        foreach ($configurableRoutes as $sectionName => $routes) {
            foreach ($routes as $permissionTitle => $permissionAccess) {
                $configurableRoutes[$sectionName][$permissionTitle] = array_replace($routeGroup, $permissionAccess);
            }
        }

        $data['routes'] = $configurableRoutes;
        $data['roleBasedRoutes'] = config('permissions.role_based_routes');
        $data['title'] = __(':role Role Permissions', ['role' => ucfirst($role->name)]);
        return view('admin.roles.edit', $data);
    }

    public function update(RolePermissionRequest $request, Role $role): RedirectResponse
    {
        $parameters = [
            'permissions' => $request->roles
        ];

        $parameters['accessible_routes'] = build_permission($request->roles, $role->slug);

        if ($role->update($parameters)) {
            return redirect()
                ->route('admin.roles.edit', [$role->slug])
                ->with(ResponseTypeEnum::SUCCESS->value, __('User role has been updated successfully.'));
        }

        return redirect()
            ->back()
            ->withInput()
            ->with(ResponseTypeEnum::ERROR->value, __('Failed to update user role.'));
    }

    public function destroy(Role $role): RedirectResponse
    {
        $userCount = $role->users->count();
        if ($userCount > 0) {
            return redirect()->back()
                ->with(ResponseTypeEnum::WARNING->value, __('The role cannot be deleted.'));
        }

        if ($role->delete()) {
            return redirect()->route('admin.roles.index')
                ->with(ResponseTypeEnum::SUCCESS->value, __('The role has been deleted successfully.'));
        }

        return redirect()->back()
            ->with(ResponseTypeEnum::ERROR->value, __('Fail to delete the role.'));
    }
}
