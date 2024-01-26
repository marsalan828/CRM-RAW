<?php 

namespace App\Interfaces;

interface TaskRepositoryInterface {
    public function CreateTask(array $data);
    public function UpdateTask($id,array $data);
    public function DeleteTask($id);
    public function GetAllTasks();
    public function GetTask($id);
    public function AssignTask(array $data);
    public function CompleteTask($id);
}