<?php

namespace M4rconverter;

require_once __DIR__.'/../bootstrap/start.php';

use FFMpeg\FFMpeg;
use M4rconverter\Format\M4r;
use M4rconverter\Processor\FFmpegProcessor;

class Converter
{
    protected $file;
    protected $destination;
    protected $ffmpegConfiguration = [];
    protected $audioFormatConfiguration = [];

  /*
  * @param $inputFile String | Path to the file to be converted
  * @param $destination String| path to the destination  folder
  * @param $configuration array| configuration
  */

  public function __construct($inputFile, $destination)
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
  public function setFFMpegConfiguration(array $configuration)
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
  public function setAudioFormatConfiguration(array $configuration)
  {
      $this->audioFormatConfiguration = $configuration;

      return $this;
  }

    private function getFormat()
    {
        return new M4r($this->getAudioFormatConfiguration());
    }

    private function getProcessor()
    {
        return new FFmpegProcessor($this->getFFMpegConfiguration());
    }

    private function save(FFmpegProcessor $ffmpegProcessor, M4r $format, $destination)
    {
        $audio = $ffmpegProcessor->getProcessedFile($this->file);
        $ffmpegProcessor->save($audio, $format, $destination);
    }

    public function convert()
    {
        $outputFile = new FileManager($this->file, $this->destination);

        $this->save($this->getProcessor(), $this->getFormat(), $this->destination);

        return true;
    }
}
