<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\Announcement;
use App\Enums\ResponseTypeEnum;
use Illuminate\Http\JsonResponse;
use App\Services\DataTableService;
use App\Http\Controllers\Controller;
use App\Enums\AnnouncementStatusEnum;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    public function index(): View
    {
        $dataTableFields = [
            [
                'label' => __('ID'),
                'field_name' => 'id',
                'downloadable' => true,
                'visibility' => false,
            ],
            [
                'label' => __('Title'),
                'field_name' => 'title',
                'sortable' => true,
                'searchable' => true,
                'linkable' => true,
                'link_data' => [
                    'route_name' => 'admin.announcements.show',
                ]
            ],
            [
                'label' => __('Created By'),
                'field_name' => 'fullName',
                'downloadable' => true,
                'relation_name' => 'creator',
                'linkable' => true,
                'link_data' => [
                    'route_name' => 'admin.users.show',
                    'target' => '_blank'
                ],
            ],
            [
                'label' => __('Published'),
                'field_name' => 'published_at',
                'label_class' => 'text-center',
                'data_class' => 'capitalize text-center',
            ],
        ];

        $dataTableFilterButtons = [
            [
                'name' => __('Add New'),
                'has_permission' => has_permission('admin.announcements.store'),
                'btn_class' => 'addModalButton'
            ]
        ];

        $dataTableActionLinks = [
            [
                'name' => 'heroicon-s-eye',
                'tooltip' => __('Show'),
                'route_name' => 'admin.announcements.show',
                'link_class' => 'bg-optm-purple',
            ],
            [
                'name' => 'heroicon-s-pencil',
                'tooltip' => __('Edit'),
                'route_name' => 'admin.announcements.edit',
                'link_class' => 'editModalButton bg-optm-purple',
            ],
            [
                'name' => 'heroicon-s-trash',
                'tooltip' => __('Delete'),
                'link_class' => 'bg-danger hover:bg-red-600',
                'route_name' => 'admin.announcements.destroy',
                'confirmation' => true,
                'confirmation_data' => [
                    'title' => __('Are you sure?'),
                    'method' => 'DELETE',
                ],
            ]
        ];

        $queryBuilder = Announcement::with(['creator'])
            ->orderByDesc('created_at');
        $data['announcements'] = app(DataTableService::class)
            ->withFields($dataTableFields)
            ->withFilterButtons($dataTableFilterButtons)
            ->withActionLinks($dataTableActionLinks)
            ->create($queryBuilder);
        $data['title'] = __('Announcements');
        $data['announcementStatusEnum'] = AnnouncementStatusEnum::getLabels();

        return view('admin.announcements.index', $data);
    }

    public function store(AnnouncementRequest $request): JsonResponse
    {
        $params = $request->only(['title', 'description']);
        if ($request->get('is_published')) {
            $params['published_at'] = now();
        }

        if (!Announcement::create($params)) {
            return $this->sendJsonErrorResponse(__('Failed to create announcement.'));
        }

        return $this->sendJsonSuccessResponse(__('Announcement has been created successfully.'));
    }

    public function show(Announcement $announcement): View
    {
        $data['announcement'] = $announcement->load('creator');
        $data['title'] = __('View Announcement');

        return view('admin.announcements.show', $data);
    }

    public function edit(Announcement $announcement): JsonResponse
    {
        return $this->sendJsonSuccessResponse('', $announcement);
    }

    public function update(AnnouncementRequest $request, Announcement $announcement): JsonResponse
    {
        $params = $request->only(['title', 'description']);
        $params['published_at'] = null;
        if ($request->get('is_published')) {
            $params['published_at'] = now();
        }

        if ($announcement->update($params)) {
            return $this->sendJsonSuccessResponse(__('Announcement has been updated successfully.'));
        }
        return $this->sendJsonErrorResponse(__('Failed to update announcement.'));
    }

    public function destroy(Announcement $announcement): RedirectResponse
    {
        if ($announcement->delete()) {
            return back()->with(ResponseTypeEnum::SUCCESS->value, __('Announcement has been deleted successfully.'));
        }

        return redirect()->back()->withInput()->with(ResponseTypeEnum::ERROR->value, __('Failed to delete notice.'));
    }
}
