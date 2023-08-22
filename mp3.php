<?PHP


// Define the commands
$commands = [
    "cd ffmpeg-5.1.2",
    "./configure --enable-gpl --enable-libmp3lame --enable-libopus --enable-libvpx --enable-libx264 --enable-libx265 --enable-nonfree",
    "make",
    "sudo make install"
];

// Execute the commands
foreach ($commands as $command) {
    $output = shell_exec($command . " 2>&1");
    echo "<pre>$command\n$output</pre>";
}


exit;

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
