<?php
/**
 * This bootstrap file will setup the enviroment so that
 * a Phreeze application can be tested from the command line.
 *
 * The phpunit.xml file in this directory instructs PHPUnit
 * to include this file prior to running any tests.
 *
 * Note that code executed in this file is not included in
 * the code coverage report
 */

define('UNIT_TEST_BROWSER','phantomjs'); // 'firefox' or 'phantomjs'
define('UNIT_TEST_APP_ROOT','http://localhost/php-unittest-presentation/example-1/'); // 'firefox' or 'phantomjs'
