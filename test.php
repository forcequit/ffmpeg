<?php

namespace App\Workflows\ConvertVideo;

use Workflow\ActivityStub;
use Workflow\Workflow;

class ConvertVideoWorkflow extends Workflow
{
    public function execute()
    {
        yield ActivityStub::make(
            ConvertVideoWebmActivity::class,
            storage_path('/timur.mp4'),
            storage_path('/timur.webm'),
        );
    }
}

?>
