<?php
    namespace M4rconverter;

     use FFMpeg\FFMpeg;
    class converter
    {
      protected $file ;
      protected $destination;
      protected $configuration;

      /*
       * @param $inputFile String | Path to the file to be converted
       * @param $destination String| path to the destination  folder
       * @param $configuration array| FFMpeg\FFMpeg configuration
      */

      public function __construct($inputFile,$destination,$configuration=[])
      {
          $this->file = $inputFile;
          $this->destination = $destination;
          $this->configuration  = $configuration;
      }

      protected getFFMpegConfiguration()
      {
        if(array_key_exists('bitrate',$this->configuration)){
          unset($this->configuration['bitrate']);
        }

        if(array_key_exists('audioChannel')){
          unset($this->configuration['audioChannel']);
        }
      }
    }
