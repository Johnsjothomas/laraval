@include('header') @include('trainer.navigation') @include('trainer.submenu')
<div class="container justify-content-center align-center pt-5 pb-5">
	<div class="row">
		<div class="col">
			<img class="img-fluid " style="width: 100%" src="/talent/assets/img/myprofile.png">
		</div>
	</div>
	@include('profile_head')
	
	@include('trainer.employer.navigation')

	<div class="row">
		<div class="col-12  pt-4">
			<form method="post">
			<input type="text" name="keyword" class="form-control col-4" placeholder="Enter Skill/Module/Company Name" style="display:inline-block; margin-right:20px;"> <i class="fa fa-caret-down" aria-hidden="true"></i>
		</div>
	</div>
	
		
			
				<!-- CREATE MODULE -->
				@forelse($data as $key=>$val)
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ptd15 pointer">
						<div class="card-body">
						<div class="training-request-card  alist">
							<div class="row">
								<div style="" class="normalfont1 bold col-md-8">
									{{$val->fields->Internal_Training_Title}}<br> <span class="normalfont4">Graphic Design intern</span> <span class="normalfont4 bluetxt">Training Request code</span> <span class="normalfont4">Hooper001</span>
								</div>
								<div class="normalfont3 col-md-4">Training Code</div>
							</div>
							<hr>
							<div class=" normalfont3">
								<div class="row">
									<div class="col-md-6">
										<label>Name of the {{repalceWithMentor('trainer')}}</label> TBD <br />
										<br /> <label>Department</label> {{$val->fields->Department}} <br />
										<br /> <label>Type of Training</label> Classroom/Online
									</div>
									<div class="col-md-6">
										<label>Number of the trainees</label> {{$val->fields->Number_of_Trainees}} <br />
										<br /> <label>Start Date</label> {{$val->fields->Start_Date}} <br />
										
									</div>
								</div>
							</div>
						</div>
						<div class="row">
								<div class="col-sm-12" style="text-align:center;">
									<a href="{{route('training_request_info',$val->fields->Training_Request_ID)}}"><button type="button" class="btn bluebtn">Apply</button></a>
								</div>
							</div>
					</div>
				
			</div>
			@empty
			@endforelse
	
	
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
					<input type="text" class="form-control col-12">
				</div>
				<br />
				<button type="button" class="btn bluebtn" data-dismiss="modal">Send</button>
			</div>
		</div>
	</div>
</div>
@include('footer')
