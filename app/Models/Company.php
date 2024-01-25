<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'CompanyName',
        'BusinessType',
        'Industry',
        'RegistrationNumber',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->hasMany(Department::class);
    }
}
