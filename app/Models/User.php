<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    const AVATAR_PATH = 'images/users/';
    const SEPARATOR_FOR_DELETE = '__';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'avatar',
        'is_active',
        'assigned_role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public static function boot()
    {
        parent::boot();

        self::creating(static function ($model) {
            if (Auth::check()) {
                $model->created_by = Auth::id();
            }
        });

        self::deleting(static function ($model) {
            $model->email = $model->email . self::SEPARATOR_FOR_DELETE . $model->id;
            $model->save();
        });
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'assigned_role');
    }

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => $value ? asset('storage/' . self::AVATAR_PATH . $value) : asset('storage/' . self::AVATAR_PATH . 'avatar.jpg')
        );
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn() => sprintf("%s %s", $this->first_name, $this->last_name)
        );
    }
}
