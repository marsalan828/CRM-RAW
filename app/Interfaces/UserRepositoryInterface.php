<?php
namespace App\Interfaces;

interface UserRepositoryInterface {
    public function CreateUser(array $data);
    public function UpdateUser($id,array $data);
    public function DeleteUser($id);
    public function GetAllUsers();
    public function GetUser($id);
}