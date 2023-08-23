<?php

echp "x"; exit;

namespace App\Workflows\ConvertVideo;

use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\WebM;
use Workflow\Activity;

class ConvertVideoWebmActivity extends Activity
{
    public $timeout = 5;

    public function execute($input, $output)
    {
        $ffmpeg = FFMpeg::create();
        $video = $ffmpeg->open($input);
        $format = new WebM();
        $format->on('progress', fn () => $this->heartbeat());
        $video->save($format, $output);
    }
}
