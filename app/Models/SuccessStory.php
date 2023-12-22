<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    use HasFactory;
    protected $primaryKey = "ss_id";
    protected $fillable = ['ss_name', 'ss_location', 'ss_image'];
}
