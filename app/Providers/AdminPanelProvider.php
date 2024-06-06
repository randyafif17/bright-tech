<?php

namespace App\Providers;

use Filament\PanelProvider;
use Illuminate\Support\ServiceProvider;

class AdminPanelProvider extends PanelProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Register Admin panel routes, pages, resources, etc.
    }

    public static function role(): string
    {
        return 'admin';
    }
}
