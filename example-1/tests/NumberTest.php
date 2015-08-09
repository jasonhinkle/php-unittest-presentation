<?php

require_once '../libs/NumberUtil.php';

class NumberTest extends PHPUnit_Framework_TestCase
{
    public function testMod()
    {
        $util = new NumberUtil();

        $this->assertTrue(
            $util->IsEven(2),
            'Test that 2 is even');

        $this->assertFalse(
            $util->IsEven(3),
            'Test that 3 is not even');

        $this->assertTrue(
            $util->IsOdd(3),
            'Test that 3 is odd');
    }

    public function testSimpleNumberToWords()
    {
        $util = new NumberUtil();

        $this->assertEquals(
            'seven',
            $util->GetWords(7),
            'Test words for number 7');

        $this->assertEquals(
            'two hundred and twenty-five',
            $util->GetWords(225),
            'Test words for number 255');

        $this->assertEquals(
            'negative two hundred and twenty-five',
            $util->GetWords(-225),
            'Test words for negative number -255');

        $this->assertEquals(
            'negative two hundred and twenty-five',
            $util->GetWords(-225),
            'Test words for negative number -255');

        $this->assertEquals(
            'five hundred point two five',
            $util->GetWords(500.25),
            'Test words for float 500.25');

        $this->assertEquals(
            'fifty thousand and one',
            $util->GetWords(50001),
            'Test words for large number 50001');

    }
}
