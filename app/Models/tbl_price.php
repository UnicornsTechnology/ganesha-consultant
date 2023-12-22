<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_price extends Model
{
    use HasFactory;
    protected $primaryKey = 'price_plan_id';
    protected $fillable = ['tbl_plan_id', 'month', 'price', 'price_feature', 'view_profile'];
}
