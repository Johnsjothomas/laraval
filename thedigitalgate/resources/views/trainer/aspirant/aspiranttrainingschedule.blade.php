@include('header')
@include('trainer.navigation')
@include('trainer.submenu')

<div class="container justify-content-center align-center pt-5 pb-5">
	<div class="row">
		<div class="col">
			<img class="img-fluid " style="width: 100%" src="/talent/assets/img/myprofile.png">
		</div>
	</div>
	 @include('profile_head')
	<div class="row">
        <div class="col-12 mb_15">
            <span class=" pr-2">
                <a href="{{route('aspirant_search_trainer')}}"><button class="whitebtn">Search Aspirants</button></a>
            </span> <span class=" ">
                <a href="{{route('aspirant_list_trainer')}}"><button class="whitebtn">Applicant List</button></a>
            </span> <span class=" ">
                <a href="{{route('aspirant_contacted')}}"><button class="whitebtn">Contacted Applicant</button></a>
            </span> <span class=" ">
                <a href="{{route('training_schedule')}}"><button class="bluebtn">Training Schedule</button></a>
            </span>
        </div>
    </div>
	<div class="row">
		<div class="col-4  pt-4">
			<select class="form-control">
                                                <option value="" disabled="" selected="">Select Training</option>
                                            </select>
		</div>
	</div><br/><br/>
	<div class="row">
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
	</div>
	
	<br/><br/>
	<div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                        <th>Training Code</th>
                        <th>Aspirant Name</th>
                        <th>Email id</th>
                        <th>Training Status</th>
                        <th>Date of payment</th>
                        <th>Issue Certification</th>
                        <th>Aspirant Rating</th>
                    </thead>
                    <tbody>
                        <td>abcde</td>
                        <td>Sanjeev</td>
                        <td>example@gmail.com</td>
                        <td>Paid/Completed <span class="trainingstatus yellow"></span> <span class="trainingstatus green"></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
</div>
<!-- Modal -->
<div class="modal fade" id="aspiranttrainingcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center mb-4">
                <h5 class="mb-4">Training code Dropdown</h5>
                <div class="col-12  pt-4">
			<input type="text" class="form-control col-12"  >
		</div>
		<br/>
                <button type="button" class="btn bluebtn" data-dismiss="modal">Send</button>
                
            </div>
        </div>
    </div>
</div>
@include('footer')
