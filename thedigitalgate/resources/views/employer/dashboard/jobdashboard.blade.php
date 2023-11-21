@include('header')
@include('employer.navigation')
@include('employer.submenu')
<!--page start-->
<div class="container pt-5 pb-5">
<div class="row col-sm-12 pb-5">
                    <div class="col-md-2 pb-5">
                        <div class="bluebtn" id='jobs'>Jobs</div>
                    </div>
		    <div class="col-md-2">
                    <div class="whitebtn" style="background: #EDEDED"  id='profiles'>Profiles</div>
                    </div>
                    <div class="col-md-2">
                    <div class="whitebtn" style="background: #EDEDED"  id='training'>Training</div>
                    </div></div>
    <div class="row" id="jobs_tab">
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>25</h3>
                <h6>Current Job Openings</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>25</h3>
                <h6>Closed Jobs</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>05</h3>
                <h6>Deleted Jobs</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>23</h3>
                <h6>Paused Jobs</h6>
                </div>
        </div>
        </div>
    </div>

    <div class="row" id="profiles_tab">
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>25</h3>
                <h6>Applications Received</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>25</h3>
                <h6>Saved Profiles</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>05</h3>
                <h6>Shortlisted profiles</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>23</h3>
                <h6>Interview Scheduled</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>23</h3>
                <h6>Rejected Profiles</h6>
                </div>
        </div>
        </div>
    </div>

    <div  id="training_tab">
    <ul class="nav">
            <li class="nav-item">
                <h6 class="nav-link active" data-toggle="tab" href="#home" data-bs-target="#home">Internal Team</a>
                </li>
                <li class="nav-item">
                <h6 class="nav-link" data-toggle="tab" href="#menu1">Aspirant</a>
                </li>
        </ul>
    <div class="row">
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>25</h3>
                <h6>Trainings Planned</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>25</h3>
                <h6>Trainings Scheduled</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>05</h3>
                <h6>Trainings Completed</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>23</h3>
                <h6>Trainings Deleted</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>23</h3>
                <h6>Trainees</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h3>23</h3>
                <h6>Certifications</h6>
                </div>
        </div>
        </div>
        </div>
    </div>

</div>
<style>
  button{
    padding: 5px !important;
  }
  </style>
@include('footer')

<script>
$(document).ready(function(){
        $('#profiles_tab').hide();
            $('#training_tab').hide();
        $('#jobs').click(function(){
            $('#jobs_tab').show();
            $('#profiles_tab').hide();
            $('#training_tab').hide();
        });
        $('#profiles').click(function(){
            $('#profiles_tab').show();
                $('#jobs_tab').hide();
                $('#training_tab').hide();
        });
        $('#training').click(function(){
            $('#training_tab').show();
                $('#jobs_tab').hide();
                $('#profiles_tab').hide();
        });
        });
</script>


