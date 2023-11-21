<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Aspirant\AspirantJobController;
use App\Http\Controllers\Aspirant\AspirantController;



Route::group(['prefix' => 'aspirant', 'middleware' => ['aspirant','XssSanitizer']],function () {

    Route::middleware(['custom_auth'])->group(function () {
     
    	Route::prefix('job')->group(function () {

        Route::get('/',[ AspirantJobController::class, 'managejob'])->name('aspirant_job');
        Route::get('/view/{uid}/{id}',[ AspirantJobController::class, 'jobdetails'])->name('aspirant_jobdetails');
        Route::get('/saved',[ AspirantJobController::class, 'savedjob'])->name('aspirant_savedjob');
        Route::get('/applied',[ AspirantJobController::class, 'appliedjob'])->name('aspirant_appliedjob');
        Route::get('/rejected',[ AspirantJobController::class, 'rejectedjob'])->name('aspirant_rejected');
        Route::get('/interview',[ AspirantJobController::class, 'interview'])->name('aspirant_interview');
        Route::get('/shortlisted',[ AspirantJobController::class, 'shortlisted'])->name('aspirant_shortlisted');
        Route::get('/rejected',[ AspirantJobController::class, 'rejected'])->name('aspirant_rejected');

        Route::post('/submit_application_fulltime',[ AspirantJobController::class, 'submit_application_fulltime'])->name('submit_application_fulltime');
         Route::post('/submit_application_gig',[ AspirantJobController::class, 'submit_application_gig'])->name('submit_application_gig');

    });

    // Route::get('/profile',[ AspirantController::class, 'profile'])->name('aspirant_profile');
    Route::get('/profile',[ AspirantController::class, 'profile'])->name('aspirant_profile');

    Route::any('/update_profile',[ AspirantController::class, 'update_profile'])->name('update_profile_aspirant');
});

});


