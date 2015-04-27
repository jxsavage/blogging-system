<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';

	/**
	* Disable timestamps. default = true.
	*
	* @var boolean
	*/
	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['tag'];

    /**
     * Relationships of a Tag...
     */

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

}
