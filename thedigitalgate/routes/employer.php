<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\Employer\JobController;
use App\Http\Controllers\Employer\TeamController;
use App\Http\Controllers\Employer\TrainerController;
use App\Http\Controllers\Employer\AspirantController;



Route::group(['prefix' => 'employer', 'middleware' => ['employer','XssSanitizer']],function () {

    Route::middleware(['custom_auth'])->group(function () {

        Route::any('/shortlist_aspirant/{id}',[ EmployerController::class, 'shortlist_aspirant'])->name('shortlist_aspirant');  

        Route::any('/update_profile',[ EmployerController::class, 'update_profile'])->middleware(['team'])->name('update_profile');    

        Route::middleware(['checkcompany'])->group(function () {

                Route::get('/calendly',[ EmployerController::class, 'calendly'])->name('calendly');

                Route::middleware(['team'])->group(function () {
                    Route::prefix('users')->group(function () {
                        Route::any('/',[ TeamController::class, 'index'])->name('users');
                        Route::any('/assign_user',[ TeamController::class, 'assign_user'])->name('assign_user');
                    });
                });

                //Jobs
                Route::prefix('jobs')->group(function () {

                     Route::any('/create',[ JobController::class, 'create_job'])->name('create_job');
                     Route::any('/edit/{id}/{jobid}',[ JobController::class, 'create_job'])->name('edit_job');
                     Route::any('/update_status/{id}/{status}',[ JobController::class, 'update_status'])->name('job_status');
                     Route::any('/applications/{id}',[ JobController::class, 'job_applications'])->name('job_applications');
                     Route::any('/{status}',[ JobController::class, 'index'])->name('jobs');
                     Route::any('/application_status/{id}/{status}',[ JobController::class, 'application_status'])->name('job_application_status');
                    
                });

                Route::prefix('training')->group(function () {

                    
                    Route::any('/create',[ TrainerController::class, 'create_training'])->name('create_training');
                    Route::any('/edit/{id}/{trainingid}',[ TrainerController::class, 'create_training'])->name('edit_training');

                    Route::any('/planner',[ TrainerController::class, 'training_planner'])->name('training_planner');
                    Route::any('/manage_trainers',[ TrainerController::class, 'manage_trainers'])->name('manage_trainers');
                    Route::any('/trainer_requests',[ TrainerController::class, 'trainer_requests'])->name('trainer_requests');

                    Route::any('/scheduled',[ TrainerController::class, 'trainer_schedule'])->name('trainer_schedule');


                    Route::get('/mytraining', function () {
                    return view('/employer/trainings/mytraining');
                    });
                    
                     Route::any('/trainer_request_application/status/{id}/{status}',[ TrainerController::class, 'update_status'])->name('trainer_request_application_status');

                   
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
                


                Route::prefix('aspirant')->group(function () {
                    
                    
                    Route::get('/details', function () {
                        return view('/employer/profiles/myprofile');
                    });
                    Route::any('/list/{id?}',[ AspirantController::class, 'applicant_list'])->name('aspirant_list');

                    Route::post('/schedule_interview',[ AspirantController::class, 'schedule_interview'])->name('schedule_interview');
                    
                     Route::get('/saved',[ AspirantController::class, 'saved_aspirants'])->name('saved_aspirants');


                     Route::get('/interview',[ AspirantController::class, 'interview_scheduled'])->name('interview_scheduled');


                    Route::get('/shortlisted',[ AspirantController::class, 'shortlisted_aspirants'])->name('shortlisted_aspirants');

                    Route::get('/rejected',[ AspirantController::class, 'rejected_aspirants'])->name('rejected_aspirants');


                    Route::get('/internal', function () {
                        return view('/employer/profiles/internal_training');
                    });
                    Route::get('/external', function () {
                        return view('/employer/profiles/external_training');
                    });

                    Route::any('/{keyword?}',[ AspirantController::class, 'search_applicants'])->name('search_applicants');
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


