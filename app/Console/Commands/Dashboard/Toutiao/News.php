<?php

namespace App\Console\Commands\Dashboard\Toutiao;

use App\Events\Dashboard\Events\ToutiaoNewsEvent;
use App\Services\Toutiao;
use Illuminate\Console\Command;

class News extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dashboard:toutiao-news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Toutiao news fetch command';


    /**
     * Execute the console command.
     *
     * @param Toutiao $toutiao
     * @return mixed
     */
    public function handle(Toutiao $toutiao)
    {
        $news = $toutiao->news();

        broadcast(new ToutiaoNewsEvent($news->toArray()));
    }
}
