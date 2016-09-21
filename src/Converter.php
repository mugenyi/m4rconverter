<?php
namespace M4rconverter;
require_once __DIR__.'/../bootstrap/start.php';



use FFMpeg\FFMpeg;
use M4rconverter\Format\M4r;
use M4rconverter\Processor\FFmpegProcessor;


class Converter
{
  protected $file ;
  protected $destination;
  protected $ffmpegConfiguration = [];
  protected $audioFormatConfiguration = [];

  /*
  * @param $inputFile String | Path to the file to be converted
  * @param $destination String| path to the destination  folder
  * @param $configuration array| configuration
  */

  public function __construct($inputFile,$destination)
  {
    $this->file = $inputFile;
    $this->destination = $destination;
  }

  /*
  *get only  FFMpeg\FFMpeg configurations
  *@return array
  */
  public function getFFMpegConfiguration()
  {
    return $this->ffmpegConfiguration;
  }

  /*
  *set   FFMpeg\FFMpeg package  configurations
  *@return this
  */
  public function  setFFMpegConfiguration(array $configuration)
  {
    $this->ffmpegConfiguration = $configuration;

    return $this;
  }

  /*
  *get  Audio  configurations
  *@return array
  */
  public function getAudioFormatConfiguration()
  {
    return $this->audioFormatConfiguration;
  }

  /*
  *set  Audio  configurations
  *@return this
  */
  public function setAudioFormatConfiguration (array $configuration)
  {
    $this->audioFormatConfiguration = $configuration;
    return $this;
  }

  private function getFormat()
  {
    return new M4r($this->getAudioFormatConfiguration());
  }

  private function save($format,$destination)
  {
    $processor = new FFmpegProcessor($this->getFFMpegConfiguration());
    $audio = $processor->getProcessedFile($this->file);

    $processor->save($audio,$format,$destination);
  }

  public function convert()
  {
    $this->save($this->getFormat(),$this->destination);

  }




}
