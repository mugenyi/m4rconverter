<?php
namespace M4rconverter\Processor;
use FFMpeg\FFMpeg;
class FFmpegProcessor implements ProcessorInterface {

    protected $FFMpeg;
    protected $inputFile;

    public function __construct($configuration)
    {
      $this->FFMpeg = FFMpeg::create($configuration);
    }

    public function getProcessedFile($file)
    {
      $this->inputFile = $file;
      return $this->FFMpeg->open($file);
    }


}
