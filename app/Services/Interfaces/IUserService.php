<?php

namespace App\Services\Interfaces;

use App\Models\User;

interface IUserService
{
    /**
     * @return array User
     */
    public function all();
    /**
     * @param int $id
     * @return User
     */
    public function getById(int $id);
    /**
     * @param array $user
     * @return void
     */
    public function create($user);
    /**
     * @param array $user
     * @param int $id
     * @return boolean
     */
    public function update(array $user, int $id);
    /**
     * @param int $id
     * @return boolean
     */
    public function destroy(int $id);
}
