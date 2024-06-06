<?php

namespace App\Providers;

use Filament\PanelProvider;
use Illuminate\Support\ServiceProvider;

class EmployeePanelProvider extends PanelProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Register Employee panel routes, pages, resources, etc.
    }

    public static function role(): string
    {
        return 'employee';
    }
}
