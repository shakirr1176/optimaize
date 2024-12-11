<?php
return [
    'configurations' => [
        'preference' => [
            'sub-settings' => [
                'general' => [
                    'registration_active_status' => [
                        'field_type' => 'radio',
                        'field_value' => 'active_status',
                        'field_label' => 'Allow Registration',
                    ],
                    'default_role_to_register' => [
                        'field_type' => 'select',
                        'field_value' => 'get_user_roles',
                        'field_label' => 'Default registration role',
                    ],
                    'require_email_verification' => [
                        'field_type' => 'radio',
                        'field_value' => 'active_status',
                        'field_label' => 'Require Email Verification',
                    ],
                    'support_email' => [
                        'field_type' => 'text',
                        'validation' => 'required|email',
                        'field_label' => 'Support Email',
                    ],
                ],
                'language' => [
                    'lang' => [
                        'field_type' => 'select',
                        'field_value' => 'language_short_code_list',
                        'default' => config('app.locale'),
                        'field_label' => 'Default Site Language',
                    ],
                    'lang_switcher' => [
                        'field_type' => 'radio',
                        'field_value' => 'active_status',
                        'field_label' => 'Language Switcher',
                    ],
                    'lang_switcher_item' => [
                        'field_type' => 'radio',
                        'field_value' => 'language_switcher_items',
                        'field_label' => 'Display Language Switch Item',
                    ],
                ],
                'mail' => [
                    'mail_from_address' => [
                        'field_type' => 'text',
                        'field_label' => 'From Address',
                        'default' => env('MAIL_FROM_ADDRESS'),
                    ],

                    'mail_from_name' => [
                        'field_type' => 'text',
                        'field_label' => 'From Name',
                        'default' => env('MAIL_FROM_NAME'),
                    ],
                    'mail_driver' => [
                        'field_type' => 'select',
                        'validation' => 'required',
                        'field_label' => 'Driver',
                        'field_value' => ["smtp" => "SMTP", "mailgun" => "Mailgun", "ses" => "SES", "postmark" => "Postmark"],
                        'dependent_fields' => [
                            'smtp' => [
                                'mail_host' => [
                                    'field_type' => 'text',
                                    'validation' => 'required',
                                    'field_label' => 'Host',
                                    'placeholder' => "localhost",
                                    'default' => env('MAIL_HOST'),
                                ],
                                'mail_port' => [
                                    'field_type' => 'text',
                                    'validation' => 'required',
                                    'field_label' => 'Port',
                                    'default' => env('MAIL_PORT'),
                                ],
                                'mail_username' => [
                                    'field_type' => 'text',
                                    'validation' => 'required',
                                    'field_label' => 'Username',
                                    'encryption' => true,
                                    'default' => env('MAIL_USERNAME'),
                                ],
                                'mail_password' => [
                                    'field_type' => 'text',
                                    'validation' => 'required',
                                    'field_label' => 'Password',
                                    'encryption' => true,
                                    'default' => env('MAIL_PASSWORD'),
                                ],
                                'mail_encryption' => [
                                    'field_type' => 'text',
                                    'field_label' => 'Encryption',
                                    'default' => env('MAIL_ENCRYPTION'),
                                ],
                            ],
                            'mailgun' => [
                                'mailgun_domain' => [
                                    'field_type' => 'text',
                                    'field_label' => 'Domain',
                                    'default' => env('MAILGUN_DOMAIN'),
                                ],
                                'mailgun_secret' => [
                                    'field_type' => 'text',
                                    'field_label' => 'Secret',
                                    'default' => env('MAILGUN_SECRET'),
                                ],
                                'mailgun_endpoint' => [
                                    'field_type' => 'text',
                                    'field_label' => 'Endpoint',
                                    'default' => env('MAILGUN_ENDPOINT'),
                                ],
                            ],
                            'ses' => [
                                'aws_access_key_id' => [
                                    'field_type' => 'text',
                                    'field_label' => 'AWS Access Key',
                                    'default' => env('AWS_ACCESS_KEY_ID'),
                                ],
                                'aws_secret_access_key' => [
                                    'field_type' => 'text',
                                    'field_label' => 'AWS Secret Key',
                                    'default' => env('AWS_SECRET_ACCESS_KEY'),
                                ],
                                'aws_default_region' => [
                                    'field_type' => 'text',
                                    'field_label' => 'AWS Region',
                                    'default' => env('AWS_DEFAULT_REGION'),
                                ],
                            ],
                            'postmark' => [
                                'postmark_token' => [
                                    'field_type' => 'text',
                                    'field_label' => 'Postmark Token',
                                    'default' => env('POSTMARK_TOKEN'),
                                ],
                            ],
                        ],
                        'default' => env('MAIL_MAILER'),
                    ],
                ],
                'google-recaptcha' => [
                    'display_google_captcha' => [
                        'field_type' => 'radio',
                        'field_value' => 'active_status',
                        'field_label' => 'Google Captcha Protection',
                    ],
                    'google_captcha_secret' => [
                        'field_type' => 'text',
                        'field_label' => 'Secret',
                        'encryption' => true,
                        'default' => env('NOCAPTCHA_SECRET'),
                    ],
                    'google_captcha_sitekey' => [
                        'field_type' => 'text',
                        'field_label' => 'Sitekey',
                        'encryption' => true,
                        'default' => env('NOCAPTCHA_SITEKEY'),
                    ],
                ]
            ],
        ],
        'layout' => [
            'sub-settings' => [
                'company-brand' => [
                    'company_name' => [
                        'field_type' => 'text',
                        'validation' => 'required',
                        'field_label' => 'Company Name',
                    ],
                    'company_logo' => [
                        'field_type' => 'image',
                        'height' => 120,
                        'width' => 120,
                        'validation' => 'image|size:512',
                        'field_label' => 'Company Logo',
                    ],
                    'company_logo_icon' => [
                        'field_type' => 'image',
                        'height' => 64,
                        'width' => 64,
                        'validation' => 'image|size:512',
                        'field_label' => 'Company Logo Icon',
                    ],
                    'favicon' => [
                        'field_type' => 'image',
                        'height' => 64,
                        'width' => 64,
                        'validation' => 'image|size:100',
                        'field_label' => 'Favicon',
                    ],
                ],

            ],
        ],
    ],
];
