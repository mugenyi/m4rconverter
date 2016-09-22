<?php

  use M4rconverter\Converter;

  class ConverterTest extends \PHPUnit_Framework_TestCase
  {
      protected $configuration = [];
      protected $converter;

      public function setUp()
      {
          $this->configuration = ['ffmpeg.binaries' => '/usr/bin/ffmpeg'];
          $this->converter = new Converter('test', 'test');
      }

      public function testGetFFMpegConfigurationReturnsSetValues()
      {
          $this->converter->setFFMpegConfiguration($this->configuration);
          $this->assertEquals($this->configuration,
         $this->converter->getFFMpegConfiguration()
       );
      }

      public function testGetAudioFormatConfigurationReturnsSetValues()
      {
          $this->converter->setAudioFormatConfiguration($this->configuration);
          $this->assertEquals($this->configuration,
                          $this->converter->getAudioFormatConfiguration());
      }
  }
