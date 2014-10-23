<?php namespace Beanstalkhq\Laramandrill;

use Illuminate\Support\ServiceProvider;

class LaramandrillServiceProvider extends ServiceProvider {

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
		$this->package('beanstalkhq/laramandrill');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['laramandrill'] = $this->app->share(function($app)
		{
			return new Laramandrill;
		});

		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Laramandrill', 'Beanstalkhq\Laramandrill\Facades\Laramandrill');
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
