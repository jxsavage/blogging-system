<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticlePicture extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'article_pictures';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['article_id', 'url'];
        
        /**
         * Relationships a ArticlePicture has...
         */
        public function article()
        {
            $this->belongsTo('App\Article');
        }
        

}
