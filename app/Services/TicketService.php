<?php

namespace App\Services;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TicketService
{
    public function show(Ticket $ticket): array
    {
        $data['ticket'] = $ticket->load([
            'user',
            'comments.user',
            'assignedUser'
        ]);
        $data['title'] = __('Ticket Details');
        return $data;
    }

    public function comment(Request $request, Ticket $ticket): bool
    {
        $request->validate(['content' => 'required']);

        $params = [
            'user_id' => Auth::id(),
            'content' => $request->get('content')
        ];

        if ($request->hasFile('attachment')) {
            $name = md5($ticket->id . auth()->id() . time());
            $uploadedAttachment = app(FileUploadService::class)->upload($request->file('attachment'), config('commonconfig.ticket_attachment'), $name, '', '', 'public');

            if ($uploadedAttachment) {
                $params['attachment'] = $uploadedAttachment;
            }
        }

        if ($ticket->comments()->create($params)) {
            return true;
        }
        return false;
    }

    public function download(Ticket $ticket, string $fileName)
    {
        if ($ticket->comments()->where('attachment', $fileName)->first() || $ticket->where('attachment', $fileName)->first()) {
            $path = config('commonconfig.ticket_attachment') . $fileName;
            return Storage::disk('public')->download($path);
        }
        return Storage::download(null);
    }

}
