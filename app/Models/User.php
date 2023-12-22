<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'current_team_id',
        'profile_photo_path',
        'mobile',
        'state',
        'pin_code',
        'district',
        'taluka',
        'village',
        'city',
        'date_of_birth',
        'birth_time',
        'birth_place',
        'education',
        'gender',
        'marital_status',
        'age',
        'height',
        'weight',
        'father_full_name',
        'mother_full_name',
        'father_occupation',
        'mother_occupation',
        'job_type',
        'mother_tongue',
        'company_name',
        'salary',
        'blood_group',
        'color',
        'body_type',
        'physical_status',
        'caste',
        'devak',
        'nakshatra',
        'charan',
        'gan',
        'raas',
        'nad',
        'varg',
        'kul_devak',
        'brothers',
        'sisters',
        'mama',
        'main_profile_pic',
        'sub_pic_1',
        'sub_pic_2',
        'sub_pic_3',
        'sub_pic_4',
        'relatives',
        'diet',
        'smoking_habits',
        'drinking_habits',
        'property_details',
        'adhar',
        'pan_card',
        'driving_license',
        'is_handicapped',
        'hobbies',
        'facebook',
        'whatsapp',
        'instagram',
        'youtube',
        'user_type',
        'user_status',
        'lock_status',
        'profile_created_by',
        'view_profile_limit'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
