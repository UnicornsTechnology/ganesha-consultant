<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    use HasFactory;
    protected $primaryKey = "job_seeker_id";
    protected $fillable = [
        'name',
        'email',
        'mobile_number',
        'whatsapp_number',
        'date_of_birth',
        'industry',
        'job_title',
        'total_experience',
        'highest_qualification',
        'current_salary',
        'country',
        'state',
        'city',
        'complete_address',
        'upload_resume',
        'upload_aadhar',
    ];
}
