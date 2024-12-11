<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissions = [
            'admin_section' => [
                'application_settings' => [
                    'reader_access',
                    'modifier_access',
                ],
                'role_managements' => [
                    'reader_access',
                    'creation_access',
                    'modifier_access',
                    'deletion_access',
                ],
                'user_managements' => [
                    'reader_access',
                    'creation_access',
                    'modifier_access',
                    'deletion_access',
                ],
                'announcement_management' => [
                    'reader_access',
                    'creation_access',
                    'modifier_access',
                    'deletion_access',
                ],
                'log_viewer' => [
                    'reader_access',
                ],
                'language_managements' => [
                    'reader_access',
                    'creation_access',
                    'modifier_access',
                    'deletion_access',
                ],
                'tickets' => [
                    'reader_access',
                    'modifier_access',
                    'commenting_access',
                ],
                'shop_categories' => [
                    'reader_access',
                    'creation_access',
                    'modifier_access',
                    'deletion_access',
                ],
                'shops' => [
                    'reader_access',
                ],
            ],
        ];

        $userPermissions = [
            'user_section' => [
                'tickets' => [
                    'reader_access',
                    'creation_access',
                    'closing_access',
                    'commenting_access',
                ],
                'shops' => [
                    'reader_access',
                ],
            ],
        ];

        User::factory()
            ->for(
                Role::factory()
                    ->state([
                        "name" => RoleEnum::SYSTEM_ADMIN->getLabel(),
                        "is_active" => true,
                        'permissions' =>  $adminPermissions + $userPermissions,
                    ])
            )->state([
                "email" => "system-admin@codemen.org",
            ])->create();


        User::factory()
            ->for(
                Role::factory()
                    ->state([
                        "name" => RoleEnum::USER->getLabel(),
                        "is_active" => true,
                        'permissions' =>  $adminPermissions + $userPermissions,
                    ])
            )->state([
                "email" => "user@codemen.org",
                "is_active" => true,
            ])->create();
    }
}
