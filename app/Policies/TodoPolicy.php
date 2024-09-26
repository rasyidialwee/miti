<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TodoPolicy
{
    /**
     * Perform pre-authorization checks on the model.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->hasRole('super_admin')) {
            return true;
        }

        return null; // see the note above in Gate::before about why null must be returned here.
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Todo $todo): Response
    {
        // return $user->id === $todo->user_id
        //     ? Response::allow()
        //     : Response::deny('You do not own this todo.');
        return $user->can('view_todo')
            ? Response::allow()
            : Response::deny('You do not own this todo.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_todo');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Todo $todo): Response
    {
        // return $user->id === $todo->user_id
        //     ? Response::allow()
        //     : Response::deny('You are not authorized to update this todo.');

        return $user->can('update_todo')
            ? Response::allow()
            : Response::deny('You are not authorized to update this todo.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Todo $todo): Response
    {
        return $user->id === $todo->user_id
            ? Response::allow()
            : Response::deny('You do not own this todo.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Todo $todo): Response
    {
        return $user->id === $todo->user_id
            ? Response::allow()
            : Response::deny('You do not own this todo.');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Todo $todo): Response
    {
        return $user->id === $todo->user_id
            ? Response::allow()
            : Response::deny('You do not own this todo.');
    }
}
