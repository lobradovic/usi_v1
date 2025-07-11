<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the role can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the role can view the model.
     */
    public function view(User $user, Role $model): bool
    {
        return true;
    }

    /**
     * Determine whether the role can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the role can update the model.
     */
    public function update(User $user, Role $model): bool
    {
        return true;
    }

    /**
     * Determine whether the role can delete the model.
     */
    public function delete(User $user, Role $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the role can restore the model.
     */
    public function restore(User $user, Role $model): bool
    {
        return false;
    }

    /**
     * Determine whether the role can permanently delete the model.
     */
    public function forceDelete(User $user, Role $model): bool
    {
        return false;
    }
}
