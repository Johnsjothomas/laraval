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

    

   <h4>Manage Training Requests</h4>

            <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>{{repalceWithMentor('Trainer')}}</th>
                <th>Training Request Code</th>
                <th>Email ID</th>
                <th>Training category</th>
                <th>Training topic</th>
                <th>Start Date</th>
                <th>Status</th>
               <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @forelse($data as $key=>$val)
            <tr>
                <td>{{$val->fields->Trainer->fields->First_Name}}</td>
                <td>LIna001</td>
                <td>{{$val->fields->Trainer->fields->Email}}</td>
                <td>Soft Skills</td>
                <td>Digital Marketing</td>
                <td>15th Nov, 2021</td>
                <td>{{$val->fields->Application_Status}}<button id="rzp-button1">Pay</button></td>
                <!-- <td><span style="background-color: red;width:50px;height:50px;border-radius:50% ">&nbsp;&nbsp;&nbsp;&nbsp;</span></td> -->
                <td>
                @if($val->fields->Application_Status == 'Applied')
                <button class="bluebtn" onclick="trainer_request_application_status('{{$val->id}}','In Negotiation')"> Start Negotiation</button>
                @else
              <select class="form-control" name="status" onchange="trainer_request_application_status('{{$val->id}}',this.value)">
                <option value="">Select</option>
                  <option  value="Finalized">Accept</option>
                  <option value="Rejected">Reject</option>
                </select>
                @endif
              </td>
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

    function trainer_request_application_status(id,status){
       swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          var route="{{route('trainer_request_application_status',[":id",":status"])}}";

          route = route.replace(':id', id);
          route = route.replace(':status', status);
           location.replace(route);
        } else {
        }
      });
    }


</script>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

document.getElementById('rzp-button1').onclick = function(e){

  var options = {
    "key": "rzp_test_uGR4lar0cEjH64", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Industreall",
    "description": "Test Transaction",
    "image": "https://www.industreall.com/talent/assets/img/logo_footer.svg",
    "order_id": "order_J5goo0fOLd058t", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9999999999"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
    rzp1.open();
    e.preventDefault();
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