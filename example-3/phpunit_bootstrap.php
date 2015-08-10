<?php
/**
 * This bootstrap file will setup the enviroment so that
 * the application can be tested from the command line.
 *
 * The phpunit.xml file in this directory instructs PHPUnit
 * to include this file prior to running any tests.
 */

define('UNIT_TEST_BROWSER', 'firefox'); // 'firefox' or 'phantomjs'
define('UNIT_TEST_APP_ROOT', 'http://localhost/php-unittest-presentation/example-3/');
