<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileView extends Model
{
    use HasFactory;
    protected $primaryKey = "pv_id";
    protected $fillable = ['pv_viewer_id', 'pv_profile_id', 'pv_viewing_count'];
}
