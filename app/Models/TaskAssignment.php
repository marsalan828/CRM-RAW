<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssignment extends Model
{
    use HasFactory;
    protected $fillable=[
        'assigned_to',
        'assigned_by',
        'task_id'
    ];
}
