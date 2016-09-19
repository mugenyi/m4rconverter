<?php
namespace M4rconverter\Format\Audio;
   use  FFMpeg\Format\Audio\Aac;

  /**
   *
   */
  class M4rconverterAac extends Aac
  {
    /**
     * {@inheritdoc}
     */
    public function getExtraParams()
    {
        return array('-f','mp4');
    }
  }
