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
				<a href="{{route('aspirant_contacted')}}"><button class="bluebtn">Contacted Applicant</button></a>
			</span> <span class=" ">
				<a href="{{route('training_schedule')}}"><button class="whitebtn">Training Schedule</button></a>
			</span>
		</div>
	</div>
	
	
	<div class="row">
		<div class="mt-12">
			<div class="card-body">
				<!-- CREATE MODULE -->
				<div class="row">
					@forelse($data as $val)
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ptd15 pointer">
						<div class="aspirant-card  alist" >
							
							<div class="" style="display: inline-flex;">
								<div style="height: 50px; width: 50px;" class="aprofile">
								<img id="profilePic" class="pic" src="https://source.unsplash.com/random/150x150">
								</div>
								<div style="padding-left: 30px" class="normalfont1 bold">
									{{$val->fields->Aspirant->fields->First_Name}}<br>
									<span class="normalfont4">Graphic Design intern</span>
								</div>
							</div>
							<hr>
							<div class=" normalfont3">
								 {{$val->fields->Aspirant->fields->First_Name}}
							</div>
							
							<div class="row">
								<div class="col-sm-8">
									<button class="btn bluebtn">Download Resume</button>
								</div>
								
							</div>
						</div>
					</div>
					@empty
					@endforelse
					
					
				</div>
			</div>
		</div>
	</div>


	<br/><br/>
	
</div>
<!-- Modal -->

@include('footer')
