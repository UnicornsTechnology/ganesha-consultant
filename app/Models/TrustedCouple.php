<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrustedCouple extends Model
{
    use HasFactory;
    protected $primaryKey = "tc_id";
    protected  $fillable = ['tc_name', 'tc_image', 'tc_location', 'tc_review'];
}
