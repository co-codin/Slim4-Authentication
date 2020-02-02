<?php

namespace App\Models;

use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function fullName()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}
