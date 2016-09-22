<?php

namespace M4rconverter\Processor;

interface ProcessorInterface
{
    /*
   * get a processed file
   * @param String| path to file
   * @return Mixed
  */
  public function getProcessedFile($file);
}
