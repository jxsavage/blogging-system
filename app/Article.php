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
  	protected $fillable = ['meta_description', 'title',
      'content', 'user_id', 'publish_on'];

    /**
     * Additional fields to treat as Carbon instances
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
    /*
    * Custom methods for an Article.
    */

    public function hasTag($tag)
    {
        $hasTag = false;

        $tags = $this->tags->lists('tag');

        foreach ( $tags as $articleTag )
        {
            if ( $articleTag === $tag )
            {
                $hasTag = true;
                break;
            }
        }

        return $hasTag;
    }

    public function updateTags($updatedTagIds)
    {

        $existingTagIds = $this->tags->lists('id');


        $addTagIds = array_diff($updatedTagIds, $existingTagIds);
		$removeTagIds = array_diff($existingTagIds, $updatedTagIds);

		if($addTagIds)
        {
            $this->tags()->attach($addTagIds);
        }
		if($removeTagIds)
        {
            $this->tags()->detach($removeTagIds);
        }
    }

    public function updatePictures($newPictures)
    {
        dd($newPictures);
        foreach($newPictures as $picture)
        {
            $imgName = md5($picture->getClientOriginalName());
            $picture->move(public_path().'/img/articles/article'.$this->id, $imgName.'.'.$picture->getClientOriginalExtension());
            ArticlePicture::create([
                'article_id' => $this->id,
                'url' => '/img/articles/article'.$this->id.'/'.$imgName.'.'.$picture->getClientOriginalExtension()
            ]);
        }
    }

    /*
    * Overridden methods for an Article.
    */

    public function delete()
    {
        //remove entries from article_tag pivot
        $this->tags()->detach();

        //removes entries from article_pictures table
        $this->articlePictures()->delete();

        //delete the article
        return parent::delete();
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
