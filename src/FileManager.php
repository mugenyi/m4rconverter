<?php

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
    public function getFileNameWithOutExtention()
    {
        list($name, $extention) = explode('.', basename($this->inputFile));

        return $name;
    }

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

    public function getDirectoryWithSeperator()
    {
        if (!preg_match("/.*\/$/", $this->destination)) {
            $this->destination = $this->destination.'/';
        }

        return $this->destination;
    }

    public function getOutPutFileName()
    {
        $this->validateDirectory($this->destination);

        return $this->getDirectoryWithSeperator()
           .$this->getFileNameWithOutExtention().'.m4r';
    }
}
