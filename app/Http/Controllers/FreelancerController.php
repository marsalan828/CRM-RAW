<?php

namespace App\Http\Controllers;

use App\Services\FreelancerService;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    protected $freelancerService;

    public function __construct(FreelancerService $freelancerService)
    {
        $this->freelancerService = $freelancerService;
    }

    public function UpdateFreelancer($id,Request $request)
    {
        try{
            $freelancer = $this->freelancerService->UpdateFreelancer($id,$request->all());
            return response()->json(['message'=>'Freelancer has been updated','Freelancer'=>$freelancer],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function DeleteFreelancer($id)
    {
        try{
            $freelancer = $this->freelancerService->DeleteFreelancer($id);
            return response()->json(['message'=>'Freelancer has been deleted','Freelancer'=>$freelancer],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function GetAllFreelancers()
    {
        try{
            $freelancer = $this->freelancerService->GetAllFreelancers();
            return response()->json(['Freelancers'=>$freelancer],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function GetFreelancer($id)
    {
        try{
            $freelancer = $this->freelancerService->GetFreelancer($id);
            return response()->json(['Freelancer'=>$freelancer],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }
}
