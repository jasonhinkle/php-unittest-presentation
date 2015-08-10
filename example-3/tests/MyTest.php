<?php

class MyTest extends PHPUnit_Extensions_Selenium2TestCase
{
    /**
     * Setup
     */
    public function setUp()
    {
        $this->setBrowser('firefox');
        $this->setHost('127.0.0.1');
        $this->setPort(4444);
        $this->setBrowserUrl('http://localhost/');
    }

    /**
     * Method testMy
     * @test
     */
    public function testMy()
    {
        $this->url("/php-unittest-presentation/example-1/");
        $this->byId("numberInput")->value("25");
        $this->byId("convertButton")->click();
        for ($second = 0; ; $second++) {
                if ($second >= 60) $this->fail("timeout");
                try {
                        if ($this->byCssSelector("#resultContainer")->displayed()) break;
                } catch (Exception $e) {}
                sleep(1);
        }

        $result = $this->byCssSelector("#resultContainer")->text();
        $this->assertEquals("twenty-five", $result);
    }

}
