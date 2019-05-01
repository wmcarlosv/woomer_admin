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
                [
                    'text' => 'Woocommerce',
                    'url' => '#',
                    'submenu' => [
                        [
                            'text' => 'Ordenes',
                            'route' => 'woocommerce.orders',
                            'icon' => ''
                        ]
                    ]
                ],
                [
                    'text' => 'Mercado Libre',
                    'url' => '#',
                    'submenu' => [
                        [
                            'text' => 'Ordenes',
                            'url' => '#',
                            'icon' => ''
                        ],
                        [
                            'text' => 'Preguntas y Respuestas',
                            'url' => '#',
                            'icon' => ''
                        ]
                    ]
                ],
                [
                    'text' => 'Configuración',
                    'url' => '#',
                    'submenu' => [
                        [
                            'text' => 'Woomerce',
                            'route' => 'config_woommerces.index',
                            'icon' => ''
                        ],
                        [
                            'text' => 'Mercado Libre',
                            'url' => '#',
                            'icon' => ''
                        ],
                        [
                            'text' => 'Tawk.to',
                            'url' => '#',
                            'icon' => ''
                        ]
                    ]
                ]
            );
        });
    }
}
