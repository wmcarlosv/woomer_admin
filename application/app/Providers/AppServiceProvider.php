<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

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
    public function boot(Dispatcher $events)
    {
        Schema::defaultStringLength(191);
        $events->Listen(BuildingMenu::class, function(BuildingMenu $event){
            $event->menu->add('MENU DE NAVEGACION');
             $event->menu->add(
                [
                    'text' => 'Dashboard',
                    'route' => 'home',
                    'icon' => 'dashboard'
                ],
                'ORDENES',
                [
                    'text' => 'Ordenes Woocommerce',
                    'route' => 'woocommerce.orders',
                    'icon' => 'file-text'
                ],
                [
                    'text' => 'Ordenes Mercado Libre',
                    'url' => '#',
                    'icon' => 'file-o'
                ],
                'MENSAJERIA',
                [
                    'text' => 'Preguntas Mercado Libre',
                    'url' => '#',
                    'icon' => 'comment'
                ],
                [
                    'text' => 'Preguntas Tawk',
                    'url' => '#',
                    'icon' => 'comments'
                ],
                'CONFIGURACION',
                [
                    'text' => 'Configuración Woocommerce',
                    'route' => 'config_woocommerces.index',
                    'icon' => 'cogs'
                ],
                [
                    'text' => 'Configuración Mercado Libre',
                    'url' => '#',
                    'icon' => 'cog'
                ],
                [
                    'text' => 'Configuración Tawk.io',
                    'url' => '#',
                    'icon' => 'wrench'
                ]
            );
        });
    }
}
