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

interface ProcessorInterface
{
    /**
   * get a processed file
   * @param String| path to file
   * @return Mixed
  */
  public function getProcessedFile($file);
}
