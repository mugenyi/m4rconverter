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

    public function getFileNameWithOutExtention ()
    {
      list($name,$extention) = explode('.',basename($this->inputFile));
      return $name;
    }

    private function validateDirectory($directory)
    {

      if(!is_dir($directory)){
        throw new \Exception("destination is not a directory");

      }

      if(!is_writable($directory)){
        throw new \Exception("Could not write to the directory");

      }
      return true;
    }

    private function getDirectoryWithSeperator($directory)
    {
      if(!preg_match("/.*\/$/",$directory)){
        $directory = $directory.'/';
      }

      return $directory;
    }




    private function getOutPutFileName($destination){

      $this->validateDirectory($destination);

      return $this->getDirectoryWithSeperator($destination)
             .$this->getFileNameWithOutExtention().'.m4r';
    }


    public function save($processedFile,$format,$destination)
    {
        $processedFile->save($format->getFormat(),$this->getOutPutFileName($destination));
    }

}
