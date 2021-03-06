<?php

namespace App\Events;

use App\Article;

class ArticleNeedApproval extends DashboardEvent
{
    /**
     * @var Article
     */
    public $article;

    /**
     * Create a new event instance.
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->userId = $article->user_id;
        $this->article = $article;
    }


    public function broadcastAs()
    {
       return 'article.need-approval';
    }
}
