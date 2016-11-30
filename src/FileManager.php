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

class FileManager
{
    protected $inputFile;
    protected $destination;
    public function __construct($file, $destination)
    {
        $this->inputFile = $file;
        $this->destination = $destination;
    }
  /**
   * Get a filename with the extention removed.
   *
   * @return string
   */
  public function getFileNameWithOutExtention()
  {
      list($name, $extention) = explode('.', basename($this->inputFile));

      return $name;
  }

  /**
   * Apply checks to the directory to be used as a destination.
   *
   * @return bool | InvalidArgumentException
   */
  public function validateDirectory()
  {
      if (!is_dir($this->destination)) {
          throw new \InvalidArgumentException('destination is not a directory');
      }

      if (!is_writable($this->destination)) {
          throw new \InvalidArgumentException('Could not write to the directory');
      }

      return true;
  }
  /**
   * Add a directory seperator to a name if it does not exists.
   *
   * @return string
   */
  public function getDirectoryWithSeperator()
  {
      if (!preg_match("/.*\/$/", $this->destination)) {
          $this->destination = $this->destination.'/';
      }

      return $this->destination;
  }

  /**
   * Get a full name of the file to be generated.
   *
   * @return string
   */
  public function getOutPutFileName()
  {
      $this->validateDirectory($this->destination);

      return $this->getDirectoryWithSeperator()
    .$this->getFileNameWithOutExtention().'.m4r';
  }
}
