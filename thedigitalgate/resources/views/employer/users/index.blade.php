@include('header')
@include('employer.navigation')
@include('employer.submenu')
<div class="container justify-content-center align-center pt-5 pb-5">
    <div class="row">
        <div class="col">
        <img class="img-fluid " style="width:100%" src="/talent/assets/img/myprofile.png"></div>
    </div>
    <div class="row" style=" position: relative; top: -70px; left: 45px; ">
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
                  <input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto" accept="image/*" style="display: none;">
                </div>
              </div>
        </div>
        <div class="col-sm-6" style=" top: 74px; "><h3>Khaleel</h3>
    <h6>UI UX Designer</h6>
    </div>
    </div>
    @if (session('register_success'))
                          <div class="alert alert-success">
                            {{ session('register_success') }}
                          </div>
                        @endif
                        @if (session('register_failed'))
                          <div class="alert alert-danger">
                            {{ session('register_failed') }}
                          </div>
                        @endif

        <div class="row">
            <!-- <div class=" p-2">
                <button class="btn whitebtn2">Add user</button>
            </div> -->
            <!-- <div class=" p-2">
                <button class="btn bluebtn2">View Users</button>
            </div> -->
        </div>
    <div class="pt-4">
        <div class="card">
            <div class="card-body">
<!-- CREATE MODULE -->
            <div class="text-center p-5" >
             <button class="btn bluebtn2 pl-4 pr-4 "  data-toggle="modal" data-target="#exampleModal">+ Add User </button></div>
<!-- MANAGE MODULE -->
<table class="a" style="width:100%">
			 <tbody><tr> 
			    <th class="tableborder tableheader pinkbackground center p1 bold">Name </th>
			  <th class="tableborder tableheader pinkbackground center p1 bold">Mail ID</th><!-- 
			    <th class="tableborder tableheader pinkbackground center p1 bold">Phone number</th> -->
			    <th class="tableborder tableheader pinkbackground center p1 bold">Designation</th>
          <th class="tableborder tableheader pinkbackground center p1 bold">Date</th>
			    <th class="tableborder tableheader pinkbackground center p1 bold">Status</th>
			  </tr>

        @forelse($users as $key=>$val)
  			  <tr>
  			    <td class="tableborder bold normalfont1 center ">{{$val->fields->First_Name ?? ''}}</td>
  			    <td class="tableborder normalfont1 center">{{$val->fields->Email ?? ''}}</td><!-- 
  			    <td class="tableborder normalfont1 center">{{$val->fields->Mobile_Number->code ?? ''}} {{$val->fields->Mobile_Number->value ?? ''}}</td> -->
  			    <td class="tableborder normalfont1 center">{{$val->fields->Designation ?? ''}}</td>
            <td class="tableborder normalfont1 center">{{date('d M Y',strtotime($val->createdOn))}}</td>
  			    <td class="tableborder normalfont1 center">{{$val->fields->Status}}</td>
            
  			  </tr>
        @empty 
        @endforelse
			  <tr>
	     </tbody></table>
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
          <h5>Are you sure you want to delete this Job</h5>
        <button type="button" class="btn bluebtn pl-5 pr-5" data-dismiss="modal">Yes</button>
        <button type="button" class="btn bluebtn pl-5 pr-5" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <h5>Are you sure you want to Pause this Job</h5>
        <button type="button" class="btn bluebtn pl-5 pr-5" data-dismiss="modal">Yes</button>
        <button type="button" class="btn bluebtn pl-5 pr-5" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <h5>Are you sure wants to Edit this Job</h5>
        <button type="button" class="btn bluebtn pl-5 pr-5" data-dismiss="modal">Yes</button>
        <button type="button" class="btn bluebtn pl-5 pr-5" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<style>
  body{
    background: #f5f5f5;
  }
</style>
    @include('footer')


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width: 30%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Give access to you team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('assign_user')}}">
          @csrf
        <div class="form-input">
            <span class="icon_field"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input name="first_name" value="{{old('first_name')}}" type="text" class="input_field" placeholder="Enter name of the Team Member">
          </div>
          <div class="form-input">
            <span class="icon_field"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            <input name="email" value="{{old('email')}}" type="text" class="input_field" placeholder="Enter his/her email address">
          </div>
          <div class="form-input">
            <span class="icon_field"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" class="input_field" name="designation"  value="{{old('designation')}}" placeholder="Enter his/her designation">
          </div>
          <br>
          <center>
            <button type="submit" class="btn bluebtn btn-center" data-toggle="modal" data-target="#Model2">Send</button>
          </center>
      </div>
    </div>
  </div>
</div>

<!-- <div class="modal fade" id="Model2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
       
         <center><img src=" {{asset('employer/assets/img/m2img.png')}}"></center>      
         <br>
         <center>
           <div type="button" class="btn btn-center ">Invitation Sent</button>
         </center>
        </div>
         
      </div>
    </div>
  </div> -->