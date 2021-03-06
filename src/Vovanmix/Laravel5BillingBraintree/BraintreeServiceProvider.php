<?php

namespace Vovanmix\Laravel5BillingBraintree;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class BraintreeServiceProvider extends ServiceProvider {

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
		
		$this->publishes([
		    __DIR__.'/../../config/braintree.php' => config_path('billing_braintree.php'),
		]);

		$this->app->singleton('BillingBraintree', function($app)
		{
			return new BillingBraintree();//$app['config']['AdminMenu']
		});

		$loader = AliasLoader::getInstance();
		$loader->alias('Billing', 'Vovanmix\Laravel5BillingBraintree\Facades\Billing');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
