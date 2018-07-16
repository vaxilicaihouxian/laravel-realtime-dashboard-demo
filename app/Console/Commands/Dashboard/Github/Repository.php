<?php

namespace App\Console\Commands\Dashboard\Github;

use App\Services\Github;
use Illuminate\Console\Command;

class Repository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dashboard:github-repo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Github $github)
    {
        dd($github->fetchResult());
    }
}
