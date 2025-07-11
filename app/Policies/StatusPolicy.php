<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Status;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the status can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the status can view the model.
     */
    public function view(User $user, Status $model): bool
    {
        return true;
    }

    /**
     * Determine whether the status can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the status can update the model.
     */
    public function update(User $user, Status $model): bool
    {
        return true;
    }

    /**
     * Determine whether the status can delete the model.
     */
    public function delete(User $user, Status $model): bool
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
     * Determine whether the status can restore the model.
     */
    public function restore(User $user, Status $model): bool
    {
        return false;
    }

    /**
     * Determine whether the status can permanently delete the model.
     */
    public function forceDelete(User $user, Status $model): bool
    {
        return false;
    }
}
