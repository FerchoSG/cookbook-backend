<?php

namespace App\Services\Implementations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\Interfaces\IUserService;

class UserService implements IUserService
{
    /**
     * @var User
     */
    private $model;

    public function __construct(User $model) {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function getById(int $id)
    {
        return $this->model->find($id);
    }

    public function create($user)
    {
        $user['password'] = Hash::make($user['password']);
        return $this->model->create($user);
    }

    public function update(array $user, int $id)
    {
        if($this->model->find($id)){
            $user['password'] = Hash::make($user['password']);
            $this->model->where('id', $id)
                ->first()
                ->fill($user)
                ->save();
        }
    }

    public function destroy(int $id)
    {
        $user = $this->model->find($id);
        if($user != null)
            return  $user->delete();
    }
}
