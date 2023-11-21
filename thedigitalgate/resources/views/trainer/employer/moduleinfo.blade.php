@include('header')
@include('trainer.navigation')
@include('trainer.submenu')


 <br>
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


<form method="post">
    @csrf
    <input type="hidden" value="{{$data->fields->Company}}" name="company">
<div class="container justify-content-center align-center pt-5 pb-5">
    <img class="img-fluid " style="width:100%" src = "{{ asset('talent/assets/img/myprofile.png') }}" />
    <h2 class="pt-3 pb-2">About the Modules</h2>
    
    <div class="pull-left">
    <h5 class="pt-3 mb-1">{{$data->fields->Internal_Training_Title}} <a data-toggle="modal" data-target="#proposeBudget" class="bluebtn pull-rigt btn-md" style="margin-left:100px;" href="#">Apply</a> </h5><br>
    <!-- <h6>Total number of Days <small>2 Days</small></h6> -->
    </div>
    
    
  <!--   <div class="pull-right">
        <h5 class="pt-1">
            <h6 class="pl-3 mb-1">Module Status</h6> 
            <h6 class="pl-3">Fees 5000 INR</h6>
        </h5>
    </div> -->
   

    <div class="pb-2">
    <table class="table table-bordered">
            <thead class="table-secondary">
            <tr>
                <th>Day</th>
                <th>Topic</th>
                <th>Description</th>
            </tr>
            <tr>

            </tr>
            </thead>
                <tbody>
                    <tr>
                        <td  rowspan="2">1</td>
                        <td>Introduction</td>
                        <td>60</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet massa elit tristi</td>
                    </tr>
                    
                    </tbody>
            </table>
    </div>

    <h5 class="pt-3 pb-2">Session Type<label>Classroom</label></h5>
    <h5 class="pt-3 pb-2">Preferred Languages<label>English</label></h5>
    <h5 class="pt-3 pb-2">Duration of the module<label class="pr-5">06/02/22</label><label>08/02/22</label></h5>
    <h5 class="pt-3 pb-2">Maximum Participants quorum<label>100 </label></h5>
    <h5 class="pt-3 pb-2">Lesson Requirments from the participants<label>Nothing</label></h5>
    <h5 class="pt-3 pb-2">Trainer Handout<label>Nothing</label></h5>
    <h5 class="pt-3 pb-2">Benchmark Check after X days<label>Nothing</label></h5>

    <h5 class="pt-3 pb-2">About the {{repalceWithMentor('Trainer')}}</h5>
    <div class="row">
        <div class="col-sm-2">
    <img src="assets/img/slider-img-1.jpg" width="100%"></div>
    <div class="col-sm-10">
    <h5 class="pt-3 pb-2">Khaleel</h5>
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

<div class="modal fade" id="proposeBudget" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <h5>Please propose budget</h5>

          <div class="interview-form">
           
             <div class="row form-input">
              <input type="hidden" value="61b988febfcb4039d8ba0f7f" name="application_id">
                <div class="col-sm-12">
                  
                    <input name="proposed_fee" type="text" class="form-control">
                    <br>
                     <input type="submit" name="submit" value="Submit" class="btn bluebtn pl-4 pr-4">
                </div>
             </div>
            
          </div>
       
      </div>
    </div>
  </div>
</div>


</form>




@include('footer')