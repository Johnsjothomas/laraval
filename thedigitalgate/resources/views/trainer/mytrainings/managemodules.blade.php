@include('header')
@include('trainer.navigation')
@include('trainer.submenu')
<div class="container justify-content-center align-center pt-5 pb-5">
    <div class="row">
        <div class="col">
            <img class="img-fluid " style="width:100%" src="/talent/assets/img/myprofile.png">
        </div>
    </div>
    <div class="row" style=" position: relative; top: -70px;">
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
            <a href="#" class="card-link  heading1">Open for All</a>
            <a href="#" class="card-link bold heading1">Corporate</a>
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

            <div class="col-12">
                <a href="#" class="card-link">Create Module</a>
                <a href="#" class="card-link bold">Active Modules</a>
                <a href="#" class="card-link">Upcomimg Modules</a>
                <a href="#" class="card-link">Deleted and Paused Modules</a>
                <a href="#" class="card-link">Completed Modules</a>
            </div>
        </div>

    </div>

    <div class="pt-4">
        <div class="card">
            <div class="card-body">

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

                            <form role="form" action="index.html" class="login-box">
                                <div class="tab-content" id="main_form">
                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                        <div class="form-group">
                                            <h5>Training Request Code</h5>
                                            <select class="form-control">
                                                <option value="" disabled selected>Current / upcomiming
                                                </option>
                                                <option value=""> Individual </option>
                                                <option value="">Corporate</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <h5>Module Status</h5>
                                            <select class="form-control">
                                                <option value="" disabled selected>Current / upcomiming
                                                </option>
                                                <option value="">Techinical </option>
                                                <option value="">Softskills</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <h5>Module Title</h5>
                                            <input class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <h5>Total number of Days</h5>
                                            <select class="form-control">
                                                <option value="" disabled selected>Select your option</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <h5>Day</h5>
                                            <select class="form-control">
                                                <option value="" disabled selected>Select your option</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <h5>Topic</h5>
                                            <input class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <h5>Total time in minutes</h5>
                                            <select class="form-control">
                                                <option value="" disabled selected>Select your option</option>
                                            </select>
                                        </div>

                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="bluebtn pl-4 pr-4 next-step active">Next</button>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="tab-pane" role="tabpanel" id="step2">
                                        <!-- <div class="text-left p-2 graybackground2" style="width: 40%;">
                                            <div>
                                                <label>Day 1 Time</label>
                                                <label>1 Hour</label>
                                                <a href="" class="float-right" role="button">Edit</a>
                                            </div>
                                            <div>
                                                <label>Topic</label>
                                                <label>Name of the Topic</label>
                                            </div>
                                            <div>
                                                <h6>Description</h6>
                                                <label>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quam
                                                    est, phasellus facilisi
                                                    justo, mi. Placerat egestas id sodales pharetra, elementum, viverra
                                                    proin.</label>
                                            </div>
                                            <div>
                                                <h6>Objective</h6>
                                                <label>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quam
                                                    est, phasellus facilisi
                                                    justo, mi. Placerat egestas id sodales pharetra, elementum, viverra
                                                    proin.</label>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <h5>Description</h5>
                                            <input class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <h5>Objective</h5>
                                            <input class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <h5 class="heading1 ">Tag Skills</h5>
                                            <div class="">
                                                <button class="btn btn-sm bluebtn m-2"> + Project Management</button>
                                                <button class="btn btn-sm bluebtn m-2"> + Team Management</button>
                                                <button class="btn btn-sm whitebtn m-2">+ Operations</button>
                                                <button class="btn btn-sm whitebtn m-2">+ Sales</button>
                                                <button class="btn btn-sm whitebtn m-2">+ Event Management</button>
                                                <button class="btn btn-sm whitebtn m-2">+ Finance Management</button>
                                            </div>
                                        </div>
                                        <h5 class="pt-2" data-toggle="collapse" href="#sessiontype" role="button"
                                            aria-expanded="false" aria-controls="collapseExample">
                                            Session Type
                                        </h5>
                                        <div class="collapse" id="sessiontype">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <button class="btn btn-sm whitebtn m-2">Classroom</button>
                                                    <button class="btn btn-sm whitebtn m-2">Recorded Video</button>
                                                    <button class="btn btn-sm whitebtn m-2">Live</button>
                                                </div>
                                            </div>
                                        </div>
                                        <select class="form-control form-group">
                                            <option value="" disabled selected>If Live - Platform details</option>
                                        </select>
                                        <div class="form-group">
                                            <button class="btn btn-sm whitebtn m-2">Classroom</button>
                                            <button class="btn btn-sm whitebtn m-2">Recorded Video</button>
                                            <button class="btn btn-sm whitebtn m-2">Live</button>
                                            <button class="btn btn-sm whitebtn m-2">One on one</button>
                                        </div>

                                        <div class="form-group">
                                            <h5>The Number of Sessions</h5>
                                            <input class="form-control" placeholder="( Per week or month)">
                                        </div>
                                        <div class="form-group">
                                            <h5> Language</h5>
                                            <input class="form-control" placeholder="Select the option">
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
                                            <h5> Duration of the module</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 col-sm-3"><label> Start*</label></div>
                                            <div class="col-6 col-sm-3"><label> End*</label></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6 col-sm-3"><input type="date" class="form-control"></div>
                                            <div class="col-6 col-sm-3"><input type="date" class="form-control"></div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Maximum participants quorum per batch Allowed</h5>
                                            <input class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <h5>Is there prework requested from the participant</h5>
                                            <input class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <h5>Lesson Requirements from participants</h5>
                                            <input class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <h5>Lesson Requirement Details</h5>
                                            <input class="form-control">
                                        </div>

                                        <div class="text-center p-3">
                                            <button class="btn btn-secondary ">Add</button>
                                        </div>

                                        <div class="form-group">
                                            <h5>Trainee Handout</h5>
                                            <input class="form-control">
                                            <div class="text-center p-5">
                                                <button class="btn btn-secondary">Upload Training Handput</button>
                                            </div>
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
                                            <button class="btn btn-secondary ">Add</button>
                                        </div>
                                        <div class="">
                                            <h5> Upload a cover picture for your module</h5>
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
                                                    <a href="/talent/trainer/success" class="bluebtn pl-4 pr-4 next-step ">Upload</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>

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
                <div class="card">
                    <div class="card-header p-0">
                        <img src="/talent/trainer/assets/img/myprofile.png" width="100%">
                        <div class="p-3">
                            <div class="row">
                                <div class="col-10">
                                    <h3 class="card-title">Design thinking </h3>
                                </div>
                                <div class="col-2">
                                    <div class="dropdown">
                                        <button type="button" class="btn dropdown-toggle"
                                            data-toggle="dropdown"></button>
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
                <div class="card">
                    <div class="card-header p-0">
                        <img src="/talent/trainer/assets/img/myprofile.png" width="100%">
                        <div class="p-3">
                            <div class="row">
                                <div class="col-10">
                                    <h3 class="card-title">Design thinking </h3>
                                </div>
                                <div class="col-2">
                                    <div class="dropdown">
                                        <button type="button" class="btn dropdown-toggle"
                                            data-toggle="dropdown"></button>
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
                <div class="card">
                    <div class="card-header p-0">
                        <img src="/talent/trainer/assets/img/myprofile.png" width="100%">
                        <div class="p-3">
                            <div class="row">
                                <div class="col-10">
                                    <h3 class="card-title">Design thinking </h3>
                                </div>
                                <div class="col-2">
                                    <div class="dropdown">
                                        <button type="button" class="btn dropdown-toggle"
                                            data-toggle="dropdown"></button>
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
                        <th>Number of Aspirants</th>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h5>Are you sure wants to delete</h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<script>
// ------------step-wizard-------------
$(document).ready(function() {
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