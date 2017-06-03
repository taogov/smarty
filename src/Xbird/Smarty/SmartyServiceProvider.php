<?php
namespace Xbird\Smarty;

use Illuminate\Support\ServiceProvider;

class SmartyServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	// protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
        $configPath = __DIR__ . '/../../config/laravel5-fis3-smarty.php';
        if (function_exists('config_path')) {
            $publishPath = config_path('laravel5-fis3-smarty.php');
        } else {
            $publishPath = base_path('config/laravel5-fis3-smarty.php');
        }
        $this->publishes([$configPath => $publishPath], 'config');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../libraries' => base_path('libraries'),
            ], 'plugins');
        }
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$app = $this->app;

		$configPath = __DIR__ . '/../../config/laravel5-fis3-smarty.php';
        $this->mergeConfigFrom($configPath, 'laravel5-fis3-smarty');

		$this->app['view']->addExtension('tpl', 'smarty', function() use ($app){
			return new SmartyEngine($app['config']['laravel5-fis3-smarty']);
		});
	}
}
