<?php

namespace App\Providers;

use App\Models\Employee;
use Illuminate\Support\ServiceProvider;

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
        Employee::created(function ($employee){
            \Illuminate\Support\Facades\Mail::to($employee)->send(new \App\Mail\WelcomeMail($employee));
        });
    }
}
