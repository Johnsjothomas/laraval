@include('header')
@include('employer.navigation')
@include('employer.submenu')
<div class="container justify-content-center align-center pt-5 pb-5">
    <div class="row">
        <div class="col">
        <img class="img-fluid " style="width:100%" src="/talent/assets/img/myprofile.png"></div>
    </div>
    @include('profile_head')

    @include('employer.trainings.training_navigation')


    <div class="pt-4">
        


            <div class="row training-request">

            @forelse($requests as $key=>$val)    
            <div class="col-md-4">
                <div class=" card">
                    <div class="card-header bg-white">
                        <div class="row">
                            <div class="col-10 p-0">
                        <h3 class="card-title">{{$val->fields->Internal_Training_Title}}</h3></div>
                        <div class="col-2">
                        <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"> Delete Modules </a>
                        <a class="dropdown-item" href="#">Pause Modules</a>
                        <a class="dropdown-item" href="{{route('edit_training',[$val->id,$val->fields->Training_Request_ID])}}">Edit Modules</a>
                    </div>
                    </div></div>  
                    <p class="">Department : {{$val->fields->Department}}</p>
                </div>

                        
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pl-0">
                            <h6>Training Topic</h6>
                            <label  class="normalfont2">{{$val->fields->Internal_Training_Title}}</label>
                            </div>
                            <div class="col-md-6 p-0">
                            <h6>Number of Trainees</h6>
                            <label  class="normalfont2">{{$val->fields->Number_of_Trainees}}</label></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pl-0">
                            <h6>Department</h6>
                            <label  class="normalfont2">{{$val->fields->Department}}</label>
                            </div>
                            <div class="col-md-6 p-0">
                            <h6>Type of Training</h6>
                            <label  class="normalfont2">{{$val->fields->Training_Type}}</label></div>

                            <div class="col-md-12 p-0">
                            <h6>Date Range</h6>
                            <label  class="normalfont2">{{date('jS M, Y',strtotime($val->fields->Start_Date))}} - {{date('jS M, Y',strtotime($val->fields->End_Date))}}</label></div>
                        </div>
                        
                        
                </div>
            </div>
            </div>
            @empty
            @endforelse

            
            
            
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
    function module_search(){
        $("#search_training").modal();
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