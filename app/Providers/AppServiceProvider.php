<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

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
        // Using view composer to share wallet balance with all views
        View::composer('*', function ($view) {
            // Get the authenticated user's ID
            $userId = Auth::id();

            // Fetch the user's wallet
            $wallet = Wallet::where('user_id', $userId)->first();

            // Check if wallet exists for the user
            $walletBalance = $wallet ? $wallet->balance : 0;

            // Share wallet balance with all views
            $view->with('walletBalance', $walletBalance);
        });
    }
}
