<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Role;
use App\Models\User;
use RuntimeException;
use App\Models\Notification;
use App\Services\UserService;
use App\Enums\ResponseTypeEnum;
use App\Enums\BooleanStatusEnum;
use App\Mail\UserPasswordCreate;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UserRequest;
use App\Services\DataTableService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class UsersController extends Controller
{
    public function index()
    {
        $dataTableFields = [
            [
                'label' => __('ID'),
                'field_name' => 'id',
                // 'downloadable' => true,
                'visibility' => false,
            ],
            [
                'label' => __('Name'),
                'field_name' => 'fullName',
                // 'searchable' => true,
                // 'downloadable' => true,
            ],
            [
                'label' => __('Email'),
                'field_name' => 'email',
                'sortable' => true,
                // 'searchable' => true,
                // 'downloadable' => true,
                'linkable' => true,
                'link_data' => [
                    'route_name' => 'admin.users.show',
                ],
            ],
            [
                'label' => __('Role'),
                'field_name' => 'slug',
                'data_class' => 'capitalize',
                'sortable' => true,
                // 'downloadable' => true,
                'relation_name' => 'role',
                // 'searchable' => true,
                // 'filterable' => true,
                'filter_data' => Role::pluck('name', 'slug')->toArray(),
            ],
            [
                'label' => __('Status'),
                'field_name' => 'is_active',
                'label_class' => 'text-center',
                'data_class' => 'capitalize text-center',
                'display_callable_function' => [
                    'name' => 'display_user_status'
                ],
                // 'downloadable' => true,
                // 'filterable' => true,
                'filter_data' => BooleanStatusEnum::getLabels(),
            ],
            [
                'label' => __('Email Verified Status'),
                'field_name' => 'email_verified_at',
                // 'downloadable' => true,
                'visibility' => false,
            ],
        ];

        $dataTableFilterButtons = [
            [
                'name' => __('Add New'),
                'has_permission' => has_permission('admin.users.store'),
                'btn_class' => 'addModalButton'
            ],
        ];

        $dataTableActionLinks = [
            [
                'name' => 'heroicon-s-eye',
                'tooltip' => __('Show'),
                'route_name' => 'admin.users.show',
                'link_class' => 'bg-optm-purple',
            ],
            [
                'name' => 'heroicon-s-pencil',
                'tooltip' => __('Edit'),
                'route_name' => 'admin.users.edit',
                'link_class' => 'editModalButton bg-optm-purple',
            ],
            [
                'name' => 'heroicon-s-trash',
                'tooltip' => __('Delete'),
                'route_name' => 'admin.users.destroy',
                'link_class' => 'bg-danger hover:bg-red-600 hover:text-white',
                'confirmation' => true,
                'confirmation_data' => [
                    'title' => __('Are you sure?'),
                    'method' => 'DELETE',
                ],
            ]
        ];

        $queryBuilder = User::with(['role'])
            ->orderByDesc('id');
        $data['users'] = app(DataTableService::class)
            ->withFields($dataTableFields)
            ->withFilterButtons($dataTableFilterButtons)
            ->withActionLinks($dataTableActionLinks)
            // ->withPageOptions(['show_per_page_options' => true])
            // ->withPageOptions(['show_per_page_options' => true, 'per_page' => 1])
            // ->withSearchOptions([
            //     'show_searchable_columns' => false,
            //     'show_search_conditions' => true,
            // ])
            // ->withDateFilter()
            ->create($queryBuilder);
        $data['title'] = __('Users');
        $data['booleanStatusEnum'] = BooleanStatusEnum::getLabels();
        return view('admin.users.index', $data);
    }

    public function show(User $user)
    {
        $data['user'] = $user;
        $data['title'] = __('View User');

        return view('admin.users.show', $data);
    }

    public function store(UserRequest $request): JsonResponse
    {
        $parameters = $request->only([
            'first_name',
            'last_name',
            'email',
        ]);

        if (!$user = app(UserService::class)->generate($parameters)) {
            return $this->sendJsonErrorResponse(__('Failed to create user.'));
        }

        try {
            Mail::to($user->email)->send(new UserPasswordCreate($user));
        } catch (Exception $e) {
            logs()->error($e);
        }

        return $this->sendJsonSuccessResponse(__('User has been created successfully.'));
    }

    public function edit(User $user): JsonResponse
    {
        return $this->sendJsonSuccessResponse('', $user);
    }

    public function update(UserRequest $request, User $user): JsonResponse
    {
        DB::beginTransaction();
        try {

            $parameters = $request->only('first_name', 'last_name', 'is_active');
            if ($user->id !== Auth::id()) {
                $parameters['assigned_role'] = $request->assigned_role;
                $notification = [
                    'user_id' => $user->id,
                    'message' => __("Your account's role has been changed by admin.")
                ];
            }

            if (!$user->update($parameters)) {
                throw new RuntimeException(__('Failed to update the user.'));
            }

            if (isset($notification)) {
                Notification::create($notification);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            logs()->error($e);
            return $this->sendJsonErrorResponse(__('Failed to update the user.'));
        }

        return $this->sendJsonSuccessResponse(__('The user has been updated successfully.'));
    }

    public function resendPasswordCreateMail(User $user): RedirectResponse
    {
        try {
            Mail::to($user->email)->send(new UserPasswordCreate($user->profile));
        } catch (Exception $e) {
            logs()->error($e);
            return redirect()->back()
                ->with(ResponseTypeEnum::ERROR->value, __('Failed to resend password mail to the user.'));
        }
        return redirect()->route('admin.users.index')
            ->with(ResponseTypeEnum::SUCCESS->value, __('Mail has been send successfully.'));
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->delete()) {
            return redirect()->route('admin.users.index')
                ->with(ResponseTypeEnum::SUCCESS->value, __('The User has been deleted successfully.'));
        }

        return redirect()->back()
            ->with(ResponseTypeEnum::ERROR->value, __('Failed to delete the user.'));
    }
}
