<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    protected $primaryKey = "ig_id";
    use HasFactory;
    protected $fillable = ['is_active', 'ig_name', 'ig_tagline', 'ig_image'];
}
