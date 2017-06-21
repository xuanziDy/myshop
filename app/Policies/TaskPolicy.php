<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Task;
use App\User;

class TaskPolicy
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

    public function destory(User $user,Task $Task)
    {
        return $user->id === $Task->user_id;
    }
}
