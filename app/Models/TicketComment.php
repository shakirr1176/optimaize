<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Carbon\Carbon;
use Database\Factories\TicketCommentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketComment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ticket_id', 'content', 'attachment'];

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
