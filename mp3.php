<?PHP

$ffmpeg = FFMpeg\FFMpeg::create(array(
    'ffmpeg.binaries'  => 'vendor/php-ffmpeg',
    'ffprobe.binaries' => 'vendor/php-ffmpeg',
    'timeout'          => 3600, // The timeout for the underlying process
    'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
), $logger);

exit;

require 'vendor/autoload.php';
use FFMpeg\FFMpeg;
use FFMpeg\Format\Audio\Mp3;

// Create an FFMpeg instance
$ffmpeg = FFMpeg::create();

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
