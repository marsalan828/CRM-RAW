<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name'=>'required|string|unique:users',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:8',
            'userType'=>'required|string|in:company,freelancer,employee'
        ];

        if ($this->input('userType')==='company'){
            $rules += [
                'CompanyName'=>'required|string',
                'BusinessType'=>'required|string',
                'industry'=>'required|string',
                'RegistrationNumber'=>'required|integer'
            ];
        }elseif($this->input('userType')==='freelancer'){
            $rules += [
                'FreelancerName'=>'required|string',
                'Industry'=>'required|string',
                'BusinessType'=>'required|string',
                'RegistrationNumber'=>'required|integer',
            ];
        }elseif($this->input('userType')==='employee'){
            $rules += [
                'EmployeeName'=>'required|string',
                'Phone_number'=>'required|integer',
                'DOB'=>'required|date',
                'Gender'=>'required|in:male,female,other',
            ];
        }

        return $rules;
    }

    public function messages():array
    {
        return [
            'name.required'=>'Please enter a name',
            'name.unique'=>'This name is already taken',
            'email.required'=>'Please enter an email',
            'email.email'=>'Please enter a valid email',
            'email.unique'=>'This email is already taken',
            'password.required'=>'Please enter a password',
            'password.min'=>'Please enter more than 8 characters',
            'userType.required'=>'Please enter a user type',
            'userType.in'=>'please enter a valid user type'
        ];
    }
}
