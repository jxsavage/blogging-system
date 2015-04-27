<?php namespace Custom\Entities;

class Article extends \Eloquent {

    use PresentableTrait;

    protected $presenter = 'Custom\Presenters\Article';


}
