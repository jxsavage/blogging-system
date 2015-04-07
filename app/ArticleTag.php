<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'article_tag';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['article_id', 'tag'];
        
        /**
         * Relationships a ArticleTag has...
         */
        public function article()
        {
            $this->belongsTo('App\Article');
        }
        
        public function tag()
        {
            $this-belongsTo('App\Tag');
        }

}
