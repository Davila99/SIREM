<?php

namespace App\Policies;

use App\Models\MatriculaRow;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MatriculaRowPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MatriculaRow  $matriculaRow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, MatriculaRow $matriculaRow)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MatriculaRow  $matriculaRow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, MatriculaRow $matriculaRow)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MatriculaRow  $matriculaRow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, MatriculaRow $matriculaRow)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MatriculaRow  $matriculaRow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, MatriculaRow $matriculaRow)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MatriculaRow  $matriculaRow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, MatriculaRow $matriculaRow)
    {
        //
    }
}
