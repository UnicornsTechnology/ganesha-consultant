<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $primaryKey = "career_id";
    protected $fillable = [
        "name", "email", "mobile", "gender", "address", "dob"
    ];
}
