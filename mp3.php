<?PHP

require 'vendor/autoload.php';  // Adjust this path if necessary

use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode; //not used.
use FFMpeg\Format\Audio\Mp3;

// Create an FFMpeg instance
$ffmpeg = FFMpeg::create(array());

$ffmpeg->addFilter('-q:a', 7);

// Open the audio file
$audio = $ffmpeg->open('vo.mp3');

$format = new Mp3();
$format->setAudioChannels(1); //mono
$format->setAudioKiloBitrate(16); // Lower bitrate

// Save the converted file
$audio->save($format, 'vo-mono.mp3');

echo 'Completed.';

?>
