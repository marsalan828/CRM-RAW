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
        return DB::table('freelancers')->where('id',$id)->update($data);
    }   
    public function DeleteFreelancer($id)
    {
        return DB::table('freelancers')->where('id',$id)->delete();
    }
    public function GetAllFreelancers()
    {
        return DB::table('freelancers')->get();
    }
    public function GetFreelancer($id)
    {
        return DB::table('freelancers')->where('id',$id)->get();
    }
}