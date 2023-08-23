<?PHP

require 'vendor/autoload.php';  // Adjust this path if necessary

use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode; //not used.
use FFMpeg\Format\Audio\Mp3;
use FFMpeg\Filters\Audio\AudioFilters;

$file = 'https://dcs.megaphone.fm/SCIM6177024080.mp3?key=5f7c8ee3b3907f78b87c72b28d3a6e5f&request_event_id=8726a1c6-aae8-43ec-88e2-f8b4f2f34f8e';

// Create an FFMpeg instance
$ffmpeg = FFMpeg::create(array());

// Open the audio file
$audio = $ffmpeg->open($file);

$format = new Mp3();
$format->setAudioChannels(1); //mono
$format->setAudioKiloBitrate(16); // Lower bitrate

// Save the converted file
$audio->save($format, 'vo1.mp3');

echo 'Completed.';

?>
