<?php

namespace App\Providers;

use App\Models\Setting;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        try {

            $applicationSettings = settings();
            if (empty($applicationSettings)) {
                $applicationSettings = Setting::pluck('value', 'name')->toArray();
                foreach ($applicationSettings as $key => $val) {
                    if (is_json($val)) {
                        $applicationSettings[$key] = json_decode($val, true);
                    }
                }
                Cache::forever('settings', $applicationSettings);
            }

            Config::set('app.name', settings('company_name', config('app.name')));

            // Mailer Configuration
            Config::set('mail.from.name', settings('mail_from_name', config('mail.from.name')));
            Config::set('mail.from.address', settings('mail_from_address', config('mail.from.address')));

            switch (settings('mail_driver')) {
                case 'smtp':
                    Config::set('mail.default', 'smtp');
                    Config::set('mail.mailers.smtp.host', settings('mail_host', config('mail.mailers.smtp.host')));
                    Config::set('mail.mailers.smtp.port', settings('mail_port', config('mail.mailers.smtp.port')));
                    Config::set('mail.mailers.smtp.username', settings('mail_username', config('mail.mailers.smtp.username')));
                    Config::set('mail.mailers.smtp.password', settings('mail_password', config('mail.mailers.smtp.password')));
                    Config::set('mail.mailers.smtp.encryption', settings('mail_encryption', config('mail.mailers.smtp.encryption')));
                    break;
                case 'ses':
                    Config::set('mail.default', 'ses');
                    Config::set('services.ses.key', settings('aws_access_key_id'));
                    Config::set('services.ses.secret', settings('aws_secret_access_key'));
                    Config::set('services.ses.region', settings('aws_default_region'));
                    break;
                case 'mailgun':
                    Config::set('mail.default', 'mailgun');
                    Config::set('services.mailgun.domain', settings('mailgun_domain'));
                    Config::set('services.mailgun.endpoint', settings('mailgun_endpoint'));
                    Config::set('services.mailgun.secret', settings('mailgun_secret'));
                    break;
                case 'postmark':
                    Config::set('mail.default', 'postmark');
                    Config::set('services.postmark.token', settings('postmark_token'));
                    break;
            }

            //Google captcha configuration
            Config::set('captcha.sitekey', settings('google_captcha_sitekey', config('captcha.sitekey')));
            Config::set('captcha.secret', settings('google_captcha_secret', config('captcha.secret')));
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }
}
