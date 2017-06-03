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
		// $this->package('x-bird/smarty');
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
        $this->publishes([
            $configPath => $this->resolveConfigurePath() . DIRECTORY_SEPARATOR . 'laravel5-fis3-smarty.php',
        ]);


		$this->app['view']->addExtension('tpl', 'smarty', function() use ($app){
			return new SmartyEngine($app['config']['laravel5-fis3-smarty']);
		});
	}

	/**
     * @return string
     */
    protected function resolveConfigurePath()
    {
        return (isset($this->app['path.config']))
            ? $this->app['path.config'] : $this->app->basePath() . DIRECTORY_SEPARATOR . 'config';
    }

}
