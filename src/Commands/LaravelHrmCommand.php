<?php

namespace Visanduma\LaravelHrm\Commands;

use Illuminate\Console\Command;

class LaravelHrmCommand extends Command
{
    public $signature = 'laravel-hrm';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
