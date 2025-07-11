<?php

namespace App\Policies;

use App\Models\Jelo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JeloPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the jelo can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the jelo can view the model.
     */
    public function view(User $user, Jelo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the jelo can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the jelo can update the model.
     */
    public function update(User $user, Jelo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the jelo can delete the model.
     */
    public function delete(User $user, Jelo $model): bool
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
     * Determine whether the jelo can restore the model.
     */
    public function restore(User $user, Jelo $model): bool
    {
        return false;
    }

    /**
     * Determine whether the jelo can permanently delete the model.
     */
    public function forceDelete(User $user, Jelo $model): bool
    {
        return false;
    }
}
