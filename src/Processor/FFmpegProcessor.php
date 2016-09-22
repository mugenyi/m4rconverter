<?php

/*
 * This file is part of M4rconverter.
 *
 * (c) Mugenyi henry <mugenyihenry2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace M4rconverter\Processor;

use FFMpeg\FFMpeg;

class FFmpegProcessor implements ProcessorInterface
{
  protected $FFMpeg;
  /**
  * create the FFMpeg object.
  * @param array $configuration  ffmpeg configurations
  */
  public function __construct(array $configuration)
  {
    $this->FFMpeg = FFMpeg::create($configuration);
  }

  /**
  * get a processed file
  * @param String| path to file
  * @return Mixed
  */
  public function getProcessedFile($file)
  {
    return $this->FFMpeg->open($file);
  }

  /**
  * create and save file
  * @param  object $processedFile object returned frome the processed file
  * @param  object $format        object of the M4rconverter\Format\M4r
  * @param  string $outputFile    full path for the file to be created
  * @return void
  */
  public function save($processedFile, $format, $outputFile)
  {
    $processedFile->save($format->getFormat(), $outputFile);
  }
}
