<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class module_creation extends Model
{
    protected $fillable = [
	'trainer_id',
        'trainingType',
        'trainingClassification',
        'moduleTitle',
        'totalNoOfDays',
        'startDate',
        'starTime',
        'timeZone',
        'timeInMinutesPerDay',
        'moduleDescription',
        'skills',
        'intesityLevel',
        'sessiontype',
        'ifLive',
        'languages',
        'startDateTime',
        'endDateTime',
        'prereqWork',
        'maxParticipantPerModule',
        'preWorkURL',
        'lessonRequirementForparti',
        'traineeHandouts',
        'lmsURL',
        'courseWorkHandoutUpload',
        'youtubeVideoUpload',
        'jpegUpload',
        'price',
        'currency',
        'amount',
        'Status'
    ];

    protected $table = 'module_creations';
    use HasFactory;
}
