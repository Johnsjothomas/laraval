<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\Employer\JobController;
use App\Http\Controllers\Employer\TeamController;
use App\Http\Controllers\Employer\RegisterController;
use App\Http\Controllers\Auth\LoginController;


Route::group(['prefix' => 'employerteam', 'middleware' => ['employer','XssSanitizer']],function () {

    Route::middleware(['custom_auth'])->group(function () {

    Route::any('/update_profile',[ EmployerController::class, 'update_profile'])->name('update_profile');    

        Route::middleware(['checkcompany'])->group(function () {

                Route::any('/assign_user',[ TeamController::class, 'assign_user'])->name('assign_user');
                });

                //Jobs
                Route::prefix('jobs')->group(function () {

                     Route::any('/create',[ JobController::class, 'create_job'])->name('create_job');
                     Route::any('/edit/{id}/{jobid}',[ JobController::class, 'create_job'])->name('edit_job');
                     Route::any('/{status}',[ JobController::class, 'index'])->name('jobs');
                    Route::get('/applications', function () {
                        return view('/employer/jobs/applications');
                    });
                });



                Route::get('/profiles/managemodules', function () {
                    return view('/employer/profiles/managemodules');
                });
                Route::get('/trainings/managemodules', function () {
                    return view('/employer/trainings/managemodules');
                });
                Route::get('/trainings/moduleinfo', function () {
                    return view('/employer/trainings/moduleinfo');
                });
                Route::get('/trainings/mytraining', function () {
                    return view('/employer/trainings/mytraining');
                });


                Route::prefix('aspirant')->group(function () {
                    
                    Route::get('/', function () {
                        return view('/employer/profiles/search_applicants');
                    });
                    Route::get('/details', function () {
                        return view('/employer/profiles/myprofile');
                    });
                    Route::get('/list', function () {
                        return view('/employer/profiles/list_applicants');
                    });
                    Route::get('/saved', function () {
                        return view('/employer/profiles/saved_applicants');
                    });
                    Route::get('/interview', function () {
                        return view('/employer/profiles/interview_scheduled');
                    });
                    Route::get('/shortlist', function () {
                        return view('/employer/profiles/shortlisted_applicants');
                    });
                    Route::get('/rejected', function () {
                        return view('/employer/profiles/rejected_applicants');
                    });

                    Route::get('/internal', function () {
                        return view('/employer/profiles/internal_training');
                    });
                    Route::get('/external', function () {
                        return view('/employer/profiles/external_training');
                    });
                });

                Route::prefix('training')->group(function () {
                    Route::get('/', function () {
                        return view('/employer/trainings/create_training');
                    });
                    Route::get('/planner', function () {
                        return view('/employer/trainings/training_planner');
                    });
                    Route::get('/scheduled', function () {
                        return view('/employer/trainings/training_scheduled');
                    });
                });




                Route::get('/dashboard', function () {
                    return view('/employer/dashboard/jobdashboard');
                });
                Route::get('/settings', function () {
                    return view('/employer/settings');
                });
                Route::get('/message', function () {
                    return view('/employer/message');
                });
                Route::get('/announcements', function () {
                    return view('/employer/announcements');
                });
                Route::get('/alerts', function () {
                    return view('/employer/alerts');
                });
                Route::get('/users/managemodules', function () {
                    return view('/employer/users/managemodules');
                });

        });        

});

});


