<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'role_user';

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
	protected $fillable = ['user_id', 'role_id'];

        /**
         * Relationships of a Role...
         */

        public function user()
        {
            $this->belongsTo('App\User');
        }

        public function role()
        {
            $this->belongsTo('App\Role');
        }

}
