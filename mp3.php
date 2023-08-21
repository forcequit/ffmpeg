<?PHP

require 'vendor/autoload.php';
use FFMpeg\FFMpeg;
use FFMpeg\Format\Audio\Mp3;

// Create an FFMpeg instance
$ffmpeg = FFMpeg::create();

// Open the audio file
$audio = $ffmpeg->open('test.mp3');

// Set the desired format (MP3) and specify it should be mono (1 channel)
$format = new Mp3();
$format->setAudioChannels(1);

// Save the converted file
$audio->save($format, 'mono.mp3');

echo "Conversion completed!";


?>
