@include('header')
@include('employer.navigation')
@include('employer.submenu')
<div class="container justify-content-center align-center pt-5 pb-5">
    <div class="row">
        <div class="col">
        <img class="img-fluid " style="width:100%" src="/talent/assets/img/myprofile.png"></div>
    </div>
    @include('profile_head')

     @include('employer.jobs.job_navigation')

           @if (session('success'))
                          <div class="alert alert-success">
                            {{ session('success') }}
                          </div>
                        @endif
                        @if (session('failed'))
                          <div class="alert alert-danger">
                            {{ session('failed') }}
                          </div>
                        @endif
    

    
<!--PAST MODULES -->
<div class="container">
<div class="row">


  @forelse($jobs as $key=>$val)
        		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ptd15 pointer" >
              
          			<div class="job-card whitebackground rounded2" >
                <div class="dropdown right">
                      <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                      <div class="dropdown-menu">
                        @if($val->fields->Job_Status == 'Active')
                          <a class="dropdown-item" onclick="update_status('{{route('job_status',[$val->id,'Deleted'])}}')">Delete Job </a>
                          <a class="dropdown-item" onclick="update_status('{{route('job_status',[$val->id,'Paused'])}}')">Pause Job</a>
                         @else
                          <a class="dropdown-item" onclick="update_status('{{route('job_status',[$val->id,'Active'])}}')">Activate Job </a>
                         @endif 
                          <a class="dropdown-item" href="{{route('edit_job',[$val->id,$val->fields->Job_ID])}}">Edit/Update Job</a>
                          <a class="dropdown-item" href="#">View Applications</a>
                      </div>
                      </div>
                    <br>

                    <a href="{{route('job_applications',$val->fields->Job_ID)}}">
                         <div class="row" style="display:inline-flex;">
                         <div style="height:40px; width:40px;background: pink"></div>
                         <div style="padding-left: 15px" class="normalfont1 bold">{{$val->fields->Posted_by_Company->fields->Company_Name}}<div class="normalfont4">{{$val->fields->Job_Title}}</div></div>
                          </div>
                          <div class="row normalfont3"><br>
                            {{$val->fields->Job_Description}}
                          </div>
                         <hr>
                         <div class="row normalfont3">
                           <div class="col-sm-6 p-0">
                          <i class="fa fa-briefcase pr-2" aria-hidden="true"></i><span>{{$val->fields->Employment_Type}}</span></div>
                          <div class="col-sm-6 pr-0">
                          <div class="right">Hyderabad,India</div></div>
                         </div>
                    </a>
                </div>
              
        		</div>
   @empty
   @endforelse         


            
          </div>
</div>
        
</div>

<script>
  function update_status(url){
    swal({
      title: "Are you sure?",
      text: "",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = url;
      } else {
        
      }
    });
  }


</script>

<style>
  button{
    padding: 5px !important;
  }
  body{
    background: #f5f5f5;
  }
  </style>
    @include('footer')