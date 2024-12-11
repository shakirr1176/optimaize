<?php

namespace App\Http\Controllers\User;

use Illuminate\View\View;
use App\Models\Announcement;
use App\Http\Controllers\Controller;
use App\Services\DataTableService;

class AnnouncementController extends Controller
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
                'label' => __('Title'),
                'field_name' => 'title',
                'sortable' => true,
                'searchable' => true,
                'linkable' => true,
                'link_data' => [
                    'route_name' => 'announcements.show'
                ]
            ],
            [
                'label' => __('Date'),
                'field_name' => 'created_at',
                'visibility' => true,
            ],
            [
                'label' => __('Published'),
                'field_name' => 'published_at',
                'label_class' => 'text-center',
                'data_class' => 'capitalize text-center',
            ],
        ];

        $dataTableActionLinks = [
            [
                'name' => 'heroicon-s-eye',
                'tooltip' => __('Show'),
                'route_name' => 'announcements.show',
                'link_class' => 'dark:bg-black-30 dark:bg-opacity-20 bg-white border dark:border-none hover:bg-lara-gray-200 dark:hover:bg-lara-gray-200 hover:text-white',
            ],
        ];

        $queryBuilder = Announcement::whereNotNull('published_at')
            ->orderByDesc('created_at');

        $data['announcements'] = app(DataTableService::class)
            ->withFields($dataTableFields)
            ->withActionLinks($dataTableActionLinks)
            ->create($queryBuilder);
        $data['title'] = __('Announcements');

        return view('user.announcement.index', $data);
    }

    public function show(Announcement $announcement): View
    {
        $data['announcement'] = $announcement;
        $data['title'] = __('View Announcement');

        return view('user.announcement.show', $data);
    }
}
