<?php
/**
 * Created by PhpStorm.
 * User: macc
 * Date: 7/5/18
 * Time: 11:22 AM
 */

namespace App\Events;


use App\Article;

class ArticleHasBeenApproval extends DashboardEvent
{

    /**
     * @var Article
     */
    public $article;

    /**
     * ArticleHasBeenApproval constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function broadcastAs()
    {
       return 'article.has-been-approval';
    }
}