<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Stavka;
use Illuminate\Auth\Access\HandlesAuthorization;

class StavkaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the stavka can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the stavka can view the model.
     */
    public function view(User $user, Stavka $model): bool
    {
        return true;
    }

    /**
     * Determine whether the stavka can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the stavka can update the model.
     */
    public function update(User $user, Stavka $model): bool
    {
        return true;
    }

    /**
     * Determine whether the stavka can delete the model.
     */
    public function delete(User $user, Stavka $model): bool
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
     * Determine whether the stavka can restore the model.
     */
    public function restore(User $user, Stavka $model): bool
    {
        return false;
    }

    /**
     * Determine whether the stavka can permanently delete the model.
     */
    public function forceDelete(User $user, Stavka $model): bool
    {
        return false;
    }
}
