<?php

namespace Pratik\ToDoEventCalender;

use Illuminate\Support\ServiceProvider;

class TodoEventCalenderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
      $this->loadViewsFrom(__DIR__.'/view', 'todocalender');
      $this->loadRoutesFrom(__DIR__.'/routes.php');

      $this->publishes([
        __DIR__.'/public' => public_path('vendor/pratik/todocalender'),
    ], 'public');
      
    // Publish your migrations
    $this->publishes([
        __DIR__.'/migrations/' => database_path('/migrations')
    ], 'migrations');

    $this->publishes([
        __DIR__.'/view' => resource_path('views/vendor/pratik/todocalender'),
    ]);

    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Pratik\ToDoEventCalender\Controller\CalenderController');
    }
}
