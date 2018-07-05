<?php

namespace App\Observers;

use App\Article;
use App\Events\ArticleNeedApproval;

class ArticleObserver
{
    /**
     * Handle to the article "created" event.
     *
     * @param  \App\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
        //send event when article created
        if($article->status == 0 ){
            broadcast(new ArticleNeedApproval($article));
        }
    }

    /**
     * Handle the article "updated" event.
     *
     * @param  \App\Article  $article
     * @return void
     */
    public function updated(Article $article)
    {
        //
    }

    /**
     * Handle the article "deleted" event.
     *
     * @param  \App\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        //
    }
}
