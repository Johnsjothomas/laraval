<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trainer extends Model
{
    protected $fillable = [
        'trainer_id',
        'salutation',
        'first_name',
        'second_name',
        'email_id',
        'mobile',
        'status',
        'role',
        'password',
        'cpassword',
        'country',
        'country_code',
        'address',
        'about_you',
        'linkedin_url',
        'trainer_type',
        'modules',
        'details_other_module',
        'relevant_module_experience',
        'total_experience',
        'preferred_online_platform',
        'equipment_for_training',
        'gamification_tool',
        'specialization',
        'school_college_university',
        'degree',
        'final_year_date',
        'certification_name',
        'certification_expiry_date',
        'certification_description',
        'dob',
        'gender',
        'languages_known',
        'nation_id_path',
        'resume_path',
        'demo_intro_videolink',
    ];

    protected $table = 'trainer_master';
    public $timestamps = false;
    use HasFactory;
}
