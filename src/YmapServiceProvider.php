<?php

namespace NelsonEAX\Ymap;

use Illuminate\Support\ServiceProvider;

class YmapServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            //Вьюшки в общую папку - необязательно
            __DIR__.'/Resourses/Views' => base_path('resources/views/nelsoneax/ymap'),
            //Конфигурация
            __DIR__.'/path/to/config/courier.php' => config_path('courier.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__.'/resourses/views', 'ymapviews');
        /*$this->loadRoutesFrom(__DIR__.'/Routes');
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->loadTranslationsFrom(__DIR__.'/Migrations');*/
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes/routes.php';
        $this->app->make('NelsonEAX\Ymap\http\controllers\YmapController');
    }
}
