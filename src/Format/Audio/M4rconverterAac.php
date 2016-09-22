<?php
/*
 * This file is part of M4rconverter.
 *
 * (c) Mugenyi henry <mugenyihenry2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace M4rconverter\Format\Audio;

use FFMpeg\Format\Audio\Aac;

class M4rconverterAac extends Aac
{
  /**
  * Add more options to the comandline ffmpeg command
  * @return array
  */
  public function getExtraParams()
  {
    return array('-f', 'mp4');
  }
}
