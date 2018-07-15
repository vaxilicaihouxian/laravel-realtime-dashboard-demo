<?php
/**
 * Created by PhpStorm.
 * User: machenchi
 * Date: 18/7/14
 * Time: 下午10:20
 */

namespace App\Services;


use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Support\Collection;

class Toutiao
{
    /**
     * @var Client
     */
    public $client;

    /**
     * Toutiao constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Collection
     */
    public function news()
    {
        $domain = 'https://m.toutiao.com';
        $url = '/list/?tag=news_hot&ac=wap&count=20&format=json_raw&as=A1A59982B911729&cp=5929E12752796E1&min_behot_time=0';
        $cookies = CookieJar::fromArray([
            'tt_webid'=>'6529387942473385486'
        ],'.toutiao.com');
        $data = \GuzzleHttp\json_decode($this->client->get($domain.$url,[
            'cookies'=>$cookies,
            'headers'=>[
                'Content-Type'=>'application/json',
                'User-Agent'=>'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.96 Safari/537.36'
            ]
        ])->getBody()->getContents(),true);
        $collection = new Collection($data['data']);

        $news = $collection->map(function($item){
            return [
                'mediaName'=>$item['media_name'],
                'title'=>$item['title'],
                'abstract'=>$item['abstract'],
                'imageList'=>$item['image_list'],
                'datetime'=>$item['datetime'],
                'displayUrl'=>$item['display_url'],
                'itemId'=>$item['item_id']
            ];
        });

        return $news;
    }
}