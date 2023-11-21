<?php

use App\Http\Controllers\Aspirant\AspirantController;
use App\Http\Controllers\HomeController;
use App\Models\module_creation;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Seller\SellerController;
// use App\Http\Controllers\Seller\ProductController;
use App\Models\cart;
use App\Models\aspirant;
use Carbon\Carbon;
//use DateTime;



Route::prefix('talent')->group(function () {

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
        return view('/aspirant/signup', ['id' => 2]);
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
    // Route::get('aspirant/profiledetails', function () {
    //     return view('/aspirant/profiledetails');
    // })->name('aprodetails');

    //Route::get('aspirant/profiledetails', function () {
    //    return view('/aspirant/profile/profiledetails');
    //})->name('aprodetails');

    // Route::get('aspirant/profiledetails', function () {
    //     return view('/aspirant/profile/profiledetails');
    // })->name('aprodetails');


    //Avinash Modified and commented 
    // Route::get('aspirant/myprofile', function () {
    //     return view('/aspirant/profile/myprofile');
    // });
    Route::middleware(['custom_auth_aspirant'])->group(function () {
        Route::get('/aspirant/myprofile', [AspirantController::class, 'Aspimyprofile'])->name('Aspimyprofile');
    });
    // Route::get('aspirant/myprofile', function () {
    //     return view('/aspirant/myprofile');
    // });
    //Avinash Modified and commented till here

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
    // Route::get('aspirant/mybank/earned', function () {
    //     return view('/aspirant/mybank/earned');
    // });
    
    // Route::post('aspirant/mybank/earned',[ AspirantController::class, 'myBankAsp'])->name('myBankAsp');
    // Route::get('aspirant/mybank/earned',[ AspirantController::class, 'myBankAsp'])->name('myBankAsp');
    Route::get('aspirant/mybank/spent', function () {
        return view('/aspirant/mybank/spent');
    });
    Route::get('aspirant/mybank/upgrade', function () {
        return view('/aspirant/mybank/upgrade');
    });
    Route::get('aspirant/dashboard', function () {
        return view('/aspirant/dashboardacc');
    });
    // Route::get('aspirant/message', function () {
    //     return view('/aspirant/message');
    // });
    Route::middleware(['custom_auth_aspirant'])->group(function () {
        Route::any('aspirant/mybank/earned', [AspirantController::class, 'myBankAsp'])->name('myBankAsp');
        Route::any('aspirant/message', [AspirantController::class, 'aspirantmessage'])->name('aspirantmessage');
    
        Route::any('aspirant/message/{supid}', [AspirantController::class, 'aspirantmessagesupid'])->name('aspirantmessagesupid');

        // Route::any('aspirant/message/savemesg',[ AspirantController::class, 'savemesg'])->name('savemesg');


        // Route::get('aspirant/notify', function () {
        //     return view('/aspirant/notify');
        // });
        // Route::get('aspirant/settings', function () {
        //     return view('/aspirant/settings');
        // });

        Route::any('/aspirant/settings', [HomeController::class, 'settingsPageDeatils'])->name('settingsDeatils');

        Route::get('aspirant/mytraining', function () {
            $moduleinfoforAspirantTechnical = module_creation::where('Status', 'Active')->where('trainingClassification', 'technical')->where('endDateTime', '>', now())->get();
            $moduleinfoforAspirantSoftskill = module_creation::where('Status', 'Active')->where('trainingClassification', 'softskill')->where('endDateTime', '>', now())->get();
            
            $MayCartData = cart::join('module_creations', 'module_creations.module_Id', '=', 'cart.module_Id')
                ->join('trainer_master', 'trainer_master.trainer_id', '=', 'module_creations.trainer_id')
                ->join('aspirant_master', 'aspirant_master.aspirant_id', '=', 'cart.aspirant_id')
                ->leftJoin('aspirant_payment', function ($join) {
                    $join->on('aspirant_payment.aspirant_id', '=', 'aspirant_master.aspirant_id')
                        ->on('aspirant_payment.module_Id', '=', 'module_creations.module_Id');
                })
                ->select('aspirant_master.email_id as ame', 'aspirant_master.first_name as afn', 'aspirant_master.mobile as amm', 'cart.aspirant_id', 'cart.module_Id', 'trainer_master.first_name','trainer_master.trainer_id', 'module_creations.moduleTitle', 'module_creations.trainingClassification', 'cart.created_date', 'module_creations.amount', 'module_creations.currency','module_creations.endDateTime','aspirant_payment.payment_date','aspirant_payment.issue_certificate_date')
                ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
                ->where('cart.aspirant_id', '=', session('Aspirant_ID'))
                ->where('module_creations.endDateTime', '<', now())
                ->get();
            $aspirantData = aspirant::where('aspirant_id', session('Aspirant_ID'))->get()->first()->toArray();
            return view(
                '/aspirant/mytraining',
                ['moduleinfoforAspirantTechnical' => $moduleinfoforAspirantTechnical, 'moduleinfoforAspirantSoftskill' => $moduleinfoforAspirantSoftskill, "MayCartData" => $MayCartData, 'aspirantData' => $aspirantData]
            );
        });
        Route::any('/aspirant/dashboardtraining', [AspirantController::class, 'aspirantDashboard'])->name('aspirantDashboard');
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
    
    Route::post('/aspirant/listModule', [AspirantController::class, 'listModule'])->name('listModule');
    Route::post('/aspirant/saveModule', [AspirantController::class, 'saveModule'])->name('saveModule');
    // Route::get('aspirant/dashboardtraining', function () {
    //     return view('/aspirant/dashboardtraining');
    // });

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
    // Route::get('trainer/profiledetails', function () {
    //     return view('trainer_backup/profiledetails');
    // })->name('tprofile');

    //Avinash Modified and commented 
    Route::get('trainer/myprofile', function () {
        return view('trainer/myprofile');
    });
    // Route::get('trainer/myprofile', function () {
    //     return view('/trainer/myprofile');
    // });
    //Avinash Modified and commented till here


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
    Route::get('trainer/message', function () {
        return view('/trainer/message');
    });
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

    Route::get('script/update_modules', function () {
        
        $module_creation = module_creation::whereNotNull('module_Id')->get();
        if(@$module_creation)
        {
            foreach ($module_creation as $key => $value) {
                //startDateTime
                //endDateTime
                //totalNoOfDays
                //timeInMinutesPerDay
                $endDateTime = $value->startDateTime;
                $date = DateTime::createFromFormat("Y-m-d H:i", $endDateTime);
    
                // Format the DateTime object to the desired format "Y-m-d H:i"
                $endDateTime = date('Y-m-d H:i',strtotime($endDateTime));//$date->format("Y-m-d H:i");
                if(@$value->totalNoOfDays && @$endDateTime)
                {
                    if($value->totalNoOfDays > 1)
                    {
                       
                        //$endDateTime = date("Y-m-d H:i", strtotime('+'.($value->totalNoOfDays - 1).' day', $endDateTime));
                        $date = Carbon::parse($endDateTime);
                        $date->addDay($value->totalNoOfDays - 1);
                        $endDateTime = $date->toDateTimeString();
                    }
                }
                if(@$value->timeInMinutesPerDay && @$endDateTime)
                {
                    //$endDateTime = date("Y-m-d H:i", strtotime((int)$value->timeInMinutesPerDay.' minutes', $endDateTime));
                    $date = Carbon::parse($endDateTime);
                    $date->addMinute($value->timeInMinutesPerDay);
                    $endDateTime = $date->toDateTimeString();
                    
                }
                // pre($value->startDateTime.'------'.$value->endDateTime.'------'.$value->totalNoOfDays.'------'.$value->timeInMinutesPerDay);
                // pre(date("Y-m-d H:i", strtotime($endDateTime)));
                module_creation::where('module_Id',$value->module_Id)->update(['endDateTime'=>date("Y-m-d H:i", strtotime($endDateTime))]);
            }
        }
    
        return "Success...!";
    });
});
