@include('header')
@include('trainer.navigation')
@include('trainer.submenu')
<div class="container justify-content-center align-center pt-5 pb-5">
    <div class="row">
        <div class="col">
            <img class="img-fluid " style="width:100%" src="/talent/assets/img/myprofile.png">
        </div>
    </div>
    <div class="row" style=" position: relative; top: -70px;  ">
        <div class="col-sm-2">
            <div class="profile-pic-wrapper pt-3">
                <div class="pic-holder">
                    <!-- uploaded pic shown here -->
                    <img id="profilePic" class="pic" src="https://source.unsplash.com/random/150x150">

                    <label for="newProfilePhoto" class="upload-file-block">
                        <div class="text-center">
                            <div class="mb-2">
                                <i class="fa fa-camera fa-2x"></i>
                            </div>
                        </div>
                    </label>
                    <input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto"
                        accept="image/*" style="display: none;">
                </div>
            </div>
        </div>
        <div class="col-sm-6" style=" top: 74px; ">
            <h3>Khaleel</h3>
            <h6>UI UX Designer</h6>
        </div>
    </div>

    <div class="">
        <div class="mb_15">
            <a href="#" class="card-link bold heading1">Open for All</a>
            <a href="#" class="card-link heading1">Corporate</a>
        </div>



        <div class="row">
            <div class="col-12 mb_15">
                <span class=" pr-2">
                    <button class="bluebtn">Module Planner</button>
                </span>
                <span class=" ">
                    <button class="whitebtn">My Trainings</button>
                </span>
                <!-- <div class=" p-2">
                <button class="whitebtn">Upcomming Modules</button>
            </div>
            <div class=" p-2">
                <button class="whitebtn">Deleted and Paused Modules</button>
            </div>
            <div class=" p-2">
                <button class="whitebtn">View listed corporate Trainings</button>
            </div>
            <div class=" p-2">
                <button class="whitebtn">Applied Trainings</button>
            </div> -->
            </div>

            @include('module_navigation')
        </div>

    </div>

    <div class="pt-4">
        <div class="card">
            <div class="card-body">

