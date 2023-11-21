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
				<a href="{{route('aspirant_list_trainer')}}"><button class="bluebtn">Applicant List</button></a>
			</span> <span class=" ">
				<a href="{{route('aspirant_contacted')}}"><button class="whitebtn">Contacted Applicant</button></a>
			</span> <span class=" ">
				<a href="{{route('training_schedule')}}"><button class="whitebtn">Training Schedule</button></a>
			</span>
		</div>
	</div>
	<div class="row">
		<div class="col-4  pt-4">
			<select class="form-control" onchange="changeModule(this.value)">
                                                <option value="" disabled="" selected="">Select Training</option>
                                                @forelse($training_modules as $key=>$val)
                                                <option  value="{{$val->id}}">{{$val->fields->Module_Title}}</option>
                                                @empty
                                                @endforelse
                                            </select>
		</div>
	</div>
	
	<div class="row">
		<div class="mt-12">
			<div class="card-body">
				<!-- CREATE MODULE -->
				<div class="row">
					@forelse($data as $key)
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ptd15 pointer">
						<div class="aspirant-card  alist" >
							
							<div class="" style="display: inline-flex;">
								<div style="height: 50px; width: 50px;" class="aprofile">
								<img id="profilePic" class="pic" src="https://source.unsplash.com/random/150x150">
								</div>
								<div style="padding-left: 30px" class="normalfont1 bold">
									{{$val->fields->First_Name}}<br>
									<span class="normalfont4">Graphic Design intern</span>
								</div>
							</div>
							<hr>
							<div class=" normalfont3">
								 Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem
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
<script>
	function changeModule(val){

		var route="{{route('aspirant_list_trainer',[":id"])}}";

    route = route.replace(':id', val);
		window.location.replace(route)
	}
	</script>
@include('footer')
