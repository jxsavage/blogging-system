<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest {



    /**
     * Checks if a user is authorized to make a request based on
     * their role.
     * @param $roles
     * String or Array of Strings representing role(s) to check.
     * @return bool
     * Boolean indicating if the user has the selected role(s).
     */
    public function userHasRole($roles)
    {
        $authorized = false;

        if ( ! \Auth::guest() )
        {
            if ( \Auth::user()->hasRole($roles))
            {
                $authorized = true;
            }
        }

        return $authorized;
    }
}
