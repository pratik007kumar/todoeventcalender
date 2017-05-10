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
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
         // include __DIR__.'/routes.php';

        $this->app->make('Pratik\ToDoEventCalender\Controller\CalenderController');
        // $this->app->make('Pratik\ToDoEventCalender\Model\Calender');
        // $this->app->make('Pratik\ToDoEventCalender\Requests\');
    }
}
