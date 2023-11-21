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

    <div class="row">
          <div class=" p-2">
                <a href="{{route('training_planner')}}">Training Requests</a>
            </div>
           
            <span class="seperator"></span>
            <div class=" p-2">
                <a href="{{route('trainer_requests')}}">Manage {{repalceWithMentor('Trainer')}} Requests</a>
            </div>
             <span class="seperator"></span>
            <div class=" p-2">
                <a href="{{route('manage_trainers')}}">Manage {{repalceWithMentor('Trainers')}}</a>
            </div>
        </div>

    

    <h4>Manage {{repalceWithMentor('Trainers')}}</h4>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>{{repalceWithMentor('Trainer')}}</th>
                <th>{{repalceWithMentor('Trainer')}} Code</th>
                <th>Email ID</th>
                <th>Training category</th>
                <th>Training topic</th>
                <th>Start Date</th>
                <th>Applied On</th>
                <th>Review</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
          @forelse($data as $key=>$val)
            <tr>
                <td>{{$val->fields->Trainer->fields->First_Name}}</td>
                <td>LIna001</td>
                <td>{{$val->fields->Trainer->fields->Email}}</td>
                <td>Soft Skills</td>
                <td>{{$val->fields->Training_Request->fields->Internal_Training_Title}}</td>
                <td>{{$val->fields->Training_Request->fields->Start_Date}}</td>
                <td>{{$val->createdOn}}</td>
                <td><span style="background-color: red;width:50px;height:50px;border-radius:50% ">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                <td>{{$val->fields->Finalized_Fee}}</td>
            </tr>
            @empty
            @endforelse
            
            </tbody>
            </table>

            



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