<form method="POST" enctype="multipart/form-data" class="submit-form">
            @csrf 
                <section class="signup-step-container">
                    <div class="row d-flex justify-content-center">
                        <div class="wizard col-12">
                            <div class="wizard-inner" style="display:none;">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
                                            aria-expanded="true"><span class="round-tab">1 </span> <i>Step
                                                1</i></a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
                                            aria-expanded="false"><span class="round-tab">2</span> <i>Step
                                                2</i></a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span
                                                class="round-tab">3</span> <i>Step 3</i></a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span
                                                class="round-tab">4</span> <i>Step 4</i></a>
                                    </li>
                                </ul>
                            </div>

                           
                                <div class="tab-content" id="main_form">
                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                        
                                        <input class="input2" type="hidden" value="{{(isset($module_details->id))? $module_details->id : ''}}" name="module_id"/> 

                                        <div class="form-group">
                                            <h5>Module Status</h5>
                                            <select name="module_status" class="form-control">
                                                <option value="Current">Current</option>
                                                <option value="Upcoming">Upcoming</option>
                                            </select>
                                            @error('module_status')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Module Title</h5>
                                            <input type="text" name="module_title" value="{{ old('module_title',(isset($module_details->fields->Module_Title))? $module_details->fields->Module_Title : '')}}" class="form-control">
                                            @error('module_title')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Total number of Days</h5>
                                            <input type="text" name="total_number_of_days" value="{{ old('total_number_of_days',(isset($module_details->fields->Total_Number_of_Days))? $module_details->fields->Total_Number_of_Days : '')}}" class="form-control">
                                            @error('total_number_of_days')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <h5 class="pt-2" data-toggle="collapse" href="#sessiontype" role="button"
                                            aria-expanded="false" aria-controls="collapseExample" class="btn dropdown-toggle" data-toggle="dropdown">
                                            Session Type &nbsp;
                                        </h5>

                                        <div class="form-group">
                                            <label  for="classroom" class="btn btn-sm whitebtn m-2">Classroom</label>
                                            <input style="display:none" id="classroom" type="radio" name="session_type" value="classroom">

                                            <label for="recorded" type="button" class="btn btn-sm whitebtn m-2">Recorded Video</label>
                                            <input style="display:none" id="recorded" type="radio" name="session_type" value="Recording Video">

                                            <label for="live" type="button" class="btn btn-sm whitebtn m-2">Live</label>
                                            <input style="display:none" id="live" type="radio" name="session_type" value="Live">

                                            <label for="one-on-one" type="button" class="btn btn-sm whitebtn m-2">One on one</label>
                                            <input style="display:none" id="one-on-one" type="radio" name="session_type" value="One-on-One">

                                            @error('session_type')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                        <h5>If Live - Platform details</h5>
                                        <input type="text" name="platform_details" value="{{ old('platform_details',(isset($module_details->fields->Session_Details_If_Any))? $module_details->fields->Session_Details_If_Any : '')}}" class="form-control">
                                            @error('platform_details')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>    




                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="bluebtn pl-4 pr-4 next-step active">Next</button>
                                            </div>
                                        </div>
                                        

                                        
                                    </div>




                                    <div class="tab-pane" role="tabpanel" id="step2">
                                     
                                      @forelse($module_topic_details as $key=>$val) 

                                        <input class="input2" type="hidden" value="{{(isset($val->id))? $val->id : ''}}" name="topic_id[]"/>  

                                        <div class="form-group">
                                            <h5>Day</h5>
                                            <input type="text" name="topic_day[]" value="{{ old('topic_day.$key',(isset($val->fields->Day))? $val->fields->Day : '')}}" class="form-control">
                                            @error('topic_day')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Topic</h5>
                                            <input type="text" name="topic_name[]" value="{{ old('topic_name.$key',(isset($val->fields->Topic_Name))? $val->fields->Topic_Name : '')}}" class="form-control">
                                            @error('topic_name')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Total time in minutes</h5>
                                            <input type="text" name="topic_total_time[]" value="{{ old('topic_total_time.$key',(isset($val->fields->Total_time_in_Minutes))? $val->fields->Total_time_in_Minutes : '')}}" class="form-control">
                                            @error('topic_total_time')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <h5>Description</h5>
                                            <textarea name="topic_description[]" class="form-control">{{ old('topic_description.$key',(isset($val->fields->Topic_Description))? $val->fields->Topic_Description : '')}}</textarea>
                                            @error('topic_description')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Objective</h5>
                                            <input type="text" name="topic_objective[]" value="{{ old('topic_objective.$key',(isset($val->fields->Topic_Objective))? $val->fields->Topic_Objective : '')}}" class="form-control">
                                            @error('topic_objective')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                       

                                        <div class="form-group">
                                            <h5>The Number of Sessions</h5>
                                            <input type="text" name="topic_no_of_sessions[]" value="{{ old('topic_no_of_sessions.$key',(isset($val->fields->Number_of_Sessions))? $val->fields->Number_of_Sessions : '')}}" class="form-control" placeholder="( Per week or month)">
                                            @error('topic_no_of_sessions')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5> Language</h5>
                                            <select name="topic_languages" class="form-control">
                                                <option value="English">English</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="Malayalam">Malayalam</option>
                                                <option value="Arabic">Arabic</option>
                                            </select>
                                            @error('topic_languages')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        @empty

                                        <div class="form-group">
                                            <h5>Day</h5>
                                            <input type="text" name="topic_day[]" class="form-control">
                                            @error('topic_day')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Topic</h5>
                                            <input type="text" name="topic_name[]" class="form-control">
                                            @error('topic_name')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Total time in minutes</h5>
                                            <input type="text" name="topic_total_time[]" class="form-control">
                                            @error('topic_total_time')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <h5>Description</h5>
                                            <textarea name="topic_description[]" class="form-control"></textarea>
                                            @error('topic_description')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Objective</h5>
                                            <input type="text" name="topic_objective[]" class="form-control">
                                            @error('topic_objective')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                       

                                        <div class="form-group">
                                            <h5>The Number of Sessions</h5>
                                            <input type="text" name="topic_no_of_sessions[]" class="form-control" placeholder="( Per week or month)">
                                            @error('topic_no_of_sessions')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5> Language</h5>
                                            <select name="topic_languages" class="form-control">
                                                <option value="English">English</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="Malayalam">Malayalam</option>
                                                <option value="Arabic">Arabic</option>
                                            </select>
                                            @error('topic_languages')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        @endforelse

                                        <div class="text-center p-3">
                                            <button class="btn btn-secondary ">Add</button>
                                        </div>

                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="bluebtn pl-4 pr-4 prev-step mr-10">Back</button>
                                                <button type="button"
                                                    class="bluebtn pl-4 pr-4 next-step ">Continue</button>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="tab-pane" role="tabpanel" id="step3">

                                          <div class="form-group">
                                            <h5 class="heading1 ">Tag Skills</h5>
                                           <select id="skill_tags" name="skill_tags[]" class="form-control" multiple="multiple">
                                                <option value="Project Management">Project Management</option>
                                                <option value="Team Management">Team Management</option>
                                                <option value="Operations">Operations</option>
                                                <option value="Sales">Sales</option>
                                            </select>
                                            @error('skill_tags')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                       


                                        <div class="form-group">
                                            <h5> Duration of the module</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 col-sm-3"><label> Start*</label></div>
                                            <div class="col-6 col-sm-3"><label> End*</label></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6 col-sm-3">
                                                <input type="date" name="start_date" value="{{ old('start_date',(isset($module_details->fields->Start_Date))? $module_details->fields->Start_Date : '')}}" class="form-control">
                                                @error('start_date')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6 col-sm-3">
                                                <input type="date" name="end_date" value="{{ old('end_date',(isset($module_details->fields->End_Date))? $module_details->fields->End_Date : '')}}" class="form-control">
                                                @error('end_date')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Maximum participants quorum per batch Allowed</h5>
                                            <input type="text" name="max_participants" value="{{ old('max_participants',(isset($module_details->fields->Max_Participants_Quorum_per_Batch))? $module_details->fields->Max_Participants_Quorum_per_Batch : '')}}" class="form-control">
                                            @error('max_participants')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Is there prework requested from the participant</h5>
                                            <input type="text" name="prework_requested" value="{{ old('prework_requested',(isset($module_details->fields->Prework_requested_from_the_participant))? $module_details->fields->Prework_requested_from_the_participant : '')}}" class="form-control">
                                            @error('prework_requested')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Lesson Requirements from participants</h5>
                                            <input type="text" name="lession_requirement" value="{{ old('lession_requirement',(isset($module_details->fields->Lesson_Requirements_from_participants))? $module_details->fields->Lesson_Requirements_from_participants : '')}}" class="form-control">
                                            @error('lession_requirement')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- <div class="form-group">
                                            <h5>Lesson Requirement Details</h5>
                                            <input class="form-control">
                                            @error('designation')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div> -->

                                        

                                        <div class="form-group">
                                            <h5>Trainee Handout</h5>
                                            <input type="text" name="trainee_handout" value="{{ old('trainee_handout',(isset($module_details->fields->Trainee_Handout))? $module_details->fields->Trainee_Handout : '')}}" class="form-control">
                                            <div class="p-5">
                                                <button type="button" class="btn btn-secondary">Upload Training Handput</button>
                                                @error('trainee_handout')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>


                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="bluebtn pl-4 pr-4 prev-step mr-10">Back</button>
                                                <button type="button"
                                                    class="bluebtn pl-4 pr-4 next-step">Continue</button>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane" role="tabpanel" id="step4">
                                        <div class="form-group">
                                            <h5>Benchmark/Performance Check </h5>
                                          <input class="form-control" style="width: 50%;" placeholder="Enter you Topic"> 
                                        </div>
                                        <div class="row">
                                            <div class="col-3"><label>Date*</label></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6 col-sm-3"><input type="date" class="form-control"
                                                    placeholder="Month"></div>
                                            <div class="col-6 col-sm-3"><input type="text" class="form-control"
                                                    placeholder="Day"></div>
                                        </div>
                                        <div class="form-group ">
                                            <button type="button" class="btn btn-secondary ">Upload Assessment Questioanare</button>
                                        </div>
                                       
                                        <div class="text-center p-5">
                                            <button type="button" class="btn btn-secondary"> Upload a cover picture for your module</button>
                                            <div class="form-group inputDnD">
                                                <input type="file" class="form-control-file text-primary" id="myFile"
                                                    data-title="Drag &amp; Drop your files here"
                                                    accept="application/msword, application/pdf">
                                            </div>
                                            <div class="form-group">
                                                <h5>Paid or free</h5>
                                                <input class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <h5>Amount</h5>
                                                <input class="form-control">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="bluebtn pl-4 pr-4 prev-step mr-10">Back</button>
                                                    
                                                    <button type="submit"
                                                    class="bluebtn pl-4 pr-4 mr-10">Submit</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </section>
            </form>

                <!-- CREATE MODULE -->
                <!-- <div class="text-center p-5">
                    <button class="bluebtn pl-4 pr-4">+ CREATE MODULE </button>
                </div> -->
                <!-- MANAGE MODULE -->

            </div>
        </div>
        <!--PAST MODULES -->
        <h5 class="mt-5">Active Modules design components</h5>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card remove_br">
                    <div class="card-header p-0 white_bg">
                        <img src="/talent/trainer/assets/img/myprofile.png" width="100%">
                        <div class="p-3">
                        <div class="row">
                            <div class="col-10">
                                <h3 class="card-title">Design thinking </h3>
                            </div>
                            <div class="col-2">
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Schedule Training</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete">
                                            Delete Modules </a>
                                        <a class="dropdown-item" href="#">Pause Modules</a>
                                        <a class="dropdown-item" href="#">Edit Modules</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nibh leo dui sapien amet a.</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6>First Session on</h6>
                        <div class="row">
                            <div class="col-md-6">10/06/2021</div>
                            <div class="col-md-6">20 Seats remaining</div>
                        </div>
                        <h6>Next Session on</h6>
                        <div class="row">
                            <div class="col-md-6">Start Time</div>
                            <div class="col-md-6">End Time</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">10:00 AM</div>
                            <div class="col-md-6">01:00 PM</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card remove_br">
                    <div class="card-header p-0 white_bg">
                        <img src="/talent/trainer/assets/img/myprofile.png" width="100%">
                        <div class="p-3">
                        <div class="row">
                            <div class="col-10">
                                <h3 class="card-title">Design thinking </h3>
                            </div>
                            <div class="col-2">
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Schedule Training</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete">
                                            Delete Modules </a>
                                        <a class="dropdown-item" href="#">Pause Modules</a>
                                        <a class="dropdown-item" href="#">Edit Modules</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nibh leo dui sapien amet a.</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6>First Session on</h6>
                        <div class="row">
                            <div class="col-md-6">10/06/2021</div>
                            <div class="col-md-6">20 Seats remaining</div>
                        </div>
                        <h6>Next Session on</h6>
                        <div class="row">
                            <div class="col-md-6">Start Time</div>
                            <div class="col-md-6">End Time</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">10:00 AM</div>
                            <div class="col-md-6">01:00 PM</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card remove_br">
                    <div class="card-header p-0 white_bg">
                        <img src="/talent/trainer/assets/img/myprofile.png" width="100%">
                        <div class="p-3">
                        <div class="row">
                            <div class="col-10">
                                <h3 class="card-title">Design thinking </h3>
                            </div>
                            <div class="col-2">
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Schedule Training</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete">
                                            Delete Modules </a>
                                        <a class="dropdown-item" href="#">Pause Modules</a>
                                        <a class="dropdown-item" href="#">Edit Modules</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nibh leo dui sapien amet a.</p>
                    </div>
                    </div>
                    <div class="card-body">
                        <h6>First Session on</h6>
                        <div class="row">
                            <div class="col-md-6">10/06/2021</div>
                            <div class="col-md-6">20 Seats remaining</div>
                        </div>
                        <h6>Next Session on</h6>
                        <div class="row">
                            <div class="col-md-6">Start Time</div>
                            <div class="col-md-6">End Time</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">10:00 AM</div>
                            <div class="col-md-6">01:00 PM</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="mt-5">My Trainings design components</h5>
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                        <th>Training category</th>
                        <th>Module Title</th>
                        <th>Training Status</th>
                        <th>Number of  Aspirants</th>
                        <th>Total Amount Received</th>
                        <th>Average Rating</th>
                        <th>Certification Status</th>
                    </thead>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td>Upcoming/Active/Paused/deleted/Completed</td>
                        <td>44 <a href="#" class="bluebtn btn-sm">Click Here</a></td>
                        <td>50</td>
                        <td>4.5</td>
                        <td><a href="#">Issued/Pending</a></td>
                    </tbody>
                </table>
            </div>
            </div>
        </div>


    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center mb-4">
                <h5 class="mb-4">Are you sure wants to delete</h5>
                <button type="button" class="btn bluebtn" data-dismiss="modal">Yes</button>
                <button type="button" class="btn bluebtn" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<script>
// ------------step-wizard-------------
$(document).ready(function() {

      $("#skill_tags").select2({
    allowClear: false
});


    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {

        var target = $(e.target);

        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function(e) {

        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);

    });
    $(".prev-step").click(function(e) {

        var active = $('.wizard .nav-tabs li.active');
        prevTab(active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}

function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


$('.nav-tabs').on('click', 'li', function() {
    $('.nav-tabs li.active').removeClass('active');
    $(this).addClass('active');
});
</script>
@include('footer')