<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Custom\Presenters;

use Carbon\Carbon;

class Article extends Model
{

    use Presenters\PresentableTrait;

    protected $presenter = 'Custom\\Presenters\\ArticlePresenter';



  	/**
  	 * The database table used by the model.
  	 *
  	 * @var string
  	 */
  	protected $table = 'articles';

  	/**
  	 * The attributes that are mass assignable.
  	 *
  	 * @var array
  	 */
  	protected $fillable = ['meta_keywords', 'meta_description', 'title',
      'content', 'user_id', 'publish_on'];

    /**
     * Additional fields to treate as Carbon instances
     * @var array
     */
    protected $dates = ['publish_on'];

    /**
     * Relations to eager load on query.
     */
    protected $with = ['user', 'articlePictures', 'tags'];

    /**
     * Relationships an article has...
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function articlePictures()
    {
        return $this->hasMany('App\ArticlePicture');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
    * Custom methods for an Article.
    *
    */

    public function hasTag($tag)
    {
        $hasTag = false;

        

        foreach($this->tags as $articleTag)
        {
            if ($articleTag->tag === $tag)
            {
                $hasTag = true;
            }
        }

        return $hasTag;
    }

    /**
    * Mutators for an Article.
    * Setters must follow convention of setNameAttribute
    */

    public function setPublishOnAttribute($date)
    {

        $this->attributes['publish_on'] = Carbon::createFromFormat('m/d/Y h:i A', $date);

    }

    public function getPublishOnAttribute()
    {
        return Carbon::parse($this->attributes['publish_on'])->format('m/d/Y h:i A');
    }


    /**
     * Scope query to articles taht have been published
     *
     * @param $query
     */
    public function scopePublished($query)
    {
        return $query->where('publish_on', '<=', Carbon::now());
    }



}
