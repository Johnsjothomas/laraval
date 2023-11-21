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

    <form method="post" enctype="multipart/form-data">
        @csrf
    <div class="pt-4">
        <div class="card">
            <div class="card-body p-5">
<!-- CREATE MODULE -->
            <!-- <div class="text-center p-5" >
             <button class="btn bluebtn pl-4 pr-4">Add one more profile</button></div> -->
<!-- MANAGE MODULE -->
        
            <div class="form-group pt-5">
            <h5>Internal Training Title</h5>
            <input class="form-control" type="text" value="{{ old('training_title',(isset($data->fields->Internal_Training_Title))? $data->fields->Internal_Training_Title : '')}}" name="training_title" placeholder="Enter your Training Title">
            @error('training_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
            <h5>Department</h5>
            <input class="form-control" type="text" value="{{ old('department',(isset($data->fields->Department))? $data->fields->Department : '')}}" name="department" placeholder="Enter Department">
            @error('department')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group" >
            <h5>Total Number of Trainees</h5>
            <input class="form-control" type="text" value="{{ old('number_of_trainees',(isset($data->fields->Number_of_Trainees))? $data->fields->Number_of_Trainees : '')}}" name="number_of_trainees" placeholder="Enter Number of Trainees">
            @error('number_of_trainees')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group" >
            <h5>Date Range of Training</h5>
            <div class="form-group form-row">
                <div class="col">
                <input name="start_date" type="date" class="form-control" value="{{ old('start_date',(isset($data->fields->Start_Date))? $data->fields->Start_Date : '')}}">
                @error('start_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
                <div class="col">
                <input name="end_date" type="date" class="form-control" value="{{ old('end_date',(isset($data->fields->End_Date))? $data->fields->End_Date : '')}}">
                @error('end_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            </div>
            

             <div class="form-group" >
             <h5>Type of Training</h5>
             <select name="training_type" class="form-control">
                <option value="">select training type</option>
                <option @if((isset($data->fields->Training_Type) && $data->fields->Training_Type=='Classroom') || old('training_type')=='Classroom') selected="selected" @endif value="Classroom">Classroom</option>
                <option @if((isset($data->fields->Training_Type) && $data->fields->Training_Type=='Online') || old('training_type')=='Online') selected="selected" @endif value="Online">Online</option>
                <option @if((isset($data->fields->Training_Type) && $data->fields->Training_Type=='Hybrid') || old('training_type')=='Hybrid') selected="selected" @endif value="Hybrid">Hybrid</option>
             </select>
             @error('training_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
            <h5>Number of Modules Required to  complete the above  Titled Training</h5>
           
            <select name="no_of_modules" class="form-control" onchange="show_modules(this.value)">
                <option value="">Select from the list</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            @error('no_of_modules')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="modules module_list_1" style="display:none">

            <h5><u>Module 1</u></h5>
            <input type="hidden" name="module_id[]" value="{{(isset($modules[0]->id))? $modules[0]->id : ''}}">
            <div class="form-group pt5">
              <h5>Training Topic</h5>
              <input class="form-control" type="text" value="{{ old('training_topic.0',(isset($modules[0]->fields->Training_Topic))? $modules[0]->fields->Training_Topic : '')}}" name="training_topic[]" placeholder="Enter Training Topic">
              @error('training_topic')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>


            <div class="form-group" >
              <h5>Topic Description</h5>
              <textarea name="description[]" class="form-control">{{ old('description.0',(isset($modules[0]->fields->Topic_Description))? $modules[0]->fields->Topic_Description : '')}}</textarea> 
              @error('description')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

           
            
            <!-- <div class="text-center pb-5" >
             <button type="button" class="btn bluebtn pl-4 pr-4" onclick="$('.module_list_2').show()">Add More Module</button></div> -->
           </div>


           <div class="modules module_list_2" style="display:none">
             

            <h5><u>Module 2</u></h5>
            <input type="hidden" name="module_id[]" value="{{(isset($modules[1]->id))? $modules[1]->id : ''}}">
            <div class="form-group pt5">
              <h5>Training Topic</h5>
              <input class="form-control" type="text" value="{{ old('training_topic.1',(isset($modules[1]->fields->Training_Topic))? $modules[1]->fields->Training_Topic : '')}}" name="training_topic[]" placeholder="Enter Training Topic">
              @error('training_topic')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>


            <div class="form-group" >
              <h5>Topic Description</h5>
              <textarea name="description[]" class="form-control">{{ old('description.1',(isset($modules[1]->fields->Topic_Description))? $modules[1]->fields->Topic_Description : '')}}</textarea> 
              @error('description')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

           
            
            <!-- <div class="text-center pb-5" >
             <button type="button" class="btn bluebtn pl-4 pr-4" onclick="addMoreModules()">Add More Module</button></div> -->
           </div>

           <div class="modules module_list_3" style="display:none">
             

            <h5><u>Module 3</u></h5>
            <input type="hidden" name="module_id[]" value="{{(isset($modules[2]->id))? $modules[2]->id : ''}}">
            <div class="form-group pt5">
              <h5>Training Topic</h5>
              <input class="form-control" type="text" value="{{ old('training_topic.2',(isset($modules[2]->fields->Training_Topic))? $modules[2]->fields->Training_Topic : '')}}" name="training_topic[]" placeholder="Enter Training Topic">
              @error('training_topic')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>


            <div class="form-group" >
              <h5>Topic Description</h5>
              <textarea name="description[]" class="form-control">{{ old('description.2',(isset($modules[2]->fields->Topic_Description))? $modules[2]->fields->Topic_Description : '')}}</textarea> 
              @error('description')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

           
            
            <!-- <div class="text-center pb-5" >
             <button type="button" class="btn bluebtn pl-4 pr-4" onclick="addMoreModules()">Add More Module</button></div> -->
           </div>



            <div class="text-center pb-3" >
             <button class="btn bluebtn pl-4 pr-4">Submit</button></div>
             
             
            </div>
            </div>
            </div>


    </div>

    </form>

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

<!-- <div class="modal fade" id="module_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
           <div class="form-group pt-5">
            <h5>No of Trainees</h5>
            <input type="text" class="form-control" placeholder="Enter Number of Trainess">
            </div>
             <div class="form-group pt-5">
            <h5>Start Date</h5>
            <input type="text" class="form-control" placeholder="Enter Start Date">
            </div>
            <div class="form-group pt-5">
           
            <div class="text-center pb-3" >
             <div class="btn bluebtn" onclick="$('#module_details').modal('toggle');">Save</div></div>
            </div>

      </div>
    </div>
  </div>
</div> -->

<!-- Modal -->
<!-- <div class="modal fade" id="search_training" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
         <div class="row justify-content-center align-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-0 bg-white">
                        <img src="/talent/trainer/assets/img/myprofile.png" width="100%">
                        <div class="row">
                            <div class="col-10">
                        <h3 class="card-title">Design thinking </h3></div>
                        <div class="col-2">
                        <i class="pt-1 fa fa-bookmark right" aria-hidden="true"></i></div>  </div>

                        <p class="p-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nibh leo dui sapien amet a.</p>
                    </div>
                    <div class="card-body">
                        <h6>First Session on</h6>
                        <div class="row">
                            <div class="col-md-6 normalfont2"><i class="fa fa-briefcase" aria-hidden="true"></i>10/06/2021</div>
                           <div class="col-md-6 normalfont2"><i class="fa fa-users" aria-hidden="true"></i>20 Seats remaining</div>
                        </div>
                        <h6>Next Session on</h6>
                        <div class="row">
                            <div class="col-md-6">Start Time</div>
                            <div class="col-md-6">End Time</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 normalfont2">10:00 AM</div>
                            <div class="col-md-6  pb-2 normalfont2">01:00 PM</div>
                        </div>
                        <div class="row">
                            <div class="btn bluebtn" onclick="$('#search_training').modal('toggle');$('#module_details').modal()">Select</div>
                        </div>
                </div>
            </div>
            </div>
            
            

    </div>
      </div>
    </div>
  </div>
</div> -->
<script>
   
  function show_modules(x){
    $(".modules").hide();
    for (let i = 1; i <= x; i++) {
      $(".module_list_"+i).show();
    }  
  }

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