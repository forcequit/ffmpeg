<?PHP

require 'vendor/autoload.php';  // Adjust this path if necessary

use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;

$ffmpegBinaries = '/home/forge/default/vendor/php-ffmpeg/php-ffmpeg/src/FFMpeg/FFMpeg';
$ffprobeBinaries = '/home/forge/default/vendor/php-ffmpeg/php-ffmpeg/src/FFMpeg/FFProbe';

// Create an FFMpeg instance
$ffmpeg = FFMpeg::create(array(
    'ffmpeg.binaries'  => $ffmpegBinaries,
    'ffprobe.binaries' => $ffprobeBinaries,
));

exit;


// Open the audio file
$audio = $ffmpeg->open('test.mp3');

// Set the desired format (MP3) and specify it should be mono (1 channel)
$format = new Mp3();
$format->setAudioChannels(1);

// Save the converted file
$audio->save($format, 'mono.mp3');

echo "Conversion completed!";


?>
