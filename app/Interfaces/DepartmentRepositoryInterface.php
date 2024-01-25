<?php

namespace App\Interfaces;

interface DepartmentRepositoryInterface {
    public function CreateDepartment(array $data);
    public function UpdateDepartment($id,array $data);
    public function DeleteDepartment($id);
    public function GetAllDepartments();
    public function GetDepartment($id);
}