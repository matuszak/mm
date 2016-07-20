<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;


class PaisPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

}
