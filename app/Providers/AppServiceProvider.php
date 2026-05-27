<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;

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
        // Activamos los estilos de Bootstrap 5 para la paginación
        Paginator::useBootstrapFive();

        // Tus reglas de seguridad existentes se mantienen intactas aquí abajo
        Gate::define("view-dashboard", function ($user) {
            return $user->hasRole("admin") || $user->hasRole("editor");
        });
        Gate::define ("edit_post", function ($user) {
            return $user->hasRole("admin") || $user->hasRole("editor");
        });
        Gate::define ("delete-post", function ($user){
            return $user->hasRole("admin");
        });
    }
}