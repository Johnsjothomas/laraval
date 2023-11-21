@include('header')
@include('employer.navigation')
@include('employer.submenu')
@include('filter')
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

        @include('employer.profiles.profile_navigation')

    <div class="pt-4">
    <select class="form-control col-3" id="select_module" name="select_module">
                    <option value="" disabled selected>Select the Job</option>
                    <option value="1">Job 1</option>
                    <option value="2">Job 2</option>
                    <option value="3">Job 3</option>
    </select>
        <div class="mt-4">
            <div class="card-body">

<!-- CREATE MODULE -->
<div class="row">
        		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ptd15 pointer" >
        			<div class="whitebackground p10" style="height:300px">
                                <div class="dropdown right">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"> Shortlist Profile </a>
                        <a class="dropdown-item" href="#">Schedule Interview</a>
                        <a class="dropdown-item" href="#">Reject Profile</a>
                        <a class="dropdown-item" href="#">Send Offer</a>
                        

                    </div>
                    </div>
                  <br>
                 <div class="row" style="display:inline-flex;">
                 <div style="height:40px; width:40px;background: pink"></div>
                 <div style="padding-left: 15px" class="normalfont1 bold">Foxpin<br><span class="normalfont4">Graphic Design intern</span></div>
                  </div>
                  <div class="row normalfont3"><br>
                    Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem
                  </div>
                 <hr>
                 <div class="row normalfont3">
                    <button class="btn bluebtn">Download Resume</button>
                 </div>
              </div>
        		</div>
        	  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ptd15 pointer" >
              <div class="whitebackground p10" style="height:300px">
                                <div class="dropdown right">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"> Shortlist Profile </a>
                        <a class="dropdown-item" href="#">Schedule Interview</a>
                        <a class="dropdown-item" href="#">Reject Profile</a>
                         <a class="dropdown-item" href="#">Send Offer</a>
                        
                    </div>
                    </div>
                  <br>
                 <div class="row" style="display:inline-flex;">
                 <div style="height:40px; width:40px;background: pink"></div>
                 <div style="padding-left: 15px" class="normalfont1 bold">Foxpin<br><span class="normalfont4">Graphic Design intern</span></div>
                  </div>
                  <div class="row normalfont3"><br>
                    Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem
                  </div>
                 <hr>
                 <div class="row normalfont3">
                  <button class="btn bluebtn">Download Resume</button>
                  
                 </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ptd15 pointer" >
              <div class="whitebackground p10" style="height:300px">
                                <div class="dropdown right">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"> Shortlist Profile </a>
                        <a class="dropdown-item" href="#">Schedule Interview</a>
                        <a class="dropdown-item" href="#">Reject Profile</a>
                         <a class="dropdown-item" href="#">Send Offer</a>
                    </div>
                    </div>
                  <br>
                 <div class="row" style="display:inline-flex;">
                 <div style="height:40px; width:40px;background: pink"></div>
                 <div style="padding-left: 15px" class="normalfont1 bold">Foxpin<br><span class="normalfont4">Graphic Design intern</span></div>
                  </div>
                  <div class="row normalfont3"><br>
                    Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem
                  </div>
                 <hr>
                 <div class="row normalfont3">
                  <button class="btn bluebtn">Download Resume</button>
                  
                 </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ptd15 pointer" >
              <div class="whitebackground p10" style="height:300px">
                                <div class="dropdown right">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"> Shortlist Profile </a>
                        <a class="dropdown-item" href="#">Schedule Interview</a>
                        <a class="dropdown-item" href="#">Reject Profile</a>
                         <a class="dropdown-item" href="#">Send Offer</a>
                    </div>
                    </div>
                  <br>
                 <div class="row" style="display:inline-flex;">
                 <div style="height:40px; width:40px;background: pink"></div>
                 <div style="padding-left: 15px" class="normalfont1 bold">Foxpin<br><span class="normalfont4">Graphic Design intern</span></div>
                  </div>
                  <div class="row normalfont3"><br>
                    Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem
                  </div>
                 <hr>
                 <div class="row normalfont3">
                  <button class="btn bluebtn">Download Resume</button>
                  
                 </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ptd15 pointer" >
              <div class="whitebackground p10" style="height:300px">
                                <div class="dropdown right">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"> Shortlist Profile </a>
                        <a class="dropdown-item" href="#">Schedule Interview</a>
                        <a class="dropdown-item" href="#">Reject Profile</a>
                         <a class="dropdown-item" href="#">Send Offer</a>
                    </div>
                    </div>
                  <br>
                 <div class="row" style="display:inline-flex;">
                 <div style="height:40px; width:40px;background: pink"></div>
                 <div style="padding-left: 15px" class="normalfont1 bold">Foxpin<br><span class="normalfont4">Graphic Design intern</span></div>
                  </div>
                  <div class="row normalfont3"><br>
                    Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem
                  </div>
                 <hr>
                 <div class="row normalfont3">
                  <button class="btn bluebtn">Download Resume</button>
                  
                 </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ptd15 pointer" >
              <div class="whitebackground p10" style="height:300px">
                                <div class="dropdown right">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"> Shortlist Profile </a>
                        <a class="dropdown-item" href="#">Schedule Interview</a>
                        <a class="dropdown-item" href="#">Reject Profile</a>
                         <a class="dropdown-item" href="#">Send Offer</a>
                    </div>
                    </div>
                  <br>
                 <div class="row" style="display:inline-flex;">
                 <div style="height:40px; width:40px;background: pink"></div>
                 <div style="padding-left: 15px" class="normalfont1 bold">Foxpin<br><span class="normalfont4">Graphic Design intern</span></div>
                  </div>
                  <div class="row normalfont3"><br>
                    Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem
                  </div>
                 <hr>
                 <div class="row normalfont3">
                  <button class="btn bluebtn">Download Resume</button>
                  
                 </div>
              </div>
            </div>
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
          <h5>Are you sure you want to reject this profile</h5>
        <button type="button" class="btn bluebtn pl-5 pr-5" data-dismiss="modal">Yes</button>
        <button type="button" class="btn whitebtn pl-5 pr-5" data-dismiss="modal">No</button>
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
          <h5>Are you sure you want to shortlist this profile</h5>
        <button type="button" class="btn bluebtn pl-5 pr-5" data-dismiss="modal">Yes</button>
        <button type="button" class="btn whitebtn pl-5 pr-5" data-dismiss="modal">No</button>
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
          <h5>Do you wish to Schedule interview</h5>
        <button type="button" class="btn bluebtn pl-5 pr-5" data-dismiss="modal">Yes</button>
        <button type="button" class="btn whitebtn pl-5 pr-5" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<style>
  button{
    padding: 5px !important;
  }
  body{
    background: #f5f5f5;
  }
  </style>
    @include('footer')