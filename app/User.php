<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'last_name', 'user_name', 'email',
						'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * Relations to eager load on query.
	 * @var array
     */
    protected $with = ['roles'];
    /*
     * Relationships of a User.
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

	/*
	* Custom Methods for a User.
	*/

	/**
	* Determines if a user has a given roll.
	* @param string|array $role the role or array of roles to check.
	* @return boolean indicating if the user has the role(s).
	*/
	public function hasRole($role)
	{
		$hasRole = false;

		if (is_array($role))
        {
			foreach($role as $roleToCheck)
			{
				foreach($this->roles as $userRole)
		        {
		            if ($userRole->role === $roleToCheck)
		            {
		                $hasRole = true;
						break 2;
		            }
		        }
			}
        }
		else
		{
	        foreach($this->roles as $userRole)
	        {
	            if ($userRole->role === $role)
	            {
	                $hasRole = true;
	            }
	        }
		}

        return $hasRole;
	}





}
