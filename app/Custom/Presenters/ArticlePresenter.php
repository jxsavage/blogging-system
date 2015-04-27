<?php namespace Custom\Presenters;

use App\Article;

class ArticlePresenter extends Presenter {



    public function webTitle()
    {
        return $this->entity->title . ' | myBlog';
    }

    public function linkTitle()
    {
        return str_replace(' ', '_', $this->entity->title);
    }

    public function articleStub()
    {
        
    }



}
