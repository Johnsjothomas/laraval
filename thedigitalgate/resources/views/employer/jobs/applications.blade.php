@include('header')
@include('employer.navigation')
@include('employer.submenu')

<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-md-12 p-3">
            <h2>Job Details</h2>
        			<div class="job-card whitebackground rounded2">
              <div class="right">
              <i class="pt-1 fa fa-bookmark right" aria-hidden="true"></i>
                    </div>
                  <br>
                 <div class="row" style="display:inline-flex;">
                 <div style="height:55px; width:55px;background: pink;border-radius: 50px;"></div>
                 <div style="padding-left: 15px" class="normalfont1 bold">{{$job_details->fields->Posted_by_Company->fields->Company_Name}}<div class="normalfont4">
                   {{$job_details->fields->Job_Title}}
                 </div></div>
                  </div>
                  <div class="row normalfont3"><br>
                    {{$job_details->fields->Job_Description}}
                  </div>
                 <hr>
                 <div class="row normalfont3">
                   <div class="col-sm-6 p-0">
                  <i class="fa fa-briefcase pr-2" aria-hidden="true"></i><span>{{$job_details->fields->Employment_Type}}</span></div>
                  <div class="col-sm-6 pr-0">
                  <div class="right">Hyderabad,India</div></div>
                 </div>
              </div>
        </div>
</div>
        <h2 class="pt-5 p-3">Applications</h2>
    <div class="row">


    @forelse($applications as $key=>$val)  
    <div class="col-md-4 pointer">
        	<div class="whitebackground p-2 rounded2">
              <div class="dropdown right">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" onclick="update_status('{{$val->id}}','In Negotiation')"> Shortlist Profile </a> -->
                        <a class="dropdown-item" data-toggle="modal" data-target="#scheduleInterview">Schedule Interview</a>
                        <a class="dropdown-item" onclick="update_status('{{$val->id}}','Profile Rejected')">Reject Profile</a>
                        
                    </div>
                    </div>
                  <br>
                 <div class="row" style="display:inline-flex;">
                 <div class="col-sm-2 pr-0">
                 <div style="height:55px; width:55px;background: pink;border-radius: 50px;"></div></div>
                 <div class="col-sm-10">
                 <div class="row" style="padding-left: 15px">
                     <div class="col-sm-6 p-1">
                 <div class="normalfont1 bold">{{$val->fields->Select_Aspirant->fields->First_Name ?? ''}}</div></div>
         
                  <div class="col-sm-12 p-1">
                 <div class="normalfont4">Product Designer at Foxpin</div>
                 <div class="normalfont4">Hyderabad,India </div></div>
                  </div></div></div>
                  <div class=" normalfont3 pl-3">
                  Hey everyone, I’m Khaleel a UI, UX Designer currently interning at a company called Bottle. I also work as a freelance UI, UX designer.
                  </div>
                 <hr>
                 <div class="row normalfont3">

                  @if($val->fields->Employment_Type=='Gig')

                    <div class="col-sm-4 p-1 text-center">
                    <span>Hourly Rate</span>
                    <div class="normalfont4">{{$val->fields->Hourly_Rate}}</div></div>
                    <div class="col-sm-4 pl-2 pt-1">
                    <span>Total Estimated Hours</span>
                    <div class="normalfont4">{{$val->fields->Total_Estimated_Hours}}</div></div>
                    

                  @else
                    
                    <div class="col-sm-4 p-1 text-center">
                    <span>Notice Period</span>
                    <div class="normalfont4">{{$val->fields->Notice_Period}}</div></div>
                    <div class="col-sm-4 pl-2 pt-1">
                    <span>Expected CTC</span>
                    <div class="normalfont4">{{$val->fields->Expected_CTC}}</div></div>
                    <div class="col-sm-4 p-1 pl-3">
                    <span>Current CTC</span>
                    <div class="normalfont4">{{$val->fields->Current_CTC}}</div></div>

                  @endif
                 </div>
              </div>
    </div>
    @empty
    @endforelse
    
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
          var route="{{route('job_application_status',[":id",":status"])}}";

          route = route.replace(':id', id);
          route = route.replace(':status', status);
           location.replace(route);
        } else {
        }
      });
    }
  </script>

<style>
  button{
    padding: 5px !important;
  }
  body{
    background: #f5f5f5;
  }
  h1, h2, h3, h4, h5, h6 {
      color:#15284C;
}
  </style>
@include('footer')