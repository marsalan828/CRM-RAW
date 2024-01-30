<?php

namespace App\Repositories;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserRepository implements UserRepositoryInterface {
    public function CreateUser(array $data)
    {
        return User::create($data);
    }

    public function UpdateUser($id, array $data)
    {
        return User::find($id)->update($data);
    }
    
    public function DeleteUser($id)
    {
        return User::find($id)->delete();
    }

    public function GetAllUsers()
    {
        return User::all();
    }

    public function GetUser($id)
    {
        return User::find($id);
    }
}