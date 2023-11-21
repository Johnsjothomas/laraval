@include('header')
@include('trainer.navigation')
@include('trainer.submenu')
<div class="container justify-content-center align-center pt-5 pb-5">
    <img class="img-fluid " style="width:100%" src = "{{ asset('talent/assets/img/myprofile.png') }}" />
    <h2 class="pt-3 pb-2">About the Modules</h2>
   <?php 
    $jobTypehtml = '';
    if($data->fields->jobtype_of_customer_contact != "")
    {
        
        if($data->fields->jobtype_of_customer_contact == "fulltime")
        {
            $jobTypehtml .= 'Full Time ';
        }
        else if($data->fields->jobtype_of_customer_contact == "internship")
        {
            $jobTypehtml .= 'Internship ';
        }
    }

    $companyNamehtml = '';
    if($data->fields->name_of_customer != "")
    {
        $companyNamehtml .= " For ".$data->fields->name_of_customer;
    }
?>
    <div class="pull-left">
    <h5 class="pt-3 mb-1">{{$data->fields->Module_Title}} {{$companyNamehtml}}<!-- <a class="bluebtn pull-rigt btn-md" style="margin-left:100px;" href="#">Apply</a> --> </h5><br>
    <h6>Total number of Days <small>{{$data->fields->Total_Number_of_Days}} Days</small></h6>
    <h6>Job Type - <small>{{$jobTypehtml}}</small></h6>
    </div>
    
    
    <div class="pull-right">
        <h5 class="pt-1">
            <h6 class="pl-3 mb-1">{{$data->fields->Module_Status}}</h6> 
            <h6 class="pl-3">Fees {{$data->fields->Module_Price ?? ""}} INR</h6>
        </h5>
    </div>
   

    <div class="pb-2">
    <table class="table table-bordered">
            <thead class="table-secondary">
            <tr>
                <th>Day</th>
                <th>Topic</th>
                <th>Time(mins)</th>
                <th>Description</th>
                <th>Objective</th>
                <th>Meeting Link</th>
                <th>Update Sratus</th>
            </tr>
            <tr>

            </tr>
            </thead>
                <tbody>
                    @forelse($topics as $key=>$val)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>Title</td>
                        <td>{{$val->fields->Total_time_in_Minutes ?? ''}}</td>
                        <td>{{$val->fields->Topic_Description ?? ''}}</td>
                        <td>{{$val->fields->Topic_Objective ?? ''}}</td>
                        <td><a href="#">Create Zoom Link</a></td>
                        <td> <a href="#" class="bluebtn btn-sm">Completed</a></td>
                    </tr>
                    @empty
                    @endforelse
                    </tbody>
            </table>
    </div>

    <h5 class="pt-3 pb-2">Session Type<label>{{$data->fields->Session_Type}}</label></h5>
    <h5 class="pt-3 pb-2">Preferred Languages<label></label></h5>
    <h5 class="pt-3 pb-2">Duration of the module<label class="pr-5">{{$data->fields->Start_Date}}</label><label>{{$data->fields->End_Date}}</label></h5>
    <h5 class="pt-3 pb-2">Maximum Participants quorum<label>{{$data->fields->Max_Participants_Quorum_per_Batch}} </label></h5>
     <h5 class="pt-3 pb-2">Prework Requested from the participants<label>{{$data->fields->Prework_requested_from_the_participant}}</label></h5>
    <h5 class="pt-3 pb-2">Lesson Requirments from the participants<label>{{$data->fields->Lesson_Requirements_from_participants}}</label></h5>
    <h5 class="pt-3 pb-2">Trainer Handout<label>{{$data->fields->Trainee_Handout}}</label></h5>
    <h5 class="pt-3 pb-2">Benchmark Check after X days<label></label></h5>

    <h5 class="pt-3 pb-2">About the {{repalceWithMentor('Trainer')}}</h5>
    <div class="row">
        <div class="col-sm-2">
    <img src="assets/img/slider-img-1.jpg" width="100%"></div>
    <div class="col-sm-10">
    <h5 class="pt-3 pb-2">Name</h5>
    <label class="p-0">UI UX Designer</label>
    <div>4.3</div></div>
    </div>
    <p class="col-sm-6 pt-3 pl_0">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem nullam adipiscing mattis nunc, praesent at odio hac faucibus. Cursus et ornare aliquam ullamcorper. Ac risus, in vitae quis ut. Amet et diam etiam duis cursus adipiscing. Vitae, gravida mi a vitae viverra tincidunt lectus ligula. Et sed id praesent mattis senectus suspendisse sagittis. Bibendum in orci, sagittis sit praesent. Odio vitae scelerisque ac nibh consectetur tellus viverra. Venenatis nunc eleifend fringilla mattis volutpat nulla massa tellus in. 
    </p>
    </h5>



<!-- SUCCESS -->
<!-- <div>
<img src="assets/img/tech_life_communication.png">
    <h2>Your Application has been submited.
we will get back to you soon </h2>
</div> -->

</div>


@include('footer')