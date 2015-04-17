<?php namespace Beanstalkhq\Laramandrill;

use Illuminate\Support\ServiceProvider;

class LaramandrillServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/../../config/laramandrill.php' => config_path('laramandrill.php')], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/laramandrill.php', 'laramandrill');

        $this->app->singleton('laramandrill', function ($app) {
            return new Laramandrill;
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('laramandrill');
    }

}
