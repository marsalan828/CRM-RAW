<?php

namespace App\Repositories;

use App\Interfaces\FreelancerRepositoryInterface;
use App\Models\Freelancer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FreelancerRepository implements FreelancerRepositoryInterface {
    public function CreateFreelancer(array $data)
    {
        return Freelancer::create($data);
    }
    public function UpdateFreelancer($id,array $data)
    {   
        $freelancer = Freelancer::find($id);
        if (!$freelancer){
            return response()->json(['message'=>'Freelancer does not exist'],404);
        }
        return $freelancer->update($data);
    }   
    public function DeleteFreelancer($id)
    {
        $freelancer = Freelancer::find($id);
        if (!$freelancer){
            return response()->json(['message'=>'Freelancer does not exist'],404);
        }
        return $freelancer->delete($id);
    }
    public function GetAllFreelancers()
    {
        $freelancer = Freelancer::all();
        if (!$freelancer){
            return response()->json(['message'=>'Database is empty'],204);
        }
        return $freelancer;
    }
    public function GetFreelancer($id)
    {
        $freelancer = Freelancer::find($id);
        if (!$freelancer){
            return response()->json(['message'=>'Freelancer does not exist'],404);
        }
        return $freelancer->find($id);
    }
}