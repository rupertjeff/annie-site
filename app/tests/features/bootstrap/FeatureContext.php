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
	 * Initializes context.
	 *
	 * Every scenario gets its own context object.
	 * You can also pass arbitrary arguments to the context constructor through behat.yml.
	 */
	public function __construct()
	{
	}

	/**
	 * @Given I click on :tagType
	 */
	public function iClickOn($tagType)
	{

	}

	/**
	 * @Then I should see only :type
	 */
	public function iShouldSeeOnly($type)
	{
		throw new PendingException();
	}
}
