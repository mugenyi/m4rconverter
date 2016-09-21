<?php
use M4rconverter\Processor\FFmpegProcessor;
use org\bovigo\vfs\vfsStream,
    org\bovigo\vfs\vfsStreamDirectory;
class FFmpegProcessorTest extends \PHPUnit_Framework_TestCase
{
  /**
      * @expectedException RuntimeException
      */
   public function testFileCouldNotBeProcesed()
   {
      $processor = new FFmpegProcessor([]);
      $processor->getProcessedFile('fakeFile');
   }
   
}
