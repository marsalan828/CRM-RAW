<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends UserRepository {
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function UpdateUser($id, array $data)
    {
        return $this->userRepository->UpdateUser($id,$data);
    }

    public function DeleteUser($id)
    {
        return $this->userRepository->DeleteUser($id);
    }

    public function GetAllUsers()
    {
        return $this->userRepository->GetAllUsers();
    }

    public function GetUser($id)
    {
        return $this->userRepository->GetUser($id);
    }
}