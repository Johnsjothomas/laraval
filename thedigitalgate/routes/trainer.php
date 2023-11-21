<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Trainer\TrainerController;
use App\Http\Controllers\Trainer\ModuleController;
use App\Http\Controllers\Trainer\AspirantController;
// use App\Http\Controllers\Seller\SellerController;
// use App\Http\Controllers\Seller\ProductController;




Route::group(['prefix' => 'trainer', 'middleware' => ['trainer','XssSanitizer']],function () {

Route::middleware(['custom_auth'])->group(function () {

     Route::any('/update_profile',[ TrainerController::class, 'update_profile'])->name('update_profile_trainer');
     Route::any('/profile',[ TrainerController::class, 'profile'])->name('profile_trainer');

      
     Route::any('/module/edit/{type}/{id?}',[ ModuleController::class, 'create_module'])->name('edit_module');

    //  Route::any('/module/{type}/create',[ ModuleController::class, 'create_module'])->name('create_module');

    // Route::post('/trainer/managemodules', [ModuleController::class, 'createmoduled'])->name('createmoduled');

    Route::any('/module/create',[ ModuleController::class, 'create_module'])->name('create_module');

     Route::any('/module/{type}/{status}',[ ModuleController::class, 'module_list'])->name('module_list');
     Route::any('/module/view/{type}/{id}',[ ModuleController::class, 'module_info'])->name('module_info');
     Route::any('/module/status/{id}/{status}',[ ModuleController::class, 'module_status'])->name('module_status');

     Route::any('/aspirant/search/{keyword?}',[ AspirantController::class, 'aspirant_search'])->name('aspirant_search_trainer');
      Route::any('/aspirant/training_schedule',[ AspirantController::class, 'training_schedule'])->name('training_schedule');
      Route::any('/aspirant/contacted',[ AspirantController::class, 'aspirant_contacted'])->name('aspirant_contacted');
     Route::any('/aspirant/{module?}',[ AspirantController::class, 'aspirant_list'])->name('aspirant_list_trainer');

     Route::post('/contact_aspirant',[ AspirantController::class, 'contact_aspirant'])->name('contact_aspirant');

     Route::any('/training/requests',[ TrainerController::class, 'training_requests'])->name('training_requests');
     Route::any('/training_request/{id}',[ TrainerController::class, 'training_request_info'])->name('training_request_info');
      Route::any('/training/applied_training',[ TrainerController::class, 'applied_training'])->name('applied_training');
     Route::any('/training/negotiations',[ TrainerController::class, 'negotiations'])->name('training_request_negotiations');
      Route::any('/training/summary',[ TrainerController::class, 'employersummary'])->name('employer_summary');

});
// Route::get('/home', function () {
//      return view('/talent/index1');
// });
Route::get('home', function () {
    return view('/talent/index1');
})->name('talent');



Route::get('index', function () {
    return view('/talent/index');
})->name('industreall');

Route::get('aspirant/signup', function () {
    return view('/aspirant/signup', ['id'=>2]);
});
Route::get('aspirant/register', function () {
    return view('/aspirant/register');
});
Route::get('aspirant/registerapi', function () {
    return view('/aspirant/registerapi');
});
Route::get('aspirant/verifyotp', function () {
    return view('/aspirant/verifyotp');
});
Route::get('aspirant/awesome', function () {
    return view('/aspirant/awesome');
});
Route::get('aspirant/login', function () {
    return view('/aspirant/login');
});
Route::get('aspirant/forgetpassword', function () {
    return view('/aspirant/forgetpassword');
});
Route::get('aspirant/forgetpassword2', function () {
    return view('/aspirant/forgetpassword2');
});
Route::get('aspirant/selectoption', function () {
    return view('/aspirant/selectoption');
});
Route::get('aspirant/profiledetails', function () {
    return view('/aspirant/profiledetails');
});
Route::get('aspirant/myprofile', function () {
    return view('/aspirant/myprofile');
});
Route::get('aspirant/job/managejob', function () {
    return view('/aspirant/job/managejob'); 
});
Route::get('aspirant/job/jobdetails', function () {
    return view('/aspirant/job/jobdetails');
});
Route::get('aspirant/job/savedjob', function () {
    return view('/aspirant/job/savedjob');
});
Route::get('aspirant/job/appliedjob', function () {
    return view('/aspirant/job/appliedjob');
});
Route::get('aspirant/selectfrom', function () {
    return view('/aspirant/selectfrom');
});
Route::get('aspirant/job/submitaproposal', function () {
    return view('/aspirant/job/submitaproposal');
});
Route::get('aspirant/mybank/earned', function () {
    return view('/aspirant/mybank/earned');
});
    Route::get('aspirant/mybank/spent', function () {
        return view('/aspirant/mybank/spent');
    });
Route::get('aspirant/mybank/upgrade', function () {
    return view('/aspirant/mybank/upgrade');
});
Route::get('aspirant/dashboard', function () {
    return view('/aspirant/dashboardacc');
});
Route::get('aspirant/message', function () {
    return view('/aspirant/message');
});
// Route::get('aspirant/notify', function () {
//     return view('/aspirant/notify');
// });
Route::get('aspirant/settings', function () {
    return view('/aspirant/settings');
});
Route::get('aspirant/mytraining', function () {
    return view('/aspirant/mytraining');
});
Route::get('aspirant/trainingscompleted', function () {
    return view('/aspirant/mytraining-completed');
});

Route::get('aspirant/trainingscertifications', function () {
    return view('/aspirant/mytraining-certifications');
});

Route::get('aspirant/moduleinfo', function () {
    return view('/aspirant/moduleinfo');
});
Route::get('footer', function () {
    return view('/talent/footer');
});
Route::get('nav', function () {
    return view('/talent/navigation');
});
Route::get('aspirant/dashboardtraining', function () {
    return view('/aspirant/dashboardtraining');
});

    Route::get('aspirant/feedbacktrainer', function () {
        return view('/aspirant/feedbacktrainer');
    });
        Route::get('aspirant/feedbackmodule', function () {
            return view('/aspirant/feedbackmodule');
        });

// Trainer
/*Route::get('trainer/yourprofile', function () {
    return view('/talent/trainer/yourprofile');
});
Route::get('trainer/signup', function () {
    return view('/talent/trainer/signup', ['id'=>2]);
});

Route::get('trainer/register', function () {
    return view('/talent/trainer/register');
});
Route::get('trainer/registerapi', function () {
    return view('/talent/trainer/registerapi');
});
Route::get('trainer/verifyotp', function () {
    return view('/talent/trainer/verifyotp');
});
Route::get('trainer/awesome', function () {
    return view('/talent/trainer/awesome');
});
Route::get('trainer/login', function () {
    return view('/talent/trainer/login');
});*/
Route::get('trainer/forgetpassword', function () {
    return view('/talent/trainer/forgetpassword');
});
Route::get('trainer/forgetpassword2', function () {
    return view('/trainer/forgetpassword2');
});
Route::get('trainer/selectoption', function () {
    return view('/trainer/selectoption');
});
Route::get('trainer/profiledetails', function () {
    return view('/trainer/profiledetails');
});
Route::get('trainer/myprofile', function () {
    return view('/trainer/myprofile');
});
Route::get('trainer/selectfrom', function () {
    return view('/trainer/selectfrom');
});
Route::get('trainer/footer', function () {
    return view('/trainer/footer');
});
Route::get('trainer/nav', function () {
    return view('/trainer/navigation');
});
Route::get('trainer/modules', function () {
    return view('/trainer/managemodules');
});
Route::get('trainer/success', function () {
    return view('/trainer/success');
});

Route::get('trainer/dashboard', function () {
    return view('/trainer/dashboardacc');
});
// Route::get('trainer/message', function () {
//     return view('/trainer/message');
// });
Route::get('trainer/notify', function () {
    return view('/trainer/notify');
});
Route::get('trainer/settings', function () {
    return view('/trainer/settings');
});
Route::get('trainer/mytraining', function () {
    return view('/trainer/mytraining');
});
Route::get('trainer/moduleinfo', function () {
    return view('/trainer/moduleinfo');
});
Route::get('trainer/mybank/earned', function () {
    return view('/trainer/mybank/earned');
});
Route::get('trainer/mybank/upgrade', function () {
    return view('/trainer/mybank/upgrade');
});

Route::get('trainer/moduleinfo-corporate', function () {
        return view('/trainer/moduleinfo-corporate');
    });
    Route::get('trainer/modules-corporate', function () {
            return view('/trainer/mytrainings/managemodules-corporate');
    });
    Route::get('trainer/searchaspirant', function () {
            return view('/trainer/aspirant/searchaspirant');
    });
    
    Route::get('trainer/listaspirant', function () {
            return view('/trainer/aspirant/listaspirant');
    });
    
    Route::get('trainer/trainingschedule', function () {
        return view('/trainer/aspirant/aspiranttrainingschedule');
    });
    
    Route::get('trainer/aspirantcontacted', function () {
        return view('/trainer/aspirant/aspirantcontacted');
    });
    
    Route::get('trainer/trainingrequest', function () {
        return view('/trainer/employer/trainingrequest');
    });
    
    Route::get('trainer/appliedtrainingrequest', function () {
        return view('/trainer/employer/appliedtrainingrequest');
    });
    
    Route::get('trainer/negotiationschedule', function () {
        return view('/trainer/employer/negotiationschedule');
    });
    Route::get('trainer/employersummary', function () {
            return view('/trainer/employer/employersummary');
    });
    
        Route::get('trainer/mybank', function () {
            return view('/trainer/mybank/new');
        });



//employer
Route::get('employer/signup', function () {
    return view('/employer/signup');
});
Route::get('employer/register', function () {
    return view('/employer/register');
});
Route::get('employer/register', function () {
    return view('/employer/register');
});
Route::get('employer/verifyotp', function () {
    return view('/employer/verifyotp');
});
Route::get('employer/awesome', function () {
    return view('/employer/awesome');
});
Route::get('employer/welcome', function () {
    return view('/employer/welcome');
});
Route::get('employer/superadmin/register', function () {
    return view('/employer/superadmin/register');
});
Route::get('employer/superadmin/awesome', function () {
    return view('/employer/superadmin/awesome');
});
Route::get('employer/superadmin/login', function () {
    return view('/employer/superadmin/login');
});

// Route::any('/addModule', ModuleController::class, 'addmodule')->name('addmodule');

});
