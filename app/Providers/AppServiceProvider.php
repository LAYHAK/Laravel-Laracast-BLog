<?php

namespace App\Providers;

use App\Services\Newsletter;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //$this->app->method is doing the same thing as app()->method
        app()->bind(Newsletter::class, function () {
            $client = ( new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us21',
            ]);

            return new Newsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
