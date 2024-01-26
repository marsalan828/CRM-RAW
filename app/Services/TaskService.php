<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService extends TaskRepository {
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function CreateTask(array $data)
    {
        return $this->taskRepository->CreateTask($data);
    }

    public function UpdateTask($id, array $data)
    {
        return $this->taskRepository->UpdateTask($id,$data);
    }

    public function DeleteTask($id)
    {
        return $this->taskRepository->DeleteTask($id);
    }

    public function GetAllTasks()
    {
        return $this->taskRepository->GetAllTasks();
    }

    public function GetTask($id)
    {
        return $this->taskRepository->GetTask($id);
    }

    
}