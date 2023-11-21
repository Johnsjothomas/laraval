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


    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>{{repalceWithMentor('Trainer')}}</th>
                <th>Training category</th>
                <th>Training topic</th>
                <th>Start Date</th>
                <th>Status</th>
                <th>View Certificate</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>Marketing</td>
                <td>lina@gmail.com</td>
                <td>Soft Skills</td>
                <td>Digital Marketing</td>
                <td>15th Nov, 2021</td>
                <td>Completed</td>
                <td><button class="bluebtn">Click Here</button></td>
            </tr>
            <tr>
                <td>John Doe</td>
                <td>Marketing</td>
                <td>lina@gmail.com</td>
                <td>Soft Skills</td>
                <td>Digital Marketing</td>
                <td>15th Nov, 2021</td>
                <td>Pending</td>
                <td><button class="bluebtn">Click Here</button></td>
            </tr>
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