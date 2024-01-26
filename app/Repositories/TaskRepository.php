<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskRepository implements TaskRepositoryInterface {
    public function CreateTask(array $data)
    {
        $employeeId = Auth::employee()->id;
        return DB::table('tasks')->insert([
            'Title'=>$data['Title'],
            'Description'=>$data['Description'],
            'StartTime'=>$data['StartTime'],
            'EndTime'=>$data['EndTime'],
            'status'=>'Pending',
            'employee_id'=>$employeeId
        ]);
    }
    public function UpdateTask($id,array $data)
    {
        $taskExists = DB::table('tasks')->where('id',$id)->exists();
        if(!$taskExists){
            return response()->json(['message'=>'Task does not exist'],404);
        }
        return DB::table('tasks')->where('id',$id)->update($data);
    }
    public function DeleteTask($id)
    {
        $taskExists = DB::table('tasks')->where('id',$id)->exists();
        if(!$taskExists){
            return response()->json(['message'=>'Task does not exist'],404);
        }
        return DB::table('tasks')->where('id',$id)->delete();
    }
    public function GetAllTasks()
    {   
        $taskExists = DB::table('tasks')->isEmpty();
        if(!$taskExists){
            return response()->json(['message'=>'Database is empty'],204);
        }
        return DB::table('tasks')->get();
    }
    public function GetTask($id)
    {
        $taskExists = DB::table('tasks')->where('id',$id)->exists();
        if(!$taskExists){
            return response()->json(['message'=>'Task does not exist'],404);
        }
        return DB::table('tasks')->where('id',$id)->get();
    }
    public function AssignTask(array $data)
    {
        $assigned_by = Auth::user();
        if (!$assigned_by){
            return response()->json(['message'=>'Employee not logged in'],401);
        }
        $task_id = $data['task_id'];
        $taskExists = DB::table('tasks')->where('id',$task_id)->exists();
        if(!$taskExists){
            return response()->json(['task does not exist'],404);
        }else{
            $task_assigment = DB::table('task_assignments')->insert([
                'assigned_to'=>$data['assigned_to'],
                'assigned_by'=>$assigned_by->id,
                'task_id'=>$data['task_id']
            ]);
            $employee_task = DB::table('tasks')->
            join('employees','task.employee_id','=','employees.id')->
            where('tasks.id',$data['task_id']);

            return response()->json([$task_assigment,$employee_task]);
        }
    }

    public function CompleteTask($id)
    {
        $assigned_by = Auth::user();
        if (!$assigned_by){
            return response()->json(['message'=>'Employee not logged in'],401);
        }
        $taskExists = DB::table('tasks')->where('id',$id)->exists();
        if(!$taskExists){
            return response()->json(['message'=>'Task does not exist'],404);
        }else{
            return DB::table('tasks')->where('id',$id)->update(['status'=>'Completed']);
        }

    }
}