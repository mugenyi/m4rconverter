<?php
   use M4rconverter\Format\Audio\M4rconverterAac;

class M4rconverterAacTest extends \PHPUnit_Framework_TestCase
{
    public function testGetExtraParamsReturnsMatchingValues()
    {
        $values = ['-map', '0:a', '-map_metadata', '-1', '-c:a', 'libfdk_aac', '-f', 'ipod'];
        $result = (new M4rconverterAac())->getExtraParams();

        $this->assertEquals($values, $result);
    }
}
