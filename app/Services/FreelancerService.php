<?php

namespace App\Services;

use App\Repositories\FreelancerRepository;

class FreelancerService extends FreelancerRepository {
    protected $freelancerRepository;
    public function __construct(FreelancerRepository $freelancerRepository)
    {
        $this->freelancerRepository = $freelancerRepository;
    }

    public function CreateFreelancer(array $data)
    {
        return $this->freelancerRepository->CreateFreelancer($data);
    }

    public function UpdateFreelancer($id, array $data)
    {
        return $this->freelancerRepository->UpdateFreelancer($id,$data);
    }

    public function DeleteFreelancer($id)
    {
        return $this->freelancerRepository->DeleteFreelancer($id);
    }

    public function GetAllFreelancers()
    {
        return $this->freelancerRepository->GetAllFreelancers();
    }

    public function GetFreelancer($id)
    {
        return $this->freelancerRepository->GetFreelancer($id);
    }
}