<?php

namespace App\Policies;

use App\Models\Interest;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InterestPolicy
{
    public function modify(User $user, Interest $interest) : bool
    {
        return $user->id === $interest->user_id;
    }
}
