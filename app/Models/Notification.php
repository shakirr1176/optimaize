<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\NotificationFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message', 'read_at'];

    public function scopeRead($query): Builder
    {
        return $query->whereNotNull('read_at');
    }

    public function scopeUnread($query): Builder
    {
        return $query->whereNull('read_at');
    }

    public function markAsRead(): bool
    {
        return $this->update(['read_at' => Carbon::now()]);
    }

    public function markAsUnread(): bool
    {
        return $this->update(['read_at' => null]);
    }
}
