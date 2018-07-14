<?php

namespace App\Console\Commands\Dashboard\Weibo;

use App\Events\Dashboard\Weibo\MentionsEvent;
use App\Services\Weibo;
use Illuminate\Console\Command;

class Mentions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dashboard:weibo-mentions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Weibo mentions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param Weibo $weibo
     * @return mixed
     */
    public function handle(Weibo $weibo)
    {
        $data = $weibo->getMentions();
        broadcast(new MentionsEvent($data->toArray()));
    }
}
