<?php

namespace App\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Macro for handeling file uploads in filament
        // https://github.com/livewire/livewire/discussions/3084#discussioncomment-7943377
        Request::macro('hasValidSignature', function ($absolute = true) {
            if (config('app.env') === 'production') {
                return true;
            }

            return URL::hasValidSignature($this, $absolute);
        });

        Request::macro('hasValidRelativeSignature', function () {
            if (config('app.env') === 'production') {
                return true;
            }

            return URL::hasValidSignature($this, $absolute = false);
        });

        Request::macro('hasValidSignatureWhileIgnoring', function ($ignoreQuery = [], $absolute = true) {
            if (config('app.env') === 'production') {
                return true;
            }

            return URL::hasValidSignature($this, $absolute, $ignoreQuery);
        });
    }
}
