<?PHP

require 'vendor/autoload.php';  // Adjust this path if necessary

use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode; //not used.
use FFMpeg\Format\Audio\Mp3;
use FFMpeg\Filters\Audio\AudioFilters;


// Create an FFMpeg instance
$ffmpeg = FFMpeg::create(array());

// Open the audio file
$audio = $ffmpeg->open('https://sensorpro.net/vo.mp3');

$format = new Mp3();
$format->setAudioChannels(1); //mono
$format->setAudioKiloBitrate(16); // Lower bitrate

// Save the converted file
$audio->save($format, 'vo1.mp3');

echo 'Completed.';

?>
