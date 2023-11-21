@include('header')
@include('employer.navigation')
@include('employer.submenu')
@include('filter')
<div class="container justify-content-center align-center pt-5 pb-5">
    <div class="row">
        <div class="col">
        <img class="img-fluid " style="width:100%" src="/talent/assets/img/myprofile.png"></div>
    </div>
    @include('profile_head')

        @include('employer.profiles.training_navigation')






          <div class="row">
            <div class="table-responsive">
            <h4></h4>
            <table class="employer-table" style="width:100%">
       <tbody><tr> 
          <th class="tableborder tableheader pinkbackground center p1 bold">Name </th>
        <th class="tableborder tableheader pinkbackground center p1 bold">Department</th>
          <th class="tableborder tableheader pinkbackground center p1 bold">{{repalceWithMentor('Trainer')}}</th>
          <th class="tableborder tableheader pinkbackground center p1 bold">Training Category</th>
          <th class="tableborder tableheader pinkbackground center p1 bold">Training Topic</th>
          <th class="tableborder tableheader pinkbackground center p1 bold">Start Date</th>
          <th class="tableborder tableheader pinkbackground center p1 bold">Status</th>
          <th class="tableborder tableheader pinkbackground center p1 bold">Date of Payment</th>
          <th class="tableborder tableheader pinkbackground center p1 bold">View Certificate</th>
        </tr>

        <tr>
          <td class="tableborder bold  center ">Lina</td>
          <td class="tableborder  center">Marketing</td>
          <td class="tableborder  center">Rajeev</td>
          <td class="tableborder  center">Soft Skills</td>
          <td class="tableborder  center">Digital Marketing</td>
          <td class="tableborder  center">18-11-2021</td>
          <td class="tableborder  center">Completed</td>
          <td class="tableborder  center">18-11-2021</td>
          <td class="tableborder  center"><button class="btn bluebtn">Click Here</button></td>
        </tr>

         <tr>
          <td class="tableborder bold  center ">Lina</td>
          <td class="tableborder  center">Marketing</td>
          <td class="tableborder  center">Rajeev</td>
          <td class="tableborder  center">Soft Skills</td>
          <td class="tableborder  center">Digital Marketing</td>
          <td class="tableborder  center">18-11-2021</td>
          <td class="tableborder  center">Completed</td>
          <td class="tableborder  center">18-11-2021</td>
          <td class="tableborder  center"><button class="btn bluebtn">Click Here</button></td>
        </tr>


        
       </tbody></table>
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