<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Availability;
use App\Models\User;

class AvailabilityPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Availability');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Availability $availability): bool
    {
        return $user->checkPermissionTo('view Availability');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Availability');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Availability $availability): bool
    {
        return $user->checkPermissionTo('update Availability');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Availability $availability): bool
    {
        return $user->checkPermissionTo('delete Availability');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Availability');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Availability $availability): bool
    {
        return $user->checkPermissionTo('restore Availability');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Availability');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Availability $availability): bool
    {
        return $user->checkPermissionTo('replicate Availability');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Availability');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Availability $availability): bool
    {
        return $user->checkPermissionTo('force-delete Availability');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Availability');
    }
}
