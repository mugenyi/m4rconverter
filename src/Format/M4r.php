<?php

namespace M4rconverter\Format;

use M4rconverter\Format\Audio\M4rconverterAac;

   class M4r
   {
       protected $configuration;
       protected $format;

       public function __construct(array $configuration)
       {
           $this->configuration = $configuration;
           $this->format = new M4rconverterAac();
       }

       private function setConfiguration()
       {
           if (isset($this->configuration['bitrate'])) {
               $this->format->setAudioKiloBitrate($this->configuration['bitrate']);
           }

           if (isset($this->configuration['audioChannel'])) {
               $this->format->setAudioKiloBitrate($this->configuration['audioChannel']);
           }

           return $this;
       }

       public function getConfiguration()
       {
           return $this->configuration;
       }

       public function getFormat()
       {
           $this->setConfiguration();

           return $this->format;
       }
   }
