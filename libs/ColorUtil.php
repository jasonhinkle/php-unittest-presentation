<?php

class ColorUtil
{

    const COLOR_NAMES = array(
        "black"     => array(0, 0, 0),
        "green"     => array(0, 128, 0),
        "silver"    => array(192, 192, 192),
        "lime"      => array(0, 255, 0),
        "gray"      => array(128, 0, 128),
        "olive"     => array(128, 128, 0),
        "white"     => array(255, 255, 255),
        "yellow"    => array(255, 255, 0),
        "maroon"    => array(128, 0, 0),
        "navy"      => array(0, 0, 128),
        "red"       => array(255, 0, 0),
        "blue"      => array(0, 0, 255),
        "purple"    => array(128, 0, 128),
        "teal"      => array(0, 128, 128),
        "fuchsia"   => array(255, 0, 255),
        "aqua"      => array(0, 255, 255),
    );

    public function GetHexString($name)
    {
        $color = self::COLOR_NAMES[$name];
        return strtoupper('#'
            . str_pad(dechex($color[0]), 2, '0', STR_PAD_LEFT)
            . str_pad(dechex($color[1]), 2, '0', STR_PAD_LEFT)
            . str_pad(dechex($color[2]), 2, '0', STR_PAD_LEFT)
        );

    }

}
