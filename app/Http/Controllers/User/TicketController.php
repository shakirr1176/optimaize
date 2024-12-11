<?php

namespace App\Http\Controllers\User;

use Ramsey\Uuid\Uuid;
use App\Models\Ticket;
use Illuminate\View\View;
use App\Enums\ResponseTypeEnum;
use App\Enums\TicketStatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\{Facades\Auth};
use App\Http\Requests\{TicketCommentRequest, TicketRequest};
use App\Services\{DataTableService, FileUploadService, TicketService};

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
                'downloadable' => true,
                'visibility' => false,

            ],
            [
                'label' => __('Title'),
                'field_name' => 'title',
                'sortable' => true,
                'searchable' => true,
                'downloadable' => true,
                'linkable' => true,
                'link_data' => [
                    'route_name' => 'tickets.show',
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

        $dataTableFilterButtons = [
            [
                'name' => __('Add New'),
                'has_permission' => has_permission('tickets.store'),
                'url' => route('tickets.create'),
                'btn_class' => 'font-semibold dark:bg-primary bg-white addModalButton'
            ]
        ];

        $dataTableActionLinks = [
            [
                'name' => 'heroicon-s-eye',
                'tooltip' => __('Show'),
                'route_name' => 'tickets.show',
                'link_class' => 'dark:bg-black-30 dark:bg-opacity-20 bg-white border dark:border-none hover:bg-lara-gray-200 dark:hover:bg-lara-gray-200 hover:text-white',
            ]
        ];

        $queryBuilder = Ticket::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc');

        $data['tickets'] = app(DataTableService::class)
            ->withFields($dataTableFields)
            ->withFilterButtons($dataTableFilterButtons)
            ->withActionLinks($dataTableActionLinks)
            ->create($queryBuilder);
        $data['title'] = __('My Tickets');

        return view('user.tickets.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Create Ticket');

        return view('user.tickets.create', $data);
    }

    public function show(Ticket $ticket): View
    {
        return view('user.tickets.show', $this->ticketService->show($ticket));
    }

    public function store(TicketRequest $request)
    {
        $params = [
            'user_id' => Auth::id(),
            'id' => Uuid::uuid4(),
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ];

        if ($request->hasFile('attachment')) {
            $name = md5($params['id'] . auth()->id() . time());
            $uploadedAttachment = app(FileUploadService::class)->upload($request->file('attachment'), config('commonconfig.ticket_attachment'), $name, '', '', 'public');

            if ($uploadedAttachment) {
                $params['attachment'] = $uploadedAttachment;
            }
        }

        if (Ticket::create($params)) {
            return redirect()
                ->route('tickets.index')
                ->with(ResponseTypeEnum::SUCCESS->value, __('Ticket has been created successfully.'));
        }
        return redirect()
            ->back()
            ->withInput()
            ->with(ResponseTypeEnum::ERROR->value, __('Failed to create ticket.'));
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
}
