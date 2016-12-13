<?php

namespace App\Repositories\Auth;

use App\Models\Auth\User;

interface UserRepositoryContract
{
    /**
     * Returns all users
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll();

    /**
     * Retrieves a single user
     * @param int $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Creates a new user
     * @param array $data
     * @return User
     */
    public function create($data);

    /**
     * Updates an existing User
     * @param int $user_id
     * @param array $data
     * @return bool|mixed
     */
    public function update($user_id, $data);

    /**
     * Syncs the users Roles
     * @param User $user
     * @param array $roles
     */
    public function syncRoles(User $user, $roles);

    /**
     * Deletes a user
     * @param int $user_id
     */
    public function delete($user_id);

}