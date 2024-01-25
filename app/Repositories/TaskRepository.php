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
            'status'=>$data['status'],
            'employee_id'=>$employeeId
        ]);
    }
    public function UpdateTask($id,array $data)
    {
        return DB::table('tasks')->where('id',$id)->update($data);
    }
    public function DeleteTask($id)
    {
        return DB::table('tasks')->where('id',$id)->delete();
    }
    public function GetAllTasks()
    {   
        return DB::table('tasks')->get();
    }
    public function GetTask($id)
    {
        return DB::table('tasks')->where('id',$id)->get();j
    }
    public function AssignTask($id, array $data)
    {

    }
}