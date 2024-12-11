<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Database\Factories\TicketFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

enum TicketStatus:string {
    case OPEN = 'open';
    case CLOSE = 'close';
    case RESOLVE = 'resolve';
}


class Ticket extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'assigned_to',
        'title',
        'content',
        'attachment',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(static function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }

    public function comments(): HasMany
    {
        return $this->hasMany(TicketComment::class, 'ticket_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function changeStatus($status): bool
    {
        if ($status === TicketStatus::OPEN->value) {
            $params = [
                'status' => $status,
                'assigned_to' => Auth::id()
            ];

            return $this->update($params);
        }

        return false;
    }
}
