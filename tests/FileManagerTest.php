<?php

use M4rconverter\FileManager;
use org\bovigo\vfs\vfsStream;

class FileManagerTest extends \PHPUnit_Framework_TestCase
{
    protected $manager;
    public function setUp()
    {
        $root = vfsStream::setup('destinationDirectory', 0744);
        $file = vfsStream::newFile('track.mp3')->at($root);
        $this->manager = new FileManager($file->url(), vfsStream::url('destinationDirectory'));
    }

    public function testNameWithoutExtention()
    {
        $result = $this->manager->getFileNameWithOutExtention();
        $expected = 'track';
        $this->assertSame($result, $expected);
    }

    public function testGetDirectoryWithSeperatorWithNoSeperatorPath()
    {
        $result = $this->manager->getDirectoryWithSeperator();
        $expected = 'vfs://destinationDirectory/';
        $this->assertSame($result, $expected);
    }

    public function testValidateDirectoryIsAdirectory()
    {
        $this->manager->validateDirectory();
        $this->assertTrue(true);
    }

   /**
    * @expectedException InvalidArgumentException
    */
   public function testValidateIsNotADirectory()
   {
       (new FileManager('track.mp3', 'iamnyoadirectory'))
                ->validateDirectory('iAmNotADirector');
   }

   /**
    * @expectedException InvalidArgumentException
    */
   public function testValidateIsNotAWritableDirectory()
   {
       $root = vfsStream::setup('destinationDirectory', 044);
       $this->manager = new FileManager('track.mp3', vfsStream::url('destinationDirectory'));
       $this->manager->validateDirectory();
   }

    public function testGetFullNameHasM4rExtendion()
    {
        $result = $this->manager->getOutPutFileName();
        $this->assertEquals('vfs://destinationDirectory/track.m4r', $result);
    }
}
