<?php

namespace App\Services\Auth;

use App\Mail\VerifyEmail;
use App\Repositories\UserRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\FreelancerRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;

class RegistrationService {
    protected $userRepository;
    protected $companyRepository;
    protected $departmentRepository;
    protected $employeeRepository;
    protected $freelancerRepositor;

    public function __construct(
        UserRepository $userRepository,
        CompanyRepository $companyRepository,
        DepartmentRepository $departmentRepository,
        EmployeeRepository $employeeRepository,
        FreelancerRepository $freelancerRepositor
    )
    {
        $this->userRepository = $userRepository;
        $this->companyRepository = $companyRepository;
        $this->departmentRepository = $departmentRepository;
        $this->employeeRepository = $employeeRepository;
        $this->freelancerRepositor = $freelancerRepositor;
    }

    public function CreateUser(array $data)
    {
        try{
            
            $user = $this->userRepository->CreateUser([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'password'=>bcrypt($data['password']),
                'userType'=>$data['userType'],
            ]);
            $userId = $user->id;
            if (!$user) {
                throw new \Exception('User creation failed');
            }
            
            switch ($data['userType'])
            {
                case 'company':
                    $company = $this->companyRepository->CreateCompany([
                        'CompanyName'=>$data['CompanyName'],
                        'BusinessType'=>$data['BusinessType'],
                        'Industry'=>$data['Industry'],
                        'RegistrationNumber'=>$data['RegistrationNumber'],
                        'user_id'=>$userId,
                    ]);
                    if (!$company) {
                        throw new \Exception('Company creation failed');
                    }
                    break;
                case 'freelancer':
                    // $deptId = Auth::user()->department_id;
                    $freelancer = $this->freelancerRepositor->CreateFreelancer([
                        'FreelancerName'=>$data['FreelancerName'],
                        'Industry'=>$data['Industry'],
                        'BusinessType'=>$data['BusinessType'],
                        'RegistrationNumber'=>$data['RegistrationNumber'],
                        'user_id'=>$userId,
                    ]);
                    if (!$freelancer) {
                        throw new \Exception('Freelancer creation failed');
                    }
                    break;
                case 'employee':
                    $employee = $this->employeeRepository->CreateEmployee([
                        'EmployeeName'=>$data['EmployeeName'],
                        'Phone_number'=>$data['Phone_number'],
                        'DOB'=>$data['DOB'],
                        'Gender'=>$data['Gender'],
                        // 'deparment_id'=>$deptId,
                        'user_id'=>$userId 
                    ]);
                    if (!$employee) {
                        throw new \Exception('Employee creation failed');
                    }
                    break;

                default: throw new \Exception('User type invalid');
            }

            $otp = rand(100000,999999);

            $user->otp = $otp;
            $user->save();

            Mail::to($user)->send(new VerifyEmail($user , $otp));
            
            $token = $user->createToken('api-token')->plainTextToken;
            if (!$token) {
                throw new \Exception('Token creation failed');
            }

            return response()->json(['message'=>'User registration successful','token'=>$token],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }

    }
}