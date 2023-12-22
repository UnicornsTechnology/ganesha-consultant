<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_membership_plan extends Model
{
    use HasFactory;
    protected $primaryKey = 'membership_plan_id';
    protected $fillable = ['plan_name', 'plan_amount', 'plan_massage'];
}
