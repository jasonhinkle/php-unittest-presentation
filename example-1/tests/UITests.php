<?php

/**
 * EXAMPLES FOR INTERACTING WITH THE DOM:
 *
 * // retrieve the value of an element
 * $val = $this->byCssSelector("#div-id")->text();
 * $val = $this->byCssSelector("#input-id")->value();
 *
 * // set a value of an input
 * $this->byName("input-name")->value($val);
 * $this->byCssSelector("#input-id")->value($val);
 *
 * // click a button or link
 * $this->byCssSelector("#input-id")->click();
 * $this->byLinkText("Link Text")->click();
 */
class UITests extends PHPUnit_Extensions_Selenium2TestCase
{

    // declared in order to include code run by selemium in the coverage report
    // (additionally requires configuring 'append.php' and 'prepend.php' in php.ini)
	protected $coverageScriptUrl = 'http://localhost/php-unittest-presentation/example-1/phpunit_coverage.php';

    /**
     * This method will fire multiple times - once before each test is run.
     * at setup we are required to initialize the browser object and base URL.
     * we can optionally setup a DB fixtures or run other init code as necessary
     */
	protected function setUp()
	{
		$this->setBrowser(UNIT_TEST_BROWSER);
		$this->setBrowserUrl(UNIT_TEST_APP_ROOT);
	}

    /**
     * This method will fire multiple times - once after each test is run.
     * We can optionally remove any DB fixtures that were added
     */
    protected function tearDown()
    {
        $this->pauseForDemo();
    }

	/**
	 * HACK for selenium error "Can only set Cookies for the current domain"
	 *      when using phantomjs and generating code coverage
	 */
	public function prepareSession() {
		$res = parent::prepareSession();
		$this->url('/');
		return $res;
	}

    /**
     * Test that the index page is loading, checking for a landmark
     */
    public function testShowIndex()
    {
        $this->openBrowserToUrl(UNIT_TEST_APP_ROOT);

        $val = $this->byCssSelector("a.navbar-brand")->text();

		$this->assertEquals("Example One", $val);
    }

    /**
     * Check that a simple conversion displays correctly
     */
    public function testSimpleConversion()
    {
        $this->openBrowserToUrl(UNIT_TEST_APP_ROOT);

        $this->pauseForDemo();

        $this->byCssSelector("#numberInput")->value('250');
        $this->byCssSelector("#convertButton")->click();

        // wait for the dom to update
        // $this->timeouts()->implicitWait(1000); // this should work but doesn't!
        usleep(.5 * 1000000);

        $result = $this->byCssSelector("#resultContainer")->text();

        $this->assertEquals("two hundred and fifty",$result);

        // $this->saveScreenshot();

    }

	/**
     * Check that a simple conversion displays correctly
     */
    public function testErrorHandling()
    {
        $this->openBrowserToUrl(UNIT_TEST_APP_ROOT);

        $this->pauseForDemo();

        $this->byCssSelector("#numberInput")->value('');
        $this->byCssSelector("#convertButton")->click();

        usleep(.5 * 1000000);
        $result = $this->byCssSelector("#resultContainer")->text();
        $this->assertEquals("Number is required",$result);

		usleep(.5 * 1000000);
		$this->byCssSelector("#closeModalButton")->click();

		$this->byCssSelector("#numberInput")->value('AAA');
        $this->byCssSelector("#convertButton")->click();
        usleep(.5 * 1000000);
        $result = $this->byCssSelector("#resultContainer")->text();
        $this->assertEquals("Numeric value is required",$result);


    }

    /**
     * Helper method to pause for presentation purposes
     */
    protected function pauseForDemo()
    {
        // this is just here for the presentation so we can see the browser window
        if (UNIT_TEST_BROWSER == 'firefox') sleep(1);
    }

    /**
     * Helper method to open the browser to a URL, resizing the screen to deal
     * with possible phantomjs browser issues
     */
    protected function openBrowserToUrl($url)
    {
        $this->url($url);

        // it's necessary to resize the window for phantomjs otherwise elements can't be located
        // this cannot be done in setUp because the browser session is not yet active
        $win=$this->currentWindow();
        $win->size(array('width' => 1440, 'height' => 900));
    }

    /**
     * Save a screenshot of the current browser window in the screenshots/ directory
     */
	protected function saveScreenshot()
	{
		$path = __DIR__.'/../screenshots/'.$this->getName().'-'.time(). '.png';
		file_put_contents($path, $this->currentScreenshot());
	}


}
