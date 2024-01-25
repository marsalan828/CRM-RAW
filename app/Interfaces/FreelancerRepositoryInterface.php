<?php
namespace App\Interfaces;

interface FreelancerRepositoryInterface {
    public function CreateFreelancer(array $data);
    public function UpdateFreelancer($id,array $data);
    public function DeleteFreelancer($id);
    public function GetAllFreelancers();
    public function GetFreelancer($id);
}