## m4rconverter

This is an iphone ringtone converter using php. Its a simplest way of creating ( .m4r ) format audio which is the recommended type for IOS product tones.

### installation
This package uses  __ffmpeg__ and __ffprobe__ libraries so make sure they are installed before you install it.

    composer require mugenyi/m4rconverter

### basic usage
Provide the class with 2 values.
* Path to the file to be converted.
* Directory to save the converted file.

         $converter = new M4rconverter\Converter('tracks/avril.mp3','converted');
         $converter->convert();


### configuration
M4rconverter allows you to easily configure the underlying __FFmpeg__  and  __audio__.
* configure ffmpeg

        $converter->setFFMpegConfiguration([

        'ffmpeg.binaries'  => '/opt/local/ffmpeg/bin/ffmpeg',
        'ffprobe.binaries' => '/opt/local/ffmpeg/bin/ffprobe',
        'timeout'          => 3600, // The timeout for the underlying process
        'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
        ]);

* configure audio

        $converter->setAudioFormatConfiguration([
        'bitrate'  => 256, //AudioKiloBitrate
        'audioChannel' => 2,
        'duration'=>30 //time in seconds for the   output file
        'seek'=>30 //time in seconds to seek
        ]);

### special thanks
M4rconverter is built on top of [php-ffmpeg](https://github.com/PHP-FFMpeg/PHP-FFMpeg) package. __special thanks__ to the team behind the project.

### Example apps

[itunemachine.com](https://itunemachine.com/) uses this package to [make name ringtones](https://itunemachine.com/name-ringtone/maker) 
