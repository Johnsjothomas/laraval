@include('header')
@include('trainer.navigation')
@include('trainer.submenu')
<div class="container justify-content-center align-center pt-5 pb-5">
    <div class="row">
        <div class="col">
            <img class="img-fluid " style="width:100%" src="/talent/assets/img/myprofile.png">
        </div>
    </div>
        @include('profile_head')

   

            @include('trainer.modules.module_navigation',[$type,$status])
       

   


        <!--PAST MODULES -->
        <h5 class="mt-5">{{ucfirst($module_status)}} Modules</h5>
        <div class="row mt-4">

            @forelse($data as $key=>$val)
            
            <div class="col-md-4">
                <div class="card remove_br">
                    <div class="card-header p-0 white_bg">
                        <a href="{{route('module_info',[$val->fields->Type,$val->fields->Module_ID])}}" target="_blank"><img src="/talent/trainer/assets/img/myprofile.png" width="100%"></a>
                        <div class="p-3">
                        <div class="row">
                            <div class="col-10">
                                <a href="{{route('module_info',[$val->fields->Type,$val->fields->Module_ID])}}" target="_blank"><h3 class="card-title">{{$val->fields->Module_Title}} </h3></a>
                            </div>
                            <div class="col-2">
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Schedule Training</a>
                                        <a class="dropdown-item" onclick="update_status('{{$val->id}}','Inactive')">
                                            Delete Modules </a>
                                        <a class="dropdown-item" href="#">Pause Modules</a>
                                        <a class="dropdown-item" href="{{route('edit_module',[$val->fields->Type,$val->fields->Module_ID])}}">Edit Modules</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>{{$val->fields->Module_Title}}</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6>Start Date</h6>
                        <div class="row">
                            <div class="col-md-6"><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;10/06/2021</div>
                        </div>
                        <h6>End Date</h6>
                        <div class="row">
                            <div class="col-md-6"><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;10/06/2021</div>
                            <div class="col-md-6"><i class="fa fa-users" aria-hidden="true"></i> 20 Seats remaining</div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </a>
            @endforeach
            
            
        </div>

        <h5 class="mt-5">My Trainings design components</h5>
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                        <th>Training category</th>
                        <th>Module Title</th>
                        <th>Training Status</th>
                        <th>Number of  Aspirants</th>
                        <th>Total Amount Received</th>
                        <th>Average Rating</th>
                        <th>Certification Status</th>
                    </thead>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td>Upcoming/Active/Paused/deleted/Completed</td>
                        <td>44 <a href="#" class="bluebtn btn-sm">Click Here</a></td>
                        <td>50</td>
                        <td>4.5</td>
                        <td><a href="#">Issued/Pending</a></td>
                    </tbody>
                </table>
            </div>
            </div>
        </div>


    </div>
</div>




<script>

    function update_status(id,status){
       swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          var route="{{route('module_status',[":id",":status"])}}";

          route = route.replace(':id', id);
          route = route.replace(':status', status);
           location.replace(route);
        } else {
        }
      })
    }


// ------------step-wizard-------------
$(document).ready(function() {

      $("#skill_tags").select2({
    allowClear: false
});


    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {

        var target = $(e.target);

        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function(e) {

        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);

    });
    $(".prev-step").click(function(e) {

        var active = $('.wizard .nav-tabs li.active');
        prevTab(active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}

function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


$('.nav-tabs').on('click', 'li', function() {
    $('.nav-tabs li.active').removeClass('active');
    $(this).addClass('active');
});
</script>
@include('footer')