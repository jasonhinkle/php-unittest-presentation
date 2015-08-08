<?php
/**
 * @package test::Tests
 */

/**
 * phpunit includes all classes necessary for testing, but if any additional
 * classes must be included they can be added here
 */

/**
 * This test runner file will scan for test files in the "Tests" subdirectory
 * and add them to the test suite so long as the filename ends in .php
 * and the class name matches the file name, for example "Basic.php" classname is "test_Basic"
 *
 * WARNING: RENAMING THIS FILE WITHOUT UPDATING THE CODE INSIDE COULD CAUSE AN INFININE LOOP
 *
 * @package test::Tests
 * @author Phreeze Builder
 * @version 1.0
 */
class AllTests
{
    public static function suite()
    {

        $suite = new PHPUnit_Framework_TestSuite('PHPUnit');
        $files = scandir('./tests/');

        foreach ($files as $file) {
        	if (strpos($file,'.php') > -1 && $file != 'AllTests.php') {
        		$testClass = str_replace('.php', '', $file);
        		// echo ">> Initializing Test Class '$testClass'\n";
        		require_once $file;
        		$suite->addTestSuite($testClass);
        	}
        }

        return $suite;
    }
}
