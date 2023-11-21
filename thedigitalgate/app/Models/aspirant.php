<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aspirant extends Model
{
    protected $fillable = [
        'aspirant_id',
        'second_name',
        'first_name',
        'mobile',
        'email_id',
        'role',
        'status',
        'cpassword',
        'password',
        'country_code',
        'country',
        'team_flag',
        'address',
        'skills',
        'about_you',
        'recent_company',
        'aspirant_type',
        'job_title_designation',
        'employment_type',
        'job_end_date',
        'industry',
        'certification_name',
        'job_description',
        'project_name',
        'certification_expiry_date',
        'project_description',
        'project_end_date',
        'degree',
        'school_college_university',
        'resume_path',
        'final_year_date',
        'gender',
        'dob',
        'languages_known',
        'work_permit',
        'industries',
        'preferred_location',
    ];

    protected $table = 'aspirant_master';
    public $timestamps = false;
    use HasFactory;
}
