<?php namespace AnnieDigital\Support;

use Illuminate\Support\ServiceProvider;

/**
 * Class AnnieServiceProvider
 *
 * @package AnnieDigital\Support
 */
class AnnieServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('AnnieDigital\Contracts\Commanding\CommandBus', 'AnnieDigital\Commanding\DefaultCommandBus');
		$this->app->bind('AnnieDigital\Contracts\Commanding\Translator', 'AnnieDigital\Commanding\DefaultTranslator');

		$this->app->bind('AnnieDigital\Contracts\Repositories\Contact', 'AnnieDigital\Contact\Repository');
		$this->app->bind('AnnieDigital\Contracts\Repositories\Images', 'AnnieDigital\Images\Repository');
		$this->app->bind('AnnieDigital\Contracts\Repositories\Projects', 'AnnieDigital\Projects\Repository');
		$this->app->bind('AnnieDigital\Contracts\Repositories\Tags', 'AnnieDigital\Tags\Repository');

		$this->app['view']->composer('partials.portfolio', 'AnnieDigital\Tags\Composer');
		$this->app['view']->composer('emails.contact.submission', 'AnnieDigital\Composers\Emails\Contact\SubmissionComposer');

		$this->app['events']->listen('Annie.*', 'AnnieDigital\Events\Handler');
	}

}
