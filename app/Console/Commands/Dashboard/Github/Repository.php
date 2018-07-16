<?php

namespace App\Console\Commands\Dashboard\Github;

use App\Events\Dashboard\Events\GithubRepoEvent;
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
    protected $description = 'Get A Repo from github api';

    /**
     * Execute the console command.
     *
     * @param Github $github
     */
    public function handle(Github $github)
    {
        broadcast(new GithubRepoEvent($github->fetchResult()));
    }
}
