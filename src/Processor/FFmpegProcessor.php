<?php
namespace M4rconverter\Processor;
use FFMpeg\FFMpeg;
class FFmpegProcessor implements ProcessorInterface {

    protected $FFMpeg;

    public function __construct($configuration)
    {
      $this->FFMpeg = FFMpeg::create($configuration);
    }

    public function getProcessedFile($file)
    {
      return $this->FFMpeg->open($file);
    }


}
