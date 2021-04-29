<?php

namespace App\Policies;

use App\Anuncio;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnuncioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function view(User $user, Anuncio $anuncio)
    {
        return $user->id === $anuncio->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function update(User $user, Anuncio $anuncio)
    {
        // Revisar si el usuario autenticado es el mismo que creo el anuncio
        return $user->id === $anuncio->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function delete(User $user, Anuncio $anuncio)
    {
        // Revisar si el usuario autenticado es el mismo que creo el anuncio
        return $user->id === $anuncio->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function restore(User $user, Anuncio $anuncio)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncio  $anuncio
     * @return mixed
     */
    public function forceDelete(User $user, Anuncio $anuncio)
    {
        //
    }
}
