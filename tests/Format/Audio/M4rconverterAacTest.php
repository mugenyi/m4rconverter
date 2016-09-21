<?php
   use  M4rconverter\Format\Audio\M4rconverterAac;
 class M4rconverterAacTest extends \PHPUnit_Framework_TestCase
 {
   public function testGetExtraParamsReturnsMatchingValues()
   {
     $values = ['-f','mp4'];
     $result = (new M4rconverterAac() )->getExtraParams();

     $this->assertEquals($values,$result);
   }
 }
