<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use Illuminate\View\View;
use App\Enums\ResponseTypeEnum;
use App\Enums\TicketStatusEnum;
use App\Services\TicketService;
use App\Services\DataTableService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{Auth};
use App\Http\Requests\TicketCommentRequest;

class TicketController extends Controller
{
    public TicketService $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function index(): View
    {
        $dataTableFields = [
            [
                'label' => __('Ticket ID'),
                'field_name' => 'id',
                'visibility' => false,
                'downloadable' => true,

            ],
            [
                'label' => __('Title'),
                'field_name' => 'title',
                'sortable' => true,
                'searchable' => true,
                'downloadable' => true,
                'linkable' => true,
                'link_data' => [
                    'route_name' => 'admin.tickets.show',
                ],
            ],
            [
                'label' => __('Opened At'),
                'field_name' => 'created_at',
                'sortable' => true,
                'searchable' => true,
                'downloadable' => true,
            ],
            [
                'label' => __('Assigned User'),
                'field_name' => 'fullName',
                'relation_name' => 'assignedUser',
                'downloadable' => true,
            ],
            [
                'label' => __('Status'),
                'field_name' => 'status',
                'label_class' => 'text-center',
                'data_class' => 'capitalize text-center',
                'display_callable_function' => [
                    'name' => 'display_ticket_status'
                ],
                'downloadable' => true,
                'filterable' => true,
                'filter_data' => TicketStatusEnum::getLabels(),
            ],
        ];

        $dataTableActionLinks = [
            [
                'name' => 'heroicon-s-eye',
                'tooltip' => __('Show'),
                'route_name' => 'admin.tickets.show',
                'link_class' => 'dark:bg-black-30 dark:bg-opacity-20 bg-white border dark:border-none hover:bg-lara-gray-200 dark:hover:bg-lara-gray-200 hover:text-white',
            ]
        ];

        $queryBuilder = Ticket::query()
            ->with([
                'assignedUser',
                // 'user.role'
                'user'
            ])
            ->when(!Auth::user()->is_super_admin, function ($query) {
                $query->whereNull('assigned_to')
                    ->orWhere('assigned_to', Auth::id());
            })
            ->orderBy('created_at', 'desc');

        $data['tickets'] = app(DataTableService::class)
            ->withFields($dataTableFields)
            ->withActionLinks($dataTableActionLinks)
            ->create($queryBuilder);
        $data['title'] = __('Tickets');

        return view('admin.tickets.index', $data);
    }

    public function show(Ticket $ticket): View
    {
        return view('admin.tickets.show', $this->ticketService->show($ticket));
    }

    public function comment(TicketCommentRequest $request, Ticket $ticket): RedirectResponse
    {
        if ($this->ticketService->comment($request, $ticket)) {
            return redirect()
                ->back()
                ->with(ResponseTypeEnum::SUCCESS->value, __('The message has been created successfully'));
        }

        return redirect()
            ->back()
            ->withInput()
            ->with(ResponseTypeEnum::ERROR->value, __('Failed to create message.'));
    }

    public function download(Ticket $ticket, string $fileName)
    {
        return $this->ticketService->download($ticket, $fileName);
    }

    public function close(Ticket $ticket): RedirectResponse
    {
        if ($ticket->changeStatus(TicketStatusEnum::CLOSED->value)) {
            return redirect()
                ->back()
                ->with(ResponseTypeEnum::SUCCESS->value, __('The ticket has been closed successfully'));
        }

        return redirect()
            ->back()
            ->with(ResponseTypeEnum::ERROR->value, __('Failed to close the ticket.'));
    }

    public function resolve(Ticket $ticket): RedirectResponse
    {
        if ($ticket->changeStatus(TicketStatusEnum::RESOLVED->value)) {
            return redirect()
                ->route('admin.tickets.show', $ticket->id)
                ->with(ResponseTypeEnum::SUCCESS->value, __('The ticket has been resolved successfully'));
        }
        return redirect()
            ->back()
            ->with(ResponseTypeEnum::ERROR->value, __('Failed to resolve the ticket.'));
    }
}
