<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Aspirant\AspirantController;
use App\Http\Controllers\Aspirant\JobController;

Route::prefix('aspirant')->group(function () {

    Route::get('/dashboard',[ AspirantController::class, 'dashboard'])->name('aspirant_dashboard');
    Route::get('/profile',[ AspirantController::class, 'profiledetails'])->name('aspirant_profiledetails');
    Route::get('/mytraining',[ AspirantController::class, 'mytraining'])->name('aspirant_mytraining');
    Route::get('/moduleinfo',[ AspirantController::class, 'moduleinfo'])->name('aspirant_moduleinfo');
    Route::get('/message',[ AspirantController::class, 'message'])->name('aspirant_message');
    Route::get('/notify',[ AspirantController::class, 'notify'])->name('aspirant_notify');
    Route::get('/settings',[ AspirantController::class, 'settings'])->name('aspirant_settings');
    Route::get('/mybank/earned',[ AspirantController::class, 'mybank_earned'])->name('aspirant_mybank_earned');
    Route::get('/mybank/upgrade',[ AspirantController::class, 'mybank_upgrade'])->name('aspirant_mybank_upgrade');

    Route::prefix('job')->group(function () {

        Route::get('/managejob',[ JobController::class, 'managejob'])->name('aspirant_managejob');
        Route::get('/jobdetails',[ JobController::class, 'jobdetails'])->name('aspirant_jobdetails');
        Route::get('/savedjob',[ JobController::class, 'savedjob'])->name('aspirant_savedjob');
        Route::get('/appliedjob',[ JobController::class, 'appliedjob'])->name('aspirant_appliedjob');
        Route::get('/submit_proposal',[ JobController::class, 'submit_proposal'])->name('aspirant_submitproposal');

    });


Route::get('/register', function () {
    return view('/talent/aspirant/register');
});
Route::get('/registerapi', function () {
    return view('/talent/aspirant/registerapi');
});
Route::get('/verifyotp', function () {
    return view('/talent/aspirant/verifyotp');
});
Route::get('/awesome', function () {
    return view('/talent/aspirant/awesome');
});
Route::get('/login', function () {
    return view('/talent/aspirant/login');
});
Route::get('/forgetpassword', function () {
    return view('/talent/aspirant/forgetpassword');
});
Route::get('/forgetpassword2', function () {
    return view('/talent/aspirant/forgetpassword2');
});
Route::get('/selectoption', function () {
    return view('/talent/aspirant/selectoption');
});



Route::get('/myprofile', function () {
    return view('/talent/aspirant/myprofile');
});


Route::get('/selectfrom', function () {
    return view('/talent/aspirant/selectfrom');
});


Route::get('footer', function () {
    return view('/talent/footer');
});
Route::get('nav', function () {
    return view('/talent/navigation');
});


});
