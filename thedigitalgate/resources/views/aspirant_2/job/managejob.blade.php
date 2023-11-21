@include('header')
@include('aspirant.navigation')
@include('aspirant.submenu')



    <div class="row" style="background:#E5E5E5">
      <br><br>
       <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pt-5 pb-5">
        	<div class="mediumfont">Manage Jobs</div><br><br>
        	<form class="row" style="    background: white;border-radius: 10%;" _lpchecked="1">
                    <input class="form-control col-sm-8" placeholder="Search for Job" autocomplete="off">
                    <input class="form-control col-sm-2" placeholder="Location">
                    <select class="form-control col-sm-2" placeholder="Job type">
                        <option>Job type</option>
                        <option>Training</option>
                    </select>

                </form>   <br>
        	<br><br>
          <div class="mediumfont">Recommended for you</div><br><br>
          
        	<div class="row">


  @forelse($jobs as $key=>$val)
  
        		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ptd15 pointer">
              <a href="{{route('aspirant_jobdetails',[$val->id,$val->fields->Job_ID])}}">
        			<div class="job-card whitebackground">
                  <i class="fa fa-bookmark right" aria-hidden="true"></i>
                  <br>
                 <div class="row" style="display:inline-flex;">
                 <div style="height:40px; width:40px;background: pink"></div>
                 <div style="padding-left: 15px" class="normalfont1 bold">{{$val->fields->Posted_by_Company->fields->Company_Name ?? ''}}<br><span class="normalfont4">{{$val->fields->Job_Title ?? ''}}</span></div>
                  </div>
                  <div class="row normalfont3"><br>
                    {{$val->fields->Job_Description ?? ''}}
                  </div>
                 <hr>
                 <div class="row normalfont3">
                  <i class="fa fa-briefcase" aria-hidden="true"></i>{{$val->fields->Employment_Type ?? ''}}
                  <div class="right">Hyderabad,India</div>
                 </div>
              </div>
                </a>
        		</div>

  @empty
   @endforelse 
        	  
        	</div>
        	
        </div>
    </div>
    <br><br>
</div>  




@include('footer')