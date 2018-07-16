<?php
/**
 * Created by PhpStorm.
 * User: macc
 * Date: 7/16/18
 * Time: 12:55 PM
 */

namespace App\Events\Dashboard\Events;


use App\Events\Dashboard\PublicDashboardEvent;

class GithubRepoEvent extends PublicDashboardEvent
{
    /**
     * @var array
     */
    public $repo;

    /**
     * GithubRepoEvent constructor.
     * @param array $repo
     */
    public function __construct(array $repo)
    {
       $this->repo = $repo;
    }

    public function broadcastAs()
    {
        return 'github.repo';
    }

}