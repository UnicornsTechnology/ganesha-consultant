<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobProvider extends Model
{
    use HasFactory;
    protected $primaryKey = "job_provider_id";
    protected $fillable = [
        'owner_name', 'job_role', 'job_category', 'institute_name',
        'qualification_needed', 'experience_needed', 'monthly_salary',
        'selection_process', 'job_location', 'mobile_number',
        'requirement', 'description',
    ];
}
