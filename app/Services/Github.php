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
        $repoName = env('GITHUB_API_REPO');
        $repo = ($this->client->api('repo')->show($username,$repoName));
        $data = [
            'name'=>$repo['name'],
            'url'=>$repo['html_url'],
            'avatar'=>$repo['owner']['avatar_url'],
            'issues'=>$repo['open_issues_count'],
            'stars'=>$repo['stargazers_count'],
            'ownerName'=>$repo['owner']['login'],
            'forks'=>$repo['forks_count']
        ];
        return $data;
    }
}