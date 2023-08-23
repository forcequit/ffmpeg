<?PHP

require 'vendor/autoload.php';  // Adjust this path if necessary

use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode; //not used.
use FFMpeg\Format\Audio\Mp3;

// Create an FFMpeg instance
$ffmpeg = FFMpeg::create(array(
));



// Open the audio file
$audio = $ffmpeg->open('vo.mp3');



$format = new Mp3();

$reflection = new ReflectionClass($format);

foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
    echo $method->getName() . "\n";
}

exit;

$format->setAudioChannels(1); //mono
$format->setAudioKiloBitrate(16); // Lower bitrate
//$format->addFilter(['-qscale', 7]);
$format->setQscale(7); // Lower bitrate

$metadata = $audio->getFormat()->get('tags');

// Save the converted file
$audio->save($format, 'vo-mono.mp3');

echo 'Completed: ' . $metadata;

?>
