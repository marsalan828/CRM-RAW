<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function CreateTask(Request $request)
    {
        try{
            $task = $this->taskService->CreateTask($request->all());
            return response()->json(['message'=>'Task has been created successfully','Task'=>$task],200);
        }catch(\Exception $e){
            return response()->json(['messsage'=>$e->getMessage()]);
        }
    }

    public function UpdateTask($id,Request $request)
    {
        try{
            $task = $this->taskService->UpdateTask($id,$request->all());
            return response()->json(['message'=>'Task has been updated successfully','Task'=>$task],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function DeleteTask($id)
    {
        try{
            $task = $this->taskService->DeleteTask($id);
            return response()->json(['message'=>'Task has been deleted successfully','Task'=>$task],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function GetAllTasks()
    {
        try{
            $task = $this->taskService->GetAllTasks();
            return response()->json(['Tasks'=>$task],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function GetTask($id)
    {
        try{
            $task = $this->taskService->GetTask($id);
            return response()->json(['Task'=>$task],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function AssignTask($id,Request $request)
    {
        try{
            $task = $this->taskService->AssignTask($id,$request->all());
            return response()->json(['message'=>'Task has been assign succeessfully','Task'=>$task],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function CompleteTask($id)
    {
        try{
            $task = $this->taskService->CompleteTask($id);
            return response()->json(['message'=>'Task Completed successfully','Task'=>$task],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }
}
