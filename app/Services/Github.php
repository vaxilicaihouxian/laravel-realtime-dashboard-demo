<?php
/**
 * Created by PhpStorm.
 * User: machenchi
 * Date: 18/7/15
 * Time: 下午10:33
 */

namespace App\Services;


use Github\Client;
use Github\ResultPager;

class Github
{
    /**
     * @var Client
     */
    public $client;

    /**
     * Github constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client  = $client;
        $client->authenticate(env('GITHUB_API_TOKEN'), null, Client::AUTH_HTTP_TOKEN);
    }

    public function fetchResult()
    {
        $username = env('GITHUB_API_USERNAME');
        return (new ResultPager($this->client))->fetchAll(
            $this->client->api('organization'),
            'repositories',
            [$username]
        );

    }
}