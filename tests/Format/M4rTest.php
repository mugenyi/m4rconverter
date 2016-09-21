<?php
use M4rconverter\Format\M4r;
class M4rTest extends \PHPUnit_Framework_TestCase
{
  protected $configuration;
  protected $format;

  public function setUp()
  {
     $this->configuration = [
       'bitrate'=>'380',
       'audioChannel'=>2
     ];

       $this->format =  new M4r($this->configuration);
  }

  public function testBitrateConfigurationHasBeenSet()
  {

    $this->assertSame($this->configuration['bitrate'],
                     $this->format->getConfiguration()['bitrate']);
  }

  public function testAudioChannelConfigurationHasBeenSet()
  {
    $this->assertSame($this->configuration['audioChannel'],
                     $this->format->getConfiguration()['audioChannel']);
  }

  public function testGetFormat()
  {
    $format =  (new M4r([]))->getFormat();
    $actual = get_class($format);
    $expected =  "M4rconverter\Format\Audio\M4rconverterAac";
    $this->assertEquals($expected, $actual);
  }

  public function testGetFormatWithSetConfigurations()
  {
    $format =  (new M4r($this->configuration))->getFormat();
    $actual = get_class($format);
    $expected =  "M4rconverter\Format\Audio\M4rconverterAac";
    $this->assertEquals($expected, $actual);
  }



}
