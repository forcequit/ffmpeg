<?PHP

echo 'Hello World';
if (extension_loaded('ffmpeg')) {
    echo "FFmpeg PHP extension is loaded!<br>";

    // Get the ffmpeg version
    $ffmpegInstance = new ffmpeg_movie('path_to_some_video_file.mp4'); // Replace with a path to an actual video file on your server
    echo "FFmpeg version: " . $ffmpegInstance->getFFmpegVersion();
} else {
    echo "FFmpeg PHP extension is not loaded.";
}


?>
