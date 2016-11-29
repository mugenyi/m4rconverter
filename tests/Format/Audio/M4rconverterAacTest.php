<?php
   use M4rconverter\Format\Audio\M4rconverterAac;

class M4rconverterAacTest extends \PHPUnit_Framework_TestCase
{
    public function testGetExtraParamsReturnsMatchingValues()
    {
        $values = ['-acodec', 'libfdk_aac', '-f', 'ipod'];
        $result = (new M4rconverterAac())->getExtraParams();

        $this->assertEquals($values, $result);
    }
}
