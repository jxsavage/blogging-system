<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';

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
	protected $fillable = ['role'];

        /**
         * Relationships of a Role...
         */

        public function user()
        {
            $this->belongsToMany('App\User');
        }

}
