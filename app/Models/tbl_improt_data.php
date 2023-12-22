<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_improt_data extends Model
{
    use HasFactory;
    protected $primaryKey = "improt_id";
    protected $fillable = [
        'improt_id',
        'improt_name',
        'improt_number'
    ];
}
