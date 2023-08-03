<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use View;
use URL;
use Carbon\Carbon;
use Config;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use App\Mail\EmailVerification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = false;
        if (Schema::hasTable('settings')) {
            $setting = Setting::first();
            View::share('app_settings', $setting);
        }

        $year = date('Y');
        $running_year = $year . '-' . ($year + 1);
        $running_session = $setting ? $setting->running_year : $running_year;

        config(['running_session' => $running_session]);

        // Paginator::defaultView('custom-pagination');

        // Paginator::defaultSimpleView('simple-pagination');

        // VerifyEmail::toMailUsing(function ($notifiable){        
        //     $verifyUrl = URL::temporarySignedRoute('verification.verify',
        //     \Illuminate\Support\Carbon::now()->addMinutes(\Illuminate\Support\Facades 
        //     \Config::get('auth.verification.expire', 60)),
        //     [
        //         'id' => $notifiable->getKey(),
        //         'hash' => sha1($notifiable->getEmailForVerification()),
        //     ]
        // );
        // return new EmailVerification($verifyUrl, $notifiable);

        // });
    }
}
