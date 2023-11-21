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

        @include('employer.profiles.profile_navigation')

    <div class="pt-4">
   <select onchange="job_change(this.value)" class="form-control col-3" id="select_module" name="select_module">
                    <option value="" disabled selected>Select the Job</option>
                    @forelse($jobs as $key=>$val)
                    <option  value="{{$val->id}}">{{$val->fields->Job_Title}}</option>
                    @empty
                    @endforelse
    </select>
        <div class="mt-4">
            <div class="card-body">

<!-- CREATE MODULE -->
<div class="row">
        		 @forelse($applicants as $key=>$val)  
    <div class="col-md-4 pointer">
          <div class="whitebackground p-2 rounded2 application-card">
              <div class="dropdown right">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"> Shortlist Profile </a> -->
                        <a class="dropdown-item" onclick="update_status('{{$val->id}}','Saved')">Reactivate</a>
                        
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
                    <div class="col-sm-6 pl-2 pt-1">
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