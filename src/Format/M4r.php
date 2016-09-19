<?php
   namespace M4rconverter\Format\Audio;

   use  FFMpeg\Format\Audio;
   class M4r
   {
      protected $configuration;
      protected $format;

      public function __construct(array $configuration)
      {
        $this->configuration = $configuration;
        $this->format =  new Aac();
      }

      private function setConfiguration()
      {
        if(isset($this->configuration['bitrate'])){
          $this->format->setAudioKiloBitrate($this->configuration['bitrate']);
        }

        if(isset($this->configuration['audioChannel'])){
         $this->format->setAudioKiloBitrate($this->configuration['audioChannel']);
        }

        return $this;
      }


      public funtion getFormat()
      {
        return $this->format;
      }



   }
