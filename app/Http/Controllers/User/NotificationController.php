<?php

namespace App\Http\Controllers\User;

use Illuminate\View\View;
use App\Models\Notification;
use App\Enums\ResponseTypeEnum;
use App\Services\DataTableService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class NotificationController extends Controller
{
    public function index(): View
    {
        $dataTableFields = [
            [
                'label' => __('ID'),
                'field_name' => 'id',
                'visibility' => false,
            ],
            [
                'label' => __('Message'),
                'field_name' => 'message',
                'sortable' => true,
                'searchable' => true,
                'visibility' => true,
            ],
            [
                'label' => __('Date'),
                'field_name' => 'created_at',
                'visibility' => true,
            ],
            [
                'label' => __('Status'),
                'field_name' => 'read_at',
                'label_class' => 'text-center',
                'data_class' => 'capitalize text-center',
                'display_callable_function' => [
                    'name' => 'display_notification_status'
                ],
                'downloadable' => true,
            ],
        ];

        $dataTableActionLinks = [
            [
                'name' => 'heroicon-s-eye',
                'tooltip' => __('Read'),
                'route_name' => 'notifications.mark-as-read',
                'link_class' => 'dark:bg-black-30 dark:bg-opacity-20 bg-white border dark:border-none hover:bg-lara-gray-200 dark:hover:bg-lara-gray-200 hover:text-white',
                'conditions' => [
                    ['read_at', '==', null],
                ],
            ],
            [
                'name' => 'heroicon-s-eye-slash',
                'tooltip' => __('Unread'),
                'route_name' => 'notifications.mark-as-unread',
                'link_class' => 'dark:bg-black-30 dark:bg-opacity-20 bg-white border dark:border-none hover:bg-lara-gray-200 dark:hover:bg-lara-gray-200 hover:text-white',
                'conditions' => [
                    ['read_at', '!=', null],
                ],
            ],
        ];

        $queryBuilder = Notification::where('user_id', auth()->id())
            ->orderByDesc('created_at');
        $data['notifications'] = app(DataTableService::class)
            ->withFields($dataTableFields)
            ->withActionLinks($dataTableActionLinks)
            ->create($queryBuilder);
        $data['title'] = __('Notifications');

        return view('admin.notifications.index', $data);
    }

    public function markAsRead(Notification $notification): RedirectResponse
    {
        if ($notification->markAsRead()) {
            return redirect()->back()->with(ResponseTypeEnum::SUCCESS->value, __('The notification has been marked as read.'));
        }

        return redirect()->back()->with(ResponseTypeEnum::ERROR->value, __('Failed to mark as read.'));
    }

    public function markAsUnread(Notification $notification): RedirectResponse
    {
        if ($notification->markAsUnread()) {
            return redirect()->back()->with(ResponseTypeEnum::SUCCESS->value, __('The notification has been marked as unread.'));
        }

        return redirect()->back()->with(ResponseTypeEnum::ERROR->value, __('Failed to mark as unread.'));
    }
}
