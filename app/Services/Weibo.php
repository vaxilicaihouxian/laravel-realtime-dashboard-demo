<?php
/**
 * Created by PhpStorm.
 * User: machenchi
 * Date: 18/7/13
 * Time: 下午8:34
 */

namespace App\Services;


use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class Weibo
{

    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        /**
         * Set http client
         */
        $this->client = $client;
    }

    /**
     * @return Collection
     */
    public function getMentions():Collection
    {
        $domain = 'https://api.weibo.com/2/statuses/mentions.json';
        $token = env('DASHBOARD_WEIBO_ACCESS_TOKEN');
        $res = $this->client->get($domain,['query'=>[
            'access_token'=>$token,
            'filter_by_type'=>1
        ]]);

        $jsonArray = \GuzzleHttp\json_decode($res->getBody()->getContents(),true);
        $dataCollection = new Collection($jsonArray['statuses']);
        $data = $dataCollection->map(function($item){
            return [
                'text'=>$item['text'],
                'username'=>$item['user']['screen_name'],
                'avatar'=>$item['user']['profile_image_url'],
                'mid'=>$item['mid'],
                'location'=>$item['user']['location'],
                'source'=>$item['source']
            ];
        });
        return $data;
    }
}