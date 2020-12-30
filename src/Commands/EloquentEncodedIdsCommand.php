<?php

namespace Io238\EloquentEncodedIds\Commands;

use Illuminate\Console\Command;

class EloquentEncodedIdsCommand extends Command
{
    public $signature = 'eloquent-encoded-ids';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
