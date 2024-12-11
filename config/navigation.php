<?php


return [
    [
        "title" => "Dashbaord",
        "route_name" => "admin.dashboard",
        "icon" => "heroicon-o-squares-2x2",
    ],
    [
        "title" => "Application Control",
        "icon" => "heroicon-o-adjustments-horizontal",
        "children" => [
            [
                "title" => "Application Setting",
                "route_name" => "admin.settings.index",
            ],
            [
                "title" => "Role Management",
                "route_name" => "admin.roles.index",
            ],
            [
                "title" => "Language Management",
                "children" => [
                    [
                        "title" => "Language List",
                        "route_name" => "admin.languages.index",
                    ],
                    [
                        "title" => "Language Setting",
                        "route_name" => "admin.languages.settings",
                    ]
                ],
            ],
            [
                "title" => "Logs",
                "route_name" => "admin.logs.index",
            ],
        ]
    ],
    [
        "title" => "Admin Section",
        "icon" => "heroicon-o-user",
        "children" => [
            [
                "title" => "Announcements",
                "route_name" => "admin.announcements.index",
            ],
            [
                "title" => "User Management",
                "route_name" => "admin.users.index",
            ],
            [
                "title" => "Ticket Management",
                "route_name" => "admin.tickets.index",
            ],
        ],
    ],
    [
        "title" => "User Section",
        "icon" => "heroicon-o-user",
        "children" => [
            [
                "title" => "Announcements",
                "route_name" => "announcements.index",
            ],
            [
                "title" => "My Tickets",
                "route_name" => "tickets.index",
            ],
        ],
    ],
    [
        "title" => "Component",
        "icon" => "heroicon-o-user",
        "route_name" => "admin.component"
    ]
];
