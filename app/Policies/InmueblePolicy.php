<?php

namespace App\Policies;

use App\Models\Inmueble;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InmueblePolicy
{
    // /**
    //  * Determine whether the user can view any models.
    //  */
    // public function viewAny(User $user): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can view the model.
    //  */
    public function view(User $user, Inmueble $inmueble): bool
    {
        return $inmueble->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->roll === 2 || $user->roll === 3 ;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Inmueble $inmueble): bool
    {
        return $user->id === $inmueble->user_id;
    }

    // /**
    //  * Determine whether the user can delete the model.
    // */
    public function delete(User $user, Inmueble $inmueble): bool
    {
        return $user->id === $inmueble->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Inmueble $inmueble): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Inmueble $inmueble): bool
    // {
    //     //
    // }
}
