<?php namespace Andremyid\Activitylog;

use Illuminate\Support\ServiceProvider;
use Config;

class ActivitylogServiceProvider extends ServiceProvider {

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
		$this->package('andremyid/activitylog');

		if (! file_exists(app_path('config/activitylog.php'))) {
			copy(__DIR__ . '/../../config/activitylog.php', app_path('config/activitylog.php'));
		}
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'activity',
			'Andremyid\Activitylog\Activitylog'
			);

		$this->app->bind(
			'Andremyid\Activitylog\Handlers\ActivitylogHandlerInterface',
			'Andremyid\Activitylog\Handlers\EloquentHandler'
			);

		if (! empty(Config::get('activitylog.autoAliasLoader'))) {
			if (Config::get('activitylog.autoAliasLoader') == true) {
				$loader = \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('Activity', 'Andremyid\Activitylog\ActivitylogFacade');
			}
		}
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('activity');
	}

}
