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
            storage_path('app/oceans.mp4'),
            storage_path('app/oceans.webm'),
        );
    }
}

?>
