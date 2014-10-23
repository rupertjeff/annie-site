<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Behat context class.
 */
class FeatureContext extends MinkContext implements SnippetAcceptingContext {

	/**
	 * @var \Illuminate\Foundation\Application
	 */
	static $app;

	/**
	 * Initializes context.
	 *
	 * Every scenario gets its own context object.
	 * You can also pass arbitrary arguments to the context constructor through behat.yml.
	 */
	public function __construct()
	{
	}

	/**
	 * @static
	 * @beforeSuite
	 */
	public static function bootstrapLaravel()
	{
		require __DIR__ . '/../../../../bootstrap/autoload.php';

		$unitTesting     = true;
		$testEnvironment = 'testing';

		static::$app = require_once __DIR__ . '/../../../../bootstrap/start.php';
		static::$app->boot();
		static::$app['artisan']->call('migrate');
	}

	/**
	 * @Given I click on :tagType
	 */
	public function iClickOn($tagType)
	{
		$this->clickLink($tagType);
	}

	/**
	 * @Then I should see only :type
	 */
	public function iShouldSeeOnly($type)
	{
		throw new PendingException();
	}

	/**
	 * @Given there are projects
	 */
	public function thereAreProjects()
	{
		/** @var \AnnieDigital\Tags\Repository $repo */
		$repo = static::$app->make('AnnieDigital\Tags\Repository');

		$repo->create([
			'name'  => 'Web',
			'image' => '',
		]);
	}

	/**
	 * @Given I fill out the contact form
	 */
	public function iFillOutTheContactForm()
	{
		$this->fillField('name', 'Jeff');
		$this->fillField('email', 'jeffs@email.com');
		$this->fillField('comments', 'Hi Annie!');

		$this->pressButton('send');
	}

}
