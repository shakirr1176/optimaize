<?php

use App\Enums\RoleEnum;

return [
    'configurable_routes' => [
        'admin_section' => [
            'application_settings' => [
                'reader_access' => [
                    'admin.application-settings.index',
                ],
                'modifier_access' => [
                    'admin.application-settings.edit',
                    'admin.application-settings.update',
                ],
            ],
            'role_managements' => [
                'reader_access' => [
                    'admin.roles.index',
                ],
                'creation_access' => [
                    'admin.roles.create',
                    'admin.roles.store',
                ],
                'modifier_access' => [
                    'admin.roles.edit',
                    'admin.roles.update',
                    'admin.roles.status',
                ],
                'deletion_access' => [
                    'admin.roles.destroy',
                ],
            ],
            'user_managements' => [
                'reader_access' => [
                    'admin.users.index',
                    'admin.users.show',
                ],
                'creation_access' => [
                    'admin.users.create',
                    'admin.users.store',
                ],
                'modifier_access' => [
                    'admin.users.edit',
                    'admin.users.update',
                ],
                'deletion_access' => [
                    'admin.users.update.status',
                    'admin.users.edit.status',
                ],
            ],
            'announcement_management' => [
                'reader_access' => [
                    'admin.announcements.index',
                    'admin.announcements.show'
                ],
                'creation_access' => [
                    'admin.announcements.create',
                    'admin.announcements.store'
                ],
                'modifier_access' => [
                    'admin.announcements.edit',
                    'admin.announcements.update',
                ],
                'deletion_access' => [
                    'admin.announcements.destroy',
                ],
            ],
            'log_viewer' => [
                'reader_access' => [
                    'admin.logs.index'
                ],
            ],
            'language_managements' => [
                'reader_access' => [
                    'admin.languages.index',
                    'admin.languages.settings',
                    'admin.languages.translations'
                ],
                'creation_access' => [
                    'admin.languages.create',
                    'admin.languages.store'
                ],
                'modifier_access' => [
                    'admin.languages.edit',
                    'admin.languages.update',
                    'admin.languages.update.settings',
                    'admin.languages.sync',
                ],
                'deletion_access' => [
                    'admin.languages.destroy'
                ],
            ],
            'tickets' => [
                'reader_access' => [
                    'admin.tickets.index',
                    'admin.tickets.show',
                    'admin.tickets.attachment.download'
                ],
                'creation_access' => [
                    'admin.tickets.comment.store',
                ],
                'modifier_access' => [
                    'admin.tickets.close',
                    'admin.tickets.resolve',
                ],
            ]
        ],
        'user_section' => [
            'tickets' => [
                'reader_access' => [
                    'tickets.index',
                    'tickets.show',
                    'tickets.attachment.download'
                ],
                'creation_access' => [
                    'tickets.create',
                    'tickets.store',
                    'tickets.comment.store',
                ],
                'modifier_access' => [
                    'tickets.close',
                ],
            ],
            'announcements' => [
                'reader_access' => [
                    'announcements.index',
                    'announcements.show',
                ],
            ]
        ]
    ],
    'role_based_routes' => [
        RoleEnum::SYSTEM_ADMIN->value => [
            'dashboard' => [
                'reader_access' => [
                    'admin.dashboard',
                ],
            ]
        ],
        RoleEnum::USER->value => []
    ],

    'avoidable_unverified_routes' => [
        'logout',
        'profile.index',
        'notifications.index',
        'notifications.mark-as-read'
    ],
    'avoidable_suspended_routes' => [
        'logout',
        'profile.index',
        'notifications.index',
        'notifications.mark-as-read',
        'notifications.mark-as-unread',
    ],
    'global_routes' => [
        'logout',
        'profile.index',
        'profile.edit',
        'profile.update',
        'profile.change-password',
        'profile.update-password',
        'profile.avatar.edit',
        'profile.avatar.update',
        'notifications.index',
        'notifications.mark-as-read',
        'notifications.mark-as-unread',
        'profile.verification.mail.request',
    ],

];
