<?php

namespace App\Repositories;

use App\Interfaces\FreelancerRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FreelancerRepository implements FreelancerRepositoryInterface {
    public function CreateFreelancer(array $data)
    {
        $userId = Auth::user()->id;
        return DB::table('freelancers')->insert([
            'Name'=>$data['Name'],
            'Industry'=>$data['Industry'],
            'user_id'=>$userId
        ]);
    }
    public function UpdateFreelancer($id,array $data)
    {   
        $freelancerExists = DB::table('freelancers')->where('id',$id)->exists();
        if (!$freelancerExists){
            return response()->json(['message'=>'Freelancer does not exist'],404);
        }
        return DB::table('freelancers')->where('id',$id)->update($data);
    }   
    public function DeleteFreelancer($id)
    {
        $freelancerExists = DB::table('freelancers')->where('id',$id)->exists();
        if (!$freelancerExists){
            return response()->json(['message'=>'Freelancer does not exist'],404);
        }
        return DB::table('freelancers')->where('id',$id)->delete();
    }
    public function GetAllFreelancers()
    {
        $freelancerExists = DB::table('freelancers')->isEmpty();
        if (!$freelancerExists){
            return response()->json(['message'=>'Database is empty'],204);
        }
        return DB::table('freelancers')->get();
    }
    public function GetFreelancer($id)
    {
        $freelancerExists = DB::table('freelancers')->where('id',$id)->exists();
        if (!$freelancerExists){
            return response()->json(['message'=>'Freelancer does not exist'],404);
        }
        return DB::table('freelancers')->where('id',$id)->get();
    }
}