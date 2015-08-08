<?php

require_once '../libs/ColorUtil.php';

class ColorTests extends PHPUnit_Framework_TestCase
{
    public function testStringToHex()
    {
        $util = new ColorUtil();

        $this->assertEquals('#008000',$util->GetHexString('green'),'Test hex value for color green');

        $this->assertEquals('#FFFFFF',$util->GetHexString('white'),'Test hex value for color white');

    }
}
