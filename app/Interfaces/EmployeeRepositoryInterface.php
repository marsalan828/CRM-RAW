<?php
namespace App\Interfaces;

interface EmployeeRepositoryInterface {
    public function CreateEmployee(array $data);
    public function UpdateEmployee($id,array $data);
    public function DeleteEmployee($id);
    public function GetAllEmployees();
    public function GetEmployee($id);
}