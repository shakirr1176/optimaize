<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Database\Factories\RoleFactory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'slug';

    protected $fillable = ['name', 'permissions', 'accessible_routes'];

    public static function boot()
    {
        parent::boot();

        self::creating(static function ($model) {
            $model->{$model->getKeyName()} = Str::slug($model->name);
            $model->accessible_routes = self::buildPermission($model->permissions, Str::slug($model->name));
        });

        self::updating(static function ($model) {
            if ($model->slug != Str::slug($model->name)) {
                $model->{$model->getKeyName()} = Str::slug($model->name);
            }
        });
    }

    protected function permissions(): Attribute
    {
        return Attribute::make(
            get: fn (string|null $value) => $value ? json_decode($value, true) : [],
            set: fn (array $value) => json_encode($value),
        );
    }

    protected function accessibleRoutes(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => json_decode($value, true),
            set: fn (array $value) => json_encode($value),
        );
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'assigned_role');
    }

    public static function buildPermission($permissionGroups, $roleSlug = null): array
    {
        $configPath = 'permissions';
        $routeConfig = config($configPath);
        $allAccessibleRoutes = [];
        foreach ($permissionGroups as $permissionGroupName => $permissionGroup) {
            foreach ($permissionGroup as $groupName => $groupAccessName) {
                foreach ($groupAccessName as $accessName) {
                    try {
                        $routes = $routeConfig["configurable_routes"][$permissionGroupName][$groupName][$accessName];
                        $allAccessibleRoutes[] = $routes;
                    } catch (\Exception $e) {
                        logs()->error($e);
                    }
                }
            }
        }
        $allAccessibleRoutes[] = $routeConfig['global_routes'];
        $allAccessibleRoutes = array_merge(...$allAccessibleRoutes);

        if ($roleSlug) {
            Cache::forget("roles_$roleSlug");
            Cache::forever("roles_$roleSlug", $allAccessibleRoutes);
        }

        return $allAccessibleRoutes;
    }
}
