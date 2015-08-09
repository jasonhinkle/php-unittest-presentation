<?php

require_once '../libs/NumberUtil.php';

/**
 * A TestCase is a collection of unit tests.
 * This class extends the PHPUnit_Framework_TestCase which provides various
 * helper methods.  By convention the classname should match the
 * filename, however this is not required.
 */
class NumberTests extends PHPUnit_Framework_TestCase
{
    /**
     * A method indicates a single unit test. The method name must begin with
     * the text "test".  PHPUnit will ignore any method that does not begin
     * with test.
     */
    public function testEvenCalculation()
    {

        // call a method on the object we are testing
        $util = new NumberUtil();
        $isEven = $util->IsEven(2);

        // within our test, we must make at least one "assertion"
        // PHPUnit compares the expected value with an actual value.
        // This is how you tell PHPUnit whether or not the code behaved
        // as expected.

        // use a method from TestCase to check (assert) that the value is true
        $this->assertTrue($isEven);

        // there are tons of assertion methods, many things can be
        // tested more than one way, for example:
        $this->assertEquals(true,$isEven);

        // all assert methods have an optional parameter for a helpful message
        // that is printed if a test fails. This is a good place for info
        // that may not be obvious by looking at the code
        $this->assertTrue($isEven,'Assert that isEven is true');
    }

    /**
     * This is another unit test
     */
    public function testOddCalculation()
    {
        // call a different method this time
        $util = new NumberUtil();
        $isOdd = $util->IsOdd(2);

        // this time check that the return value is false
        $this->assertFalse($isOdd);
    }

}
