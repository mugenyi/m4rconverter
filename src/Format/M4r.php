<?php
/*
 * This file is part of M4rconverter.
 *
 * (c) Mugenyi henry <mugenyihenry2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace M4rconverter\Format;

use M4rconverter\Format\Audio\M4rconverterAac;

class M4r
{
    protected $configuration;
    protected $format;


    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;


        $this->format = new M4rconverterAac($configuration);
    }
  /**
   * set configurations if they have been set.
   *
   * @return $this
   */
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
  /**
   * get active configurations.
   *
   * @return array
   */
  public function getConfiguration()
  {
      return $this->configuration;
  }
  /**
   * get the Audio formart instance with newly set configurations.
   *
   * @return M4rconverter\Format\Audio\M4rconverterAac
   */
  public function getFormat()
  {
      $this->setConfiguration();

      return $this->format;
  }
}
