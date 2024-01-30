<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;

    protected $fillable = [
        'FreelancerName',
        'Industry',
        'BusinessType',
        'RegistrationNumber',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
