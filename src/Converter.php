<?php

/*
 * This file is part of M4rconverter.
 *
 * (c) Mugenyi henry <mugenyihenry2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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

  /**
  * @param $inputFile String | Path to the file to be converted
  * @param $destination String| path to the destination  folder
  * @return void
  */

  public function __construct($inputFile, $destination)
  {
    $this->file = $inputFile;
    $this->destination = $destination;
  }

  /**
  *get only  FFMpeg\FFMpeg configurations
  *@return array
  */
  public function getFFMpegConfiguration()
  {
    return $this->ffmpegConfiguration;
  }

  /**
  *set   FFMpeg\FFMpeg package  configurations
  *@return this
  */
  public function setFFMpegConfiguration(array $configuration)
  {
    $this->ffmpegConfiguration = $configuration;

    return $this;
  }

  /**
  *get  Audio  configurations
  *@return array
  */
  public function getAudioFormatConfiguration()
  {
    return $this->audioFormatConfiguration;
  }

  /**
  *set  Audio  configurations
  *@return this
  */
  public function setAudioFormatConfiguration(array $configuration)
  {
    $this->audioFormatConfiguration = $configuration;

    return $this;
  }
  /**
  * Get the M4r Class
  * @return object M4rconverter\Format\M4r
  */
  private function getFormat()
  {
    return new M4r($this->getAudioFormatConfiguration());
  }

  /**
  * Get the FFmpegProcessor Class
  * @return object M4rconverter\Processor\FFmpegProcessor
  */
  private function getProcessor()
  {
    return new FFmpegProcessor($this->getFFMpegConfiguration());
  }
  /**
  * create and save a new file
  * @param  FFmpegProcessor $ffmpegProcessor
  * @param  M4r             $format
  * @param  strimg          $destination
  * @return void
  */
  private function save(FFmpegProcessor $ffmpegProcessor, M4r $format, $destination)
  {
    $audio = $ffmpegProcessor->getProcessedFile($this->file);
    $ffmpegProcessor->save($audio, $format, $destination);
  }

  /**
  * Add format and the file path for the file to be created
  * @return bool
  */
  public function convert()
  {
    $outputFile = new FileManager($this->file, $this->destination);

    $this->save($this->getProcessor(), $this->getFormat(), $this->destination);

    return true;
  }
}
